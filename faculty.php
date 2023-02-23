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
                                Факультеты
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Найти...">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
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
							<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Факультеты</a>
                                <ul aria-expanded="false">
                                <?php
                                    $facultys = mysqli_query($connect, "SELECT * FROM `faculty`");
                                    $facultys = mysqli_fetch_all($facultys);
                                    foreach($facultys as $faculty){
                                        $name = $faculty[1];
										$id = $faculty[0];
                                        echo "<li><a href= 'faculty.php?id=$id' >$name</a></li>";
                                      }
                            	?>
                                </ul>
						</ul>

                    </li>
                    </li>
                </ul>
			</div>
        </div>
        <!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
            <div class="container-fluid">
                <div class="row"><div class="row">
                    <div class="col-xl-6 col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form>
                                            <select class="default-select form-control wide mb-3">
                                            <?php
                                             $facultyinfo_id = $_GET['id'];
                                             $facultyinfo = mysqli_query($connect,"SELECT `name` FROM `faculty_main` WHERE `faculty_main`.`fk_faculty` ='$facultyinfo_id'" );
                                             $facultyinfo= mysqli_fetch_all($facultyinfo);
                                             foreach($facultyinfo as $facultyinfo){
                                                $facultyinfo = current($facultyinfo);
                                                echo "<option>$facultyinfo</option>";
                                             };
                                             
                                            ?>
                                            </select>
                                            
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
