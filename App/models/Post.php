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

        public function addpost($data)
        {
            
            $this->db->query('INSERT INTO posts (title, user_id, body) VALUES (:title, :user_id, :body)');
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':body', $data['body']);
            
            
            //execute
            if($this->db->execute())
            {
                echo "dkhl";
                return true;
            }
            else
                return false;
        }

        public function editpost($data)
        {
            $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);

            //execute
            if($this->db->execute())
                return true;
            else
                return false;
        }

        public function getpostbyid($id)
        {
            $this->db->query('SELECT * FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        public function deletepost($id)
        {
            $this->db->query('DELETE FROM posts WHERE id = :id');
            $this->db->bind(':id', $id);

            //execute
            if($this->db->execute())
                return true;
            else
                return false;

        }

        public function getlikes(){
            $this->db->query('SELECT * FROM likes');
            $result = $this->db->resset();
            return ($result);
        }

        public function addLike($data)
        {
            $this->db->query('INSERT INTO likes (user_id, post_id) VALUES (:user_id, :post_id)');
            $this->db->bind(':user_id',$data['user_id']);
            $this->db->bind(':post_id',$data['post_id']);
    
            if($this->db->execute())
            {
                return true;
            } else
                return false;
        }
}