<?php
class Penyelenggara extends CI_Controller{
  public function get_data(){
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $this->load->model("m_penyelenggara");
    $response["data"] = $this->m_penyelenggara->search($kolom_pengurutan,$arah_kolom_pengurutan,$pencarian_phrase,$kolom_pencarian,$current_page)->result_array();
    #echo $this->db->last_query();
    $total_data = $this->m_penyelenggara->get_penyelenggara()->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page,$total_data,20);
    
    echo json_encode($response);
  }
}