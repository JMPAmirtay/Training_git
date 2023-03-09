<div class="dlabnav">
  <div class="dlabnav-scroll">
    <ul class="metismenu" id="menu">
      <li class="dropdown header-profile">
        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
          <img src="images/profile/pic1.jpg" width="20" alt="" />
          <div class="header-info ms-3">
            <span class="font-w600 ">Hi,<b><?= $_SESSION['user']['username'] ?></b></span>
            <small class="text-end font-w400"><?= $_SESSION['user']['email'] ?></small>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          <a href="vendor_register/logout.php" class="dropdown-item ai-icon">
            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
              <polyline points="16 17 21 12 16 7"></polyline>
              <line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>
            <span class="ms-2">Logout </span>
          </a>
        </div>
      </li>
      <li>
        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
          <i class="flaticon-025-dashboard"></i>
          <span class="nav-text">Редактировать</span>
        </a>
        <ul aria-expanded="false">
          <li><a href="index.php">Новости</a></li>
          <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Факультеты</a>
            <ul aria-expanded="false">
              <?php
              $facultys = mysqli_query($connect, "SELECT * FROM `faculty`");
              $facultys = mysqli_fetch_all($facultys);
              foreach ($facultys as $faculty) {
                $name = $faculty[1];
                $id = $faculty[0];
                echo "<li><a href= 'faculty.php?id=$id' >$name</a></li>";
              }
              ?>
            </ul>
          </li>
          <li><a href="nbrk.php">Курс Валют</a></li>
      </li>
    </ul>
  </div>
</div>