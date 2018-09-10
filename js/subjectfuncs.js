$(document).ready(function(){
    $("#editsubdet").click(function(){
        console.log(1);
        $("#editsubjectname").removeAttr('disabled');
        $("#editsubjectdesc").removeAttr('disabled');
        $("#editlabunits").removeAttr('disabled');
        $("#editlectunits").removeAttr('disabled');
        $("#editcreditunits").removeAttr('disabled');
        $("#updatesubdet").show();
    });

     $("#updatesubdet").click(function(){
        console.log(2);
        $.post("../backend/updatesubject.php",
        {
            subcode: $("#editsubjectname").val(),
            subname: $("#editsubjectdesc").val(),
            labunits: $("#editlabunits").val(),
            lecunits: $("#editlectunits").val(),
            creditunits: $("#editcreditunits").val(),
            subid: $("#editsubid").val()
        },
        function(data){
            $("#notif-area").html(data);
            console.log(data);
        });
        $("#updatesubdet").hide();
        $("#editsubjectname").attr('disabled','true');
        $("#editsubjectdesc").attr('disabled','true');
        $("#editlabunits").attr('disabled','true');
        $("#editlectunits").attr('disabled','true');
        $("#editcreditunits").attr('disabled','true');
    });


});

function addpreqsub(subid,preq){    
    $.post("../backend/addpreqsub.php",
        {
            preq: preq,
            subid: subid
        },
        function(data){
            $("#notif-area").html(data);
            $("#tbodyaddprereq").load('../backend/datasubject.php?code=1&subid='+subid);
            $("#tbodyprereqlist").load('../backend/datasubject.php?code=2&subid='+subid);
            //$("#tbodysublist"+year+sem).remove();
    });
}

function removepreqsub(subid,preq){    
    $.post("../backend/removepreqsub.php",
        {
            preq: preq,
            subid: subid
        },
        function(data){
            $("#notif-area").html(data);
            console.log(data);
           $("#tbodyaddprereq").load('../backend/datasubject.php?code=1&subid='+subid);
            $("#tbodyprereqlist").load('../backend/datasubject.php?code=2&subid='+subid);
    });
}