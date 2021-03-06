<?php
/**
 * Created by PhpStorm.
 * User: Kisholoy
 * Date: 8/1/14
 * Time: 11:43 PM
 */

class RoleManager extends CI_Controller
{
    private $data = array();
    private $entities = array(
        "application_master",
        "database_user",
        "event_master",
        "indiacom_news_attachments",
        "indiacom_news_master",
        "member_category_master",
        "member_master",
        "news_master",
        "organization_master",
        "paper_latest_version",
        "paper_master",
        "paper_version_master",
        "paper_version_review",
        "privilege_master",
        "privilege_role_mapper",
        "reviewer_master",
        "review_result_master",
        "role_master",
        "subject_master",
        "submission_master",
        "temp_member_master",
        "track_master",
        "user_event_role_mapper",
        "user_master"
    );
    public function __construct()
    {
        parent::__construct();
    }

    private function index($page)
    {
        $this->load->model('access_model');
        require(dirname(__FILE__).'/../config/privileges.php');
        require(dirname(__FILE__).'/../utils/ViewUtils.php');
        if ( ! file_exists(APPPATH.'views/pages/RoleManager/'.$page.'.php'))
        {
            show_404();
        }
        if(isset($privilege['Page']['RoleManager'][$page]) && !$this->access_model->hasPrivileges($privilege['Page']['RoleManager'][$page]))
        {
            $this->load->view('pages/unauthorizedAccess');
            return;
        }

        $this->data['navbarItem'] = pageNavbarItem($page);
        $this->load->view('templates/header', $this->data);
        $this->load->view('templates/sidebar');
        $this->load->view('pages/RoleManager/'.$page, $this->data);
        $this->load->view('templates/footer');
    }

    public function load()
    {
        $this->load->model('role_model');
        $page = "index";
        $this->data['roles'] = $this->role_model->getAllRolesInclDirty();
        $this->index($page);
    }

    public function newRole()
    {
        $page = "newRole";
        $this->load->model('role_model');
        $this->load->model('privilege_model');
        $this->load->model('application_model');
        $this->data['editRole'] = false;
        $this->data['entities'] = $this->entities;
        $this->data['applications'] = $this->application_model->getAllApplications();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('role_name', "Role Name", "required");
        $this->form_validation->set_rules('application', "Application", "required");

        if($this->form_validation->run())
        {
            $this->load->helper('url');
            $posts = $this->input->post();
            $pids = array();
            foreach($posts as $postName=>$post)
            {
                if($postName == 'role_name')
                {
                    $roleDetails = array(
                        'role_name' => $post,
                        'role_application_id' => $this->input->post('application')
                    );
                    $this->role_model->addRole($roleDetails);
                }
                else if($postName != "submit" && $postName != "application")
                {
                    list($entityName, $operation) = explode(":", $postName);
                    $pids[] = $this->privilege_model->newPrivilege(array('privilege_entity' => $entityName, 'privilege_operation' => $operation));
                }
            }
            $this->role_model->assignPrivileges($roleDetails['role_id'], $pids);
            $_SESSION['sudo'] = true;
            $this->role_model->createDbUser($roleDetails['role_name'], $pids);
            //print_r($pids);
            redirect('/RoleManager/load/');
        }
        else
        {
            $this->index($page);
        }
    }

    public function viewRole($roleId)
    {
        $page = "viewRole";
        $this->load->model('role_model');
        $this->load->model('privilege_model');
        $this->data['roleInfo'] = $this->role_model->getRoleDetails($roleId);
        $this->data['entities'] = $this->entities;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('entity', 'Entity', 'required');
        $this->form_validation->set_rules('operation', 'Operation', 'required');
        if($this->form_validation->run())
        {
            $privilegeId = $this->privilege_model->newPrivilege(array('privilege_entity' => $this->input->post('entity'), 'privilege_operation' => $this->input->post('operation')));
            if(!$this->role_model->assignPrivileges($roleId, array($privilegeId)))
            {
                $this->data['pageError'] = $this->role_model->error;
            }
            else
            {
                $_SESSION['sudo'] = true;
                $this->role_model->grantPrivileges($this->data['roleInfo']->role_name, array($privilegeId));
            }
        }

        $rolePrivs = $this->role_model->getRolePrivilegesInclDirty($roleId);
        $privStatus = array();
        $privIds = array();
        if($rolePrivs != null)
        {
            foreach($rolePrivs as $rolePriv)
            {
                $privIds[] = $rolePriv->privilege_id;
                $privStatus[$rolePriv->privilege_id] = $rolePriv->privilege_role_mapper_dirty;
            }
        }
        $this->data['privilegeDetails'] = array();
        $this->data['privilegeDirtyStatus'] = array();
        if($rolePrivs != null)
        {
            $this->data['privilegeDetails'] = $this->privilege_model->getPrivilegeDetails($privIds, "Order By privilege_entity");
            $this->data['privilegeDirtyStatus'] = $privStatus;
        }
        $this->index($page);
    }

    public function enableRolePrivilege($roleId, $privilegeId)
    {
        $this->load->model('role_model');
        $this->load->helper('url');
        $this->role_model->enablePrivilege($roleId, $privilegeId);
        $roleInfo = $this->role_model->getRoleDetails($roleId);
        $_SESSION['sudo'] = true;
        $this->role_model->grantPrivileges($roleInfo->role_name, array($privilegeId));
        redirect('/RoleManager/ViewRole/'.$roleId);
    }

    public function disableRolePrivilege($roleId, $privilegeId)
    {
        $this->load->model('role_model');
        $this->load->helper('url');
        $this->role_model->disablePrivilege($roleId, $privilegeId);
        $roleInfo = $this->role_model->getRoleDetails($roleId);
        $_SESSION['sudo'] = true;
        $this->role_model->revokePrivileges($roleInfo->role_name, array($privilegeId));
        redirect('/RoleManager/ViewRole/'.$roleId);
    }

    public function deleteRolePrivilege($roleId, $privilegeId)
    {
        $this->load->model('role_model');
        $this->load->helper('url');
        $this->role_model->deletePrivilege($roleId, $privilegeId);
        $roleInfo = $this->role_model->getRoleDetails($roleId);
        $_SESSION['sudo'] = true;
        $this->role_model->revokePrivileges($roleInfo->role_name, array($privilegeId));
        redirect('/RoleManager/ViewRole/'.$roleId);
    }

    public function disableRole($roleId)
    {
        $this->load->model('role_model');
        $this->load->helper('url');
        $this->role_model->disableRole($roleId);
        redirect('/RoleManager/load');
    }

    public function enableRole($roleId)
    {
        $this->load->model('role_model');
        $this->load->helper('url');
        $this->role_model->enableRole($roleId);
        redirect('/RoleManager/load');
    }

    public function deleteRole($roleId)
    {
        $this->load->model('role_model');
        $this->load->model('Databaseuser_model');
        $this->load->model('user_model');
        $this->role_model->deleteAllRolePrivileges($roleId);
        $roleInfo = $this->role_model->getRoleDetails($roleId);
        $this->Databaseuser_model->deleteUser($roleInfo->role_name);
        $this->user_model->deleteRoleMappings($roleId);
        $this->role_model->deleteRole($roleId);
        $_SESSION['sudo'] = true;
        $this->role_model->dropDbuser($roleInfo->role_name);
    }

    public function refreshRoleDbUser($roleId)
    {
        $this->load->model('role_model');
        $this->load->helper('url');

        $roleInfo = $this->role_model->getRoleDetails($roleId);
        $_SESSION['sudo'] = true;
        $this->role_model->dropDbUser($roleInfo->role_name);

        $privs = $this->role_model->getRolePrivileges($roleId);
        $privileges = array();
        foreach($privs as $priv)
        {
            $privileges[] = $priv->privilege_id;
        }
        $_SESSION['sudo'] = true;
        $this->role_model->createDbUser($roleInfo->role_name, $privileges);
        redirect('/RoleManager/load');
    }
}