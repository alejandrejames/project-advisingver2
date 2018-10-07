$(document).ready(function(){
    $("#csvaddsubckbx").click(function(){
        if (document.getElementById('csvaddsubckbx').checked){
            $("#csvaddsubopt").show();
        }
        else{
            $("#csvaddsubopt").hide();
        }
    });

    $("#csvaddstudcurrid").click(function(){
        $.post("../backend/changecurriculum.php",
        {
            collegeid: $("#csvaddstudcolid").val(),
        },
        function(data){
            $("#csvaddstudcurrid").html(data);
            console.log(data);
        });
    });

    $("#butcsvaddsub").on("click", function() {
        var file_data = $("#csvaddsub").prop("files")[0];   
        var form_data = new FormData();
        form_data.append("file", file_data);
        if (document.getElementById('csvaddsubckbx').checked){
            var csvaddsubckbx = 1;
        }
        else{
            var csvaddsubckbx = 0;
        }
        var csvaddsubcurrid = $("#csvaddsubcurrid").val();
        var csvaddsubyrlvl = $("#csvaddsubyrlvl").val();
        var csvaddsubsem = $("#csvaddsubsem").val();
        $.ajax({
            url: '../backend/importcsvaddsub.php?csvaddsubckbx='+csvaddsubckbx+'&csvaddsubcurrid='+csvaddsubcurrid+'&csvaddsubyrlvl='+csvaddsubyrlvl+'&csvaddsubsem='+csvaddsubsem+'&case=1', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,csvaddsubckbx,                  
            type: 'post',
            success: function(php_script_response){
                $("#notif-area").html(php_script_response); // display response from the PHP script, if any
            }
        });
    });

    $("#butcsvaddstud").on("click", function() {
        var file_data = $("#csvaddstud").prop("files")[0];   
        var form_data = new FormData();
        form_data.append("file", file_data);
        var csvaddstudcurrid = $("#csvaddstudcurrid").val();
        var csvaddstudcolid = $("#csvaddstudcolid").val();
        $.ajax({
            url: '../backend/importcsvaddsub.php?csvaddstudcurrid='+csvaddstudcurrid+'&csvaddstudcolid='+csvaddstudcolid+'&case=2', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,csvaddsubckbx,                  
            type: 'post',
            success: function(php_script_response){
                $("#notif-area").html(php_script_response); // display response from the PHP script, if any
            }
        });
    });

    $("#butcsvupdtsub").on("click", function() {
        var file_data = $("#csvupdtsub").prop("files")[0];   
        var form_data = new FormData();
        form_data.append("file", file_data);
        var csvupdtgrdcurrid = $("#csvupdtgrdcurrid").val();
        var csvupdtgrdsub = $("#csvupdtgrdsub").val();
        var csvupdtgrdschlyr = $("#csvupdtgrdschlyr").val();
        var csvupdtgrdsem = $("#csvupdtgrdsem").val();
        $.ajax({
            url: '../backend/importcsvaddsub.php?csvupdtgrdcurrid='+csvupdtgrdcurrid+'&csvupdtgrdsub='+csvupdtgrdsub+'&csvupdtgrdschlyr='+csvupdtgrdschlyr+'&csvupdtgrdsem='+csvupdtgrdsem+'&case=3', // point to server-side PHP script 
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,csvaddsubckbx,                  
            type: 'post',
            success: function(php_script_response){
                $("#notif-area").html(php_script_response); // display response from the PHP script, if any
            }
        });
    });
});

