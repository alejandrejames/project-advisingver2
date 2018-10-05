$(document).ready(function(){
    $("#inputcollege").change(function(){
        $.post("backend/changecurriculum.php",
        {
            collegeid: $("#inputcollege").val()
        },
        function(data){
            $("#inputcurriculum").html(data);
            console.log(data);
        });
    });

    $(".supadfield").keyup(function(){
        if(($("#newaccuname").val()!="") && ($("#newaccfname").val()!="") && ($("#newacclname").val()!="") && ($("#newacctyid").val()!="") && ($("#newaccpass").val()!="") && ($("#newaccpassconf").val()!="")){
            $("#addnewacc").removeAttr('disabled');
        }
        else
            $("#addnewacc").attr('disabled','true');
    });

    $("#addnewacc").click(function(){
        $.post("backend/addnewacc.php",
        {
            newaccuname: $("#newaccuname").val(),
            newaccfname: $("#newaccfname").val(),
            newacclname: $("#newacclname").val(),
            newacctyid: $("#newacctyid").val(),
            newaccpass: $("#newaccpass").val(),
            newaccpassconf: $("#newaccpassconf").val(),
        },
        function(data){
            $("#superad-notifarea").html(data);
            console.log(data);
        });
    });


     $("#updtaccty").click(function(){
        $.post("backend/updtaccty.php",
        {
            accid: $("#uptaccid").val(),
            acctyid: $("#uptacctyid").val(),
            accstat: $("#uptaccstat").val()
        },
        function(data){
            $("#superadupdt-notifarea").html(data);
            console.log(data);
        });
    });
});