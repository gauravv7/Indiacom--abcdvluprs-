<?php
/**
 * Created by PhpStorm.
 * User: Kisholoy
 * Date: 7/23/14
 * Time: 10:21 AM
 */

class Paper_version_model extends CI_Model
{
    public $error;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addPaperVersion($versionDetails = array())
    {
        $versionDetails['paper_version_id'] = $this->assignPaperVersionId();
        $versionDetails['paper_version_number'] = $this->getLatestPaperVersionNumber($versionDetails['paper_id']) + 1;
        $versionDetails['paper_version_date_of_submission'] = date('Y-m-d H:i:s');
        $this->db->insert('paper_version_master', $versionDetails);
        if($this->db->trans_status() == false)
        {
            $this->error = "There was an error saving paper doc path. Contact the admin.";
            return false;
        }
        return true;
    }

    public function getLatestPaperVersionNumber($paperId)
    {
        $sql = "Select paper_version_number From paper_version_master Where paper_id = ? Order By paper_version_number Desc Limit 1";
        $query = $this->db->query($sql, array($paperId));
        if($query->num_rows() == 0)
        {
            return 0;
        }
        $row = $query->row();
        return $row->paper_version_number;
    }

    public function getLatestPaperVersionDetails($paperId)
    {
        $sql = "Select * From paper_version_master Where paper_id = ? And paper_version_dirty = 0 Order By paper_version_number Desc Limit 1";
        $query = $this->db->query($sql, array($paperId));
        return $query->row();
    }

    public function getPaperAllVersionDetails($paperId)
    {
        $sql = "Select * From paper_version_master Where paper_id = ? And paper_version_dirty = 0";
        $query = $this->db->query($sql, array($paperId));
        return $query->result();
    }

    private function assignPaperVersionId()
    {
        $sql = "Select paper_version_id From paper_version_master Order By paper_version_id Desc Limit 1";
        $query = $this->db->query($sql);
        if($query->num_rows() == 0)
        {
            return 1;
        }
        $row = $query->row();
        return $row->paper_version_id + 1;
    }

    /*public function getAssignedPapers($user_id)
    {
        $this -> db -> select('paper_master.paper_id as paper_id, paper_version_id, paper_code, paper_version_number, paper_title');
        $this -> db -> from('paper_master');
        $this -> db -> join('paper_version_master', 'paper_master.paper_id = paper_version_master.paper_id');
        $this -> db -> where('paper_version_convener_id', $user_id);

        $query = $this -> db -> get();

        if($query -> num_rows() > 0)
            return $query -> result();
    }*/

    //Latest paper versions with no reviewer assigned
    public function getPaperVersionsWithoutReviewer()
    {
        //Retrieve the latest versions of all papers
        //Filter out papers with reviewer assigned
        $sql = "Select paper_latest_version.*, paper_version_master.*
                From paper_latest_version
	              Join paper_version_master
	                On (paper_latest_version.paper_id, latest_paper_version_number) = (paper_version_master.paper_id, paper_version_number)
                Where paper_version_is_reviewer_assigned = 0
	            ";
        $query = $this->db->query($sql);
        if(!$this->db->trans_status())
            throw new SelectException("Error selecting latest paper version without reviewer", mysql_error(), mysql_errno());
        return $query->result();
    }

    //Versions whose reviewer review is completed but convener review is due
    public function getPaperVersionsWithConvenerReviewDue()
    {
        //Retrieve the latest versions of papers
        //Get the reviewers assigned to the versions
        //Filter in papers that are reviewed by assigned reviewer

    }

    public function sendConvenerReview($update_data, $paper_version_id)
    {
        return $this -> db -> update('paper_version_master', $update_data, array("paper_version_id" => $paper_version_id));
    }

    public function getPaperVersionComments($paper_version_id)
    {
        $this -> db -> select('paper_version_review');
        $this -> db -> from('paper_version_master');
        $this -> db -> where('paper_version_id', $paper_version_id);

        $query = $this -> db -> get();

        if($query -> num_rows() > 0)
            return $query -> result();
    }

    public function setReviewerAssigned($update_data, $paper_version_id)
    {
        return $this -> db -> update('paper_version_master', $update_data, array("paper_version_id" => $paper_version_id));
    }

    public function getPaperVersionDetails($paper_version_id)
    {
        $sql = "Select * From paper_version_master Where paper_version_id = ?";
        $query = $this->db->query($sql, array($paper_version_id));
        if($query->num_rows() == 0)
            return false;
        return $query->row();
    }
}

?>