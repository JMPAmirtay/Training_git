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
        <?php
			require_once("sidebar.php")
		?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->

        <?php 
        	$news = mysqli_query($connect, "SELECT * FROM `news`");
        	$news = mysqli_fetch_all($news);
         ?>

		<div class="content-body">
			<div class="container-fluid">
					<div class="row">
					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th><strong>Заголовок</strong></th>
                                                <th><strong>Дата</strong></th>
                                                <th><strong>Статус</strong></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php 
											$arr = [
												'января',
												'февраля',
												'марта',
												'апреля',
												'мая',
												'июня',
												'июля',
												'августа',
												'сентября',
												'октября',
												'ноября',
												'декабря'
											  ];
        									  foreach ($news as $arqument) {
        									      $id = $arqument[0];
        									      $title = $arqument[1];
        									      $description = $arqument[2];
												  $date = strtotime($arqument[4]);
												  $date = date("d", $date).' '.$arr[date("n", $date)-1].' '.date("Y", $date);
        									      $image = $arqument[6];
        									      $views = $arqument[9];
        									      $status = $arqument[11];
        									?>
                                            <tr>
                                                <td><?= $title?></td>
                                                <td><?= $date?></td>
                                                <td><span class="badge light 
                                                	<?php 
                                                	if ($status == "published") {
                                                		echo "badge-success";
                                                	} elseif ($status == "draft") {
                                                		echo "badge-warning";
                                                	} elseif ($status == "archived") {
                                                		echo "badge-danger";
                                                	} ?>
                                                	"><?= $status?></span></td>
                                                <td>
													<div class="dropdown">
														<button type="button" class="btn 
														<?php 
                                                			if ($status == "published") {
                                                				echo "btn-success";
                                                			} elseif ($status == "draft") {
                                                				echo "btn-warning";
                                                			} elseif ($status == "archived") {
                                                				echo "btn-danger";
                                                			} ?>
														light sharp" data-bs-toggle="dropdown">
															<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
														</button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="update_news.php?id=<?= $id ?>">Редактировать</a>
															<a class="dropdown-item" href="vendor_news/delete_news.php?id=<?= $id?>">Удалить</a>
														</div>
													</div>
												</td>
                                            </tr>
	                    					<?php
        									  }
        									?>
                                        </tbody>
                                    </table>
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
