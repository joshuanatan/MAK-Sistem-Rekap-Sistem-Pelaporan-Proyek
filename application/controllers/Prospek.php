<?php
class Prospek extends CI_Controller{
    public function index(){
      $this->load->model("m_prospek");
      $result1 = $this->m_prospek->get_prospek();
      $data = array(
        'dataprospek' => $result1->result_array(),
      );
      $this->load->view("prospek/index", $data);
    }

    public function add_prospek(){
      $this->load->model("m_prospek");
      $id = $this->session->id_user;
      $result1 = $this->m_prospek->get_rs_sales_engineer($id);
      $result2 = $this->m_prospek->get_produk();
      $result3 = $this->m_prospek->get_kabupaten($id);
      $result4 = $this->m_prospek->get_provinsi();
      $data = array(
        'datars' => $result1->result_array(),
        'dataproduk' => $result2->result_array(),
        'datakabupaten' => $result3->result_array(),
        'dataprovinsi' => $result4->result_array(),
      );
      $this->load->view("prospek/tambah_prospek", $data);
    }

    public function edit_prospek($id_pk_prospek){
      $this->load->model("m_prospek");

      $result1 = $this->m_prospek->get_rs();
      $result2 = $this->m_prospek->get_produk();
      $data = array(
        'datars' => $result1->result_array(),
        'dataproduk' => $result2->result_array(),
      );
      $this->load->view("prospek/tambah_prospek", $data);
    }

    public function insert() {
      $temp_id_fk_rs = $this->input->post('id_fk_rs');
      $temp_prospek_principle = $this->input->post('prospek_principle');
      $temp_total_price_prospek = 0;
      $temp_notes_kompetitor = $this->input->post('notes_kompetitor');
      $temp_notes_prospek = $this->input->post('notes_prospek');
      $temp_funnel = $this->input->post('funnel');
      $temp_estimasi_pembelian = $this->input->post('estimasi_pembelian');
      $this->load->model("m_prospek");
      $id_fk_prospek = $this->m_prospek->insert_prospek($temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_funnel, $temp_estimasi_pembelian);


      $temp_data_produk = $this->input->post('data_produk');
      if ($temp_data_produk != '') {
        foreach ($temp_data_produk as $a) {
          $temp_id_fk_produk = $this->input->post('id_fk_produk'.$a);
          $temp_detail_prospek_quantity = $this->input->post('detail_quantity'.$a);
          $temp_detail_prospek_keterangan = $this->input->post('detail_keterangan'.$a);
          $this->load->model("m_prospek");
          $this->m_prospek->insert_produk_prospek($id_fk_prospek,$temp_id_fk_produk,$temp_detail_prospek_quantity,$temp_detail_prospek_keterangan);
        }
      }

    }

    public function add_detail_prospek(){

      redirect("prospek/index");
    }
}
?>
