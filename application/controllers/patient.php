<?php

if (!defined('BASEPATH'))

	exit('No direct script access allowed');

/**
 * Hospital Management system
 */
/**
 * @property CI_Input $input
 * @property CI_Loader $load
 * @property CI_Output $output
 * @property CI_Session $session
 * @property CI_Userdata $userdata
 * @property CI_DB_query_builder $db
 * @property Email_model $email_model
 * @property Crud_model $crud_model
 *  @property User_model $user_model
 * @property CI_DB_forge $dbforge
 *  @property CI_Form_validation $form_validation
 * @property Paypal $paypal
 */

class Patient extends CI_Controller

{
	function __construct()

	{

		parent::__construct();

		$this->load->database();

		/*cache control*/

		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');

		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

		$this->output->set_header('Pragma: no-cache');

		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

	}

	

	/***Default function, redirects to login page if no admin logged in yet***/

	public function index()

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		if ($this->session->userdata('patient_login') == 1)

			redirect(base_url() . 'index.php?patient/dashboard', 'refresh');

	}

	

	/***patient DASHBOARD***/

	function dashboard()

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

			

		$page_data['page_name']  = 'dashboard';

		$page_data['page_title'] = ('Tableau de bord de patient');

		$this->load->view('index', $page_data);

	}

	

	/***VIEW APPOINTMENTS******/

	function view_appointment($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		$page_data['page_name']    = 'view_appointment';

		$page_data['page_title']   = ('View Appointment');

		$page_data['appointments'] = $this->db->get_where('appointment', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

	

	

	/***MANAGE PRESCRIPTIONS******/

	function view_prescription($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		if ($param1 == 'edit') {

			$page_data['edit_profile'] = $this->db->get_where('prescription', array(

				'prescription_id' => $param2

			))->result_array();

		}

		$page_data['page_name']     = 'view_prescription';

		$page_data['page_title']    = ('Voir Prescription');

		$page_data['prescriptions'] = $this->db->get_where('prescription', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

	

	/******VIEW DOCTOR LIST*****/

	function view_doctor($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		$page_data['page_name']  = 'view_doctor';

		$page_data['page_title'] = ('Voir Docteur');

		$page_data['doctors']    = $this->db->get('doctor')->result_array();

		

		$this->load->view('index', $page_data);

	}

	

	/******VIEW ADMIT HISTORY*****/

	function view_admit_history($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		$page_data['page_name']      = 'view_admit_history';

		$page_data['page_title']     = ('View historique d\'attribution de lits');

		$page_data['bed_allotments'] = $this->db->get_where('bed_allotment', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

	

	/******VIEW BLOOD BANK*****/

	function view_blood_bank($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		$page_data['page_name']    = 'view_blood_bank';

		$page_data['page_title']   = ('Voir banque du sang');

		$page_data['blood_donors'] = $this->db->get('blood_donor')->result_array();

		$page_data['blood_bank']   = $this->db->get('blood_bank')->result_array();

		$this->load->view('index', $page_data);

	}


	/******VIEW COMPLETED PAYMENT HISTORY*****/


	

	/******VIEW OPERATION HISTORY*****/

	function view_operation_history($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		

		$page_data['page_name']  = 'view_operation_history';

		$page_data['page_title'] = ('Voir historique d\'operation');

		$page_data['reports']    = $this->db->get_where('report', array(

			'patient_id' => $this->session->userdata('patient_id'),

			'type' => 'operation'

		))->result_array();

		$this->load->view('index', $page_data);

	}

	

	

	/******MANAGE OWN PROFILE AND CHANGE PASSWORD***/

	function manage_profile($param1 = '', $param2 = '', $param3 = '')

	{

		if ($this->session->userdata('patient_login') != 1)

			redirect(base_url() . 'index.php?login', 'refresh');

		if ($param1 == 'update_profile_info') {

			$data['name']        = $this->input->post('name');

			$data['email']       = $this->input->post('email');

			$data['address']     = $this->input->post('address');

			$data['phone']       = $this->input->post('phone');

			$data['sex']         = $this->input->post('sex');

			$data['birth_date']  = $this->input->post('birth_date');

			$data['age']         = $this->input->post('age');

			$data['blood_group'] = $this->input->post('blood_group');

			

			$this->db->where('patient_id', $this->session->userdata('patient_id'));

			$this->db->update('patient', $data);

			$this->session->set_flashdata('flash_message', ('Profile Updated'));

			redirect(base_url() . 'index.php?patient/manage_profile/', 'refresh');

		}

		if ($param1 == 'change_password') {

			$data['password']             = $this->input->post('password');

			$data['new_password']         = $this->input->post('new_password');

			$data['confirm_new_password'] = $this->input->post('confirm_new_password');

			

			$current_password = $this->db->get_where('patient', array(

				'patient_id' => $this->session->userdata('patient_id')

			))->row()->password;

			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {

				$this->db->where('patient_id', $this->session->userdata('patient_id'));

				$this->db->update('patient', array(

					'password' => $data['new_password']

				));

				$this->session->set_flashdata('flash_message', ('Password Updated'));

			} else {

				$this->session->set_flashdata('flash_message', ('Password Mismatch'));

			}

			redirect(base_url() . 'index.php?patient/manage_profile/', 'refresh');

		}

		$page_data['page_name']    = 'manage_profile';

		$page_data['page_title']   = ('Profile');

		$page_data['edit_profile'] = $this->db->get_where('patient', array(

			'patient_id' => $this->session->userdata('patient_id')

		))->result_array();

		$this->load->view('index', $page_data);

	}

}