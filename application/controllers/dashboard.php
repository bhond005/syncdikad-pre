<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
		if($this->session->userdata('level') != "admin"){
			redirect('site2','refresh');
		}
	}
	private function _cek_login()
	{
		if(!$this->session->userdata('useradmin')){            
			redirect(base_url().'backend');
		}
	}

	public function index()
	{
		$data = array(
			'total_komentar' => $this->model->GetKomentar()->num_rows(),
			'total_product' => $this->model->GetProduk()->num_rows(),
			'total_testimoni' => $this->model->GetTestimoni()->num_rows(),
			'product_view' => $this->model->GetProductView()->result_array(),
			'nama' => $this->session->userdata('nama'),	
			'id_user' => $this->session->userdata('id_user'),
		);
		
		$this->load->view('index', $data);
	}
}

// Developed by Trisnatya Mahardhika
// Email: trisnatya@gmail.com
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */