<?php
class Profile extends CI_Controller{
  public function update(){
    $this->load->model("m_profile");
    $temp_id_user = $this->input->post('iduser');
    $temp_db_pass = $this->input->post('dbpass');
    $temp_old_password = $this->input->post('oldpass');
    $checker = $this->m_profile->authentication($temp_old_password)->result_array();
    if($checker[0]["id_pk_user"] == 0){
      $temp_new_password = $this->input->post('newpass');
      $temp_confirm_new_pass = $this->input->post('confirmnewpass');
      if ($temp_new_password == $temp_confirm_new_pass) {
        $result = $this->m_profile->updatePass($temp_id_user, $temp_confirm_password);
        echo json_encode($result);
      } else {
        echo json_encode("Password not match!");
      }
    }
    else{
        echo json_encode("Wrong Password Entered!");
    }
  }
}
?>
