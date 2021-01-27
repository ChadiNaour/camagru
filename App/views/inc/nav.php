<!-- <script>
function showd()
{
  document.getElementById("navbar").className = "navbar navbar-light .text-light bg-danger";
}

function hided()
{
  document.getElementById("navbar").className = "navbar navbar-light";
}
</script> -->
<nav id="navbar" class="navbar navbar-light" style="background-color: white;" onmouseleave="hided()" onmouseenter="showd()">
        <a class="navbar-brand mx-3" href="<?php echo URL_ROOT ?>/posts"><i class="fa fa-instagram" aria-hidden="true"></i>Camagru</a>
           <!-- <button id="btn" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapseNavbar" aria-controls="collapseNavbar" aria-expanded="false" aria-label="Toggle navigation"> -->
          <!-- <span class="navbar-toggler-icon"></span> -->
          </button>
      <!-- <div class="collapse navbar-collapse" id="collapseNavbar"> -->
      <!-- <div class="navbar-nav ml-auto" style="background-color:red;"> -->
        <?php if (isset($_SESSION['user_id'])) : ?>
          <div class="menu col-4 d-flex justify-content-end align-items-center w-25 h-auto">
            <a href="<?php echo URL_ROOT ?>/users/profile"><img class="profile-btn profile border border-dark mx-3" src="<?php echo $_SESSION['user_img'] ?>" alt="profile"></a>
            <!-- <div class="list-toggle" style="background-color:blue;"><img class="list-btn profile border border-dark mx-3" src="<?php echo $_SESSION['user_img'] ?>" alt="profile"></a></div> -->
            <a href="<?php echo URL_ROOT ?>/posts/add"><i class="fa fa-camera mt-1" style="font-size:26px; color:#555;"></i></a>
            <a class="btn btn-sm mx-1" href="<?php echo URL_ROOT ?>/users/logout" ><img class="out-btn" src="https://www.flaticon.com/svg/static/icons/svg/1250/1250678.svg" ></a>
          </div>
        <?php else : ?>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="btn btn-sm btn-outline-secondary mx-2" href="<?php echo URL_ROOT ?>/users/login">Log in</a>
          <a class="btn btn-sm btn-outline-secondary" href="<?php echo URL_ROOT ?>/users/signup">Sign up</a>
        </div>
        <?php endif; ?>
    </div>
</nav>
  <!-- <hr style="position:relative; top: -30px;"> -->
    <!-- <div class="liste rounded shadow">
 <ul>
        <li><a class="btn btn-sm" href="<?php echo URL_ROOT ?>/users/profile"><img class="list-profile-btn profile border border-dark" src="<?php echo $_SESSION['user_img'] ?>" alt="profile"> Profile</a></li>
        <li><a class="btn btn-sm" href="<?php echo URL_ROOT ?>/posts/add"><img class="list-cam-btn" src="../public/img/camera.png"> Camera</a></li>
        <li><a class="btn btn-sm" href="<?php echo URL_ROOT ?>/users/logout" ><img class="out-btn" src="https://www.flaticon.com/svg/static/icons/svg/1250/1250678.svg"> Log out</a></li>
      </ul> -->
  <!-- </div>
  </div>
  </div>  -->
