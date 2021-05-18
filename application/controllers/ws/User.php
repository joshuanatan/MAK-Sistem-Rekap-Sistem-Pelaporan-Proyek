<?php
class User extends CI_Controller{
  public function get_data_sales_engineer(){
    $this->load->model("m_kabupaten");
    $result_kabupaten = $this->m_kabupaten->get_kabupaten();

    $options = array (
      "data_kabupaten" => $result_kabupaten->result_array()
    );
    echo json_encode($options);
  }

  public function data_kabupaten($id_pk_provinsi){
    $this->load->model("m_kabupaten");
    $result = $this->m_kabupaten->get_kabupaten_per_provinsi($id_pk_provinsi)->result_array();
    echo json_encode($result);
  }

  public function data_rs($id_pk_kabupaten){
    $this->load->model("m_rumah_sakit");
    $result = $this->m_rumah_sakit->get_rs_kabupaten($id_pk_kabupaten)->result_array();
    echo json_encode($result);
  }
  public function insert(){
    $temp_user_username = $this->input->post('username');
    $temp_user_password = $this->input->post('password');
    $temp_user_email = $this->input->post('email');
    $temp_user_telepon = $this->input->post('telepon');
    $temp_user_role = $this->input->post('role');
    $this->load->model("m_user");
    $checker = $this->m_user->check($temp_user_email);
    if ($checker->num_rows() > 0) {
      echo json_encode("Email has been used! Please use another email");
    } else {
      $id_user = $this->m_user->insert($temp_user_username, $temp_user_password, $temp_user_email, $temp_user_telepon, $temp_user_role);
      if($temp_user_role == "Sales Engineer"){
        $id_kabupaten = $this->input->post("kabupaten");

        $this->load->model("m_user_kabupaten");
        $this->m_user_kabupaten->insert($id_user,$id_kabupaten);

        $this->load->model("m_user_rs");
        $rumah_sakit = $this->input->post("se_rs");
        foreach($rumah_sakit as $rs){
          $this->m_user_rs->insert($id_user,$rs);
        }
      }
      else if($temp_user_role == "Supervisor" || $temp_user_role == "Area Sales Manager"){
        $this->load->model("m_user_kabupaten");
        $asm_kabupaten = $this->input->post("asm_kabupaten");
        foreach($asm_kabupaten as $a){
          $this->m_user_kabupaten->insert($id_user,$a);
        }
      }
    }

  }
  public function update(){
    $temp_id_user = $this->input->post('id_user');
    $temp_user_username = $this->input->post('username');
    $temp_user_email = $this->input->post('email');
    $temp_user_telepon = $this->input->post('telepon');
    $temp_user_role = $this->input->post('role');
    $this->load->model("m_user");
    $this->m_user->update($temp_id_user, $temp_user_username, $temp_user_email, $temp_user_telepon, $temp_user_role);
    if($temp_user_role == "Sales Engineer"){
      $id_kabupaten = $this->input->post("kabupaten");

      $this->load->model("m_user_kabupaten");
      $this->m_user_kabupaten->deactive_data($temp_id_user);
      $this->m_user_kabupaten->insert($temp_id_user,$id_kabupaten);

      $this->load->model("m_user_rs");
      $this->m_user_rs->deactive_data($temp_id_user);
      $rumah_sakit = $this->input->post("se_rs");
      foreach($rumah_sakit as $rs){
        $this->m_user_rs->insert($temp_id_user,$rs);
      }
    }
    else if($temp_user_role == "Supervisor" || $temp_user_role == "Area Sales Manager"){
      $this->load->model("m_user_kabupaten");
      $this->m_user_kabupaten->deactive_data($temp_id_user);
      $asm_kabupaten = $this->input->post("asm_kabupaten");
      foreach($asm_kabupaten as $a){
        $this->m_user_kabupaten->insert($temp_id_user,$a);
      }
    }
  }
  public function delete($id_user){
    $this->load->model("m_user");
    $this->m_user->delete($id_user);

    $this->load->model("m_user_kabupaten");
    $this->m_user_kabupaten->deactive_data($id_user);

    $this->load->model("m_user_rs");
    $this->m_user_rs->deactive_data($id_user);

    $response["status"] = true;
    echo json_encode($response);
  }
  public function get_data(){
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $this->load->model("m_user");
    $response["data"] = $this->m_user->search($kolom_pengurutan,$arah_kolom_pengurutan,$pencarian_phrase,$kolom_pencarian,$current_page)->result_array();
    #echo $this->db->last_query();
    $total_data = $this->m_user->get_user()->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page,$total_data,20);

    echo json_encode($response);
  }
  public function get_selected_kabupaten($id_pk_user){
    $this->load->model("m_user_kabupaten");
    $result = $this->m_user_kabupaten->get_selected_kabupaten($id_pk_user);
    #echo $this->db->last_query();
    echo json_encode($result->result_array());
  }
  public function get_unselected_kabupaten($id_pk_user, $id_provinsi){
    $this->load->model("m_user_kabupaten");
    $result = $this->m_user_kabupaten->get_unselected_kabupaten($id_pk_user,$id_provinsi);
    echo json_encode($result->result_array());
  }
  public function get_selected_rs($id_pk_user){
    $this->load->model("m_user_rs");
    $result = $this->m_user_rs->get_selected_rs($id_pk_user);
    echo json_encode($result->result_array());
  }
  public function get_unselected_rs($id_pk_user, $id_kabupaten){
    $this->load->model("m_user_rs");
    $result = $this->m_user_rs->get_unselected_rs($id_pk_user,$id_kabupaten);
    echo json_encode($result->result_array());
  }
}
?>
