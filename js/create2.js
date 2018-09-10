$(document).ready(function(){
    $("#addcurriculumbutton").click(function(){
        $.post("../backend/addcurriculum.php",
        {
        	curriculumname: $("#inputcurriculumadd").val(),
        	collegeid: $("#inputcollegeadd").val()
        },
        function(data){
	    	$("#addcurriculumnotif").html(data);
	    	console.log(data);
	   	});
    });

    $("#addstudentbutton").click(function(){
        $.post("../backend/addstudent.php",
        {
            studid: $("#inputstudid").val(),
            fname: $("#inputfname").val(),
            lname: $("#inputlname").val(),
            collegeid: $("#inputcollege").val(),
            curriculum: $("#inputcurriculum").val(),
            yrlvl: $("#inputcurriculum").val()
        },
        function(data){
            $("#addstudentnotif").html(data);
            console.log(data);
        });
    });

    $("#addsubjectbutton").click(function(){
        $.post("../backend/addsubject.php",
        {
            subcode: $("#inputsubcode").val(),
            subdesc: $("#inputsubdesc").val(),
            labunits: $("#inputlabunits").val(),
            lectunits: $("#inputlectunits").val(),
            credit: $("#inputcredit").val()
        },
        function(data){
            $("#addsubjectnotif").html(data);
            console.log(data);
        });
    });
});