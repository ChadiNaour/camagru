  
<?php
    require_once CAMAGRU_ROOT . '/Views/inc/header.php';
    require_once CAMAGRU_ROOT . '/Views/inc/nav.php';
?>
<div class="add-container">
    <div id="upper-card" class="card card-body shadow p-3 mb-3 bg-white  rounded text-center" id="cam">
        <div id="image-canvas-container" class="d-flex flex-row" style="border: solid 1px green;">
            <div class="camera bg-light  shadow" id="vi">
                <video class="w-100 h-100" id="video" autoplay></video>
            </div>
            <div class="image h-auto bg-light shadow" style="border: solid 1px;">
                <canvas  id="pic-canvas"></canvas>
            </div>
        </div>
        <div class="image-footer row h-auto" style="border: solid 1px;">
            <div class="filters row">
                <div class="column rounded shadow mx-1">
                    <input class="d-none" type="radio" name="filter" id="mask" value="mask" onclick="choose_filter()">
		  			<label for="mask"><img src="../public/img/mask.png" class="filter_img my-auto"></label>
                </div>
                <div class="column rounder shadow ">
                <input class="d-none" type="radio" name="filter" id="covid" value="covid" onclick="choose_filter()">
                    <label for="covid"><img src="../public/img/covid.png" class="filter_img"></label>
                </div>
                <div class="column rounded shadow mx-1">
                    <input class="d-none" type="radio" name="filter" id="ball" value="ball" onclick="choose_filter()">
		  			<label for="ball"><img src="../public/img/ball.png" class="filter_img"></label>
                </div>
                <div class="column rounded shadow">
                    <input class="d-none" type="radio" name="filter" id="hat" value="hat" onclick="choose_filter()">
		  			<label for="hat" class="w-auto h-auto"><img src="../public/img/hat.png" class="filter_img"></label>
                </div>
            </div>
            <div class="buttons row  d-flex justify-content-center my-auto">
                <input type="button" class="column btn btn-outline-info shadow w-auto h-auto mx-1" value="Take" id="take" onclick="enable()" disabled>
                <input type="button" class="column btn btn-outline-success shadow w-auto h-auto mx-1" value="Save" id="save" onclick="saveImage()">
                <input type="button" class="column btn btn-outline-danger shadow w-auto h-auto mx-1" value="Clear" id="clear">
                <input type="file" class="column form-control shadow w-auto h-auto mx-1" value="Upload" id="upload" accept="image/jpg, image/jpeg, image/png">
            </div>
        </div>
    </div>
    <div class="card card-body shadow p-3 bg-white  rounded text-center" id="thum">
    </div>
</div>

<?php require_once CAMAGRU_ROOT . '/Views/inc/footer.php'; ?>