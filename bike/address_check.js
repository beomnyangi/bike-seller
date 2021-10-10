function myFunction_add(){
    var ajax_result;
    $.ajax({
    	url: 'address_check.php',
        type: 'POST',
        dataType: 'json',
        async: false,
    	data: {
        },
    
    	success : function (data) {
            ajax_result = true;
            document.getElementById("name").value = data.name;
            document.getElementById("phone").value = data.phone;
            document.getElementById("address").value = data.address;
            document.getElementById("address2").value = data.address2;
            document.getElementById("zip").value = data.zip;
            
    	},
        error: function(err) {
            ajax_result = false;
            alert('에러');
        }
        
        
    });
    return ajax_result;
    
}
