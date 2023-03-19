<div class="dlabnav">
  <div class="dlabnav-scroll">
    <ul class="metismenu" id="menu">
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
          <li><a href="position.php">Сотрудники</a>

      </li>
    </ul>
  </div>
</div>