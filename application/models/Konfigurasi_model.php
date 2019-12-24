<?php
#===================================================|
# Created by  :                                     |
#---------------------------------------------------|
# @Author     : Trisnatya Mahardhika
# @Email      : trisnatyat@gmail.com
# @Project    : CodeIgniter
# @Filename   : Konfigurasi_model.php
# @Instagram  : bhond005
#===================================================|

defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model
{
    public $table = 'tb_produk';
    public $id = 'id_produk';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // Listing Konfigurasi
    public function listing() {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $query = $this->db->get();
        return $query->row_array();
    }

}
