$(document).ready(function(){
     $("#advisebut1").click(function(){
        console.log(134);
        $("#advspnl").show();
        $("#advdet").hide();
        $.post("../backend/advisestud2.php",
        {
            studid: $("#studidins").val(),
            currid: $("#curridins").val(),
            schlyr: $("#selectschlyr").val(),
            yrlvl: $("#selectyrlvl").val(),
            sem: $("#selectsem").val()
        },
        function(data){
            $("#advstbl").html(data);
            console.log(data);
        });
    });

    $("#advbutfnl").click(function(){
        console.log(134);
        $.post("../backend/adviseprint.php",
        {
            studid: $("#studidins").val(),
            currid: $("#curridins").val(),
            schlyr: $("#selectschlyr").val(),
            yrlvl: $("#selectyrlvl").val(),
            sem: $("#selectsem").val()
        },
        function(data){
            $("#print-details").html(data);
            console.log(data);
        });
    });

    $("#printbut").click(function(){
        var printContents = document.getElementById("print-cont").innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    });
});

function advaddsub(subid){    
    $.post("../backend/advaddsub.php",
        {
            studid: $("#studidins").val(),
            subid: subid,
            currid: $("#curridins").val(),
            schlyr: $("#selectschlyr").val(),
            yrlvl: $("#selectyrlvl").val(),
            sem: $("#selectsem").val()
        },
        function(data){
            studid =  $("#studidins").val();
            currid = $("#curridins").val();
            schlyr = $("#selectschlyr").val();
            yrlvl = $("#selectyrlvl").val();
            sem = $("#selectsem").val();

            $("#notif-area").html(data);
            console.log(studid);
            $("#advstbl").load('../backend/dataadvise.php?code=1&studid='+studid+'&schlyr='+schlyr+'&yrlvl='+yrlvl+'&sem='+sem+'&currid='+currid);
            $("#advsadd").load('../backend/dataadvise.php?code=2&studid='+studid+'&schlyr='+schlyr+'&yrlvl='+yrlvl+'&sem='+sem+'&currid='+currid);
            //$("#tbodysublist"+year+sem).remove();
    });
}

function advremsub(subid){    
    $.post("../backend/advremsub.php",
        {
            studid: $("#studidins").val(),
            subid: subid,
            currid: $("#curridins").val(),
            schlyr: $("#selectschlyr").val(),
            yrlvl: $("#selectyrlvl").val(),
            sem: $("#selectsem").val()
        },
        function(data){
            studid =  $("#studidins").val();
            currid = $("#curridins").val();
            schlyr = $("#selectschlyr").val();
            yrlvl = $("#selectyrlvl").val();
            sem = $("#selectsem").val();

            $("#notif-area").html(data);
            console.log(studid);
            $("#advstbl").load('../backend/dataadvise.php?code=1&studid='+studid+'&schlyr='+schlyr+'&yrlvl='+yrlvl+'&sem='+sem+'&currid='+currid);
            $("#advsadd").load('../backend/dataadvise.php?code=2&studid='+studid+'&schlyr='+schlyr+'&yrlvl='+yrlvl+'&sem='+sem+'&currid='+currid);
            //$("#tbodysublist"+year+sem).remove();
    });
}
