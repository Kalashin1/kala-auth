<?php 
    
    class Person{
        public $name;
        public $username;
        public $email;
        public $password;
        public $uid;

        public function __construct($name, $username, $email, $password, $uid){
            try {
                $this->name = $name;
                $this->username = $username;
                $this->email = $email;
                $this->password = $password;
                $this->uid = $uid;

            } catch (\Throwable $th) {
                throw new Exception("Error Processing Request $th", 1);
                //throw $th;
            }
        }
    };

?>