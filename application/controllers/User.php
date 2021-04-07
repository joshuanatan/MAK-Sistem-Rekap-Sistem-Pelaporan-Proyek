<?php

class User extends CI_Controller{
    #list all user, baik developer, admin, dan client representatives.
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->view();
    }
    
}