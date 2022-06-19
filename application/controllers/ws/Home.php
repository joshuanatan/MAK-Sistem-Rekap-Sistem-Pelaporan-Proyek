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
    public function get_prospek_outlet($jenis, $tahun, $pemerintah, $kabupaten)
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

        $this->load->model('m_prospek');

        if ($pemerintah == "0") {
            $query_pemerintah = "";
        } else if ($pemerintah == "1") {
            $prospek_pemerintah = $this->m_prospek->get_total_prospek_outlet_swasta()->result_array();
            $id_prospek = "";
            for ($i = 0; $i < count($prospek_pemerintah); $i++) {
                if ($id_prospek != "") {
                    $id_prospek = $id_prospek . "," . $prospek_pemerintah[$i]['id_pk_prospek'];
                } else {
                    $id_prospek = $prospek_pemerintah[$i]['id_pk_prospek'];
                }
            }
            if (!$id_prospek) {
                $query_pemerintah = " AND id_pk_prospek = 0";
            } else {
                $query_pemerintah = " AND id_pk_prospek IN ($id_prospek)";
            }
        } else if ($pemerintah == "2") {
            $prospek_pemerintah = $this->m_prospek->get_total_prospek_outlet_pemerintah()->result_array();
            $id_prospek = "";
            for ($i = 0; $i < count($prospek_pemerintah); $i++) {
                if ($id_prospek != "") {
                    $id_prospek = $id_prospek . "," . $prospek_pemerintah[$i]['id_pk_prospek'];
                } else {
                    $id_prospek = $prospek_pemerintah[$i]['id_pk_prospek'];
                }
            }
            if (!$id_prospek) {
                $query_pemerintah = " AND id_pk_prospek = 0";
            } else {
                $query_pemerintah = " AND id_pk_prospek IN ($id_prospek)";
            }
        }

        if ($kabupaten == "0") {
            $query_kabupaten = "";
        } else {
            $query_kabupaten = " AND id_fk_kabupaten = $kabupaten";
        }
        $sql = "SELECT total_price_prospek 
                FROM mstr_prospek 
                WHERE prospek_status = 'aktif' AND prospek_id_create $query_supervisee AND prospek_tgl_create $query_tahun $query_pemerintah $query_kabupaten";

        $prospek_price = executeQuery($sql)->result_array();
        $count = 0;
        for ($i = 0; $i < count($prospek_price); $i++) {
            $count += $prospek_price[$i]['total_price_prospek'];
        }

        echo json_encode($count);
    }

    public function get_ekatalog_tahun($tahun)
    {

        if ($tahun == "total") {
            $query_tahun = "";
        } else {
            $query_tahun = " BETWEEN '$tahun-01-01' AND '$tahun-12-31' ";
        }
        $sql = "SELECT total_price_prospek 
                FROM mstr_prospek 
                WHERE prospek_status = 'aktif' AND prospek_tgl_create $query_tahun";

        $prospek_price = executeQuery($sql)->result_array();
        $count = 0;
        for ($i = 0; $i < count($prospek_price); $i++) {
            $count += $prospek_price[$i]['total_price_prospek'];
        }

        $arr = [
            'total_price' => $count,
            'count' => count($prospek_price)
        ];

        echo json_encode($arr);
    }
}
