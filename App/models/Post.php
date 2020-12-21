<?php
    class Post
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

         public function getposts()
         {
             $this->db->query("SELECT * FROM posts");
             return $this->db->resset();
             //print_r($results);
         }
    }