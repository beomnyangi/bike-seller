function myFunction(value){
    
    var ajax_result;
    $.ajax({
    	url: 'product_management_modyfy_imgdel.php',
        type: 'POST',
        dataType: "json",
        async: false,
    	data: {
            "image_check" : value
    	},
    	success : function (data) {
    		if(data.check == 'thumbnail'){
                ajax_result = false;
                document.getElementById("fileToUpload_thumbnail").style = "display:none";
                document.getElementById("thumbnail_old").value = "delete";
			    document.getElementById("trash").style = "display:none";
                document.getElementById("thumbnail").style = "";
            }
            else if(data.check == 'goods_image_1'){
                ajax_result = false;
                document.getElementById("fileToUpload_1").style = "display:none";
                document.getElementById("image_1_old").value = "delete";
			    document.getElementById("trash_1").style = "display:none";
                document.getElementById("image_1").style = "";
            }
            else if(data.check == 'goods_image_2'){
                ajax_result = false;
                document.getElementById("fileToUpload_2").style = "display:none";
                document.getElementById("image_2_old").value = "delete";
			    document.getElementById("trash_2").style = "display:none";
                document.getElementById("image_2").style = "";
            }
            else if(data.check == 'goods_image_3'){
                ajax_result = false;
                document.getElementById("fileToUpload_3").style = "display:none";
                document.getElementById("image_3_old").value = "delete";
			    document.getElementById("trash_3").style = "display:none";
                document.getElementById("image_3").style = "";
            }
            else{
                ajax_result = false;
                alert('삭제 실패');
            }
    	},
        error: function(err) {
            ajax_result = false;
            alert('에러');
        }
        
    });
    return ajax_result;

};