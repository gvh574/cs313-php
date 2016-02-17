<?php 

class Hello extends CI_Controller
    
{
    public function one($name)
    {
        $this->load->model("hello_model");
        
        $profile = $this->hello_model->getProfile("Greg");
            
        $this->load->view('header');
        
        $data = array("name" => $name);
        $data['profile'] = $profile;
        $this->load->view('one', $data);
    }
    
}

?>