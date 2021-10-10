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
	
	<section style="margin-top: 3em;">
		<h2 class="d-flex align-items-center justify-content-center">제품 목록</h2>
		<div class="row row-cols-3 ml-4 mr-5">
			<!-- <form action="goods_detail.php" method="GET">
				<div class="col mb-4">
					<div class="card h-100">
						<img class="card-img-top" src="images/goods/road_goods_1-1.jpg" alt="Card image">
						<div class="card-body">
							<h4 class="card-title" style="color: black;">S-Works Aethos - Founder's Edition</h4>
							<p class="card-text" style="color: black;">₩17,000,000</p>
							<input type="hidden" name="kinds" value="road">
							<input type="hidden" name="detail" value="1">
							<button class="btn-primary" type="submit" value="submit" style="color: black;">자세히 보기</button>
						</div>
						
					</div>
				</div>
			</form> -->
			<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
			<?php
				$host_name = '127.0.0.1';
				$user_name = 'root';
				$password = 'gozldgkwlak!724';
				$dbName = 'goods_data';
				$tbName = 'goods_detail';

				// mysql 접속
				$conn = mysqli_connect($host_name, $user_name, $password);

				// 데이터베이스 선택
				mysqli_select_db($conn, $dbName);

				// 쿼리 전송
				$query = "SELECT * FROM goods_detail";

				// 결과값 가져오기
				$result = mysqli_query($conn, $query)  or die ("query 접속 실패");
				$no = 1;

				$page = ($_GET['page'])?$_GET['page']:1;
				$list = 6;
				$block = 3;

				$num = mysqli_num_rows($result);

				$pageNum = ceil($num/$list); // 총 페이지
				$blockNum = ceil($pageNum/$block); // 총 블록
				$nowBlock = ceil($page/$block);

				$s_page = ($nowBlock * $block) - 2;
				if ($s_page <= 1) {
					$s_page = 1;
				}
				$e_page = $nowBlock*$block;
				if ($pageNum <= $e_page) {
					$e_page = $pageNum;
				}

				$s_point = ($page-1) * $list;

				$host_name = '127.0.0.1';
				$user_name = 'root';
				$password = 'gozldgkwlak!724';
				$dbName = 'goods_data';
				$tbName = 'goods_detail';
				
				// mysql 접속
				$conn = mysqli_connect($host_name, $user_name, $password);
				
				// 데이터베이스 선택
				mysqli_select_db($conn, $dbName);
				
				$query = "SELECT * FROM goods_detail ORDER BY id ASC LIMIT $s_point,$list";
				$real_data = mysqli_query($conn, $query);

				$count = $s_point;
				while($row = mysqli_fetch_array($real_data, MYSQLI_BOTH)){
					$count++;
					echo "<form action=\"product_management_modyfy.php\" method=\"GET\">";
					echo "	<div class=\"col mb-4\">";
					echo "		<div class=\"card h-100\">";
					echo "		<img class=\"card-img-top\" src=\"http://127.0.0.1/bike/127.0.0.1$row[thumbnail]\" alt=\"Card image\">";
					echo "			<div class=\"card-body\">";
					// 제품 이름
					echo "				<h4 class=\"card-title\" style=\"color: black;\">$row[prod_name]</h4>";
					// 제품 가격
					echo "				<p class=\"card-text\" style=\"color: black;\">₩$row[prod_price]</p>";
					echo "				<input type=\"hidden\" name=\"kinds\" value=\"$row[prod_cate]\">";
					echo "				<input type=\"hidden\" name=\"detail\" value=\"$row[id]\">";
					echo "				<button class=\"btn-primary\" type=\"submit\" value=\"submit\" style=\"color: black;\">수정 & 삭제</button>";
					echo "			</div>";
					echo "		</div>";
					echo "	</div>";
					echo "</form>";
				}

				// mysql 종료
				mysqli_close($conn);
			?>
			<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
		</div>
		<?php
					echo "<div>";
					echo "<p class=\"ml-5\">현재 페이지 : $page</p>";
					echo "<ul class=\"pagination justify-content-center\">";
					for ($p=$s_page; $p<=$e_page; $p++) {
						echo "<li class=\"page-item\"><a class=\"page-link\" href=\"$PHP_SELP?page=$p\">$p </a></li>";
					}
					echo "</ul>";
					echo "</div>";
					?>
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

    <script src="goods_detail.js"></script>
	
	</body>
</html>
