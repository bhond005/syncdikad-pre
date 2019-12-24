<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class new_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('currency_format_helper');
	}

	public function index()
	{
		$this->load->view('user/add_user');
	}

	function savedata(){
		$config = array(
			'upload_path' => './upload',
			'allowed_types' => 'gif|jpg|JPG|png',
			'max_size' => '2048',

		);

		$this->load->library('upload', $config);	
		$this->upload->do_upload('foto');
		$upload_data = $this->upload->data();

		$target_dir = "upload";
		$uploadOk = 1;
		$id_user = '';
		$nama = $_POST['nama'];
		$nama_user = $_POST['nama_user'];		
		$pass_user = $_POST['pass_user'];
		$level = 'user';
		$status = '1';
		$file_name = $upload_data['file_name'];

		$data = array(
			'id_user'=> $id_user,
			'nama' => $nama,
			'nama_user' => $nama_user,
			'pass_user' => $pass_user,
			'level' => $level,
			'status' => $status,
			'foto' => $file_name,
			);
		
		$this->form_validation->set_rules('nama_user', 'Username', 'trim|required|min_length[2]|max_length[15]');
		if ($this->form_validation->run() == false) {
        	$this->template->load('authentication/layout/template','authentication/register',$data);
      	}
      	else {
			$result = $this->model->Simpan('tb_login', $data);
			if($result == 1){
				$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Simpan data BERHASIL dilakukan</strong></div>");
				header('location:'.base_url().'login');
			}else{
				$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
				header('location:'.base_url().'new_user');
			}
		}		
	}

	public function profile()
    {
    	$this->db->get_where('tb_login', 'id_user');
        $data['get_all_userdata'] = $this->model->get_by_id($this->session->userdata('id_user'));
        $this->load->view('user/edit_user', $data);
    }

	function edit(){
		$id_user = $this->session->userdata('id_user');

		if($_FILES['foto']['error'] == 0){
			$config = array(
				'upload_path' => './upload',
				'allowed_types' => 'gif|jpg|JPG|png',
				'max_size' => '2048',
				
			);
			$this->load->library('upload', $config);      
			$this->upload->do_upload('foto');
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			$user = $this->model->get_by_id($this->session->userdata('id_user'));
				if (file_exists('upload/'.$this->session->userdata('foto')) && $this->session->userdata('foto')) {
                    unlink('upload/'.$this->session->userdata('foto'));
                }

		}else{
			$file_name = $this->input->post('photo');
		}
		
		$data = array(
			'nama' => $this->input->post('nama'),
			'nama_user' => $this->input->post('nama_user'),
			'pass_user' => $this->input->post('pass_user'),
			'foto' => $file_name,
			
			);
		
		$res = $this->model->updateuser($data, $id_user);
		if($res>=0){
			$this->session->set_flashdata("sukses", "<div class='alert alert-success'><strong>Update data BERHASIL di lakukan</strong></div>");
			header('location:'.base_url().'login/logout');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Update data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'site2');
		}
	}


}



// Developed by Trisnatya Mahardhika
// Email: Trisnatya@gmail.com
/* End of file new_user.php */
/* Location: ./application/controllers/new_user.php */