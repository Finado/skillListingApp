<?php
/**
 * Created by PhpStorm.
 * User: FRANCONET
 * Date: 5/23/2017
 * Time: 11:55 PM
 */
class UserModel extends CI_Model{

    public function __construct(){
        $this->load->database();
    }


    public function UploadPort($user_ids, $abulm_id, $location, $time){

        $values = array(
            'UserId' => $user_ids,
            'AlbumId' => $abulm_id,
            'ImagePath' => $location,
            'DateUploaded' => $time
        );


        $this->db->insert('portfolio', $values);
    }

    public function Show_User_Portfolio($userId){
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->where('UserId', $userId);
        //$this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();
    }

    //Save and Get Like for porfolio
    public function Save_like($table, $values){
        $this->db->insert($table, $values);
    }


    public function get_likes($album){

        $this->db->select('*');
        $this->db->from('reaction');
        $this->db->where('linker', $album);
        $query= $this->db->get();
        return $query->result_array();

    }

    /* User registration and Login */

    public function register()
    {

        $salt = $this->salt();

        $password = $this->makePassword($this->input->post('passwords'), $salt);

        $dateTime = new DateTime();
        $time = $dateTime->format("Y-m-d H:i:s");

        $insert_data = array(
            'Username' => $this->input->post('usernames'),
            'Password' => $password,
            'salt' => $salt,
            'Name' => $this->input->post('fullName'),
            'Mobile' => $this->input->post('contact'),
            'Email' => $this->input->post('email'),
            'SignUpDate' => $time,
            'Skills' => $this->input->post('skills')
        );

        $this->db->insert('artisan', $insert_data);
    }

    public function salt()
    {
        return password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
    }

    public function makePassword($password = null, $salt = null)
    {
        if($password && $salt) {
            return hash('sha256', $password.$salt);
        }
    }

    public function validate_username()
    {
        $username = $this->input->post('username');
        $sql = "SELECT * FROM artisan WHERE Username = ?";
        $query = $this->db->query($sql, array($username));
        return ($query->num_rows() == 1) ? true: false;
    }


    public function fetchDataByUsername($username = null)
    {
        if($username) {
            $sql = "SELECT salt FROM artisan WHERE Username = ?";
            $query = $this->db->query($sql, array($username));
            $result = $query->row_array();

            return ($query->num_rows() == 1) ? $result : false;
            return $result;
        }
    }

    public function login($loginTime)
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $userData = $this->fetchDataByUsername($username);

        if($userData) {

            $sql2 = "UPDATE artisan SET LastLogin='$loginTime' WHERE Username = ? ";
            $query2 = $this->db->query($sql2, array($username));

            $password = $this->makePassword($password, $userData['salt']);

            $sql = "SELECT * FROM artisan WHERE Username = ? AND Password = ?";
            $query = $this->db->query($sql, array($username, $password));
            $result = $query->row_array();

            return ( $query->num_rows() == 1 ) ? $result['Id'] : false;
        } // /if
        else {
            return false;
        } // /else
    }

    public function fetchUserData($userId = null)
    {
        if($userId) {
            $sql = "SELECT * FROM artisan WHERE Id = ?";
            $query = $this->db->query($sql, array($userId));
            $result = $query->row_array();

            return $result;
        }
    }

    public function userDetails($userId){
        $this->db->select('*');
        $this->db->from('artisan');
        $this->db->where('Id', $userId);
        $query= $this->db->get();
        return $query->result_array();

    }

    public function usernameExists($userId = null)
    {
        if($userId) {
            $sql = "SELECT * FROM artisan WHERE Username = ? AND id != ?";
            $query = $this->db->query($sql, array($this->input->post('username'), $userId));
            return ($query->num_rows() >= 1) ? true : false;
        }
    }

    public function getUserDataById($userId) {
        $sql = "SELECT * FROM artisan WHERE id = ?";
        $query = $this->db->query($sql, array($userId));
        return $query->row_array();
    }

    public function validCurrentPassword($userId = null)
    {
        if($userId) {

            $getUserDataById = $this->getUserDataById($userId);
            $salt = $getUserDataById['salt'];
            $currentPassword = $this->makePassword($this->input->post('currentPassword'), $salt);

            return ($currentPassword == $getUserDataById['password']) ? true : false;
        }
    }

    public function update($userId)
    {
        if($userId) {
            $update_data = array(
                'Username' => $this->input->post('username'),
                'name' => $this->input->post('fullName'),
                'contact' => $this->input->post('contact'),
            );

            $this->db->where('id', $userId);
            $query = $this->db->update('artisan', $update_data);

            return ($query === true) ? true : false;
        }
    }

    public function changepassword($userId)
    {
        $salt = $this->salt();

        $password = $this->makePassword($this->input->post('password'), $salt);

        $update_data = array(
            'Password' => $password,
            'salt' => $salt
        );

        $this->db->where('id', $userId);
        $query = $this->db->update('artisan', $update_data);
        return ($query === true) ? true : false;
    }

    public  function UploadProfile($userIdss, $proImage){
        $sql2 = "UPDATE artisan SET Image='$proImage' WHERE Id = ? ";
        $query2 = $this->db->query($sql2, array($userIdss));

    }

    public function deleteImage($imageId){
        $this->db->where('Id', $imageId);
        $this->db->delete('portfolio');
    }

    //Checking email before sending mail for forgot password

    public function emailExists()
    {
        $email = $this->input->post('email');
        $sql = "SELECT * FROM artisan WHERE Email = ?";
        $query = $this->db->query($sql, array($email));
        return ($query->num_rows() == 1) ? true: false;
    }


    //Everything Artisan Search is below

    public function getArtisan($searchArtisan) {
        if(empty($searchArtisan))
            return array();

        $result = $this->db->like('Name', $searchArtisan)
            ->or_like('Username', $searchArtisan)
            ->or_like('Email', $searchArtisan)
            ->or_like('Location', $searchArtisan)
            ->or_like('Mobile', $searchArtisan)
            ->or_like('Skills', $searchArtisan)
            ->get('artisan');

        return $result->result();
    }

    public function Users($userIdentity){

        $this->db->select('*');
        $this->db->from('artisan');
        $this->db->where('Id', $userIdentity);
        $query= $this->db->get();
        return $query->result_array();


    }

    public  function  ViewPort($userIdentity){
        $this->db->select('*');
        $this->db->from('portfolio');
        $this->db->where('UserId', $userIdentity);
        //$this->db->order_by('Id', "DESC");
        $query= $this->db->get();
        return $query->result_array();

    }




}