<?php
    class User
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        //register user
        public function register($data)
        {
            $this->db->query('INSERT INTO users (name, email, password ) VALUES (:name, :email, :password)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            //execute
            if($this->db->execute())
                return true;
            else
                return false;

        }

        //login user
        public function login($email, $password)
        {
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashedpass = $row->password;
            if (password_verify($password, $hashedpass))
                return $row;
            else
                return false;
        }
        
        public function finduserbyemail($email)
        {
            //echo "dkhl";
             $this->db->query("SELECT * FROM users WHERE email = :email");
             $this->db->bind(':email', $email);
             $row = $this->db->single();
             //echo $row;

             if ($this->db->rowcount() > 0)
                return (true);
            else
                return(false);
             //print_r($results);
        }

        public function getuserbyid($id)
        {
            //echo "dkhl";
             $this->db->query("SELECT * FROM users WHERE id = :id");
             $this->db->bind(':id', $id);
             $row = $this->db->single();
             return $row;
        }
    }