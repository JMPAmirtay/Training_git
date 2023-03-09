<?php
// Подключение к базе данных
require_once 'config/connect.php';
session_start();
if (!$_SESSION['user']) {
    header('Location: login_admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- PAGE TITLE HERE -->
	<title>Admin Template</title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png" />

	<link href="./vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
	<link rel="stylesheet" href="./vendor/nouislider/nouislider.min.css" />
	<!-- Style css -->
	<link href="./css/style.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>

	<!--**********************************
        Main wrapper start
    ***********************************-->
	<div id="main-wrapper">
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
		<?php
		require_once("news_header.php")
		?>
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
											// foreach ($news as $arqument) {
											for ($listIdNews = 0; $listIdNews < count($news) and $listIdNews < 2; $listIdNews++) {
												$arqument = $news[$listIdNews];
												$id = $arqument[0];
												$title = $arqument[1];
												$description = $arqument[2];
												$date = strtotime($arqument[4]);
												$date = date("d", $date) . ' ' . $arr[date("n", $date) - 1] . ' ' . date("Y", $date);
												$image = $arqument[6];
												$views = $arqument[9];
												$status = $arqument[11];
												if ($status == "published") {
													$status_color = "success";
													$status_name = "Опубликован";
												} elseif ($status == "draft") {
													$status_color = "warning";
													$status_name = "Черновик";
												} elseif ($status == "archived") {
													$status_color = "danger";
													$status_name = "Архивирован";
												}
											?>
												<tr>
													<td><?= $title ?></td>
													<td><?= $date ?></td>
													<td><span class="badge light badge-<?= $status_color ?>"><?= $status_name ?></span></td>
													<td>
														<div class="dropdown">
															<button type="button" class="btn btn-<?= $status_color ?> light sharp" data-bs-toggle="dropdown">
																<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<circle fill="#000000" cx="5" cy="12" r="2" />
																		<circle fill="#000000" cx="12" cy="12" r="2" />
																		<circle fill="#000000" cx="19" cy="12" r="2" />
																	</g>
																</svg>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="update_news.php?id=<?= $id ?>">Редактировать</a>
																<a class="dropdown-item" href="vendor_news/delete_news.php?id=<?= $id ?>">Удалить</a>
															</div>
														</div>
													</td>
												</tr>
											<?php
											}
											?>
											<!-- Кнопка для прогрузки новостей -->
											<form id="getNews" method="post" onsubmit="return false">
												<input type="hidden" name="id" id="LastNewsId" value=<?= $listIdNews ?>>
												<input type="submit" class="btn btn-primary position-absolute bottom-0 end-0 mx-3 my-1" value="Показать ещё"></button>
											</form>
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
            Content body end
        ***********************************-->
	</div>
	<!--**********************************
        Main wrapper end
    ***********************************-->

	<!--**********************************
        Scripts
    ***********************************-->

	<script>
		$("document").ready(function() {
			$("#getNews").on("submit", function() {
				let dataForm = $(this).serialize()
				$.ajax({
					url: '/query.php',
					method: 'post',
					dataType: 'html',
					data: dataForm,
					success: function(data) {
						$(document).ready(function() {
							$("table").append(data);

							let id = document.getElementById('LastNewsId').value;
							document.getElementById('LastNewsId').value = String(Number(id) + 2);

							console.log(document.getElementById('LastNewsId').value);
						})
					}
				});
			})
		})
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
	<script src="./js/custom.min.js"></script>
	<script src="./js/dlabnav-init.js"></script>
</body>

</html>