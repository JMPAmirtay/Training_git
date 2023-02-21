<?php 
  // Подключение к базе данных
  require_once 'config/connect.php';
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
                                Новости 
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
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
					</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Редактировать</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="index.php">Новости</a></li>
							<li><a href="index-2.html">Факультеты</a></li>
						</ul>

                    </li>
                    </li>
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
			<div class="container-fluid">
					<div class="row">
						<?php 
        				  $news = mysqli_query($connect, "SELECT * FROM `news`");
        				  $news = mysqli_fetch_all($news);
        				  foreach ($news as $arqument) {
        				      $id = $arqument[0];
        				      $title = $arqument[1];
        				      $description = $arqument[2];
        				      $date = $arqument[4];
        				      $image = $arqument[6];
        				      $views = $arqument[9];
        				?>
						<div class="col-xl-6">
	                        <div class="card">
	                            <img class="card-img-top img-fluid" src="./img_archive/<?= $image ?>" alt="Card image cap">
	                            <div class="card-header">
	                                <h5 class="card-title"><?= $title ?></h5>
	                            </div>
	                            <div class="card-body">
	                                <p class="card-text"><?= $description ?></p>
	                            </div>
	                            <div class="card-footer d-sm-flex justify-content-between align-items-center">
                                	<div class="card-footer-link mb-4 mb-sm-0">
                                	    <p class="card-text text-dark d-inline"><?= $date?></p>
                                	</div>
	
                                	<a href="update_news.php?id=<?= $id ?>" class="btn btn-primary">Редактировать</a>
                            	</div>
	                        </div>
	                    </div>
	                    <?php
        				  }
        				?>
                      </div>
				</div>
			</div>
		</div>

    <!--**********************************
        Scripts
    ***********************************-->
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
