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
	<h1> MDF </h1>
	
	<?php
		$getId = $_GET['id'];
		include("connection.php");
		$db = mysql_select_db("kanishGroupDb",$connection);
		
		$findImg = mysql_query("SELECT *FROM mdf WHERE id='$getId'");
		
			
			
			while($row=mysql_fetch_array($findImg)){
				$imgName = $row['image'];
				
				if(file_exists("../images/mdf/$imgName")){
					$unlinked = unlink("../images/mdf/$imgName");
					if($unlinked){
						$removed = mysql_query("DELETE FROM mdf WHERE id='$getId'");
						if($removed){
							echo "<div class='imgWrapper'> IMAGE REMOVED <br /> <a href='mdf.php'> BACK </a> </div>";
						}else{
							echo mysql_error();
						}
					}
				}
			}
			
			
			
			/*
			if(file_exists("../images/mdf/$imgName")){
					unlink("../images/mdf/$imgName");
				}
			*/
		
		
			
			
		
			
		
		
		
		
	?>
		
		
</body>

</html>

