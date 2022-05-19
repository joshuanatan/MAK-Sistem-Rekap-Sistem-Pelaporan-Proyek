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
    if(!$this->session->id_user){
      $this->session->set_flashdata("status","danger");
      $this->session->set_flashdata("msg","Session expired, silahkan login");
      redirect("welcome/logout");
      exit();
    }
    $count = 0;
    $total_prospek_pemerintah = 0;
    $total_prospek_swasta = 0;
    
    $this->load->model('m_prospek');
    $prospek_price = $this->m_prospek->get_total_prospek_price()->result_array();
    for($i=0;$i<count($prospek_price);$i++) {
      $count += $prospek_price[$i]['total_price_prospek'];
    }
    $prospek_pemerintah = $this->m_prospek->get_total_prospek_pemerintah()->result_array();
    for($i=0;$i<count($prospek_pemerintah);$i++) {
      $total_prospek_pemerintah += $prospek_pemerintah[$i]['total_price_prospek'];
    }
    $prospek_swasta = $this->m_prospek->get_total_prospek_swasta()->result_array();
    for($i=0;$i<count($prospek_swasta);$i++) {
      $total_prospek_swasta += $prospek_swasta[$i]['total_price_prospek'];
    }

    $this->load->model('m_sirup');
    $funnel = $this->m_sirup->sirup_funnel(1)->result_array();
    $not_funnel = $this->m_sirup->sirup_funnel(0)->result_array();
    
    $data['user_data'] = [
      'total_price' => $count,
      'funnel' => count($funnel),
      'not_funnel' => count($not_funnel),
      'total_prospek_pemerintah' => $total_prospek_pemerintah,
      'total_prospek_swasta' => $total_prospek_swasta
    ];
    $this->load->view("welcome/home", $data);
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect("welcome");
  }
}
