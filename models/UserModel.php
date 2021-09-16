<?php
class UserModel extends CI_Model
{
    function create($formArray){
        $this->db->insert('users',$formArray);

    }
    function all(){
     return $users=$this->db->get('users')->result_array();

    }
    
    function getUser($userid){
       $this->db->where('user_id',$userid);

       return  $user=$this->db->get('users')->row_array();
    }
    function UpdateUser($userid,$formArray){
        $this->db->where('user_id',$userid);
        $this->db->update('users',$formArray);
    }
    function deleteUser($userid){
        $this->db->where('user_id',$userid);
        $this->db->delete('users');

    }
}
