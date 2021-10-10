

function myFunction(){

    var name = $('#inputName').val();
    if(name == ''){
        alert('이름을 입력하세요');
        $("#inputName").focus();
        return false;
    }

    var email = $('#inputEmail').val();
    if(email == ''){
        alert('이메일을 입력하세요');
        $("#inputEmail").focus();
        return false;
    } else {
        var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!emailRegex.test(email)) {
            alert('이메일 주소가 유효하지 않습니다. ex)abc@gmail.com');
            $("#inputEmail").focus();
            return false;
        }
    }

    // var password = $('#inputPassword').val();
    // if(password == ''){
    //     alert('비밀번호를 입력하세요');
    //     $("#inputPassword").focus();
    //     return false;
    // } else{
    //     var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
    //     if (!passwordRegex.test(password)) {
    //         alert('최소 8자, 문자, 숫자, 특수문자를 사용하세요.');
    //         $("#inputPassword").focus();
    //         return false;
    //     }
    // }

    // if($("#inputPasswordCheck").val() == ''){
    //     alert('비밀번호를 다시 한번 더 입력하세요');
    //     $("#inputPasswordCheck").focus();
    //     return false;
    // }
    
    // if($("#inputPassword").val()!== $("#inputPasswordCheck").val()){
    //     alert('비밀번호를 둘다 동일하게 입력하세요');
    //     return false;
    // }

    var number  = $('#number').val();
    if(number == ''){
        alert('전화번호를 입력하세요');
        $("#number").focus();
        return false;
    }

    var postcode  = $('#postcode').val();
    if(postcode == ''){
        alert('우편번호를 입력하세요');
        $("#postcode").focus();
        return false;
    }

    var address  = $('#address').val();
    if(address == ''){
        alert('주소를 입력하세요');
        $("#address").focus();
        return false;
    }
    
    // if($("#remember_me").is(":checked") == false){
    //     alert('약관에 동의하셔야 합니다');
    //     return false;
    // }

    // var ajax_result;
    // $.ajax({
    // 	url: 'signup_check_result.php',
    //     type: 'POST',
    //     dataType: "json",
    //     async: false,
    // 	data: {
    //         "inputEmail" : $('#inputEmail').val()
    // 	},
    // 	success : function (data) {
    // 		if(data.check){
    //             ajax_result = true;
    //             alert('가입 완료');
    //         }
    //         else{
    //             ajax_result = false;
    //             alert('중복된 아이디 입니다.');
    //         }
    // 	},
    //     error: function(err) {
    //         ajax_result = false;
    //         alert('에러');
    //     }
        
    // });
    // return ajax_result;

};