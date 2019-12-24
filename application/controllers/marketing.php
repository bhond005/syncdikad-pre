<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_cek_login();
		$this->load->helper('currency_format_helper');
		if($this->session->userdata('level') != "user"){
			redirect('dashboard','refresh');
		}

	}

	private function _cek_login()
	{
		if(!$this->session->userdata('useruser')){            
			redirect(base_url().'backend');
		}
	}

	public function index($offset=0)
	{
		$this->countervisitor();
		/* Pagination */
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'site2/index';
		$config['total_rows'] = $this->model->count_all();
		$config['per_page'] = 6;

		/*============================== ambil query database ==================*/
		$data['data_produk']=$this->model->GetProduk("where tb_produk.status = 'publish' group by tb_produk.id_produk order by tb_produk.id_produk desc limit ".$config['per_page']." offset ".$offset)->result_array();
		$data['rekomen'] = $this->model->GetProduk("where status = 'publish' order by rand() limit 3")->result_array();
		/*======================================================================*/

                // CSS Bootstrap               
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';            
		$config['prev_link'] = '«';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '»';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
                // Akhir CSS

		$config["num_links"] = round( $config["total_rows"] / $config["per_page"] );           
		$this->pagination->initialize($config);
		$data['pages'] = $this->pagination->create_links();

		$datas = array(
			"sidebar" => $this->sidebar_kat(),
			"produk"=>$this->load->view('incsite/produk2',$data, TRUE),
			'nama' => $this->session->userdata('nama'),	
			// "total_kat" => $this->model->GetKat('where id_kat')->num_rows(),
			// "rekomen" => $this->model->GetProduk("where status = 'publish' order by rand() limit 6")->result_array(),

			);
		$this->load->view('site2/index', $datas);

	}

	function sidebar_kat(){
		$data = array(
			"total_kat" => $this->model->TotalKat('')->result_array(),
			"total_mer" => $this->model->TotalMer('')->result_array(),
			"total_merk" => $this->model->GetProduk('group by id_merk')->num_rows(),
			"kategoriq" => $this->model->GetKat()->result_array(),
			"merk" => $this->model->GetMerk()->result_array(),
			);
		return $this->load->view("incsite/sidebar2", $data, TRUE);
	}

	function detail($id_produk = '', $kode = 0)
	{
		$this->countervisitor();
		$data['data_produk']=$this->model->GetDetailProduk("where tb_produk.id_produk='$kode'")->result_array();

		// $data_content =  $this->blog_model->GetContentBlog("where content.kode_content = '$kode'")->result_array();
		$datas = array(
			"sidebar" => $this->sidebar_kat(),
			"detail_produks"=>$this->load->view('incsite/detail_produk2',$data, TRUE),
			// "rekomen" => $this->model->GetProduk("where status = 'publish' order by rand() limit 6")->result_array(),

			);
		$this->cookiesetter($kode);
		$this->load->view('site2/detail', $datas);
	}

	function alamat($id_produk = '', $kode = 0)
	{
		$this->countervisitor();
		$data['data_produk']=$this->model->GetDetailProduk("where tb_produk.id_produk='$kode'")->result_array();

		// $data_content =  $this->blog_model->GetContentBlog("where content.kode_content = '$kode'")->result_array();
		$datas = array(
			"sidebar" => $this->sidebar_kat(),
			'id_user' => $this->session->userdata('id_user'),	
			'tgl_input_trans' => '',
			'optproduk' => $this->model->GetProduk()->result_array(),
			"detail_produks"=>$this->load->view('incsite/detail_produk2',$data, TRUE),
			// "rekomen" => $this->model->GetProduk("where status = 'publish' order by rand() limit 6")->result_array(),

			);
		$this->cookiesetter($kode);
		$this->load->view('site2/transaksi', $datas);
	}

	function transaksi(){
		$id_trans = '';
		$id_user = $this->session->userdata('id_user');
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$no_telp = $_POST['no_telp'];
		$jumlah = $_POST['jumlah'];
		$harga = $_POST['harga'];
		$id_produk = $_POST['id_produk'];
		$foto = $_POST['foto'];
		$tgl_input_trans = $_POST['tgl_input_trans'];

		$data = array(
			'id_trans' => $id_trans,
			'id_user' => $id_user,
			'nama' => $nama,
			'alamat' => $alamat,
			'kota' => $kota,
			'no_telp' => $no_telp,
			'jumlah' => $jumlah,
			'harga' => $this->input->post('harga'),
			'id_produk' => $this->input->post('id_produk'),
			'foto' => $this->input->post('foto'),
			'tgl_input_trans' => date("Y-m-d H:i:s"),
			);

		$this->model->Simpan('tb_transaksi', $data);
		if($result == 1){
			header('location:'.base_url().'site2');
		}else{
			$this->session->set_flashdata("alert", "<div class='alert alert-danger'><strong>Simpan data GAGAL di lakukan</strong></div>");
			header('location:'.base_url().'site2');
		}
	}

	function kategori($id, $offset=0)
	{
		$this->countervisitor();
		$config['uri_segment'] = 4;
		$config['base_url'] = base_url().'site2/kategori/'.$id;
		$config['total_rows'] = $this->model->count_all();
		$config['per_page'] = 6;

		$cek = $this->model->GetKat("where id_kat = '$id'");
		if ($cek->num_rows() > 0) {
			$data = array(
				"data_produk" => $this->model->GetProduk("where tb_produk.status = 'publish' and id_kat = '$id' limit ".$config['per_page']." offset ".$offset)->result_array(),
				"rekomen" => $this->model->GetProduk("where status = 'publish' order by rand() limit 3")->result_array(),
				);

		 // CSS Bootstrap               
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';            
			$config['prev_link'] = '«';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '»';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
                // Akhir CSS

			$config["num_links"] = round( $config["total_rows"] / $config["per_page"] );           
			$this->pagination->initialize($config);
			$data['pages'] = $this->pagination->create_links();

			$datas = array(
				"sidebar" => $this->sidebar_kat(),
				"produk"=>$this->load->view('incsite/produk2',$data, TRUE),
			// "rekomen" => $this->model->GetProduk("where status = 'publish' order by rand() limit 6")->result_array(),

				);
			$this->load->view('site2/kategori', $datas);
		}

	}

	function merk($id, $offset=0)
	{
		$this->countervisitor();
		$config['uri_segment'] = 4;
		$config['base_url'] = base_url().'site2/merk/'.$id;
		$config['total_rows'] = $this->model->count_all();
		$config['per_page'] = 6;

		$cek = $this->model->GetMerk("where id_merk = '$id'");
		if ($cek->num_rows() > 0) {
			$data = array(
				"data_produk" => $this->model->GetProduk("where tb_produk.status = 'publish' and id_merk = '$id' limit ".$config['per_page']." offset ".$offset)->result_array(),
				"rekomen" => $this->model->GetProduk("where status = 'publish' order by rand() limit 3")->result_array(),
				);

		 // CSS Bootstrap               
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';            
			$config['prev_link'] = '«';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = '»';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
                // Akhir CSS

			$config["num_links"] = round( $config["total_rows"] / $config["per_page"] );           
			$this->pagination->initialize($config);
			$data['pages'] = $this->pagination->create_links();

			$datas = array(
				"sidebar" => $this->sidebar_kat(),
				"produk"=>$this->load->view('incsite/produk2',$data, TRUE),
			// "rekomen" => $this->model->GetProduk("where status = 'publish' order by rand() limit 6")->result_array(),

				);
			$this->load->view('site2/index', $datas);
		}

	}

	private function cookiesetter($kode = 0){
		if(!isset($_COOKIE[$kode])){
			$content = $this->model->GetProduk("where id_produk = '$kode'")->result_array();
			$result = $this->model->Update('tb_produk',array('counter' => ($content[0]['counter']+1)),array('id_produk'=>$kode));
			if($result == 1){
				setcookie($kode,"http://bhond005.id.ai", time()+3600);
			}
		}
	}

	private function countervisitor(){

		if($this->agent->is_browser()){
			$agent = $this->agent->browser().' '.$this->agent->version();
		}elseif ($this->agent->is_robot()){
			$agent = $this->agent->robot();
		}elseif ($this->agent->is_mobile()){
			$agent = $this->agent->mobile();
		}else{
			$agent = 'Unidentified User Agent';
		}
		
		$data_visitor = $this->model->GetVisitor("where ip = '".$_SERVER['REMOTE_ADDR']."'")->result_array();
		if($data_visitor == NULL){
			$data = array(
				'ip' => $_SERVER['REMOTE_ADDR'],
				'os' => $this->agent->platform(),
				'browser' => $agent,
				'tanggal' => date("Y-m-d H:i:s")
			);
			$this->model->Simpan('tb_visitor',$data);
			$this->session->set_userdata('bhond005',"bhond");
			setcookie("bhond005",'bhond', time()+3600*24);
		}else{
			if(!isset($_COOKIE['bhond005'])){
				$data_visitor = $this->model->GetVisitor("where ip = '".$_SERVER['REMOTE_ADDR']."' and tanggal = '".date("Y-m-d H:i:s")."'");
				if($data_visitor != NULL){
					if(!$this->session->userdata('bhond005.com')){
						$data = array(
							'ip' => $_SERVER['REMOTE_ADDR'],
							'os' => $this->agent->platform(),
							'browser' => $agent,
							'tanggal' => date("Y-m-d H:i:s")
						);
						$this->model->Simpan('tb_visitor', $data);
						$this->session->set_userdata('bhond005',"bhond");
						setcookie("bhond005",'bhond', time()+3600*24);
					}else{
						setcookie("bhond005",'bhond', time()+3600*24);
					}
				}else{
					$data = array(
							'ip' => $_SERVER['REMOTE_ADDR'],
							'os' => $this->agent->platform(),
							'browser' => $agent,
							'tanggal' => date("Y-m-d H:i:s")
					);
					$this->model->Simpan('tb_visitor', $data);
					$this->session->set_userdata('bhond005',"bhond");
					setcookie("bhond005",'bhond', time()+3600*24);
				}
			}
		}
	}

	public function tentang()
	{

		$this->load->view('incsite/tentang2');
	}


}

/* End of file site.php */
/* Location: ./application/controllers/site.php */