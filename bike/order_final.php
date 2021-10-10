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
	<section>
	
  <div class="container" style="margin-top: 3em;">
  <div class="py-5 text-center">
  
    <h2>Checkout</h2>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
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
        $no = 0;

        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
          if($_SESSION['user_id'] == $row[user_id]){
            $no++;
          }
        }
        echo "<h4 class=\"d-flex justify-content-between align-items-center mb-3\">\n";
        echo "        <span class=\"text-muted\">Your cart</span>\n";
        echo "        <span class=\"badge badge-secondary badge-pill\">$no products</span>\n";
        echo "      </h4>\n";
        echo "      <ul class=\"list-group mb-3\">\n";
        // mysql 종료
        mysqli_close($conn);
      ?>
      <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
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
            $shipping_charges += $shipping_cost;
            $subtotal += $result_row[prod_price];

            $product_name = $result_row[prod_name];
            echo "        <li class=\"list-group-item d-flex justify-content-between lh-condensed\">\n";
            echo "          <div>\n";
            echo "            <h6 class=\"my-0 text-muted\">size : $row[goods_size]</h6>\n";
            echo "            <small class=\"text-muted\">$result_row[prod_name]</small>\n";
            echo "          </div>\n";
            echo "          <span class=\"text-muted\">₩$result_row[prod_price]</span>\n";
            echo "        </li>\n";
          }
        }
        $total = $subtotal + $shipping_charges;
        echo "        <li class=\"list-group-item d-flex justify-content-between bg-light\">\n";
        echo "          <div class=\"text-success\">\n";
        echo "            <h6 class=\"my-0 text-muted\">etc</h6>\n";
        echo "            <small >Shipping Charges</small>\n";
        echo "          </div>\n";
        echo "          <span class=\"text-success text-muted\">₩$shipping_charges</span>\n";
        echo "        </li>\n";
        echo "        <li class=\"list-group-item d-flex justify-content-between\">\n";
        echo "          <span class=\"text-dark\">Total</span>\n";
        echo "          <strong class=\"text-dark\">₩$total</strong>\n";
        echo "        </li>\n";
        echo "      </ul>";
        // mysql 종료
        mysqli_close($conn);
      ?>
      <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">배송지 정보</h4>

      <button class="btn btn-outline-primary text-white" onclick="myFunction_add()">기본 배송지 정보로 입력</button>

      <!-- <form class="needs-validation" action="order_final_result.php" method="POST" onsubmit="return myFunction()"> -->
      <form class="needs-validation" action="order_final_result.php" name="order_final_result" method="POST" onsubmit="return myFunction()">
      <!-- <form class="needs-validation" action="order_final_popup.php" method="POST" onsubmit="return myFunction()" target="_top"> -->
      <!-- <form class="needs-validation" name="frmData" method="POST" onsubmit="return myFunction()"> -->
      
        <div class="mb-3 mt-3">
          <label for="name">수령인</label>
          <input type="text" id="name" name="name" placeholder="" required>
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>
        
        <div class="mb-3">
        
          <label for="phone">연락처 <span class="text-muted"></span></label>
          <input type="text" id="phone" name="phone" placeholder="" required>
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">배송지 주소</label>
          <input type="text" id="address" name="address" onClick="search_address()" placeholder="" readonly required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">배송지 세부주소<span class="text-muted">(Optional)</span></label>
          <input type="text" id="address2" name="address2" placeholder="">
        </div>

        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="zip">우편번호</label>
            <input type="text" id="zip" name="zip" onClick="search_address()" placeholder="" readonly required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>

          <div class="form-group col">
            <label>배송 메모</label>
            <textarea rows="1" id="com" name="com"></textarea>
          </div>
        </div>
        
        <h4 class="mb-3">결재수단</h4>
        
        <div class="d-block mt-5">

          <div class="custom-control custom-radio mt-3">
            <input id="card" name="paymentMethod" value="card" type="radio" class="custom-control-input">
            <label class="custom-control-label" for="card">신용카드</label>
          </div>
          <div class="custom-control custom-radio mt-3">
            <input id="trans" name="paymentMethod" value="trans"  type="radio" class="custom-control-input">
            <label class="custom-control-label" for="trans">실시간계좌이체</label>
          </div>
          <div class="custom-control custom-radio mt-3">
            <input id="vbank" name="paymentMethod" value="vbank"  type="radio" class="custom-control-input">
            <label class="custom-control-label" for="vbank">가상계좌</label>
          </div>
          <div class="custom-control custom-radio mt-3">
            <input id="kakaopay" name="paymentMethod" value="kakaopay"  type="radio" class="custom-control-input">
            <label class="custom-control-label" for="kakaopay">카카오페이</label>
          </div>
        </div>
        
        <hr class="mb-4">
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

          while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
            $cart_id = $row[id];
            $user_id = $row[user_id];
            $goods_id = $row[goods_id];
            $i = 0;
            
            if($_SESSION['user_id'] == $row[user_id]){
              // 데이터베이스 선택
              mysqli_select_db($conn, "goods_data");

              $result_goods = mysqli_query($conn, "SELECT * FROM goods_detail WHERE id = $goods_id");
              $result_row = mysqli_fetch_array($result_goods, MYSQLI_ASSOC);
              
              // form으로 배열 보내기
              
              echo "<input type=\"hidden\" name=\"goods_size[]\" value=\"$row[goods_size]\">";
              echo "<input type=\"hidden\" name=\"goods_info[]\" value=\"$result_row[id]\">";
              
              $i++;
            }
          }
          // mysql 종료
          mysqli_close($conn);
          
          echo "<input type=\"hidden\" name=\"user_id\" value=\"$user_id\">";
          $user_name = $_SESSION['user_name'];
          echo "<input type=\"hidden\" name=\"user_name\" value=\"$user_name\">";
          echo "<input type=\"hidden\" name=\"total\" id=\"total\" value=\"$total\">";
          $no--;
          echo "<input type=\"hidden\" name=\"goods_name\" value=\"$product_name 외 $no 개\">";


          // 결제 완료 후 결제정보
          echo "<input type=\"hidden\" name=\"merchant_uid\" id=\"merchant_uid\" value=\"\">";
          
        ?>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

        <!-- <button class="btn btn-primary btn-lg btn-block" type="submit" value="submit">주문하기</button> -->

      </form>
      <button class="btn btn-primary btn-lg btn-block" onClick="popup()">결제하기</button>

      <button class="btn btn-primary btn-lg btn-block" onclick="history.back()">취소</button>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2020 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>

	</section>
  
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

  <script src="order_final_check.js"></script>
  <script src="address_check.js"></script>

  <script>
    function popup(){

      var check;

      var name = $('#name').val();
      if(name == ''){
          alert('수령인을 입력하세요');
          $("#name").focus();
          return false;
          check = false;
      }else{
        check = true;
      }

      var phone = $('#phone').val();
      if(phone == ''){
          alert('연락처를 입력하세요');
          $("#phone").focus();
          return false;
          check = false;
      }else{
        check = true;
      }

      var address = $('#address').val();
      if(address == ''){
          alert('주소를 입력하세요');
          $("#address").focus();
          return false;
          check = false;
      }else{
        check = true;
      }

      var zip = $('#zip').val();
      if(zip == ''){
          alert('우편번호를 입력하세요');
          $("#zip").focus();
          return false;
          check = false;
      }else{
        check = true;
      }

      var paymentMethod = $("input:radio[name='paymentMethod']").is(":checked");
      if(paymentMethod){
        check = true;
      }else{
        alert("결제 수단을 선택하세요.");
        return false;
        check = false;
      }
      
      if(check){
        var winObj = window.open("order_final_popup.php", "kg_inicis", "width=900, height=700");
      }
      
      
    }
  
  </script>

  <!-- 다음주소 api사용을 위한 파일로딩 -->
  <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
  <script>
			function search_address(){
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    //document.getElementById("sample6_extraAddress").value = extraAddr;
                
                } else {
                    //document.getElementById("sample6_extraAddress").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('zip').value = data.zonecode;
                document.getElementById("address").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("address2").focus();
            }
        }).open();
			}
			
		</script>
  
	</body>
</html>
