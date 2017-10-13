<?php
/**
 * Created by PhpStorm.
 * User: FRANCONET
 * Date: 5/8/2017
 * Time: 2:40 PM
 */
class Home extends CI_Controller{

    public $user_id;

    public function __construct(){
        parent::__construct();
        $this->load->model('userModel', 'model_users');
        $this->load->helper('url_helper');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        //$this->user_id = $this->session->id; //@todo put real user id in session


    }

    public function headers(){

        $data = array();
        $data['email']=$this->session->email;
        $data['name']=$this->session->name;
        $data["title"] = "Payrote | Quick time, return of investment";
        $this->load->view('partial/header', $data);
    }

    public function footer(){
        $data = array();
        $data["title"] = "2017 Copyright &copy; | WorkBox.Com.Ng";
        $this->load->view('partial/footer', $data);
    }

    public function index(){

        $data = array();

        $data["title"] = "My Work Box | Find Best Artisans by their portfolios";

        if(isset($_GET['search'])){
            $search  = $_GET['search'];
            $data["artisanFound"] = $this->model_users->getArtisan($search);

            $this->load->view('pages/search', $data);

        }

        $artisanId = $this->uri->segment(3);
        $data["artisan"] = $this->model_users->getArtisan($artisanId);

        $this->load->view('pages/index', $data);
    }

    public function upload(){
        $this->load->view('pages/upload');
    }

    public function signup(){
        $this->load->view('pages/signup');
    }


    /* For Register and Login */

    public function register()
    {
        $validator = array('success' => false, 'messages' => array());

        $validate_data = array(
            array(
                'field' => 'usernames',
                'label' => 'Username',
                'rules' => 'required|is_unique[artisan.Username]'
            ),
            array(
                'field' => 'passwords',
                'label' => 'Password',
                'rules' => 'required|matches[confirmpassword]'
            ),
            array(
                'field' => 'confirmpassword',
                'label' => 'Confirm Password',
                'rules' => 'required'
            ),
            array(
                'field' => 'fullName',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'skills',
                'label' => 'Skills',
                'rules' => 'required'
            ),

            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|is_unique[artisan.Email]'
            ),
            array(
                'field' => 'contact',
                'label' => 'Mobile Number',
                'rules' => 'required|integer'
            )
        );

        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_message('is_unique', 'The {field} already exists');
        $this->form_validation->set_message('integer', 'The {field} must be number');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if($this->form_validation->run() === true) {

            //$this->SmsAlert($phone,$pass, $name);
            //$this->send_confirmation($name,$hash);

            $this->model_users->register();
            $name = $this->input->post('fullName');
            $email =  $this->input->post('email');
            $pin = mt_rand(19, 100);
            $this->send_confirmation($name, $pin);
            $this->SmsAlert($email, $name, $pin);

            $validator['success'] = true;
            $validator['messages'] = 'Signup Successfully, check your email for verification';
        }
        else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($validator);

    }

    public function login()
    {
        $validator = array('success' => false, 'messages' => array());

        $validate_data = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|callback_validate_username'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if($this->form_validation->run() === true) {

            $dateTime = new DateTime();
            $time = $dateTime->format("Y-m-d H:i:s");

            $login = $this->model_users->login($time);

            if($login) {

                $this->load->library('session');

                $newdata = array(
                    'user_id'  => $login,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($newdata);

                $validator['success'] = true;
                //$validator['messages'] = 'Loading..............';
                $validator['messages'] = 'Workers';
            }
            else {
                $validator['success'] = false;
                $validator['messages'] = 'Incorrect username/password combination';
            } // /else
        }
        else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($validator);

    }

    public function validate_username()
    {
        $username = $this->model_users->validate_username();

        if($username === true) {
            return true;
        }
        else {
            $this->form_validation->set_message('validate_username', 'The {field} does not exists');
            return false;
        }
    }



    public function update() {
        $validator = array('success' => false, 'messages' => array());

        $validate_data = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|callback_username_exists'
            ),
            array(
                'field' => 'fullName',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if($this->form_validation->run() === true) {
            $this->load->library('session');
            $userId = $this->session->userdata('user_id');

            $update = $this->model_users->update($userId);

            if($update) {

                $validator['success'] = true;
                $validator['messages'] = 'Successfully Updated';
            }
            else {
                $validator['success'] = false;
                $validator['messages'] = 'Incorrect username/password combination';
            } // /else
        }
        else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($validator);

    }

    public function username_exists()
    {
        $this->load->library('session');
        $userId = $this->session->userdata('user_id');

        $username_exists = $this->model_users->usernameExists($userId);

        if($username_exists === false) {
            return true;
        }
        else {
            $this->form_validation->set_message('username_exists', 'The {field} value already exists');
            return false;
        }

    }

    public function changepassword()
    {
        $validator = array('success' => false, 'messages' => array());

        $validate_data = array(
            array(
                'field' => 'currentPassword',
                'label' => 'Current Password',
                'rules' => 'required|callback_validCurrentPassword'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|matches[passwordAgain]'
            ),
            array(
                'field' => 'passwordAgain',
                'label' => 'Password Again',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if($this->form_validation->run() === true) {
            $this->load->library('session');
            $userId = $this->session->userdata('user_id');

            $changepassword = $this->model_users->changepassword($userId);

            if($changepassword) {
                $validator['success'] = true;
                $validator['messages'] = 'Successfully Updated';
            }
        }
        else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($validator);
    }

    public function validCurrentPassword()
    {
        $this->load->library('session');
        $userId = $this->session->userdata('user_id');

        $password_exists = $this->model_users->validCurrentPassword($userId);

        if($password_exists === true) {
            return true;
        }
        else {
            $this->form_validation->set_message('validCurrentPassword', 'The {field} value is invalid');
            return false;
        }

    }



    ///Phone and Email verification

    function send_confirmation($name,$hash){
        $this->load->library('email',  array('mailtype' => 'html'));  	//load email library
        $this->email->from('info@work.com.ng', 'WorkBox.Com.Ng'); //sender's email
        $address = $this->input->post(html_escape('email'));	//receiver's email
        $subject="WorkBox Email Verification";	//subject
        $data = $this->adminModel->get_hash_value($address);
        //$hash = $data['hash'];
        //$new_hash = $this->input->get($hash);
        $message= "<p>Thanks for signing up, $name! </p>

        Your account has been created. <br/>
        Here is your verification pin. <br/>
        ------------------------------------------------- <br/>
        Pin: . $hash .
        -------------------------------------------------<br/>

       <p> Please, use the verification pin to activate your account. Thanks</p>
       <pre> Note, you wouldn't be able to login without verifying your account</pre>";
        /*-----------email body ends-----------*/
        $this->email->to($address);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();


    }


    public function SmsAlert($sendto, $pass, $name){
        /*********************************************************************************
         * Sample code for sending SMS through HTTP API.
        Author: Ayodeji Ajala, iDevWorks Technologies Limited <deji@idevorks.com>
        Application granted only for SMSLive247 customers. ********************************************************************************/
        /* Variables with the values to be sent. */
        $owneremail="franconet34@gmail.com";
        $subacct="ONLINESMS";
        $subacctpwd="yes";
        $address = "you@me.com";	//receiver's email
        $password = "yes";
        //$name = "name";
        $dateTime = new DateTime();
        $time = $dateTime->format("Y-m-d H:i:s");
        $sendto=$sendto; /* destination number */
        $sender="WorkBox"; /* sender id */
        $message= "Dear $name Thanks for registration. Activate and start investing. Your Password is: $pass ";

        /* create the required URL */
        $url = "http://www.smslive247.com/http/index.aspx?"
            . "cmd=sendquickmsg"
            . "&owneremail=" . UrlEncode($owneremail)
            . "&subacct=" . UrlEncode($subacct)
            . "&subacctpwd=" . UrlEncode($subacctpwd)
            . "&sender=" . UrlEncode($sender)
            . "&sendto=" . UrlEncode($sendto)
            . "&message=" . UrlEncode($message);
        /* call the URL */
        if ($f = @fopen($url, "r"))
        {
            $answer = fgets($f, 255);
            if (substr($answer, 0, 1) == "+")
            {
                die("SMS to $sendto was successful: [$answer]");
            }
            else
            {
                die("an error has occurred: [$answer].");
            }
        }
        else
        {
            //echo "Error: URL could not be opened.";
        }

    }



    //Forgot password starts here
    public function forgot(){
        $validator = array('success' => false, 'messages' => array());

        $validate_data = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|callback_email_exists'
            ),

        );

        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if($this->form_validation->run() === true) {


                //$this->model_users->emailExists();

                /*$this->load->library('email',  array('mailtype' => 'html'));  	//load email library
                $this->email->from('info@work.com.ng', 'WorkBox.Com.Ng'); //sender's email
                $address = $this->input->post(html_escape('email'));	//receiver's email
                $subject="WorkBox Password Reset";	//subject
                //$data = $this->adminModel->get_hash_value($address);
                //$hash = $data['hash'];
                //$new_hash = $this->input->get($hash);
                $message= "<p>You requested to reset your password; follow below! </p>



       <p> The Link for resetpassword</p>
       <pre> Note, Ignore if this mail was by mistake or wrongly initiated</pre>";
                /*-----------email body ends-----------
                $this->email->to($address);
                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->send(); */




                $validator['success'] = true;
                $validator['messages'] = 'Password reset link has been sent to your email';

        }
        else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($validator);


    }


    public function email_exists()
    {

        $email = $this->input->post('email');

        $email_exists = $this->model_users->emailExists($email);

        if($email_exists === true) {
            return true;
        }
        else {
            $this->form_validation->set_message('email_exists', 'The {field} does not exists');
            return false;
        }
    }

    //forgot password ends here


}