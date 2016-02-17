<?php 

class Hello_model extends CI_Model {
    
    public function getProfile($name)
    {
        return array("fullName" => "Greg Hall", "age" => 34);
        
    }
    
}