<?php
class User extends CI_controller{
    function index(){
        $this->load->model('Usermodel');
        $users=$this->Usermodel->all();
        $data=array();
        $data['users']=$users;
        $this->load->view('List',$data);
    }
    function create(){
        $this->load->model('Usermodel');

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('Email','Email','required|valid_email');
        
     if($this->form_validation->run()==false){
        $this->load->view('create');


     }
       else{
           //save user to database
           $Formarray=array();
           $Formarray['name']=$this->input->post('name');
           $Formarray['email']=$this->input->post('Email');
           $Formarray['created_at']=date('y-m-d');
           $this->Usermodel->create($Formarray);
           $this->session->set_flashdata('success','record added successfully');
           redirect(base_url().'index.php/user/index');



       }



    }
    function edit($userid)
    {   $this->load->model('UserModel');
        $user=$this->UserModel->getUser($userid);
        $data=array();
        $data['user']=$user;
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('Email','Email','required|valid_email');
        if($this->form_validation->run()==false){
            $this->load->view('edit',$data);
        }
        else{
        //update record
        $formArray=array();
        $formArray['name']=$this->input->post('name');
        $formArray['email']=$this->input->post('Email');

        $this->UserModel->UpdateUser($userid,$formArray);
        $this->session->set_flashdata('success','record successfulyy updated');
        redirect(base_url().'index.php/user/index');

        }
    }

        function de($userid){
            $this->load->model('UserModel');
            $user=$this->UserModel->getUser($userid);
            if(empty($user)){
                $this->session->set_flashdata('failure','record not found updated');
        redirect(base_url().'index.php/user/index');

            }
            $this->UserModel->deleteUser($userid);
            $this->session->set_flashdata('success','delete  successfully');
        redirect(base_url().'index.php/user/index');

        }
    
 
    //new 
    
    
}

?>