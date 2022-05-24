<?php
class Home extends CI_Controller
{


    public function get_prospek_tahun($jenis, $tahun)
    {
        $id_user = $this->session->id_user;
        if ($jenis == "1") {
            $sql = "SELECT id_pk_user FROM mstr_user WHERE user_supervisor = $id_user";
            $id_supervisee_arr = executeQuery($sql)->result_array();
            $id_supervisee = "";
            for ($i = 0; $i < count($id_supervisee_arr); $i++) {
                if ($id_supervisee != "") {
                    $id_supervisee = $id_supervisee . "," . $id_supervisee_arr[$i]['id_pk_user'];
                } else {
                    $id_supervisee = $id_supervisee_arr[$i]['id_pk_user'];
                }
            }

            $query_supervisee = " IN (" . $id_user . "," . $id_supervisee . ") ";
        } else {
            $query_supervisee = " = $id_user ";
        }
        if ($tahun == "total") {
            $query_tahun = "";
        } else {
            $query_tahun = " BETWEEN '$tahun-01-01' AND '$tahun-12-31' ";
        }
        $sql = "SELECT total_price_prospek 
                FROM mstr_prospek 
                WHERE prospek_status = 'aktif' AND prospek_id_create $query_supervisee AND prospek_tgl_create $query_tahun";

        $prospek_price = executeQuery($sql)->result_array();
        $count = 0;
        for ($i = 0; $i < count($prospek_price); $i++) {
            $count += $prospek_price[$i]['total_price_prospek'];
        }

        echo json_encode($count);
    }

    public function get_rs_list()
    {
        if (strtolower($this->session->user_role) == "sales engineer") {
            $sql = "select id_pk_rs, rs_kode, rs_nama from tbl_user_rs
      inner join mstr_rs on mstr_rs.id_pk_rs = tbl_user_rs.id_fk_rs
      where user_rs_status = 'aktif' and id_fk_user = ? and rs_status = 'aktif'";
            $args = array(
                $this->session->id_user
            );
            $result = executeQuery($sql, $args);
            if ($result->num_rows() > 0) {
                $response["status"] = true;
                $response["data"] = $result->result_array();
            } else {
                $response["status"] = false;
            }
            echo json_encode($response);
        } else if (strtolower($this->session->user_role) == "supervisor" || strtolower($this->session->user_role) == "area sales manager") {
            $id_kabupaten = $this->input->get("id_kabupaten");
            $sql = "select * from tbl_user_kabupaten
      inner join mstr_rs on mstr_rs.id_fk_kabupaten = tbl_user_kabupaten.id_fk_kabupaten
      where user_kabupaten_status = 'aktif' and rs_status = 'aktif' and id_fk_user = ? and id_fk_kabupaten = ?";
            $args = array(
                $this->session->id_user, $id_kabupaten
            );
            $result = executeQuery($sql, $args);
            if ($result->num_rows() > 0) {
                $response["status"] = true;
                $response["data"] = $result->result_array();
            } else {
                $response["status"] = false;
            }
            echo json_encode($response);
        } else if (strtolower($this->session->user_role) == "sales manager") {
            $id_kabupaten = $this->input->get("id_kabupaten");
            $sql = "select * from mstr_rs
      where rs_status = 'aktif' and id_fk_kabupaten = ?";
            $args = array(
                $this->session->id_user, $id_kabupaten
            );
            $result = executeQuery($sql, $args);
            if ($result->num_rows() > 0) {
                $response["status"] = true;
                $response["data"] = $result->result_array();
            } else {
                $response["status"] = false;
            }
            echo json_encode($response);
        } else {
            $response["status"] = false;
            echo json_encode($response);
        }
    }
    public function assign_rs_to_se()
    {
        $sql = "
      select * from mstr_rs where id_fk_kabupaten in
        (select id_fk_kabupaten from tbl_user_kabupaten
        where user_kabupaten_status = 'aktif' and id_fk_user = ?)
      and id_pk_rs = ?";
        $args = array(
            $this->session->id_user, $this->input->post("id_rs")
        );
        $result = executeQuery($sql, $args);
        if ($result->num_rows() > 0) {
            $data = array(
                "id_fk_rs" => $this->input->post("id_rs"),
                "id_fk_user" => $this->session->id_user,
                "user_rs_status" => "aktif"
            );
            insertRow("tbl_user_rs", $data);
        }
    }
}
