<?php

/**
 * Created by PhpStorm.
 * User: Pavithra
 * Date: 2/17/15
 * Time: 3:45 PM
 */
class CertificateManager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function markOutwardNumber_AJAX()
    {
        $this->load->model("certificate_model");
        $submission_id = $this->input->post('submissionId');
        $outward_number = $this->input->post('certificate_outward_no');
        $certificateRecord = array(
            'event_id' => EVENT_ID,
            'submission_id' => $submission_id,
            'certificate_outward_number' => $outward_number
        );

        echo json_encode($this->certificate_model->submitCertificateData($certificateRecord));
    }

    public function markCertificateGiven_AJAX()
    {
        $this->load->model("certificate_model");
        $submission_id = $this->input->post('submissionId');
        $is_certificate_given = $this->input->post('is_certificate_given');
        $certificate_record_array = $this->certificate_model->getCertificateRecord($submission_id);

        if ($certificate_record_array != null)
        {
            $certificate_record_array['is_certificate_given'] = $is_certificate_given;
            echo json_encode($this->certificate_model->submitCertificateData($certificate_record_array));
        }
        else {
            echo json_encode(false);
        }

    }
}