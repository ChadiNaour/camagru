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
            $this->db->query('SELECT *,
                    posts.id as postId,
                    users.id as userId,
                    posts.creat_time as posttime,
                    users.creat_time as usertime
                    FROM posts
                    INNER JOIN users
                    ON posts.user_id = users.id
                    ORDER BY posts.creat_time DESC');
            $res = $this->db->resset();
            return $res;
        }

    }