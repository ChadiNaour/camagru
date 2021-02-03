  
<?php
    require_once CAMAGRU_ROOT . '/Views/inc/header.php';
    require_once CAMAGRU_ROOT . '/Views/inc/nav.php';
?>
<div class="add-container">
    <div id="upper-card" class="card card-body shadow p-3 mb-3 bg-white  rounded text-center" id="cam">
        <div id="image-canvas-container" class="d-flex flex-row">
            <div class="camera bg-light  shadow" id="vi">
                <video class="w-100 h-100" id="video" autoplay></video>
            </div>
            <div class="image bg-light shadow">
                <canvas  id="pic-canvas"></canvas>
            </div>
        </div>
        <div class="image-footer row d-flex justify-content-center">
            <div class="filters row d-flex justify-content-center">
                <div class="column rounded shadow mx-1">
                    <input class="d-none" type="radio" name="filter" id="mask" value="mask" onclick="choose_filter()">
		  			<label for="mask"><img src="../public/img/mask1.png" class="filter_img my-auto"></label>
                </div>
                <div class="column rounder shadow ">
                <input class="d-none" type="radio" name="filter" id="covid" value="covid" onclick="choose_filter()">
                    <label for="covid"><img src="../public/img/covid2.png" class="filter_img"></label>
                </div>
                <div class="column rounded shadow mx-1">
                    <input class="d-none" type="radio" name="filter" id="ball" value="ball" onclick="choose_filter()">
		  			<label for="ball"><img src="../public/img/heart.png" class="filter_img"></label>
                </div>
                <div class="column rounded shadow">
                    <input class="d-none" type="radio" name="filter" id="hat" value="hat" onclick="choose_filter()">
		  			<label for="hat" class="w-auto h-auto"><img src="../public/img/bird.png" class="filter_img"></label>
                </div>
            </div>
            <div class="buttons row  d-flex justify-content-center mx-auto">
                <input type="button" class="column btn btn-warning shadow w-auto h-auto mx-1" value="Take" id="take" onclick="enable()" disabled>
                <input type="button" class="column btn btn-success shadow w-auto h-auto mx-1" value="Save" id="save" onclick="saveImage()">
                <input type="button" class="column btn btn-danger shadow w-auto h-auto mx-1" value="Clear" id="clear">
                <input type="file" class="column form-control shadow w-auto h-auto mx-1" value="Upload" id="upload" accept="image/jpg, image/jpeg, image/png">
            </div>
        </div>
    </div>
    <div class="card card-body d-flex flex-row flex-wrap shadow p-3 bg-white  rounded text-center" id="thum">
        <?php $i = 0; foreach($data['posts'] as $post) : if ($i++ < 5) :
                if($post->userId == $_SESSION['user_id']): ?>
                    <div class="rounded flex-row">
                        <div class="mx-1">
                            <img class="rounded mb-2 shadow" style="height: 10vh;width:10vh; object-fit:fill;" src="<?php echo $post->content; ?>" alt="<?php echo $post->title; ?>">
                            <div class="w-100 h-auto">
                                <a href="<?php echo URL_ROOT; ?>/posts/del_post_cam/<?php echo $post->postId ?>"><input type="submit" value="Delete" name="delete" class=" btn btn-outline-danger shadow h-auto"></a>
                            </div>
                        </div>
                    </div>
            <?php endif;  endif; endforeach; ?>
    </div>
</div>

<?php require_once CAMAGRU_ROOT . '/Views/inc/footer.php'; ?>