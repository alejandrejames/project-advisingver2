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

function addcursub(year,sem,subid){    
    $.post("../backend/addcursub.php",
        {
            currid: $("#editcurrid").val(),
            yrlvl: year,
            sem: sem,
            subid: subid
        },
        function(data){
            $("#notif-area").html(data);
            $("#tbodysublist"+year+sem).load('../backend/datacurriculum.php?code=2&sem='+sem+'&year='+year);
            $("#addsubjectcurr").load('../backend/datacurriculum.php?code=1');
            //$("#tbodysublist"+year+sem).remove();
    });
}

function removecursub(subid,year,sem){    
    $.post("../backend/removecursub.php",
        {
            currid: $("#editcurrid").val(),
            subid: subid
        },
        function(data){
            $("#notif-area").html(data);
            console.log(data);
            $("#tbodysublist"+year+sem).load('../backend/datacurriculum.php?code=2&sem='+sem+'&year='+year);
            $("#addsubjectcurr").load('../backend/datacurriculum.php?code=1');
    });
}      