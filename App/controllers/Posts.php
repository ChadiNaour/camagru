<?php
    class Posts extends Controller
    {
        public function __construct()
        {
            if(!islogged())
            {
                redirect('users/login');
            }
            
        }
        public function index()
        {
            $data = [];

            $this->view('Posts/index');

        }

    }