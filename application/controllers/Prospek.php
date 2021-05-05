<?php
class Prospek extends CI_Controller{
    public function index(){


        $this->load->view("prospek/index");
    }
    public function tambah_prospek(){
        $this->load->model("m_prospek");

        $result1 = $this->m_prospek->get_rs();
        $result2 = $this->m_prospek->get_produk();
        $data = array(
          'datars' => $result1->result_array(),
          'dataproduk' => $result2->result_array(),
        );
        $this->load->view("prospek/tambah_prospek", $data);
    }
    public function add_prospek() {
      $temp_id_fk_rs = $this->input->post('id_fk_rs');
      $temp_prospek_principle = $this->input->post('prospek_principle');
      $temp_total_price_prospek = $this->input->post('');
      $temp_notes_kompetitor = $this->input->post('notes_kompetitor');
      $temp_notes_prospek = $this->input->post('notes_prospek');
      $temp_funnel = $this->input->post('funnel');
      $temp_estimasi_pembelian = $this->input->post('');
      $this->load->model("m_prospek");
      $this->m_prospek->insert_prospek($temp_id_fk_rs, $temp_prospek_principal, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_funnel, $temp_estimasi_pembelian);
    }

    public function add_detail_prospek(){
      $temp_id_fk_prospek = $this->input->post('id_fk_prospek');
      $temp_id_fk_produk = $this->input->post('id_fk_produk');
      $temp_detail_prospek_quantity = $this->input->post('detail_quantity');
      $temp_detail_prospek_keterangan = $this->input->post('detail_keterangan');
      $temp_detail_prospek_status = "aktif";
      $this->load->model("m_prospek");
      $this->m_prospek->insert_detail_prospek();
      redirect("prospek/index");
    }
}
?>
