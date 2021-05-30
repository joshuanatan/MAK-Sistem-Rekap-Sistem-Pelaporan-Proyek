<?php
class Prospek extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    if(!$this->session->id_user){
      $this->session->set_flashdata("status","danger");
      $this->session->set_flashdata("msg","Session expired, silahkan login");
      redirect("welcome");
      exit();
    }
  }
  public function index()
  {
    $this->load->model("m_prospek");
    $data["field"] = array(
      array(
        "field_value" => "provinsi_nama",
        "field_text" => "Provinsi"
      ),
      array(
        "field_value" => "kabupaten_nama",
        "field_text" => "Kabupaten"
      ),
      array(
        "field_value" => "rs_nama",
        "field_text" => "Nama Rumah Sakit"
      ),
      array(
        "field_value" => "prospek_principle",
        "field_text" => "Principle"
      ),
      array(
        "field_value" => "total_price_prospek",
        "field_text" => "Harga Prospek"
      ),
      array(
        "field_value" => "no_sirup",
        "field_text" => "No Sirup"
      ),
      array(
        "field_value" => "no_ekatalog",
        "field_text" => "No Ekatalog"
      ),
      array(
        "field_value" => "funnel_percentage",
        "field_text" => "Persentase Win"
      ),
      array(
        "field_value" => "estimasi_pembelian",
        "field_text" => "Estimasi Pembelian"
      ),
      array(
        "field_value" => "funnel",
        "field_text" => "Funnel"
      ),
      array(
        "field_value" => "prospek_status",
        "field_text" => "Status Prospek"
      ),
    );
    $this->load->view("prospek/index", $data);
  }
  public function supervisee()
  {
    $this->load->model("m_prospek");
    $data["field"] = array(
      array(
        "field_value" => "provinsi_nama",
        "field_text" => "Provinsi"
      ),
      array(
        "field_value" => "kabupaten_nama",
        "field_text" => "Kabupaten"
      ),
      array(
        "field_value" => "rs_nama",
        "field_text" => "Nama Rumah Sakit"
      ),
      array(
        "field_value" => "prospek_principle",
        "field_text" => "Principle"
      ),
      array(
        "field_value" => "total_price_prospek",
        "field_text" => "Harga Prospek"
      ),
      array(
        "field_value" => "no_sirup",
        "field_text" => "No Sirup"
      ),
      array(
        "field_value" => "no_ekatalog",
        "field_text" => "No Ekatalog"
      ),
      array(
        "field_value" => "funnel_percentage",
        "field_text" => "Persentase Win"
      ),
      array(
        "field_value" => "estimasi_pembelian",
        "field_text" => "Estimasi Pembelian"
      ),
      array(
        "field_value" => "funnel",
        "field_text" => "Funnel"
      ),
      array(
        "field_value" => "prospek_status",
        "field_text" => "Status Prospek"
      ),
    );
    $this->load->view("prospek/supervisee", $data);
  }
  public function add_prospek()
  {
    $this->load->model("m_prospek");
    $id = $this->session->id_user;
    $result1 = $this->m_prospek->get_rs_sales_engineer($id);
    $result2 = $this->m_prospek->get_produk();
    $result3 = $this->m_prospek->get_kabupaten($id);
    $result4 = $this->m_prospek->get_provinsi();
    $result5 = $this->m_prospek->get_sirup();
    $result6 = $this->m_prospek->get_ekat();
    $data = array(
      'datars' => $result1->result_array(),
      'dataproduk' => $result2->result_array(),
      'datakabupaten' => $result3->result_array(),
      'dataprovinsi' => $result4->result_array(),
      'datasirup' => $result5->result_array(),
      'dataekat' => $result6->result_array(),
    );
    $this->load->view("prospek/tambah_prospek", $data);
  }

  public function detail_prospek($id_pk_prospek)
  {
    $this->load->model("m_prospek");
    $id = $this->session->id_user;
    $result1 = $this->m_prospek->get_prospek_detail($id_pk_prospek, $id);
    $result2 = $this->m_prospek->get_prospek_produk($id_pk_prospek);
    $data = array(
      'detailprospek' => $result1->result_array(),
      'dataprospekproduk' => $result2->result_array(),
    );
    $this->load->view("prospek/detail_prospek", $data);
  }

  public function edit_prospek($id_pk_prospek)
  {
    $id = $this->session->id_user;
    $this->load->model("m_prospek");
    $result = $this->m_prospek->edit_get_prospek($id_pk_prospek);
    if ($result->num_rows() == 0) {
      echo "<script type = 'text/javascript'>alert('Unautorized Access');window.location.href='" . base_url() . "prospek';</script>";
      exit();
    }
    $result2 = $this->m_prospek->get_rs($id);
    $result3 = $this->m_prospek->get_provinsi();
    $result4 = $this->m_prospek->get_kabupaten($id);
    $result5 = $this->m_prospek->get_prospek_produk($id_pk_prospek);
    $result6 = $this->m_prospek->get_produk();
    $result7 = $this->m_prospek->get_sirup();
    $result8 = $this->m_prospek->get_ekat();
    $data = array(
      'dataprospek' => $result->result_array(),
      'datars' => $result2->result_array(),
      'dataprovinsi' => $result3->result_array(),
      'datakabupaten' => $result4->result_array(),
      'dataprospekproduk' => $result5->result_array(),
      'dataproduk' => $result6->result_array(),
      'datasirup' => $result7->result_array(),
      'dataekat' => $result8->result_array(),
    );
    $this->load->view("prospek/edit_prospek", $data);
  }

  public function insert()
  {

    if ($this->session->user_role == "Sales Engineer") {
      $temp_id_fk_rs = $this->input->post('id_fk_rs');
      $temp_prospek_principle = $this->input->post('prospek_principle');
      $temp_total_price_prospek = 0;
      $temp_notes_kompetitor = $this->input->post('notes_kompetitor');
      $temp_notes_prospek = $this->input->post('notes_prospek');
      $temp_estimasi_pembelian = $this->input->post('estimasi_pembelian');
      $temp_funnel = $this->input->post('funnel');
      $temp_id_user = $this->session->id_user;
      $id_fk_prospek = "";

      $this->load->model("m_prospek");

      if ($this->input->post('funnel') == "Prospek") {
        $temp_funnel_percentage = $this->input->post('funnel_percentage');
        $id_fk_prospek = $this->m_prospek->insert_prospek_se_prospek($temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_funnel_percentage);
      } else if ($this->input->post('funnel') == "Loss") {
        $temp_note_loss = $this->input->post('note_loss');
        $id_fk_prospek = $this->m_prospek->insert_prospek_se_loss($temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_note_loss);
      } else {
        $id_fk_prospek = $this->m_prospek->insert_prospek_se($temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user);
      }
    }

    if ($this->session->user_role == "Supervisor" || $this->session->user_role == "Area Sales Manager") {
      $temp_id_fk_kabupaten = $this->input->post('kabupaten');
      $temp_id_fk_rs = $this->input->post('id_fk_rs');
      $temp_prospek_principle = $this->input->post('prospek_principle');
      $temp_total_price_prospek = 0;
      $temp_notes_kompetitor = $this->input->post('notes_kompetitor');
      $temp_notes_prospek = $this->input->post('notes_prospek');
      $temp_estimasi_pembelian = $this->input->post('estimasi_pembelian');
      $temp_funnel = $this->input->post('funnel');
      $temp_id_user = $this->session->id_user;

      $this->load->model("m_prospek");

      $kategori = $this->m_prospek->get_data_rs_kategori($temp_id_fk_rs)->result_array();

      if ($temp_funnel == "Prospek" && $this->session->user_role == "Supervisor" && $kategori[0]["rs_kategori"] == "Pemerintah") {
        $temp_no_sirup = $this->input->post('no_sirup');
        $id_fk_prospek = $this->m_prospek->insert_prospek_asm_sirup($temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_no_sirup);
      } else if ($this->input->post('funnel') == "Loss") {
        $temp_note_loss = $this->input->post('note_loss');
        $id_fk_prospek = $this->m_prospek->insert_prospek_asm_loss($temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_note_loss);
      } else if ($this->input->post('funnel') == "Prospek") {
        $temp_funnel_percentage = $this->input->post('funnel_percentage');
        $id_fk_prospek = $this->m_prospek->insert_prospek_asm_prospek($temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_funnel_percentage);
      } else {
        $id_fk_prospek = $this->m_prospek->insert_prospek_asm($temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user);
      }
    }

    if ($this->session->user_role == "Sales Manager") {
      $temp_id_fk_provinsi = $this->input->post('provinsi');
      $temp_id_fk_kabupaten = $this->input->post('kabupaten');
      $temp_id_fk_rs = $this->input->post('id_fk_rs');
      $temp_prospek_principle = $this->input->post('prospek_principle');
      $temp_total_price_prospek = 0;
      $temp_notes_kompetitor = $this->input->post('notes_kompetitor');
      $temp_notes_prospek = $this->input->post('notes_prospek');
      $temp_estimasi_pembelian = $this->input->post('estimasi_pembelian');
      $temp_funnel = $this->input->post('funnel');
      $temp_id_user = $this->session->id_user;
      $this->load->model("m_prospek");

      $kategori = $this->m_prospek->get_data_rs_kategori($temp_id_fk_rs)->result_array();

      if ($temp_funnel == "Win" && $this->session->user_role == "Sales Manager" && $kategori[0]["rs_kategori"] == "Pemerintah") {
        $temp_no_ekatalog = $this->input->post('nomorekatalog');
        $id_fk_prospek = $this->m_prospek->insert_prospek_sm_ekatalog($temp_id_fk_provinsi, $temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_no_ekatalog);
      } else if ($this->input->post('funnel') == "Loss") {
        $temp_note_loss = $this->input->post('note_loss');
        $id_fk_prospek = $this->m_prospek->insert_prospek_sm_loss($temp_id_fk_provinsi, $temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_note_loss);
      } else if ($this->input->post('funnel') == "Prospek") {
        $temp_funnel_percentage = $this->input->post('funnel_percentage');
        $id_fk_prospek = $this->m_prospek->insert_prospek_sm_prospek($temp_id_fk_provinsi, $temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_funnel_percentage);
      } else {
        $id_fk_prospek = $this->m_prospek->insert_prospek_sm($temp_id_fk_provinsi, $temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user);
      }
    }

    $temp_data_produk = $this->input->post('data_produk');
    $this->load->model("m_prospek");
    $total_price = 0;

    if ($temp_data_produk != '') {
      foreach ($temp_data_produk as $a) {
        $temp_id_fk_produk = $this->input->post('id_fk_produk' . $a);
        $temp_prospek_produk_price = $this->input->post('detail_price' . $a);
        $temp_detail_prospek_quantity = $this->input->post('detail_quantity' . $a);
        $total_price = $total_price + ($temp_prospek_produk_price * $temp_detail_prospek_quantity);
        $temp_detail_prospek_keterangan = $this->input->post('detail_keterangan' . $a);
        $this->m_prospek->insert_produk_prospek($id_fk_prospek, $temp_id_fk_produk, $temp_prospek_produk_price, $temp_detail_prospek_quantity, $temp_detail_prospek_keterangan);
      }
    }
    $this->m_prospek->insert_total_price($id_fk_prospek, $total_price);
    redirect("prospek/index");
  }

  //edit

  public function edit($id_pk_prospek)
  {
    $this->load->model("m_prospek");
    $id_user = $this->m_prospek->edit_get_id_user($id_pk_prospek)->result_array();

    if ($this->session->id_user == $id_user[0]["prospek_id_create"]) {
      if ($this->session->user_role == "Sales Engineer") {
        $temp_id_fk_rs = $this->input->post('id_fk_rs');
        $temp_prospek_principle = $this->input->post('prospek_principle');
        $temp_total_price_prospek = 0;
        $temp_notes_kompetitor = $this->input->post('notes_kompetitor');
        $temp_notes_prospek = $this->input->post('notes_prospek');
        $temp_estimasi_pembelian = $this->input->post('estimasi_pembelian');
        $temp_funnel = $this->input->post('funnel');
        $temp_id_user = $this->session->id_user;

        $this->load->model("m_prospek");

        if ($this->input->post('funnel') == "Prospek") {
          $temp_funnel_percentage = $this->input->post('funnel_percentage');
          $this->m_prospek->edit_prospek_se_prospek($id_pk_prospek, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_funnel_percentage);
        } else if ($this->input->post('funnel') == "Loss") {
          $temp_note_loss = $this->input->post('note_loss');
          $this->m_prospek->edit_prospek_se_loss($id_pk_prospek, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_note_loss);
        } else {
          $this->m_prospek->edit_prospek_se($id_pk_prospek, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user);
        }
      }

      if ($this->session->user_role == "Supervisor" || $this->session->user_role == "Area Sales Manager") {
        $temp_id_fk_kabupaten = $this->input->post('kabupaten');
        $temp_id_fk_rs = $this->input->post('id_fk_rs');
        $temp_prospek_principle = $this->input->post('prospek_principle');
        $temp_total_price_prospek = 0;
        $temp_notes_kompetitor = $this->input->post('notes_kompetitor');
        $temp_notes_prospek = $this->input->post('notes_prospek');
        $temp_estimasi_pembelian = $this->input->post('estimasi_pembelian');
        $temp_funnel = $this->input->post('funnel');
        $temp_id_user = $this->session->id_user;

        $this->load->model("m_prospek");

        $kategori = $this->m_prospek->get_data_rs_kategori($temp_id_fk_rs)->result_array();

        if ($temp_funnel == "Prospek" && $this->session->user_role == "Supervisor" && $kategori[0]["rs_kategori"] == "Pemerintah") {
          $temp_no_sirup = $this->input->post('no_sirup');
          $this->m_prospek->edit_prospek_asm_sirup($id_pk_prospek, $temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_no_sirup);
        } else if ($this->input->post('funnel') == "Loss") {
          $temp_note_loss = $this->input->post('note_loss');
          $this->m_prospek->edit_prospek_asm_loss($id_pk_prospek, $temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_note_loss);
        } else if ($this->input->post('funnel') == "Prospek") {
          $temp_funnel_percentage = $this->input->post('funnel_percentage');
          $this->m_prospek->edit_prospek_asm_prospek($id_pk_prospek, $temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_funnel_percentage);
        } else {
          $this->m_prospek->edit_prospek_asm($id_pk_prospek, $temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user);
        }
      }

      if ($this->session->user_role == "Sales Manager") {
        $temp_id_fk_provinsi = $this->input->post('provinsi');
        $temp_id_fk_kabupaten = $this->input->post('kabupaten');
        $temp_id_fk_rs = $this->input->post('id_fk_rs');
        $temp_prospek_principle = $this->input->post('prospek_principle');
        $temp_total_price_prospek = 0;
        $temp_notes_kompetitor = $this->input->post('notes_kompetitor');
        $temp_notes_prospek = $this->input->post('notes_prospek');
        $temp_estimasi_pembelian = $this->input->post('estimasi_pembelian');
        $temp_funnel = $this->input->post('funnel');
        $temp_id_user = $this->session->id_user;
        $this->load->model("m_prospek");

        $kategori = $this->m_prospek->get_data_rs_kategori($temp_id_fk_rs)->result_array();

        if ($temp_funnel == "Win" && $this->session->user_role == "Sales Manager" && $kategori[0]["rs_kategori"] == "Pemerintah") {
          $temp_no_ekatalog = $this->input->post('nomorekatalog');
          $this->m_prospek->edit_prospek_sm_ekatalog($id_pk_prospek, $temp_id_fk_provinsi, $temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_no_ekatalog);
        } else if ($this->input->post('funnel') == "Loss") {
          $temp_note_loss = $this->input->post('note_loss');
          $this->m_prospek->edit_prospek_sm_loss($id_pk_prospek, $temp_id_fk_provinsi, $temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_note_loss);
        } else if ($this->input->post('funnel') == "Prospek") {
          $temp_funnel_percentage = $this->input->post('funnel_percentage');
          $this->m_prospek->edit_prospek_sm_prospek($id_pk_prospek, $temp_id_fk_provinsi, $temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user, $temp_funnel_percentage);
        } else {
          $this->m_prospek->edit_prospek_sm($id_pk_prospek, $temp_id_fk_provinsi, $temp_id_fk_kabupaten, $temp_id_fk_rs, $temp_prospek_principle, $temp_total_price_prospek, $temp_notes_kompetitor, $temp_notes_prospek, $temp_estimasi_pembelian, $temp_funnel, $temp_id_user);
        }
      }

      $temp_data_produk = $this->input->post('data_produk');
      $this->load->model("m_prospek");
      $total_price = 0;

      if ($temp_data_produk != '') {
        foreach ($temp_data_produk as $a) {
          $temp_id_pk_prospek_produk = $this->input->post('id_pk_prospek_produk' . $a);
          $temp_id_fk_produk = $this->input->post('id_fk_produk' . $a);
          $temp_prospek_produk_price = $this->input->post('detail_price' . $a);
          $temp_detail_prospek_quantity = $this->input->post('detail_quantity' . $a);
          $total_price = $total_price + ($temp_prospek_produk_price * $temp_detail_prospek_quantity);
          $temp_detail_prospek_keterangan = $this->input->post('detail_keterangan' . $a);
          $this->m_prospek->edit_produk_prospek($temp_id_pk_prospek_produk, $temp_id_fk_produk, $temp_prospek_produk_price, $temp_detail_prospek_quantity, $temp_detail_prospek_keterangan);
        }
      }

      $temp_data_produk = $this->input->post('data_produk_baru');

      if ($temp_data_produk != '') {
        foreach ($temp_data_produk as $a) {
          $temp_id_fk_produk = $this->input->post('id_fk_produk' . $a);
          $temp_prospek_produk_price = $this->input->post('detail_price' . $a);
          $temp_detail_prospek_quantity = $this->input->post('detail_quantity' . $a);
          $total_price = $total_price + ($temp_prospek_produk_price * $temp_detail_prospek_quantity);
          $temp_detail_prospek_keterangan = $this->input->post('detail_keterangan' . $a);
          $this->m_prospek->insert_produk_prospek($id_pk_prospek, $temp_id_fk_produk, $temp_prospek_produk_price, $temp_detail_prospek_quantity, $temp_detail_prospek_keterangan);
        }
      }
      $this->m_prospek->insert_total_price($id_pk_prospek, $total_price);
    } else if ($this->session->id_user != $id_user[0]["prospek_id_create"] && $this->session->user_role == "Supervisor") {
      $temp_no_sirup = $this->input->post('no_sirup');
      $this->load->model("m_prospek");
      $this->m_prospek->edit_sirup($id_pk_prospek, $temp_no_sirup);
    } else if ($this->session->id_user != $id_user[0]["prospek_id_create"] && $this->session->user_role == "Sales Manager") {
      $temp_no_ekatalog = $this->input->post('nomorekatalog');
      $this->load->model("m_prospek");
      $this->m_prospek->edit_ekatalog($id_pk_prospek, $temp_no_ekatalog);
    }
    redirect("prospek/index");
  }
}
