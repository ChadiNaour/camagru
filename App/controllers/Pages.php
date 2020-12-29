<?php
    class Pages extends Controller
    {
        public function __construct()
        {
        }

        public function index()
        {
            if (islogged())
            {
                redirect('posts');
            }
            $data = [
                'title' => 'camagru'
            ];
            $this->view('pages/index', $data);
            
        }
    }