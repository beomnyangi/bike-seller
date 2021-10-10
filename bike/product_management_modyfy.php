<!DOCTYPE html>
<!-- 새션을 새로 시작하거나 기존 세션을 다시 시작 -->
<?php session_start(); ?>
<html>
<head>
	<style>
		/* Make the image fully responsive */
		.carousel-inner img {
			width: 100%;
			height: 700px;
		}
		img {
				width: 300px;
				height: 250px;
			}
	</style>

	<title>Bike Seller</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	

	
	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript></noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

</head>

<body>

	<!-- 메뉴 바 -->
	<!-- Header -->
	<header id="header">
		<h1><a href="home.php">Bike Seller</a></h1>
		<nav id="nav">
			<ul>
				<li class="special">
					<a href="#menu" class="menuToggle"><span>Menu</span></a>
					<div id="menu">
						<ul>
							<?php
								if(!isset($_SESSION['user_email']) || !isset($_SESSION['user_name'])) {
									// echo "<li><a href=\"login.php\">Log In</a></li>";
									// echo "<li><a href=\"signup.php\">Sign Up</a></li>";
								} else {
									$user_email = $_SESSION['user_email'];
									$user_name = $_SESSION['user_name'];
									//echo "<li><a href=\"\">'$user_name'님 환영합니다.</a></li>";
									echo "<li><a href=\"mypage.php\">'$user_name'님 환영합니다.</a></li>";
									// echo "<li><a href=\"order_cart.php\">Shopping Cart</a></li>";
									// echo "<li><a href=\"logout.php\">Log Out</a></li>";
								}
							?>
							<li><a href="home.php">Home</a></li>
							<li><a href="roadbikes_goods.php">road bikes</a></li>
							<li><a href="mtb_goods.php">mountain bikes</a></li>
							<li><a href="fitnessbikes_goods.php">fitenss bikes</a></li>
							<?php
								if($_SESSION['user_id'] == '1') {
									//echo "<li><a>관리자 모드</a></li>";
									echo "<li><a href=\"product_add.php\">제품 등록</a></li>";
									echo "<li><a href=\"product_management.php\">제품 관리</a></li>";
									echo "<li><a href=\"order_management.php\">주문 목록</a></li>";
								}
							?>
							<?php
								if(!isset($_SESSION['user_email']) || !isset($_SESSION['user_name'])) {
									echo "<li><a href=\"login.php\">Log In</a></li>";
									echo "<li><a href=\"signup.php\">Sign Up</a></li>";
								} else {
									$user_email = $_SESSION['user_email'];
									$user_name = $_SESSION['user_name'];
									//echo "<li><a href=\"\">'$user_name'님 환영합니다.</a></li>";
									//echo "<li><a href=\"mypage.php\">'$user_name'님 환영합니다.</a></li>";
									if($_SESSION['user_id'] != '1') {
										//echo "<li><a>관리자 모드</a></li>";
										echo "<li><a href=\"order_cart.php\">Shopping Cart</a></li>";
										echo "<li><a href=\"order_list.php\">주문 내역</a></li>";
									}
									echo "<li><a href=\"logout.php\">Log Out</a></li>";
								}
							?>
							
							<!-- <li><a href="signup.php">Sign Up</a></li> -->
							<!-- <li><a href="login.php">Log In</a></li> -->
						</ul>
					</div>
				</li>
			</ul>
		</nav>
	</header>


	

	<!-- 제품 등록 -->
	<section style="margin-top: 3em;">
		<div class="container">
			<h2 class="d-flex align-items-center justify-content-center">제품 수정 & 삭제</h2>
			<form action="product_management_modyfy_db.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>제품 이름</label>
					<input type="text" class="form-control" id="prod_name" name="prod_name">
				</div>
				<div class="form-group">
					<label>제품 가격</label>
					<input type="number" class="form-control" id="prod_price" name="prod_price">
				</div>
				<div class="form-group">
					<label>제품 카테고리</label>
					<select id="prod_cate" name="prod_cate" class="custom-select mb-3">
						<option selected>제품 카테고리 선택</option>
						<option value="road_bikes">road_bikes</option>
						<option value="mtb_bikes">mtb_bikes</option>
						<option value="fitness_bikes">fitness_bikes</option>
					</select>
				</div>
				<?php $_SESSION['detail'] = $_GET["detail"]; ?>
				
				<div class="form-group">
					<label class="mt-5">기존 썸네일 이미지</label>
					<p style="" id="thumbnail">없음</p>
					<input type="hidden" id="thumbnail_old" name="thumbnail_old">
					<input type="hidden" id="thumbnail_change" name="thumbnail_change">
					<img class="img-fluid" name="fileToUpload_thumbnail" id="fileToUpload_thumbnail" src="">
					<a href="#" onclick="return myFunction('thumbnail');" class="text-white" style="display:none" id="trash"><i class="far fa-trash-alt"></i></a>
					<label>변경 할 썸네일 이미지</label>
					<input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file border">
					
					<label class="mt-5">기존 제품 이미지1</label>
					<p style="" id="image_1">없음</p>
					<input type="hidden" id="image_1_old" name="image_1_old">
					<input type="hidden" id="image_1_change" name="image_1_change">
					<img class="img-fluid" name="fileToUpload_1" id="fileToUpload_1" src="">
					<a href="#" onclick="return myFunction('goods_image_1');" class="text-white" style="display:none" id="trash_1"><i class="far fa-trash-alt"></i></a>
					<label>변경 할 제품 이미지1</label>
					<input type="file" name="fileToUpload1" id="fileToUpload1" class="form-control-file border">
					
					<label class="mt-5">기존 제품 이미지2</label>
					<p style="" id="image_2">없음</p>
					<input type="hidden" id="image_2_old" name="image_2_old">
					<input type="hidden" id="image_2_change" name="image_2_change">
					<img class="img-fluid" name="fileToUpload_2" id="fileToUpload_2" src="">
					<a href="#" onclick="return myFunction('goods_image_2');" class="text-white" style="display:none" id="trash_2"><i class="far fa-trash-alt"></i></a>
					<label>변경 할 제품 이미지2</label>
					<input type="file" name="fileToUpload2" id="fileToUpload2" class="form-control-file border">
					
					<label class="mt-5">기존 제품 이미지3</label>
					<p style="" id="image_3">없음</p>
					<input type="hidden" id="image_3_old" name="image_3_old">
					<input type="hidden" id="image_3_change" name="image_3_change">
					<img class="img-fluid" name="fileToUpload_3" id="fileToUpload_3" src="">
					<a href="#" onclick="return myFunction('goods_image_3');" class="text-white" style="display:none" id="trash_3"><i class="far fa-trash-alt"></i></a>
					<label>변경 할 제품 이미지3</label>
					<input type="file" name="fileToUpload3" id="fileToUpload3" class="form-control-file border">
					
				</div>
				<div class="form-group mt-5">
					<label>제품 설명</label>
					<textarea class="form-control" rows="10" id="prod_com" name="prod_com"></textarea>
				</div>
				<?php
					$detail_value = $_GET['detail'];
					echo "<input type=\"hidden\" name=\"detail\" value=\"$detail_value\">"; 
				?>
				<button type="submit" value="Upload Image" name="submit" class="btn btn-primary">수정</button>
				<button type="submit" value="delete" name="delete" class="btn btn-primary">삭제</button>
				
			</form>
			<button class="btn btn-primary" onclick="history.back()">취소</button>
		</div>
	</section>



	<!-- Footer -->
<footer id="footer" style="background : #2e3842;">
				<!-- <ul class="icons">
					<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
					<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
				</ul> -->
				<ul class="copyright">
					<li><a href="http://html5up.net">개인정보취급방침</a></li>
					<li><a href="http://html5up.net">이용약관</a></li>
					<li><a href="http://html5up.net">사업자정보확인</a></li>
<pre style="color : gray;">
바이크셀러 대표 김성범     주소 : 07011 서울특별시 동작구 사당동 318-13
사업자등록번호 : 123-45-67890     통신판매업신고: 제2020-서울동작-00002호
개인정보관리책임자 김성범     이메일: bikeseller@bikeseller.com     고객센터: 1588-1588
&copy; Bike Seller Components. All Rights Reserved.
</pre>
				</ul>
			</footer>
			
	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="product_management_modyfy_imgdel.js"></script>

	<?php
		$detail_value = $_GET['detail'];
		$host_name = '127.0.0.1';
		$user_name = 'root';
		$password = 'gozldgkwlak!724';
		$dbName = 'goods_data';
		$tbName = 'goods_detail';
		
		$query = "SELECT * FROM goods_detail";
		
		// mysql 접속
		$conn = mysqli_connect($host_name, $user_name, $password);
		
		// 데이터베이스 선택
		mysqli_select_db($conn, $dbName);
		
		// 쿼리 전송
		$result = mysqli_query($conn, $query);
		
		// 결과값 가져오기
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$result_address = mysqli_query($conn, "SELECT * FROM goods_detail WHERE id = $detail_value");

		$result_row = mysqli_fetch_array($result_address, MYSQLI_ASSOC);


		echo "<script>document.getElementById(\"prod_name\").value = \"$result_row[prod_name]\";</script>";
		echo "<script>document.getElementById(\"prod_price\").value = \"$result_row[prod_price]\";</script>";
		echo "<script>document.getElementById(\"prod_cate\").value = \"$result_row[prod_cate]\";</script>";
		if($result_row[thumbnail] != ""){
			echo "<script>document.getElementById(\"fileToUpload_thumbnail\").src = \"http://127.0.0.1/bike/127.0.0.1$result_row[thumbnail]\";</script>";
			echo "<script>document.getElementById(\"thumbnail_old\").value = \"$result_row[thumbnail]\";</script>";
			echo "<script>document.getElementById(\"trash\").style = \"\";</script>";
			echo "<script>document.getElementById(\"thumbnail\").style = \"display:none\";</script>";
		}
		if($result_row[goods_image_1] != ""){
			echo "<script>document.getElementById(\"fileToUpload_1\").src = \"http://127.0.0.1/bike/127.0.0.1$result_row[goods_image_1]\";</script>";
			echo "<script>document.getElementById(\"image_1_old\").value = \"$result_row[goods_image_1]\";</script>";
			echo "<script>document.getElementById(\"trash_1\").style = \"\";</script>";
			echo "<script>document.getElementById(\"image_1\").style = \"display:none\";</script>";
		}
		if($result_row[goods_image_2] != ""){
			echo "<script>document.getElementById(\"fileToUpload_2\").src = \"http://127.0.0.1/bike/127.0.0.1$result_row[goods_image_2]\";</script>";
			echo "<script>document.getElementById(\"image_2_old\").value = \"$result_row[goods_image_2]\";</script>";
			echo "<script>document.getElementById(\"trash_2\").style = \"\";</script>";
			echo "<script>document.getElementById(\"image_2\").style = \"display:none\";</script>";
		}
		if($result_row[goods_image_3] != ""){
			echo "<script>document.getElementById(\"fileToUpload_3\").src = \"http://127.0.0.1/bike/127.0.0.1$result_row[goods_image_3]\";</script>";
			echo "<script>document.getElementById(\"image_3_old\").value = \"$result_row[goods_image_3]\";</script>";
			echo "<script>document.getElementById(\"trash_3\").style = \"\";</script>";
			echo "<script>document.getElementById(\"image_3\").style = \"display:none\";</script>";
		}
		
		echo "<script>document.getElementById(\"prod_com\").value = \"$result_row[prod_com]\";</script>";
			
		
		mysqli_close($conn);
	?>

	</body>
</html>
