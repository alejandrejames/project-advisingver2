$(document).ready(function(){
    $("#editcurriculumdet").click(function(){
        console.log(1);
        $("#editcurriculumname").removeAttr('disabled');
        $("#editcollege").removeAttr('disabled');
        $("#updatecurriculum").show();
    });

     $("#updatecurriculum").click(function(){
        console.log(2);
        $.post("../backend/updatecurriculum.php",
        {
            currname: $("#editcurriculumname").val(),
            college: $("#editcollege").val(),
            currid: $("#editcurrid").val(),
        },
        function(data){
            $("#notif-area").html(data);
            console.log(data);
        });
        $("#updatecurriculum").hide();
        $("#editcurriculumname").attr('disabled',true);
        $("#editcollege").attr('disabled',true);
    });
});