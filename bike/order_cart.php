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

	<!-- 이미지 슬라이드 -->
	<section>
	
  <div class="colorlib-product">
    <div class="px-4 px-lg-0">
    <!-- For demo purpose -->
      <div class="container text-white py-5 text-center">
        <h1 class="display-4">shopping cart</h1>
        
      </div>
  <!-- End -->

  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-black rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>

                  <th scope="col" class="border-0 bg-dark">
                    <div class="p-2 px-3 text-uppercase">
                      <input type="checkbox" class="form-check-input" id="check_all" name="check_all" value="check_all" onClick="check_all()">
                      <label class="form-check-label" for="check_all">전체체크</label>
                    </div>
                  </th>

                  <th scope="col" class="border-0 bg-dark">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-dark">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-dark">
                    <div class="py-2 text-uppercase">Size</div>
                  </th>
                  <th scope="col" class="border-0 bg-dark">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>

                <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <?php
                  $host_name = '127.0.0.1';
                  $user_name = 'root';
                  $password = 'gozldgkwlak!724';
                  $dbName = 'user_data';
                  $tbName = 'user_cart';

                  // mysql 접속
                  $conn = mysqli_connect($host_name, $user_name, $password);

                  // 데이터베이스 선택
                  mysqli_select_db($conn, $dbName);

                  // 쿼리 전송
                  $query = "SELECT * FROM $tbName";

                  // 결과값 가져오기
                  $result = mysqli_query($conn, $query)  or die ("query 접속 실패");
                  $no = 1;

                  while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
                    $cart_id = $row[id];
                    $user_id = $row[user_id];
                    $goods_id = $row[goods_id];
                    $goods_size = $row[goods_size];

                    if($_SESSION['user_id'] == $row[user_id]){
                      // 데이터베이스 선택
                      mysqli_select_db($conn, "goods_data");

                      $result_goods = mysqli_query($conn, "SELECT * FROM goods_detail WHERE id = $goods_id");
                      $result_row = mysqli_fetch_array($result_goods, MYSQLI_ASSOC);

                      echo "<tr>";
                      
                      echo "  <td class=\"border-0 align-middle\">";
                      echo "    <div class=\"p-3\">";
                      echo "      <input type=\"checkbox\" class=\"form-check-input\" id=\"$cart_id\" name=\"check_box\" value=\"$cart_id\" onClick=\"check_box_check()\">";
                      echo "      <label class=\"\" for=\"$cart_id\"></label>";
                      echo "    </div>";
                      echo "  </td>";

                      echo "  <th scope=\"row\" class=\"border-0\">";
                      echo "    <div class=\"p-2\">";
                      //echo "      <img src=\"https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg\" alt=\"\" width=\"70\" class=\"img-fluid rounded shadow-sm\">";
                      echo "      <div class=\"ml-2 d-inline-block justify-content-center\">";
                      echo "        <h5 class=\"mb-0\"> <a href=\"#\" class=\"text-white d-inline-block align-middle\">$result_row[prod_name]</a></h5><span class=\"text-muted font-weight-normal font-italic d-block\">Category: $result_row[prod_cate]</span>";
                      echo "      </div>";
                      echo "    </div>";
                      echo "  </th>";
                      echo "  <td class=\"border-0 align-middle\"><strong>₩$result_row[prod_price]</strong></td>";
                      echo "  <td class=\"border-0 align-middle\"><strong>$goods_size</strong></td>";

                      echo "  <td class=\"border-0 align-middle\"><a href=\"order_cart_remove.php?cart_id=$cart_id\" class=\"text-white\"><i class=\"far fa-trash-alt\"></i></a></td>";
                      echo "</tr>";
                      $no++;
                    }
                    
                  }

                  // mysql 종료
                  mysqli_close($conn);
                ?>
                <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

              </tbody>
            </table>
            
            <button type="button" class="btn btn-light" onClick="cart_delete()">선택상품 삭제</button>
            
          </div>
          <!-- End -->
        </div>
      </div>

      <div class="row py-5 p-4 bg-bleck rounded shadow-sm">
      
        <div class="col-lg-6">
          <div class="bg-dark rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
          
            <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <?php
              $host_name = '127.0.0.1';
              $user_name = 'root';
              $password = 'gozldgkwlak!724';
              $dbName = 'user_data';
              $tbName = 'user_cart';

              // mysql 접속
              $conn = mysqli_connect($host_name, $user_name, $password);

              // 데이터베이스 선택
              mysqli_select_db($conn, $dbName);

              // 쿼리 전송
              $query = "SELECT * FROM $tbName";

              // 결과값 가져오기
              $result = mysqli_query($conn, $query)  or die ("query 접속 실패");
              $no = 1;

              $shipping_cost = 10000;

              while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){                  
                $cart_id = $row[id];
                $user_id = $row[user_id];
                $goods_id = $row[goods_id];

                if($_SESSION['user_id'] == $row[user_id]){
                  // 데이터베이스 선택
                  mysqli_select_db($conn, "goods_data");

                  $result_goods = mysqli_query($conn, "SELECT * FROM goods_detail WHERE id = $goods_id");
                  $result_row = mysqli_fetch_array($result_goods, MYSQLI_ASSOC);
                  $subtotal += $result_row[prod_price];
                  $shipping_charges += $shipping_cost;
                  
                  $no++;
                }
              }
              
              $total = $subtotal + $shipping_charges;
              echo "<form action=\"order_final.php\" method=\"POST\">";
              // echo "  <p class=\"font-italic mb-4\">Shipping and additional costs are calculated based on values you have entered.</p>";
              echo "  <ul class=\"list-unstyled mb-4\">";
              echo "    <li class=\"d-flex justify-content-between py-3 border-bottom\"><strong class=\"text-white\">Order Subtotal </strong><strong>₩$subtotal</strong></li>";
              echo "    <li class=\"d-flex justify-content-between py-3 border-bottom\"><strong class=\"text-white\">Shipping charges</strong><strong>₩$shipping_charges</strong></li>";
              echo "    <li class=\"d-flex justify-content-between py-3 border-bottom\"><strong class=\"text-white\">Tax</strong><strong>₩0.00</strong></li>";
              echo "    <li class=\"d-flex justify-content-between py-3 border-bottom\"><strong class=\"text-white\">Total</strong>";
              echo "      <h5 class=\"font-weight-bold\">₩$total</h5>";
              echo "    </li>";
              echo "  </ul>";
              echo "  <input type=\"hidden\" name=\"cost\" value=\"$total\">";
              echo "  <button class=\"btn btn-dark rounded-pill py-2 btn-block\" type=\"submit\" value=\"submit\">Procceed to checkout</button>";
              echo "</form>";
              // mysql 종료
              mysqli_close($conn);
            ?>
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

          </div>
        </div>
      </div>

    </div>
  </div>  
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

    function cart_delete(){
      var check_box = $('input:checkbox[name="check_box"]');
      var sel_type = null;
      var count = 0;
      
      var form = document.createElement("form");
      form.setAttribute("method", "POST");  //Post 방식
      form.setAttribute("action", "order_cart_remove.php"); //요청 보낼 주소
      var hiddenField = document.createElement("input");

      for(var i=0;i<check_box.length;i++){
        if(check_box[i].checked == true){
          sel_type = check_box[i].value;
          
          hiddenField = document.createElement("input");
          hiddenField.setAttribute("type", "hidden");
          hiddenField.setAttribute("name", count);
          hiddenField.setAttribute("value", sel_type);
          form.appendChild(hiddenField);
          
          count++;
        }
      }
      
      if(count != 0){
        hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", "count");
        hiddenField.setAttribute("value", count);
        form.appendChild(hiddenField);

        document.body.appendChild(form);
        form.submit();
      }
    }

    function check_all(){
      if( $("#check_all").is(':checked') ){
        $("input[name=check_box]").prop("checked", true);
      }else{
        $("input[name=check_box]").prop("checked", false);
      }

      var check_box = $('input:checkbox[name="check_box"]');
      var count = 0;
      for(var i=0; i<check_box.length; i++){
        if(check_box[i].checked == true){
          count++;
        }
      }

      if(count != check_box.length){
        $("input[name=check_all]").prop("checked", false);
      }
    }

    function check_box_check(){
      var check_box = $('input:checkbox[name="check_box"]');
      var count = 0;
      for(var i=0; i<check_box.length; i++){
        if(check_box[i].checked == true){
          count++;
        }
      }

      if(count != check_box.length){
        $("input[name=check_all]").prop("checked", false);
      }
      if(count == check_box.length){
        $("input[name=check_all]").prop("checked", true);
      }
    }
  </script>
	</body>
</html>
