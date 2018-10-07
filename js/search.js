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

    $("#preqsearch").keyup(function(){
        $.post("../backend/search.php",
        {
            searchval: $("#preqsearch").val(),
            type: $("#search-type2").val(),
            adddata: $("#adddata2").val()
        },
        function(data){
            $(".pagina-tbl2").html(data);
            //console.log(data);
        });
    });
   
});