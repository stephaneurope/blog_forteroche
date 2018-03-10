<?php
namespace Forteroche\Blog;
class Session{
public function __construct(){

session_start();
}
    
    public function setFlash($message,$type){
        $_SESSION['flash'] = array('message'=>$message,'type'=> $type);
    }
    public function flash(){
        if(isset($_SESSION['flash'])){
            
     echo $_SESSION['flash']['type'];
         echo $_SESSION['flash']['message']; 
            
        unset($_SESSION['flash']);
        }
    }
}