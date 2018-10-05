$(document).ready(function(){
     $("#loginbut").click(function(){
        $.post("../backend/loginauth.php",
        {
            username: $("#loginusername").val(),
            pass: $("#loginpass").val()
        },
        function(data){
            if(data == 'Success'){
              window.location.replace("../index.php");  
            }
            else
                $('#notif-area').html(data);
        });
      
    });
});

