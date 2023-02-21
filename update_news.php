<?php 
  // Подключение к базе данных
  require_once 'config/connect.php';
  $news_id = $_GET['id'];

  $news = mysqli_query($connect, "SELECT * FROM `news` WHERE `id` = '$news_id'");

  $news = mysqli_fetch_assoc($news);
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
						<div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Input Style</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="vendor_news/update_news.php" method="post">
                                    	<input type="hidden" name="id" value="<?= $news['id']?>">
                                        <div class="mb-3 row">
                                        	<label for="title">Заголовок:</label>
                                            <textarea class="form-control" rows="4" id="title" name="title"><?= $news['Title']?></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                        	<label for="description">Описание:</label>
                                            <textarea class="form-control" rows="4" id="description" name="description"><?= $news['Description']?></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                        	<label for="text">Текст:</label>
                                            <textarea class="form-control" rows="4" id="text" name="text"><?= $news['Text']?></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                        	<label for="pubdate">Дата публикации:</label>
                                            <input type="date" class="datepicker-default form-control" id="pubdate" name="pubdate" value="<?= $news['Publication Date']?>">
                                        </div>
                                        <div class="mb-3 row">
                                        	<label for="author">Автор:</label>
                                            <select class="default-select  form-control wide" >
                                            	<?php
                                            		$redactors = mysqli_query($connect, "SELECT * FROM `redactors`");
                                            		$redactors = mysqli_fetch_all($redactors);
                                            		foreach ($redactors as $redactor) {
                                            	?>
                                            			<option><?= $redactor[1]?></option>
                                            	<?php
                                            		}
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3 row">
                                        	<label for="image">Изображение:</label>
                                        		<div class="input-group mb-3">
													<span class="input-group-text">Upload</span>
                                        		    <div class="form-file">
                                        		        <input type="file" class="form-file-input form-control">
                                        		    </div>
                                        		</div>
                                        </div>
                                        <div class="mb-3 row">
                                        	<label for="tags">Теги:</label>
                                            <textarea class="form-control" rows="4" id="tags" name="tags"><?= $news['Tags']?></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                        	<label for="status">Статус:</label>
                                            <select class="nice-select form-control wide" id="status" name="status">
    											<option value="draft" <?php if ($news['Status'] == "draft") echo "selected";?>>Черновик</option>
    											<option value="published" <?php if ($news['Status'] == "published") echo "selected";?>>Опубликован</option>
    											<option value="archived" <?php if ($news['Status'] == "archived") echo "selected";?>>Архивирован</option>
                                            </select>
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
