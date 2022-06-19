<?php
class Welcome extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->view("welcome/login-page");
  }
  public function process()
  {
    $this->load->model("m_user", "user");
    $email = $this->input->post("email");
    $password = $this->input->post("password");
    $result = $this->user->authentication($email, $password);
    if ($result["status"]) {
      $this->session->id_user = $result["msg"][0]["id_pk_user"];
      $this->session->nama_user = $result["msg"][0]["user_username"];
      $this->session->user_role = $result["msg"][0]["user_role"];
      redirect("welcome/home");
    } else {
      $this->session->set_flashdata("msg", "Kombinasi tidak ditemukan, silahkan coba lagi");
      $this->session->set_flashdata("status", "danger");
      redirect("welcome");
    }
  }
  public function home()
  {
    if (!$this->session->id_user) {
      $this->session->set_flashdata("status", "danger");
      $this->session->set_flashdata("msg", "Session expired, silahkan login");
      redirect("welcome/logout");
      exit();
    }
    

    if ($this->session->user_role == "Administrator" || $this->session->user_role == "Sales Manager"):
      $sql = "select ifnull(count(id_pk_sirup),0) as jmlh_sirup, pencarian_sirup_frase from mstr_sirup right join mstr_pencarian_sirup on mstr_pencarian_sirup.id_pk_pencarian_sirup = mstr_sirup.id_fk_pencarian_sirup where id_fk_pencarian_sirup in (select id_pk_pencarian_sirup from mstr_pencarian_sirup where pencarian_sirup_status='aktif') and sirup_status = 'aktif' group by id_fk_pencarian_sirup";
      $result = executeQuery($sql)->result_array();
      $content = "";
      $label = "";
      for($a =0; $a<count($result); $a++){
        $label .= "'".$result[$a]["pencarian_sirup_frase"]."'";
        $content .= $result[$a]["jmlh_sirup"];
        if($a+1 != count($result)){
          $label .= ",";
          $content .= ",";
        }
      }
      $data["sirup_bar_chart"] = array(
        "label" => $label,
        "content" => $content
      );

      $sql1 = "select count(id_pk_ekatalog) as jmlh, 'Batal' as status from mstr_ekatalog where ekatalog_status = 'aktif' and ekatalog_status_paket='batal_dan_selesai'";

      $sql2 = "select count(id_pk_ekatalog) as jmlh, 'Proses Kirim' as status from mstr_ekatalog where ekatalog_status = 'aktif' and ekatalog_status_paket='melakukan_pengiriman_dan_pener'";
      $sql3 = "select count(id_pk_ekatalog) as jmlh, 'Proses Kontrak' as status from mstr_ekatalog where ekatalog_status = 'aktif' and ekatalog_status_paket='proses_kontrak_ppk'";
      $sql4 = "select count(id_pk_ekatalog) as jmlh, 'Proses Nego' as status from mstr_ekatalog where ekatalog_status = 'aktif' and (ekatalog_status_paket='draft' or ekatalog_status_paket='mengirimkan_ke_ppk' or ekatalog_status_paket='persetujuan_panitia' or ekatalog_status_paket='persetujuan_penyedia' or ekatalog_status_paket='proses_negosiasi' or ekatalog_status_paket='sepakat')";
      $sql5="select count(id_pk_ekatalog) as jmlh, 'Selesai' as status from mstr_ekatalog where ekatalog_status = 'aktif' and ekatalog_status_paket='paket_selesai'";
      $data["ekatalog_pie_chart"] = array(
        "batal" => executeQuery($sql1)->result_array(),
        "kirim" => executeQuery($sql2)->result_array(),
        "kontrak" => executeQuery($sql3)->result_array(),
        "nego" => executeQuery($sql4)->result_array(),
        "selesai" =>executeQuery($sql5)->result_array(),
      );


      $sql1 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif'";
      $sql2 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel='win'";
      $sql3 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel='lose'";
      $sql4 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel = 'lead'";
      $sql5 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel = 'prospek'";
      $sql6 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel = 'hot prospek'";
      $sql7 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel = 'belum ditentukan'";
      $sql8 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel is null";
      $data["prospek_pie_chart"] = array(
        "total" => executeQuery($sql1)->result_array(),
        "win" => executeQuery($sql2)->result_array(),
        "lose" => executeQuery($sql3)->result_array(),
        "lead" => executeQuery($sql4)->result_array(),
        "prospek" => executeQuery($sql5)->result_array(),
        "hot_prospek" => executeQuery($sql6)->result_array(),
        "belum" => executeQuery($sql7)->result_array(),
        "na" => executeQuery($sql8)->result_array(),
      ); 

      $sql = "SELECT * FROM mstr_ekatalog where ekatalog_id_sirup not in (select mstr_sirup.sirup_rup from mstr_sirup)";
      $result = executeQuery($sql);
      $data["ekatalog_tidak_sirup"] = $result->result_array();
      $sql = "SELECT * FROM mstr_ekatalog where ekatalog_id_sirup in (select mstr_sirup.sirup_rup from mstr_sirup)";
      $result = executeQuery($sql);
      $data["ekatalog_sirup"] = $result->result_array();

      $this->load->view("welcome/home", $data);
      return;
    else:
      $count = 0;
      $total_prospek_pemerintah = 0;
      $total_prospek_swasta = 0;
  
      $this->load->model('m_prospek');
      $prospek_price = $this->m_prospek->get_total_prospek_price()->result_array();
      for ($i = 0; $i < count($prospek_price); $i++) {
        $count += $prospek_price[$i]['total_price_prospek'];
      }
      $prospek_pemerintah = $this->m_prospek->get_total_prospek_pemerintah()->result_array();
      for ($i = 0; $i < count($prospek_pemerintah); $i++) {
        $total_prospek_pemerintah += $prospek_pemerintah[$i]['total_price_prospek'];
      }
      $prospek_swasta = $this->m_prospek->get_total_prospek_swasta()->result_array();
      for ($i = 0; $i < count($prospek_swasta); $i++) {
        $total_prospek_swasta += $prospek_swasta[$i]['total_price_prospek'];
      }
  
      $this->load->model('m_sirup');
      $funnel = $this->m_sirup->sirup_funnel(1)->result_array();
      $not_funnel = $this->m_sirup->sirup_funnel(0)->result_array();
  
      $this->load->model('m_kabupaten');
      $kabupaten = $this->m_kabupaten->get_data()->result_array();
  
      $this->load->model('m_pencarian_sirup');
      $keyword = $this->m_pencarian_sirup->get_data()->result_array();
  
      $data['keyword'] = $keyword;
      $data['kabupaten'] = $kabupaten;

      echo $this->session->id_user;
      
      $sql1 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_id_create = ? and mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif'";
      $sql2 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_id_create = ? and mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel='win'";
      $sql3 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_id_create = ? and mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel='lose'";
      $sql4 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_id_create = ? and mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel = 'lead'";
      $sql5 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_id_create = ? and mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel = 'prospek'";
      $sql6 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_id_create = ? and mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel = 'hot prospek'";
      $sql7 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_id_create = ? and mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel = 'belum ditentukan'";
      $sql8 = "SELECT ifnull(sum(prospek_produk_price*(100-prospek_produk_diskon)/100*detail_prospek_quantity),0) as jmlh FROM `tbl_prospek_produk` inner join mstr_prospek on mstr_prospek.id_pk_prospek = tbl_prospek_produk.id_fk_prospek where mstr_prospek.prospek_id_create = ? and mstr_prospek.prospek_status='aktif' and tbl_prospek_produk.detail_prospek_status='aktif' and mstr_prospek.funnel is null";
      $args = array(
        $this->session->id_user
      );
      $data["prospek_pie_chart"] = array(
        "total" => executeQuery($sql1, $args)->result_array(),
        "win" => executeQuery($sql2, $args)->result_array(),
        "lose" => executeQuery($sql3, $args)->result_array(),
        "lead" => executeQuery($sql4, $args)->result_array(),
        "prospek" => executeQuery($sql5, $args)->result_array(),
        "hot_prospek" => executeQuery($sql6, $args)->result_array(),
        "belum" => executeQuery($sql7, $args)->result_array(),
        "na" => executeQuery($sql8, $args)->result_array(),
      ); 

      $data['user_data'] = [
        'total_prospek_sendiri' => $count,
        'jumlah_prospek_sendiri' => count($prospek_price),
        'total_prospek_pemerintah_sendiri' => $total_prospek_pemerintah,
        'total_prospek_swasta_sendiri' => $total_prospek_swasta,
        'funnel' => $funnel[0]["jmlh"],
        'not_funnel' => $not_funnel[0]["jmlh"],
      ];
      $this->load->view("welcome/home-low", $data);
      return;
    endif;
    
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect("welcome");
  }
}
