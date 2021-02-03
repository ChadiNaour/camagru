<?php
    require_once CAMAGRU_ROOT . '/Views/inc/header.php';
    require_once CAMAGRU_ROOT . '/Views/inc/nav.php';
?>
<div class="container mt-3">
    <?php foreach($data['posts'] as $post) : ?>
        <div class="post-container card card-body mb-3 shadow m-auto">
            <div class="d-flex justify-content-left  mb-2 mx-2">
                <img class="post-user  shadow my-auto" src="<?php echo $post->profile_img ?>" alt="profile">
                <h4 class="card-title mx-2 my-auto h-auto" style="font-size: 1.2rem;"><?php echo $post->username; ?></h4>
            </div>
            <div class="">
                <img class="post-img card-img-top" src="<?php echo $post->content; ?>" alt="<?php echo $post->title; ?>">
            </div>
            <div class="card-footer">
              <div class="row" style="height: auto; padding:1%;">
                <div class="col-sm">
                      <?php
                        $liked = false;
                        foreach ($data['likes'] as $like) {
                            if ($like->user_id == $_SESSION['user_id'] && $like->post_id == $post->postId) {
                                $liked = true; ?>
                                <i class = "fa fa-heart"
                                   data-post_id="<?php echo $post->postId; ?>" 
                                   data-user_id="<?php echo $_SESSION['user_id']; ?>" 
                                   data-like_nbr="<?php echo $post->like_nbr;?>" 
                                  onclick="like(event)"
                                  id="l_<?php echo $post->postId;?>"
                                  name="li_<?php echo $post->postId;?>">    
                                </i>
                                <?php
                            }
                        }
                        if ($liked === false) {?>
                            <i class = "fa fa-heart-o"  
                              data-post_id="<?php echo $post->postId;?>" 
                              data-like_nbr="<?php echo $post->like_nbr;?>" 
                              data-user_id="<?php echo $_SESSION['user_id'];?>" 
                              onclick="like(event)" id="l_<?php echo $post->postId;?>"
                              name="li_<?php echo $post->postId;?>"> 
                            </i>
                        <?php }
                        ?>
                      <a id="li_nb_<?php echo $post->postId;?>" class="card-link text-muted" style="text-decoration: none;"><?php echo $post->like_nbr;?></a>
                    </div>
                    <div class="col-sm">
                      <a><i class="fa fa-comment"
                          data-b-post_id="<?php echo $post->postId;?>"
                          onclick="showDiv(event)" 
                          id="s_<?php echo $post->postId;?>"
                          name="sh_<?php echo $post->postId;?>">
                          </i> Comments</a>
                    </div>
              </div>
                        <div class="input-group mb-3">
      
                          <input type="text" name="comment_<?php echo $post->postId;?>" class="form-control" placeholder="write a comment..." rows="1" style="resize:none"></input>
                          <div class="input-group-append">
                            <button id="button-add" onclick="comment(event)"
                              data-c-user_id="<?php echo $_SESSION['user_id'];?>"
                              data-c-post_id="<?php echo $post->postId;?>" class="btn btn-dark pull-right" type="button">Add</button>
                          </div>
                        </div>
                      <div id="block_<?php echo $post->postId;?>" style="display:block; margin:0px; padding:0p;">
                      <?php
                        if(is_array($data['comments']))
                        {
                          foreach($data['comments'] as $comment)
                          {
                            if($comment->post_id == $post->postId)
                            {
                            ?>
                                <div class="media-list" style=" padding:0px!important; magrin:0px!important; list-style-type:none;">
                                    <li class="media">                    
                                        <div class="media-body">
                                            <strong class="text-dark d-inline"><?php echo $comment->username;?></strong>
                                            <p style="magrin:0px; padding:0px; display:inline;" class="d-inline"><?php echo htmlspecialchars($comment->content);?></p>
                                            <?php if ($comment->userId == $_SESSION['user_id']): ?><a href="<?php echo URL_ROOT ?>/posts/delete_comments/<?php echo $comment->commentId ?>" class="" style="  position: relative; float: right;"><i class="fa fa-trash"></i></a><?php endif; ?>
                                        </div>
                                    </li>
                                </div>
                              <?php
                            }
                          }
                        }?>
                      <div class="create_date">
                        <p><?php echo $post->create_at; ?></p>
                    </div>
                    </div>
            </div>
        </div>
    <?php endforeach;  ?>
  </div>
  <div class="text-center">
  <ul class="pagination justify-content-center mb-">
    <?php 
    if(($data['currentPage']-1) > 0)
        echo '<li class="active"><a class="page-link" style="background-color:black; color:white;" href="' . URL_ROOT . '/posts?page='.($data['currentPage']-1).'"><</a></li>';
    else
        echo '<li class="active"><a class="page-link" style="background-color:black; color:white;"><</a></li>';

    for($i = 1; $i <= $data['totalPages']; $i++){
        if($i == $data['currentPage'])
            echo '<li class="active"><a class="page-link" style="background-color:black; color:white;">'.$i.'</a></li>';
        else
            echo '<li class="active"><a class="page-link" style="background-color:black; color:white;" href="' . URL_ROOT . '/posts?page='.$i.'">'.$i.'</a></li>';
    }
    if(($data['currentPage']+1) <= $data['totalPages'])
        echo '<li class="active"><a class="page-link" style="background-color:black; color:white;" href="' . URL_ROOT . '/posts?page='.($data['currentPage']+1).'">></a></li>';
    else
        echo '<li class="active""><a class="page-link" style="background-color:black; color:white;">></a></li>';

    ?>
  </ul>
</div>
<?php require_once CAMAGRU_ROOT . '/Views/inc/footer.php'; ?>