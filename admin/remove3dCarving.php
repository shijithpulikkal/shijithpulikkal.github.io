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
	<h1> 3D, 4D Carving &amp Antique Works </h1>
	
	<?php
		$getId = $_GET['id'];
		include("connection.php");
		$db = mysql_select_db("kanishGroupDb",$connection);
		
		$findImg = mysql_query("SELECT *FROM interiorworks WHERE id='$getId'");
		
			
			
			while($row=mysql_fetch_array($findImg)){
				$imgName = $row['image'];
				
				if(file_exists("../images/interiorworks/3dCarving/$imgName")){
					$unlinked = unlink("../images/interiorworks/3dCarving/$imgName");
					if($unlinked){
						$removed = mysql_query("DELETE FROM interiorworks WHERE id='$getId'");
						if($removed){
							echo "<div class='imgWrapper'> IMAGE REMOVED <br /> <a href='3dCarving.php'> BACK </a> </div>";
						}else{
							echo mysql_error();
						}
					}
				}
			}
		
		
		
		
	?>
		
		
</body>

</html>


