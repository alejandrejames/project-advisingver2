$(document).ready(function(){
    $("#editstudCurriculum").change(function(){
        $.post("../backend/changecurriculum.php",
        {
            collegeid: $("#editstudCurriculum").val()
        },
        function(data){
            $("#editstudCollege").html(data);
            console.log(data);
        });
    });

    $("#editstuddet").click(function(){
        console.log(1);
        $("#editstudid").removeAttr('disabled');
        $("#editstudfname").removeAttr('disabled');
        $("#editstudlname").removeAttr('disabled');
        $("#editstudyrlvl").removeAttr('disabled');
        $("#editstudCurriculum").removeAttr('disabled');
        $("#editstudCollege").removeAttr('disabled');
        $("#updatestuddet").show();
    });

     $("#updatestuddet").click(function(){
        console.log(2);
        $.post("../backend/updatestudent.php",
        {
            studid1: $("#editstudid1").val(),
            studid: $("#editstudid").val(),
            fname: $("#editstudfname").val(),
            lname: $("#editstudlname").val(),
            yrlvl: $("#editstudyrlvl").val(),
            college: $("#editstudCollege").val(),
            currid: $("#editstudCurriculum").val(),
        },
        function(data){
            $("#notif-area").html(data);
            console.log(data);
        });
        $("#updatestuddet").hide();
        $("#editstudid").attr('disabled','true');
        $("#editstudfname").attr('disabled','true');
        $("#editstudlname").attr('disabled','true');
        $("#editstudyrlvl").attr('disabled','true');
        $("#editstudCurriculum").attr('disabled','true');
        $("#editstudCollege").attr('disabled','true');
    });

    $.post("../backend/studsubload.php",
    {
        studid: $("#editstudid1").val(),
        schlyr: $("#frstid").val()
    },
    function(data){
        $("#studsublist").html(data);
    });

    $("#selectgrades").change(function(){
        $.post("../backend/studsubload.php",
        {
            studid: $("#editstudid1").val(),
            schlyr: $("#frstid").val(),
            sem: $("#selectgrades").val()
        },
        function(data){
            $("#studsublist").html(data);
        });
    });
});

function updtgrd(subid){
    $.post("../backend/studsubupdt.php",
        {
            studid: $("#editstudid1").val(),
            schlyr: $("#frstid").val(),
            sem: $("#selectgrades").val(),
            subid: subid,
            grd: $("#studgrdinp"+subid).val()
        },
        function(data){
            $("#notif-area").html(data);
        });
}