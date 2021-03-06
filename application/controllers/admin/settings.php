<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller {
	
	public function index()
	{
		if( $this->input->post() )
		{
			$this->settings_model->set('date_format', $this->input->post('date_format'));
			$this->settings_model->set('time_format', $this->input->post('time_format'));
			$this->session->set_flashdata('alert-info', lang('settings_updated'));
			redirect('admin/settings');
			exit;
		}


		$this->load->helper('form');
		$data['date_format'] = $this->settings_model->get('date_format', "Y-m-d");
		$data['time_format'] = $this->settings_model->get('time_format', "h:i a");
		
		
		
		$data['main_content'] = 'admin/settings';
		$this->load->vars($data);
		$this->load->view('admin/template');				
	}
}