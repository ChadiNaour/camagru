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
            $this->usermodel = $this->model('User');
            
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

        public function add()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                //sanitize post array
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);


                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                //validate data
                if (empty($data['title']))
                {
                    $data['title_err'] = 'Please enter title';
                }
                if (empty($data['body']))
                {
                    $data['body_err'] = 'Please enter body text';
                }

                //make sure no errors
                if (empty($data['title_err']) && empty($data['body_err']))
                {
                    //validated
                    if ($this->postmodel->addpost($data))
                    {
                        flash('post_message', 'Post Added');
                        redirect('posts');
                    }
                    else
                    {
                        die('tkhawr');
                    }
                    
                }
                else
                    $this->view('Posts/add', $data);
            }
            else
            {
                $data = [
                    'title' => '',
                    'body' => ''
                ];

                $this->view('Posts/add', $data);
            }
        }

        public function edit($id)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                //sanitize post array
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);


                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'body_err' => ''
                ];

                //validate data
                if (empty($data['title']))
                {
                    $data['title_err'] = 'Please enter title';
                }
                if (empty($data['body']))
                {
                    $data['body_err'] = 'Please enter body text';
                }

                //make sure no errors
                if (empty($data['title_err']) && empty($data['body_err']))
                {
                    //validated
                    if ($this->postmodel->editpost($data))
                    {
                        flash('post_message', 'Post Edited');
                        redirect('posts');
                    }
                    else
                    {
                        die('tkhawr');
                    }
                    
                }
                else
                    $this->view('Posts/add', $data);
            }
            else
            {
                //get exinsting post
                $post = $this->postmodel->getpostbyid($id);
                //check for owner
                if ($post->user_id != $_SESSION['user_id'])
                    redirect('posts');

                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body
                ];

                $this->view('Posts/edit', $data);
            }
        }


        public function show($id)
        {
            $post = $this->postmodel->getpostbyid($id);
            $user = $this->usermodel->getuserbyid($post->user_id);

            $data = [
                'post' => $post,
                'user'=> $user
            ];
            $this->view('posts/show', $data);
        }

        public function delete($id)
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                //get exinsting post
                $post = $this->postmodel->getpostbyid($id);
                //check for owner
                if ($post->user_id != $_SESSION['user_id'])
                    redirect('posts');
                if ($this->postmodel->deletepost($id))
                {
                    flash('post_message', 'Post Deleted');
                    redirect('posts');
                }
                else
                    die('tkhawr');
            }
            else
            {
                redirect('posts');
            }
        }
    }