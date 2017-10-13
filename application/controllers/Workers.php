<?php
/**
 * Created by PhpStorm.
 * User: FRANCONET
 * Date: 5/8/2017
 * Time: 2:40 PM
 */
class Workers extends CI_Controller{

    public $user_id;
    public $wholikes;

    public function __construct(){
        parent::__construct();
        $this->load->model('userModel');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->user_id = $this->session->userdata('user_id'); //@todo put real user id in session
        $this->wholikes;


    }

    public function headers(){

        $data = array();
        $data['email']=$this->session->email;
        $data['name']=$this->session->name;
        $data["title"] = "My Work Box | Find Best Artisans by their portfolios";
        $this->load->view('partial/header', $data);
    }

    public function footer(){
        $data = array();
        $this->load->view('partial/footer', $data);
    }

    public  function index(){
        //$this->headers();
        if($this->session->has_userdata('logged_in')) {
            $data = array();

            $data['userId'] = $this->session->user_id;

            $id = $this->uri->segment(3);
            $delimage = $this->userModel->deleteImage($id);
            if (isset($id)) {

                $data['msg'] = '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="text-center">Image Deleted!</h4>
                </div>';
            }

            $user_details = $this->userModel->userDetails($this->session->userdata('user_id'));

            $data['porInfo'] = $this->userModel->Show_User_Portfolio($this->session->userdata('user_id'));
            $portshow = $this->userModel->Show_User_Portfolio($this->session->userdata('user_id'));


            foreach ($user_details as $user) {

                $data['user'] = $user['Username'];
                $data['fullname'] = $user['Name'];
                $data['gender'] = $user['Gender'];
                $data['loco'] = $user['Location'];
                $data['phone'] = $user['Mobile'];
                $data['mail'] = $user['Email'];
                $data['reputation'] = $user['ReputationStatus'];
                $data['profileview'] = $user['ProfileViewCount'];
                $data['profileimage'] = $user['Image'];

            }

            foreach ($portshow as $portview) {
                $album = $portview['Id'];

            }

            $like = $this->userModel->get_likes($album);
            $data['likes'] = $this->userModel->get_likes($album);

            foreach ($like as $likers) {
                $this->wholikes = $likers['Likes'];
            }

            //@$this->upload();
            $this->load->view('pages/ui', $data);
            //$this->footer();
        }
        else
            redirect('Home/','refresh');

    }

    //Upload Profile Image
    public function profileimage(){
        $data = array();


        $user_details = $this->userModel->userDetails($this->session->userdata('user_id'));

        foreach($user_details as $user){

            $data['user'] = $user['Username'];
            $data['fullname'] = $user['Name'];
            $data['gender'] = $user['Gender'];
            $data['loco'] = $user['Location'];
            $data['phone'] = $user['Mobile'];
            $data['mail'] = $user['Email'];
            $data['reputation'] = $user['ReputationStatus'];
            $data['profileview'] = $user['ProfileViewCount'];
            $data['profileimage'] = $user['Image'];

        }

        $this->load->view('pages/profileimage', $data);
    }

    //Delete image
    public function delImage(){
        $id = $this->uri->segment(3);
        $delimage = $this->userModel->deleteImage($id);
    }

    //Like portfolio
    public function savelikes()
    {
        $table = 'reaction';
        $ipaddress = $_SERVER['REMOTE_ADDR'];
        $albulmid = $this->input->post('Storyid');

        $values = array(
            'UserId' => $this->user_id,
            'AlbumId' => $albulmid,
            'IpAddress' => $ipaddress,
            'Likes' => 1
        );

        $this->userModel->Save_like($table, $values);

    }




    public  function artisan(){
        $this->headers();
        $data = array();

        $this->load->view('pages/ui', $data);
        $this->footer();

    }

   public function upload(){

       if(isset($_FILES['images'])){

           $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
           $temp = explode(".", $_FILES["images"]["name"]);
           $extension = end($temp);
           if ((($_FILES["images"]["type"] == "image/gif")
                   || ($_FILES["images"]["type"] == "image/jpeg")
                   || ($_FILES["images"]["type"] == "image/jpg")
                   || ($_FILES["images"]["type"] == "image/pjpeg")
                   || ($_FILES["images"]["type"] == "image/x-png")
                   || ($_FILES["images"]["type"] == "image/png"))
//&& ($_FILES["file"]["size"] < 200000)
               && in_array($extension, $allowedExts))
           {
               if ($_FILES["images"]["error"] > 0)
               {
                   $message = "Return Code: " . $_FILES["images"]["error"] . "<br>";
               }
               else
               {


                   move_uploaded_file($_FILES["images"]["tmp_name"],
                       "assets/uploads/portfolio/" . $_FILES["images"]["name"]);
                   // Save the uploaded passport information to the database
                   $location = (isset($_POST['images'])) ? trim($_POST['images']) : '';
                   $location="assets/uploads/portfolio/" . $_FILES["images"]["name"];
                   $user_ids = $this->session->userdata('user_id');
                   $dateTime = new DateTime();
                   $time = $dateTime->format("Y-m-d H:i:s");
                   $abulm_id = mt_rand(10, 100);
                   $_SESSION['uniqueabulm'] = $abulm_id;
                   $abulmUni = $_SESSION['uniqueabulm'];

                   $this->userModel->UploadPort($user_ids, $abulmUni, $location, $time);







                   $message = "<script type=\"text/javascript\">alert('Product Upload, was successful')</script>";





               }
           }

           else
           {
               echo "<span class=\"alert-danger \">" . "Invalid file...Check the picture size or type.. Passport Should not be more than 20kb" . "</span>";
           }


       }




    }

    public function proupload(){

        if(isset($_FILES['proimages'])) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
            $temp = explode(".", $_FILES["proimages"]["name"]);
            $extension = end($temp);
            if ((($_FILES["proimages"]["type"] == "image/gif")
                    || ($_FILES["proimages"]["type"] == "image/jpeg")
                    || ($_FILES["proimages"]["type"] == "image/jpg")
                    || ($_FILES["proimages"]["type"] == "image/pjpeg")
                    || ($_FILES["proimages"]["type"] == "image/x-png")
                    || ($_FILES["proimages"]["type"] == "image/png"))
//&& ($_FILES["file"]["size"] < 200000)
                && in_array($extension, $allowedExts)
            ) {
                if ($_FILES["proimages"]["error"] > 0) {
                    $message = "Return Code: " . $_FILES["proimages"]["error"] . "<br>";
                } else {


                    move_uploaded_file($_FILES["proimages"]["tmp_name"],
                        "assets/uploads/profile/" . $_FILES["proimages"]["name"]);
                    // Save the uploaded passport information to the database
                    $location = (isset($_POST['proimages'])) ? trim($_POST['proimages']) : '';
                    $location = "assets/uploads/profile/" . $_FILES["proimages"]["name"];
                    $user_ids = $this->session->userdata('user_id');

                    $this->userModel->UploadProfile($user_ids, $location);


                    $message = "<script type=\"text/javascript\">alert('Product Upload, was successful')</script>";


                }
            } else {
                echo "<span class=\"alert-danger \">" . "Invalid file...Check the picture size or type.. Passport Should not be more than 20kb" . "</span>";
            }

        }
    }


    public function UI(){
        $this->load->view('pages/workers/home');
    }

    public function logout()
{
    $this->session->sess_destroy();
    header('location: http://localhost/myworkbox/index.php/Home');
}



}