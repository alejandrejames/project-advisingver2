function pagination(page,book,start,end,adddata){
	$("#page-"+page).click(function(){
		$("#page-"+page).addClass('active');
		var pages = $("#totpages").val();
		console.log(pages);
		var i=0;
        	while(i<=pages){
		    	if(i!=page)
		        	$("#page-"+i).removeClass('active');
		       	i++;
		    }
        $.post("../backend/pagination.php",
        {
            book: book,
            start: start,
            end: end,
            adddata: adddata
        },
        function(data){
            $(".pagina-tbl").html(data);
            console.log(data);
        });
    });
}