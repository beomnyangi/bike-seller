function myFunction(){

    var password = $('#inputPassword_old').val();
    if(password == ''){
        alert('비밀번호를 입력하세요');
        $("#inputPassword_old").focus();
        return false;
    }

    var password = $('#inputPassword').val();
    if(password == ''){
        alert('비밀번호를 입력하세요');
        $("#inputPassword").focus();
        return false;
    } else{
        var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
        if (!passwordRegex.test(password)) {
            alert('최소 8자, 문자, 숫자, 특수문자를 사용하세요.');
            $("#inputPassword").focus();
            return false;
        }
    }

    if($("#inputPasswordCheck").val() == ''){
        alert('비밀번호를 다시 한번 더 입력하세요');
        $("#inputPasswordCheck").focus();
        return false;
    }
    
    if($("#inputPassword").val()!== $("#inputPasswordCheck").val()){
        alert('비밀번호를 둘다 동일하게 입력하세요');
        return false;
    }

    if($("#inputPassword_old").val() == $("#inputPassword").val()){
        alert('기존 비밀번호와 변경 할 비밀번호가 동일합니다.');
        return false;
    }


    var ajax_result;
    $.ajax({
    	url: 'mypage_password_result.php',
        type: 'POST',
        dataType: "json",
        async: false,
    	data: {
            "inputPassword_old" : $('#inputPassword_old').val()
    	},
    	success : function (data) {
    		if(data.check){
                ajax_result = true;
                alert('비밀번호 변경 완료');
            }
            else{
                ajax_result = false;
                alert('기존 비밀번호가 일치하지 않습니다.');
            }
    	},
        error: function(err) {
            ajax_result = false;
            alert('에러');
        }
        
    });
    return ajax_result;

};