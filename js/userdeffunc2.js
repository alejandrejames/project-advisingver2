$(document).ready(function(){
    $("#inputcollege").change(function(){
        $.post("../backend/changecurriculum.php",
        {
            collegeid: $("#inputcollege").val()
        },
        function(data){
            $("#inputcurriculum").html(data);
            console.log(data);
        });
    });
});