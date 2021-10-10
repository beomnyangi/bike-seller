<!DOCTYPE html>
<html>
<head>

	<title>KG이니시스</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

	<link rel="stylesheet" href="assets/css/main.css" />
	<noscript></noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

</head>

<body>

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

  <!-- 아임포트 라이브러리 -->
  <!-- jQuery -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
  <!-- iamport.payment.js -->
  <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>

  <!-- 아임포트 가맹점 식별하기 -->
  <script>
    // var IMP = window.IMP; // 생략해도 괜찮습니다.
    IMP.init("imp36778881"); // "imp00000000" 대신 발급받은 "가맹점 식별코드"를 사용합니다.
    
  </script>


  <script>
    var paymentMethod = opener.document.getElementsByName('paymentMethod');
    var phone = opener.document.getElementsByName('phone')[0].value;
    var user_name = opener.document.getElementsByName('user_name')[0].value;
    var goods_name = opener.document.getElementsByName('goods_name')[0].value;
    var total = opener.document.getElementsByName('total')[0].value;

    var sel_type = null;
    for(var i=0;i<paymentMethod.length;i++){
      if(paymentMethod[i].checked == true){ 
        sel_type = paymentMethod[i].value;
      }
    }

    if(sel_type == null){
      alert("결제 수단을 선택하세요.");
    }
    
    IMP.request_pay({
        pg : 'html5_inicis', // version 1.1.0부터 지원.
        pay_method : sel_type,
        merchant_uid : '' + new Date().getTime(),
        name : goods_name,
        amount : 100,
        buyer_tel : phone,
        buyer_name : user_name
    }, function(rsp) {
        if ( rsp.success ) {
            var msg = '결제가 완료되었습니다.';
            // msg += '고유ID : ' + rsp.imp_uid;
            msg += '상점 거래ID(주문번호) : ' + rsp.merchant_uid;
            opener.document.getElementsByName('merchant_uid')[0].value = rsp.merchant_uid;
            // msg += '결제 금액 : ' + rsp.paid_amount;
            // msg += '카드 승인번호 : ' + rsp.apply_num;
            alert(msg);
            close();
            var form = opener.document.order_final_result;
            form.submit();
        } else {
            var msg = '결제에 실패하였습니다.';
            msg += '에러내용 : ' + rsp.error_msg;
            alert(msg);
            close();
        }
        
    });
  </script>

 
  
	</body>
</html>
