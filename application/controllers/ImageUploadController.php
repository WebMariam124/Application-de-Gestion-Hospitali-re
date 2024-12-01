<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Hospital Management system
 */
/**
 * @property CI_Input $input
 * @property CI_Loader $load
 * @property CI_Output $output
 * @property CI_Session $session
 * @property CI_Upload $upload
 * @property CI_Userdata $userdata
 * @property CI_DB_query_builder $db
 * @property Email_model $email_model
 * @property Crud_model $crud_model
 *  @property User_model $user_model
 * @property CI_DB_forge $dbforge
 *  @property CI_Form_validation $form_validation
 * @property Paypal $paypal
 */
class ImageUploadController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
    }

    public function index() {
        $this->load->view('files/upload_form');
    }

    public function store() {
        $config['upload_path'] = './uploads/diagnosis_report/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('files/upload_form', $error);
        } else {
            $data = array('image_metadata' => $this->upload->data());

            $this->load->view('files/upload_result', $data);
        }
    }

}