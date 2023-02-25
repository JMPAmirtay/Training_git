<?php 
  // Подключение к базе данных
  require_once 'config/connect.php';
  $faculty_page = $_GET['id'];
  $facultyinfo_id = $_GET['facultyinfo_id'];
  $bd = $_GET['bd'];

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Dompet : Payment Admin Template" />
	<meta property="og:title" content="Dompet : Payment Admin Template" />
	<meta property="og:description" content="Dompet : Payment Admin Template" />
	<meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Dompet : Payment Admin Template</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />
	
	<link href="./vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link rel="stylesheet" href="./vendor/nouislider/nouislider.min.css">
	<!-- Style css -->
    <link href="./css/style.css" rel="stylesheet">
	
</head>
<body>

	    <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                О факультете 
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Найти...">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
							</li>
                            <li class="nav-item">
								<a href="javascript:void(0);" class="btn btn-primary d-sm-inline-block d-none">Добавить</a>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

	    <!--**********************************
            Sidebar start
        ***********************************-->
        <?php
			require_once("sidebar.php")
		?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
			<div class="container-fluid">
					<div class="row">
						<div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="vendorfaculty/update.php" method="post">
                                        <?php
                                          $faculty = mysqli_query($connect, "SELECT * FROM `$bd` WHERE `id` = '$faculty_page'");
                                          $faculty = mysqli_fetch_assoc($faculty);

                                        ?>
                                        <input type="hidden" name="bd" value="<?= $bd?>">  
                                    	<input type="hidden" name="facultyinfo_id" value="<?= $facultyinfo_id?>">
                                        <input type="hidden" name="faculty_page" value="<?= $faculty_page?>">
                                        <div class="mb-3 row">
                                        	<label for="name">Заголовок:</label>
                                            <textarea class="form-control" rows="4" id="name" name="name"><?= $faculty['name']?></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                        	<label for="text">Текст:</label>
                                            <textarea class="form-control" rows="4" id="text" name="text"></textarea>
                                        </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Редактировать</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                      </div>
				</div>
			</div>
		</div>

    <!--**********************************
        Scripts
    ***********************************-->


    <!-- Скрипт для растягивания textarea -->
    	<script>
			var tx = document.getElementsByTagName('textarea');//РАСТЯГИВАЕМ_textarea
			for (var i = 0; i < tx.length; i++) {
			tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');
			tx[i].addEventListener("input", OnInput, false);
			}

			function OnInput() {
			this.style.height = 'auto';
			this.style.height = (this.scrollHeight) + 'px';//console.log(this.scrollHeight);
			}
		</script>

    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="./vendor/apexchart/apexchart.js"></script>
	<script src="./vendor/nouislider/nouislider.min.js"></script>
	<script src="./vendor/wnumb/wNumb.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="./js/dashboard/dashboard-1.js"></script>

    <script src="./js/custom.min.js"></script>
	<script src="./js/dlabnav-init.js"></script>
	
    
	
</body>
</html>
