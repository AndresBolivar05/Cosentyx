<?php


    // class db {
    //     protected $con;
    
    //     public function __construct(){
    
    //         try {
    //             $this->con = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'sosadi5_cosentyar' , 'sosadi5_cosentyar' , 'RM]QnSVE}Ego', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    //         }catch(PDOException $e) {
    //             echo "Connection Error: " . $e->getMessage();
    //         }
    //     }
    // }
    
    class db {
        protected $con;
    
        public function __construct(){
    
            try {
                $this->con = new PDO("mysql:host=" . 'localhost' . ";dbname=" . 'cosentyxapp' , 'root' , '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            }catch(PDOException $e) {
                echo "Connection Error: " . $e->getMessage();
            }
        }
    }
?>
