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
            $likes = $this->postmodel->getlikes();
            $comments = $this->postmodel->getcomments();
            //print_r($comments);
            $data = [
                'comments'=> $comments,
                'posts' => $posts,
                'likes' => $likes
            ];
            //print_r($data['likes']);

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
                        echo "dkhl";
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
            $likes = $this->postmodel->getlikes();
            //print_r($likes);

            $data = [
                'post' => $post,
                'user'=> $user,
                'likes' => $likes
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

        public function like(){
            if(isset($_POST['post_id']) && isset($_POST['user_id']) && isset($_POST['c']) && isset($_POST['like_nbr']) && islogged())
            {
                $data = [
                    'post_id'=> $_POST['post_id'],
                    'user_id' => $_POST['user_id'],
                    'c' => $_POST['c'],
                    'like_nbr' => $_POST['like_nbr']
                ];
                print_r($data);
                $this->postmodel->likes_nbr($data);
                if($data['c'] == 'fa fa-heart')
                {
                  
                  if($this->postmodel->deleteLike($data))
                  {

                  }
                  else
                  {
                    die('wa noud');
                  }
                }
                else if($data['c'] == 'fa fa-heart-o')
                {
                  if($this->postmodel->addLike($data))
                  {
                  }
                  else
                  {
                    die('wa noud');
                  }
                }
                   
            }
        }

        public function comment(){

            if(isset($_POST['c_post_id']) && isset($_POST['c_user_id']) && isset($_POST['content']) && strlen($_POST['content']) <= 255 && islogged())
            {
                $data = [
                    'post_id'=> $_POST['c_post_id'],
                    'user_id' => $_POST['c_user_id'],
                    'content' => $_POST['content'],
                ];
                //print_r($data);
                //die("kaka");
                $com = $this->usermodel->get_commenter($data['user_id']);
                $uid = $this->postmodel->getUserByPostId($data['post_id']);
                $d = $this->usermodel->get_dest($uid->user_id);
                if($this->postmodel->addComment($data) && $d->notif == 1)
                {
                  
                    //$this->c_send_email($com, $d);
                }
            }
        }
    }