<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_model extends CI_Model {

    /*
     * Get rows from the users table
     */
    /**
     * 
     */
    function getRows($username,$password){
    $query = $this->db->query("SELECT * FROM tb_login WHERE username='$username' AND password='$password'");
    if($query->num_rows() > 0){ //jika login sebagai dosen
        $data=$query->row_array();
        $this->session->set_userdata('masuk',TRUE);
        if($data['akses']=='3')
          { //Akses admin
        $response = new Siswa_model();
        $response->message = "Selamat datang ".$data['username'];
        $response->id = $data['id'];
        $response->username = $data['username'];
        die(json_encode($response));
 
                 } else { 
        $response = new Siswa_model();
        $response->success = 0;
        $response->message = "Username atau password salah";
        die(json_encode($response));
    }
    
    mysqli_close();
    }
}
function getAllMateri($username){
        $this->db->select('*');
        $this->db->from('tb_login');
        $this->db->where('username', $username);
        $a = $this->db->get()->row('id');
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->where('id', $a);
        $b = $this->db->get()->row('id_kelas');
        $this->db->select('*');
        $this->db->from('tb_materi');
        $this->db->where('id_kelas', $b);
        return $this->db->get();
    }
    function getAllTugas(){
        $this->db->select('*');
        $this->db->from('tb_tugas');
        $query = $this->db->get();
        return $query;
    }
    function getAllUjian(){
        $this->db->select('*');
        $this->db->from('tb_ujian');
        $query = $this->db->get();
        return $query;
    }
}


    // public function __construct() {
    //     parent::__construct();
        
    //     // Load the database library
    //     $this->load->database();
        
    //     $this->userTbl = 'tb_login';
    // }

    // /*
    //  * Get rows from the users table
    //  */
    // function getRows($params = array()){
    //     $this->db->select('*');
    //     $this->db->from($this->userTbl);
        
    //     //fetch data by conditions
    //     if(array_key_exists("conditions",$params)){
    //         foreach($params['conditions'] as $key => $value){
    //             $this->db->where($key,$value);
    //         }
    //     }
        
    //     if(array_key_exists("id",$params)){
    //         $this->db->where('id',$params['id']);
    //         $query = $this->db->get();
    //         $result = $query->row_array();
    //     }else{
    //         //set start and limit
    //         if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
    //             $this->db->limit($params['limit'],$params['start']);
    //         }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
    //             $this->db->limit($params['limit']);
    //         }
            
    //         if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
    //             $result = $this->db->count_all_results();    
    //         }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
    //             $query = $this->db->get();
    //             $result = ($query->num_rows() > 0)?$query->row_array():false;
    //         }else{
    //             $query = $this->db->get();
    //             $result = ($query->num_rows() > 0)?$query->result_array():false;
    //         }
    //     }

    //     //return fetched data
    //     return $result;
    // }
    
    // function getLogin($username,$password){
    //     $this->db->select('*');
    //     $this->db->where('username',$username);
    //     $this->db->where('password',$password);
    //     $this->db->where('akses','3');
    //     $check = $this->db->get('tb_login')->result_array();
    //     if($check){
    //         echo '1';
    //     }
    //     else{
    //         echo 'false';
    //     }
    // }

    

?>

