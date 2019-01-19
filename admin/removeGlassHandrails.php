<html> 
<head> 
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="css/adminStyles.css" type="text/css" rel="stylesheet" />
<script> 
function removeFun(){
			var x = confirm("SURE TO REMOVE THIS IMAGE?");
			if(x==true){
			return true;
			}else if(x==false){
				return false;
			}
		}
</script>

<script src="js/jquery.min.js"> </script>
<script> 

	$(document).ready(function(){
		
		$('.newBtn').click(function(){
			$('.hiddenDiv').slideToggle();
		});	

		

	});

	
</script>
</head>
<body>
	<h1> Handrails </h1>
	
	<?php
		$getId = $_GET['id'];
		include("connection.php");
		$db = mysql_select_db("kanishGroupDb",$connection);
		$removed = mysql_query("DELETE FROM printing WHERE id='$getId'");
		if($removed){
			echo "<div class='imgWrapper'> IMAGE REMOVED <br /> <a href='handrails.php'> BACK </a> </div>";
		}else{
			echo mysql_error();
		}
			
		
		
		
		
	?>
		
		
</body>

</html>


