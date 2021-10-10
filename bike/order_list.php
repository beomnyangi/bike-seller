<!DOCTYPE html>
<!-- 새션을 새로 시작하거나 기존 세션을 다시 시작 -->
<?php session_start(); ?>
<html>
<head>
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

	<style>
		/* Make the image fully responsive */
		.carousel-inner img {
			width: 100%;
			height: 700px;
		}
	</style>

	<title>Bike Seller</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
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

	<!-- 체크아웃 -->
	<section style="margin-top: 3em;">
      <div class="table-responsive container">
	  <h2>주문 목록</h2>
        <table class="table table-striped table-sm" style="color : white;">
          <thead>
            <tr>
              <th>주문번호</th>
              <th>주문 제품</th>
              <!-- <th>연락처</th>
              <th>우편번호</th>
              <th>주소</th>
			  <th>세부주소</th>
			  <th>배송메모</th> -->
			  <th>주문 날짜</th>
			  <th>주문 상세</th>
			  <th>주문 취소</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <td>test</td>
              <td>test</td>
              <td>test</td>
              <td>test</td>
              <td>test</td>
			  <td>test</td>
			  <td>test</td>
			  <td><button>test</button></td>
            </tr> -->
            <?php
				$host_name = '127.0.0.1';
				$user_name = 'root';
				$password = 'gozldgkwlak!724';
				$dbName = 'user_data';
				$tbName = 'user_order';

				$query = "SELECT * FROM user_order";

				//$query = "INSERT INTO $dbName.$tbName (`user_id`, `recipient`, `contact`, `zip_code`, `address`, `address_opt`, `memo`, `goods_info`) VALUES ('$user_id_value', '$name_value', '$phone_value', '$zip_value', '$address_value', '$address2_value', '$com_value', '$input_array');";

				// mysql 접속
				$conn = mysqli_connect($host_name, $user_name, $password);

				// 데이터베이스 선택
				mysqli_select_db($conn, $dbName);

				// 쿼리 전송
				$result = mysqli_query($conn, $query);


				// 결과값 가져오기
				// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				// $id_check = $row["id"];
				// echo "<br/>";
				$count = 0;
				while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
					$id = $row["id"];         
					$id_check = $row["user_id"];
					if($id_check == $_SESSION['user_id']){
						$count++;
						$id_check = $row["id"];
						$recipient_check = $row["recipient"];
						$contact_check = $row["contact"];
						$zip_code_check = $row["zip_code"];
						$address_check = $row["address"];
						$address_opt_check = $row["address_opt"];
						$memo_check = $row["memo"];
						$date_check = $row["date"];

						echo "<form action=\"order_list_detail.php\" method=\"GET\">";			
						echo "<tr>";
						echo "<td>$id_check</td>";


						$output_array = json_decode($row["goods_info"]);
						$num = sizeof($output_array);

						// echo "<p>goods_info_check : $goods_info_check</p>";
						// echo "<p>output_array : $output_array</p>";
						// echo "<p>num : $num</p>";
						$goods_count = 0;
						$count_num = 1;
						while($num > $goods_count){
							$test = $row["goods_info"];
							$output_array = json_decode($row["goods_info"]);
							$output = $output_array[$goods_count];

							mysqli_select_db($conn, "goods_data");
							$result_goods = mysqli_query($conn, "SELECT * FROM goods_detail WHERE id = $output");
							$result_row = mysqli_fetch_array($result_goods, MYSQLI_ASSOC);
							
							$goods_count++;
							$count_num++;
						}


						if($goods_count < 2){
							echo "<td>$result_row[prod_name]</td>";
						}else{
							$goods_count = $goods_count-1;
							echo "<td>$result_row[prod_name] 외 $goods_count 개</td>";
						}
						
						echo "<td>$date_check</td>";
						// echo "<td>$contact_check</td>";
						// echo "<td>$zip_code_check</td>";
						// echo "<td>$address_check</td>";
						// echo "<td>$address_opt_check</td>";
						// echo "<td>$memo_check</td>";
						echo "<input type=\"hidden\" name=\"order_id\" value=\"$id\">";
						echo "<td><button type=\"submit\" value=\"submit\">확인</button></td>";
						
						echo "</form>";

						echo "<form action=\"order_list_delete.php\" method=\"POST\">";
						echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
						echo "<td><button type=\"submit\" value=\"submit\">취소</button></td>";
						echo "</form>";


						echo "<form name=\"frmData\" id=\"frmData\">";
						echo "<input type=\"hidden\" name=\"id_check\" value=\"test\">";
						// echo "<td><button name=\"popup_button\" value=\"$id\" onClick=\"popup()\">취소test</button></td>";
						//echo "<td><button onClick=\"popup()\">취소test</button></td>";
						echo "</form>";
						//echo "<td><button onClick=\"popup()\">취소test</button></td>";

						echo "</tr>";
						
					}
					
				}
				

				// mysql 종료
				mysqli_close($conn);

				// 페이지 이동
				//header("location: order_finish.php");
				?>
          </tbody>
        </table>
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


	<script>
    function popup(){
		// var form = document.createElement("form");
		// form.setAttribute("method", "Post");  //Post 방식
		// form.setAttribute("action", ""); //요청 보낼 주소

		// var hiddenField = document.createElement("input");
		// hiddenField.setAttribute("type", "hidden");
		// hiddenField.setAttribute("name", "id_check");
		// hiddenField.setAttribute("value", value);
		// form.appendChild(hiddenField);

		// document.body.appendChild(form);

		// var winObj = window.open("order_cancel_popup.php", "kg_inicis", "width=900, height=500");

		var winObj = window.open("order_cancel_popup.php", "kg_inicis", "width=900, height=500");
		
		document.frmData.target = "kg_inicis";
		document.frmData.method = "GET";
		document.frmData.action = "order_cancel_popup.php";
		document.frmData.submit() ;
		



    }
  
  </script>

	</body>
</html>
