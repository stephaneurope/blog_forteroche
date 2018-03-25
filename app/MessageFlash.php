<?php
    namespace Forteroche\Blog;
    class MessageFlash{
    public function __construct(){
    $status = session_status();
    if($status == PHP_SESSION_NONE){
        //There is no active session
        session_start();
    }

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