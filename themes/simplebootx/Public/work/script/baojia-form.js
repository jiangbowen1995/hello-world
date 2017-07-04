// JavaScript Document



$(document).ready(function(e) {



    $("#baojia-form").submit(function(){



		$.post(



			"/index.php?m=formguide&c=index&a=show&formid=12&siteid=1&",



			$(this).serialize(),



			function(data){



				alert($(data).find(".guery").text());



			}



		);



		return false;



	});



});