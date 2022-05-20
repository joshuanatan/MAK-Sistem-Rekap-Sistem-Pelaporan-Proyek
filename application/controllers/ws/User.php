<?php
class User extends CI_Controller
{
  public function get_data_sales_engineer()
  {
    $this->load->model("m_kabupaten");
    $result_kabupaten = $this->m_kabupaten->get_kabupaten();

    $options = array(
      "data_kabupaten" => $result_kabupaten->result_array()
    );
    echo json_encode($options);
  }

  public function data_kabupaten($id_pk_provinsi)
  {
    $this->load->model("m_kabupaten");
    $result = $this->m_kabupaten->get_kabupaten_per_provinsi($id_pk_provinsi)->result_array();
    echo json_encode($result);
  }

  public function data_rs($id_pk_kabupaten)
  {
    $this->load->model("m_rumah_sakit");
    $result = $this->m_rumah_sakit->get_rs_kabupaten($id_pk_kabupaten)->result_array();
    echo json_encode($result);
  }
  public function insert()
  {
    $this->form_validation->set_rules("username", "Username", "required");
    $this->form_validation->set_rules("password", "Password", "required");
    $this->form_validation->set_rules("email", "Email", "required");
    $this->form_validation->set_rules("telepon", "Telepon", "required");
    $this->form_validation->set_rules("role", "Role", "required");
    if ($this->form_validation->run()) {
      $temp_user_username = ucwords($this->input->post('username'));
      $temp_user_password = $this->input->post('password');
      $temp_user_email = $this->input->post('email');
      $temp_user_telepon = $this->input->post('telepon');
      $temp_user_role = $this->input->post('role');

      $temp_user_supervisor = 0;
      if (strtolower($temp_user_role) == "sales engineer") {
        $temp_user_supervisor = $this->input->post('supervisor');
      } else if (strtolower($temp_user_role) == "supervisor" || strtolower($temp_user_role) == "area sales manager") {

        $temp_user_supervisor = $this->input->post('supervisor_asm');
      }

      $this->load->model("m_user");
      $checker = $this->m_user->check_duplicate_insert($temp_user_email);
      if ($checker->num_rows() > 0) {
        $response["status"] = false;
        $response["msg"] = "Email sudah terdaftar";
      } else {
        $id_user = $this->m_user->insert($temp_user_username, $temp_user_password, $temp_user_email, $temp_user_telepon, $temp_user_role, $temp_user_supervisor);
        if ($temp_user_role == "Sales Engineer") {
          $id_kabupaten = $this->input->post("kabupaten");

          $this->load->model("m_user_kabupaten");
          $this->m_user_kabupaten->insert($id_user, $id_kabupaten);

          $this->load->model("m_user_rs");
          $rumah_sakit = $this->input->post("se_rs");
          if ($rumah_sakit != "") {
            foreach ($rumah_sakit as $rs) {
              $this->m_user_rs->insert($id_user, $rs);
            }
          }
        } else if ($temp_user_role == "Supervisor" || $temp_user_role == "Area Sales Manager") {
          $this->load->model("m_user_provinsi");
          $asm_provinsi = $this->input->post("asm_provinsi");
          if ($asm_provinsi != "") {
            foreach ($asm_provinsi as $a) {
              $this->m_user_provinsi->insert($id_user, $a);
            }
          }
          $this->load->model("m_user_kabupaten");
          $asm_kabupaten = $this->input->post("asm_kabupaten");
          if ($asm_kabupaten != "") {
            foreach ($asm_kabupaten as $a) {
              $this->m_user_kabupaten->insert($id_user, $a);
            }
          }
        }
        $response["status"] = true;
        $response["msg"] = "Data {$temp_user_username} berhasil diinput";
      }
    } else {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    }
    echo json_encode($response);
  }
  public function update()
  {
    $this->form_validation->set_rules("username", "Username", "required");
    $this->form_validation->set_rules("email", "Email", "required");
    $this->form_validation->set_rules("telepon", "Telepon", "required");
    $this->form_validation->set_rules("role", "Role", "required");
    $this->form_validation->set_rules("id_user", "ID", "required");
    if ($this->form_validation->run()) {
      $temp_id_user = $this->input->post('id_user');
      $temp_user_username = ucwords($this->input->post('username'));
      $temp_user_email = $this->input->post('email');
      $temp_user_telepon = $this->input->post('telepon');
      $temp_user_role = $this->input->post('role');

      $temp_user_supervisor = 0;
      if (strtolower($temp_user_role) == "sales engineer") {
        $temp_user_supervisor = $this->input->post('supervisor');
      } else if (strtolower($temp_user_role) == "supervisor" || strtolower($temp_user_role) == "area sales manager") {

        $temp_user_supervisor = $this->input->post('supervisor_asm');
      }

      $this->load->model("m_user");
      $checker = $this->m_user->check_duplicate_update($temp_id_user, $temp_user_email);
      if ($checker->num_rows() > 0) {
        $response["status"] = false;
        $response["msg"] = "Email sudah terdaftar";
      } else {
        $this->m_user->update($temp_id_user, $temp_user_username, $temp_user_email, $temp_user_telepon, $temp_user_role, $temp_user_supervisor);
        if ($temp_user_role == "Sales Engineer") {
          $id_kabupaten = $this->input->post("kabupaten");

          $this->load->model("m_user_kabupaten");
          $this->m_user_kabupaten->deactive_data($temp_id_user);
          $this->m_user_kabupaten->insert($temp_id_user, $id_kabupaten);

          $this->load->model("m_user_rs");
          $this->m_user_rs->deactive_data($temp_id_user);
          $rumah_sakit = $this->input->post("se_rs");
          if ($rumah_sakit != "") {
            foreach ($rumah_sakit as $rs) {
              $this->m_user_rs->insert($temp_id_user, $rs);
            }
          }
        } else if ($temp_user_role == "Supervisor" || $temp_user_role == "Area Sales Manager") {
          $this->load->model("m_user_kabupaten");
          $this->load->model("m_user_provinsi");
          $this->m_user_kabupaten->deactive_data($temp_id_user);
          $this->m_user_provinsi->deactive_data($temp_id_user);
          $asm_kabupaten = $this->input->post("asm_kabupaten");
          $asm_provinsi = $this->input->post("asm_provinsi");
          if ($asm_kabupaten != "") {
            foreach ($asm_kabupaten as $a) {
              $this->m_user_kabupaten->insert($temp_id_user, $a);
            }
          }
          if ($asm_provinsi != "") {
            foreach ($asm_provinsi as $a) {
              $this->m_user_provinsi->insert($temp_id_user, $a);
            }
          }
        }
        $response["status"] = true;
        $response["msg"] = "Data user berhasil diupdate menjadi {$temp_user_username}";
      }
    } else {
      $response["status"] = false;
      $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
    }
    echo json_encode($response);
  }
  public function delete($id_user)
  {
    if (is_numeric($id_user)) {
      $this->load->model("m_user");
      $this->m_user->delete($id_user);

      $this->load->model("m_user_kabupaten");
      $this->m_user_kabupaten->deactive_data($id_user);

      $this->load->model("m_user_provinsi");
      $this->m_user_provinsi->deactive_data($id_user);

      $this->load->model("m_user_rs");
      $this->m_user_rs->deactive_data($id_user);

      $response["status"] = true;
      $response["msg"] = "Data berhasil dihapus";
    } else {
      $response["status"] = false;
      $response["msg"] = "ID yang diberikan tidak valid";
    }
    echo json_encode($response);
  }
  public function get_data()
  {
    $kolom_pengurutan = $this->input->get("kolom_pengurutan");
    $arah_kolom_pengurutan = $this->input->get("arah_kolom_pengurutan");
    $pencarian_phrase = $this->input->get("pencarian_phrase");
    $kolom_pencarian = $this->input->get("kolom_pencarian");
    $current_page = $this->input->get("current_page");
    $this->load->model("m_user");
    $response["data"] = $this->m_user->search($kolom_pengurutan, $arah_kolom_pengurutan, $pencarian_phrase, $kolom_pencarian, $current_page)->result_array();
    #echo $this->db->last_query();
    $total_data = $this->m_user->get_user()->num_rows();

    $this->load->library("pagination");
    $response["page"] = $this->pagination->generate_pagination_rules($current_page, $total_data, 20);

    echo json_encode($response);
  }
  public function get_selected_kabupaten($id_pk_user)
  {
    $this->load->model("m_user_kabupaten");
    $result = $this->m_user_kabupaten->get_selected_kabupaten($id_pk_user);
    #echo $this->db->last_query();
    echo json_encode($result->result_array());
  }

  public function get_selected_kabupaten_asm($id_pk_user)
  {
    $this->load->model("m_user_kabupaten");
    $result = $this->m_user_kabupaten->get_selected_kabupaten_asm($id_pk_user);
    #echo $this->db->last_query();
    echo json_encode($result->result_array());
  }

  public function get_selected_provinsi($id_pk_user)
  {
    $this->load->model("m_user_provinsi");
    $result = $this->m_user_provinsi->get_selected_provinsi($id_pk_user);
    #echo $this->db->last_query();
    echo json_encode($result->result_array());
  }

  public function get_selected_provinsi_asm($id_pk_user)
  {
    $this->load->model("m_user_provinsi");
    $result = $this->m_user_provinsi->get_selected_provinsi_asm($id_pk_user);
    #echo $this->db->last_query();
    echo json_encode($result->result_array());
  }

  public function get_unselected_kabupaten($id_pk_user, $id_provinsi)
  {
    $this->load->model("m_user_kabupaten");
    $result = $this->m_user_kabupaten->get_unselected_kabupaten($id_pk_user, $id_provinsi);
    echo json_encode($result->result_array());
  }

  public function get_unselected_kabupaten_asm($id_pk_user, $id_provinsi)
  {
    $this->load->model("m_user_kabupaten");
    $result = $this->m_user_kabupaten->get_unselected_kabupaten_asm($id_pk_user, $id_provinsi);
    echo json_encode($result->result_array());
  }

  public function get_unselected_provinsi($id_pk_user)
  {
    $this->load->model("m_user_provinsi");
    $result = $this->m_user_provinsi->get_unselected_provinsi($id_pk_user);
    echo json_encode($result->result_array());
  }

  public function get_unselected_provinsi_asm($id_pk_user)
  {
    $this->load->model("m_user_provinsi");
    $result = $this->m_user_provinsi->get_unselected_provinsi_asm($id_pk_user);
    echo json_encode($result->result_array());
  }

  public function get_selected_rs($id_pk_user)
  {
    $this->load->model("m_user_rs");
    $result = $this->m_user_rs->get_selected_rs($id_pk_user);
    echo json_encode($result->result_array());
  }
  public function get_unselected_rs($id_pk_user, $id_kabupaten)
  {
    $this->load->model("m_user_rs");
    $result = $this->m_user_rs->get_unselected_rs($id_pk_user, $id_kabupaten);
    echo json_encode($result->result_array());
  }
  public function profile_detail()
  {
    if ($this->session->id_user != "") {
      $this->load->model("m_user");
      $result = $this->m_user->user_profile($this->session->id_user);
      if ($result->num_rows() > 0) {
        $response["status"] = true;
        $response["data"] = $result->result_array();
      } else {
        $response["status"] = false;
        $response["msg"] = "ID tidak terdaftar";
      }
    } else {
      $response["status"] = false;
      $response["msg"] = "Unauthorized access";
    }
    echo json_encode($response);
  }
  public function update_profile()
  {
    if ($this->session->id_user != "") {
      $this->load->model("m_user");

      $this->form_validation->set_rules("username", "Username", "required");
      $this->form_validation->set_rules("email", "Email", "required");
      $this->form_validation->set_rules("telepon", "Telepon", "required");
      if ($this->form_validation->run()) {
        $id = $this->session->id_user;
        $username = $this->input->post("username");
        $email = $this->input->post("email");
        $telepon = $this->input->post("telepon");

        if ($this->m_user->check_duplicate_update($id, $email)->num_rows() == 0) {
          $this->m_user->update_profile($id, $username, $email, $telepon);
          $this->session->nama_user = $username;
          $response["status"] = true;
          $response["msg"] = "Data berhasil diubah";
        } else {
          $response["status"] = false;
          $response["msg"] = "Email telah terdaftar";
        }
      } else {
        $response["status"] = false;
        $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
      }
    } else {
      $response["status"] = false;
      $response["msg"] = "Unauthorized access";
    }
    echo json_encode($response);
  }
  public function update_password()
  {
    if ($this->session->id_user != "") {

      $this->form_validation->set_rules("pass_now", "Password Saat Ini", "required");
      $this->form_validation->set_rules("new_pass", "Password Baru", "required");
      $this->form_validation->set_rules("conf_pass", "Konfirmasi Password", "required");
      if ($this->form_validation->run()) {
        $this->load->model("m_user");

        $id = $this->session->id_user;
        $pass_now = $this->input->post("pass_now");
        $new_pass = $this->input->post("new_pass");
        $conf_pass = $this->input->post("conf_pass");

        if ($this->m_user->update_password($id, $pass_now, $new_pass, $conf_pass)) {
          $response["status"] = true;
          $response["msg"] = "Password berhasil diubah";
        } else {
          $response["status"] = false;
          $response["msg"] = "Password gagal diubah (password baru dan konfirmasi password tidak sesuai / password saat ini salah)";
        }
      } else {
        $response["status"] = false;
        $response["msg"] = str_replace("</p>", "", str_replace("<p>", "", validation_errors()));
      }
    } else {
      $response["status"] = false;
      $response["msg"] = "Unauthorized access";
    }
    echo json_encode($response);
  }
  public function get_supervisor_candidate($role)
  {
    $response["content"] = array();
    $this->load->model("m_user");
    $role = urldecode($role);
    if (strtolower($role) == "sales engineer") {
      $response["content"] = array_merge(
        $this->m_user->list_supervisor()->result_array(),
        $this->m_user->list_asm()->result_array(),
        $this->m_user->list_sm()->result_array()
      );
    } else if (strtolower($role) == "supervisor") {
      $response["content"] = array_merge(
        $this->m_user->list_asm()->result_array(),
        $this->m_user->list_sm()->result_array()
      );
    } else if (strtolower($role) == "area sales manager") {
      $response["content"] = array_merge(
        $this->m_user->list_sm()->result_array()
      );
    }
    if (count($response["content"]) > 0) {
      $response["status"] = true;
    } else {
      $response["status"] = false;
    }
    echo json_encode($response);
  }
  public function get_supervisee($id_pk_user_supervisor)
  {
    if (is_numeric($id_pk_user_supervisor)) {
      $this->load->model("m_user");
      $result = $this->m_user->get_supervisee($id_pk_user_supervisor);
      if ($result->num_rows() > 0) {
        $response["status"] = true;
        $response["content"] = $result->result_array();
      } else {
        $response["status"] = false;
      }
    } else {
      $response["status"] = false;
      $response["msg"] = "Invalid ID";
    }
    echo json_encode($response);
  }
  public function delete_supervisee($id_pk_user)
  {
    if (is_numeric($id_pk_user)) {
      $this->load->model("m_user");
      $this->m_user->reset_supervisor($id_pk_user);
      $response["status"] = true;
      $response["msg"] = "Supervisee berhasil dihapus";
    } else {
      $response["status"] = true;
      $response["msg"] = "Invalid ID";
    }
    echo json_encode($response);
  }
}
