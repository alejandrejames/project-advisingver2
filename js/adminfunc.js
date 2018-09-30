$(document).ready(function(){

    $("#editaccdet").click(function(){
        $("#accunameinp").removeAttr('disabled');
        $("#accfnameinp").removeAttr('disabled');
        $("#acclnameinp").removeAttr('disabled');
        $("#updateaccdet").show();
    });

     $("#updateaccdet").click(function(){
        $.post("../backend/updateaccdet.php",
        {
            accid: $("#editaccid").val(),
            accuname: $("#accunameinp").val(),
            accfname: $("#accfnameinp").val(),
            acclname: $("#acclnameinp").val()
        },
        function(data){
            $("#notif-area").html(data);
            console.log(data);
        });
        $("#updateaccdet").hide();
        $("#accunameinp").attr('disabled','true');
        $("#accfnameinp").attr('disabled','true');
        $("#acclnameinp").attr('disabled','true');
    });

    $("#editaccpass").click(function(){
        $("#oldpassacc").removeAttr('disabled');
        $("#newpassacc").removeAttr('disabled');
        $("#newpassaccconf").removeAttr('disabled');
        $("#changepassacc").show();
    });

    $("#changepassacc").click(function(){
        $.post("../backend/changepassacc.php",
        {
            accid: $("#editaccid").val(),
            oldpass: $("#oldpassacc").val(),
            newpass: $("#newpassacc").val(),
            newpassconf: $("#newpassaccconf").val()
        },
        function(data){
            $("#notif-area").html(data);
            console.log(data);
        });
        $("#changepassacc").hide();
        $("#oldpassacc").attr('disabled','true');
        $("#newpassacc").attr('disabled','true');
        $("#newpassaccconf").attr('disabled','true');
    });
});
