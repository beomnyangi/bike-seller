function myFunction(){
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

    var password = $('#inputPassword').val();
    if(password == ''){
        alert('비밀번호를 입력하세요');
        $("#inputPassword").focus();
        return false;
    }

    var ajax_result;
    $.ajax({
    	url: 'login_check_result.php',
        type: 'POST',
        dataType: 'json',
        async: false,
    	data: {
            'inputEmail' : $('#inputEmail').val(),
            'inputPassword' : $('#inputPassword').val()
        },
    
    	success : function (data) {
    		if(data.check == 'id_no'){
                alert('존재하지 않는 아이디 입니다.');
                ajax_result = false;
            }
            if(data.check == 'pw_no'){
                alert('비밀번호가 일치하지 않습니다.');
                ajax_result = false;
            }
            if(data.check == 'pw_ok'){
                alert('로그인 성공');
                ajax_result = true;
            }
            else{
                alert('로그인 실패');
                ajax_result = false;
            }
    	},
        error: function(err) {
            ajax_result = false;
            alert('에러');
        }
        
        
    });
    return ajax_result;
    
};