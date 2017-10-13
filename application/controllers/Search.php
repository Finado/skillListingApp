<?php
/**
 * Created by PhpStorm.
 * User: FRANCONET
 * Date: 7/13/2017
 * Time: 10:49 AM
 */
class Search extends  CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('userModel');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        //$this->user_id = $this->session->id; //@todo put real user id in session


    }

    public function header(){
        $data = array();
        $data["title"] = "My Work Box | Find Best Artisans by their portfolios";
        $this->load->view('pages/header',  $data);
    }

    public function footer(){
        $data = array();
        $data["title"] = "My Work Box | Find Best Artisans by their portfolios";
        $this->load->view('pages/footer',  $data);
    }


    public function index(){
        $data = array();
        $data["title"] = "My Work Box | Find Best Artisans by their portfolios";
        if(isset($_GET['search'])){
            $search  = $_GET['search'];
            $data["artisanFound"] = $this->userModel->getArtisan($search);

        }

//        $artisanId = $this->uri->segment(3);
//        $data["artisan"] = $this->userModel->getArtisan($artisanId);

        $this->load->view('pages/searcher',  $data);
    }

    public function artisan(){
        $this->header();
        $data = array();
        $data["title"] = "My Work Box | Find Best Artisans by their portfolios";
        $artisanId = $this->uri->segment(3);
        if(isset($artisanId)){
            $user_details = $this->userModel->Users($artisanId);
        }

        foreach($user_details as $user){
            $data['id'] = $user['Id'];
            $data['user'] = $user['Username'];
            $data['fullname'] = $user['Name'];
            $data['gender'] = $user['Gender'];
            $data['loco'] = $user['Location'];
            $data['phone'] = $user['Mobile'];
            $data['mail'] = $user['Email'];
            $data['reputation'] = $user['ReputationStatus'];
            $data['profileview'] = $user['ProfileViewCount'];
            $data['profileimage'] = $user['Image'];
            $data['skills'] = $user['Skills'];

        };

        $data["artisanPort"] = $this->userModel->ViewPort($artisanId);

        //$this->load->view('pages/', $data);
        $this->load->view('pages/artisan2', $data);

        //$this->footer();
    }



}