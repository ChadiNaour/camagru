<?php require APPROOT . '/views/inc/header.php'?>
<?php flash('post_message'); ?>
<div class='row mb-3'>
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT ;?>/posts/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i> Add Post
        </a>
    </div>
</div>
<?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title">
            <?php echo $post->title ;?>
        </h4>
        <div class="bg-light p-2 mb-3">
            Written by <?php echo $post->name; ?> on <?php echo $post->posttime ?>
        </div>
        <p class="card-test"><?php echo $post->body;?></p>
        <a href="<?php echo URLROOT;?>/posts/show/<?php echo $post->postId;?>" class="btn btn-dark">More</a>
        <div class="card-footer">
            <?php
            $liked = false;
            foreach ($data['likes'] as $like) {
                if ($like->user_id == $_SESSION['user_id'] && $likes->post_id == $post->postId) {
                    $liked = true; ?>
                    <i class = "fa fa-heart"
                        data-post_id="<?php echo $post->postId; ?>" 
                        data-user_id="<?php echo $_SESSION['user_id']; ?>" 
                        data-like_nbr="<?php echo $post->likes_nbr;?>" 
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
                    data-like_nbr="<?php echo $post->likes_nbr;?>" 
                    data-user_id="<?php echo $_SESSION['user_id'];?>" 
                    onclick="like(event)" id="l_<?php echo $post->postId;?>"
                    name="li_<?php echo $post->postId;?>"> 
                </i>
            <?php }
            ?>
            <a id="li_nb_<?php echo $post->postId;?>" class="card-link text-muted"><?php echo $post->likes_nbr;?></a>
        </div>
    </div>   
<?php endforeach;?>
<?php require APPROOT . '/views/inc/footer.php'?>