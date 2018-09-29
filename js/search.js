$(document).ready(function(){
    $("#searchbar").keyup(function(){
        $.post("../backend/search.php",
        {
            searchval: $("#searchbar").val(),
            type: $("#search-type").val(),
            adddata: $(".adddata").val()
        },
        function(data){
            $(".srch-rslt").html(data);
            console.log(data);
        });
    });

   
});