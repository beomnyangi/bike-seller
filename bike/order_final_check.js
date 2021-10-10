function myFunction(){
    
    var name = $('#name').val();
    if(name == ''){
        alert('수령인을 입력하세요');
        $("#name").focus();
        return false;
    }

    var phone = $('#phone').val();
    if(phone == ''){
        alert('연락처를 입력하세요');
        $("#phone").focus();
        return false;
    }

    var address = $('#address').val();
    if(address == ''){
        alert('주소를 입력하세요');
        $("#address").focus();
        return false;
    }

    var zip = $('#zip').val();
    if(zip == ''){
        alert('우편번호를 입력하세요');
        $("#zip").focus();
        return false;
    }
};