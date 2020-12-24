<?php
    class Posts extends Controller
    {
        public function __construct()
        {
            if(!islogged())
            {
                redirect('users/login');
            }

            $this->postmodel = $this->model('Post');
            
        }
        public function index()
        {
            //get posts
            $posts = $this->postmodel->getposts();
            $data = [
                'posts' => $posts
            ];

            $this->view('Posts/index', $data);

        }

    }