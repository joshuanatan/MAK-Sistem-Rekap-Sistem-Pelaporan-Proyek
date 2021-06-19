<?php
class Prospek extends CI_Controller
{

  public function get_data()
  {
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");

    $this->load->model("m_prospek");
    $id_user = $this->session->id_user;
    if ($this->session->user_role == "Sales Manager" || $this->session->user_role == "Supervisor" || $this->session->user_role == "Administrator") {
      $response["data"] = $this->m_prospek->search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->result_array();
      $total_data = $this->m_prospek->get_prospek_all($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->num_rows();
    } else {
      $response["data"] = $this->m_prospek->search_per_user($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page, $id_user)->result_array();
      $total_data = $this->m_prospek->get_prospek($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page, $id_user)->num_rows();
    }

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page, $total_data, 20);



    echo json_encode($response);
  }
  public function get_data_supervisee()
  {
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");

    $this->load->model("m_prospek");
    $id_user = $this->session->id_user;

    $response["data"] = $this->m_prospek->search_supervisee($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page, $id_user)->result_array();
    $total_data = $this->m_prospek->get_prospek_supervisee($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page, $id_user)->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page, $total_data, 20);
    echo json_encode($response);
  }
  public function delete($id)
  {
    if ($id != "") {
      $this->load->model("m_prospek");
      $this->m_prospek->delete($id);
      $response["status"] = true;
    } else {
      $response["status"] = false;
      $response["msg"] = "The ID Prospek field is required";
    }
    echo json_encode($response);
  }

  public function delete_detail($id)
  {
    if ($id != "") {
      $this->load->model("m_prospek");
      $this->m_prospek->delete_prospek_produk($id);
      $response["status"] = true;
    } else {
      $response["status"] = false;
      $response["msg"] = "The ID Prospek field is required";
    }
    echo json_encode($response);
  }

  public function get_detail($id)
  {
    $this->load->model("m_prospek");
    $response["data_prospek_produk"] = $this->m_prospek->get_prospek_produk($id)->result_array();

    echo json_encode($response);
  }

  public function get_rs($id_kabupaten)
  {
    $this->load->model("m_prospek");
    $response["data_rs"] = $this->m_prospek->get_rs($id_kabupaten)->result_array();

    echo json_encode($response);
  }

  public function get_detail_rs($id_pk_rs)
  {
    $this->load->model("m_prospek");
    $response["data_detail_rs"] = $this->m_prospek->get_detail_rs($id_pk_rs)->result_array();

    echo json_encode($response);
  }

  public function get_detail_ekat($id_pk_ekatalog)
  {
    $this->load->model("m_prospek");
    $response["data_detail_ekat"] = $this->m_prospek->get_detail_ekat($id_pk_ekatalog)->result_array();

    echo json_encode($response);
  }

  public function get_detail_sirup($id_pk_sirup)
  {
    $this->load->model("m_prospek");
    $response["data_detail_sirup"] = $this->m_prospek->get_detail_sirup($id_pk_sirup)->result_array();

    echo json_encode($response);
  }

  public function get_kabupaten($id_pk_provinsi)
  {
    $this->load->model("m_prospek");
    $response["data_kabupaten"] = $this->m_prospek->get_kabupaten_adv($id_pk_provinsi)->result_array();

    echo json_encode($response);
  }

  public function get_rs_kategori($id_pk_rs)
  {
    $this->load->model("m_prospek");
    $response["data_rs_kategori"] = $this->m_prospek->get_data_rs_kategori($id_pk_rs)->result_array();

    echo json_encode($response);
  }

  public function get_price($id_pk_produk)
  {
    $this->load->model("m_prospek");
    $response["data_price"] = $this->m_prospek->get_data_price($id_pk_produk)->result_array();

    echo json_encode($response);
  }

  public function get_rs_list(){
    if(strtolower($this->session->user_role) == "sales engineer"){
      $sql = "select id_pk_rs, rs_kode, rs_nama from tbl_user_rs
      inner join mstr_rs on mstr_rs.id_pk_rs = tbl_user_rs.id_fk_rs
      where user_rs_status = 'aktif' and id_fk_user = ? and rs_status = 'aktif'";
      $args = array(
        $this->session->id_user
      );
      $result = executeQuery($sql, $args);
      if($result->num_rows() > 0){
        $response["status"] = true;
        $response["data"] = $result->result_array();
      }
      else{
        $response["status"] = false;
      }
      echo json_encode($response);
    }
    else if(strtolower($this->session->user_role) == "supervisor" || strtolower($this->session->user_role) == "area sales manager"){
      $id_kabupaten = $this->input->get("id_kabupaten");
      $sql = "select * from tbl_user_kabupaten
      inner join mstr_rs on mstr_rs.id_fk_kabupaten = tbl_user_kabupaten.id_fk_kabupaten
      where user_kabupaten_status = 'aktif' and rs_status = 'aktif' and id_fk_user = ? and id_fk_kabupaten = ?";
      $args = array(
        $this->session->id_user, $id_kabupaten
      );
      $result = executeQuery($sql, $args);
      if($result->num_rows() > 0){
        $response["status"] = true;
        $response["data"] = $result->result_array();
      }
      else{
        $response["status"] = false;
      }
      echo json_encode($response);
    }
    else if(strtolower($this->session->user_role) == "sales manager"){
      $id_kabupaten = $this->input->get("id_kabupaten");
      $sql = "select * from mstr_rs
      where rs_status = 'aktif' and id_fk_kabupaten = ?";
      $args = array(
        $this->session->id_user, $id_kabupaten
      );
      $result = executeQuery($sql, $args);
      if($result->num_rows() > 0){
        $response["status"] = true;
        $response["data"] = $result->result_array();
      }
      else{
        $response["status"] = false;
      }
      echo json_encode($response);
    }
    else{
      $response["status"] = false;
      echo json_encode($response);
    }
  }
  public function assign_rs_to_se(){
    $sql = "
      select * from mstr_rs where id_fk_kabupaten in
        (select id_fk_kabupaten from tbl_user_kabupaten
        where user_kabupaten_status = 'aktif' and id_fk_user = ?)
      and id_pk_rs = ?";
    $args = array(
      $this->session->id_user, $this->input->post("id_rs")
    );
    $result = executeQuery($sql, $args);
    if($result->num_rows() > 0){
      $data = array(
        "id_fk_rs" => $this->input->post("id_rs"),
        "id_fk_user" => $this->session->id_user,
        "user_rs_status" => "aktif"
      );
      insertRow("tbl_user_rs", $data);
    }
  }
}
