<html>  
<head> 
<title> Kanish group | 3d, 4d Carving </title>
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
	<div class="backWrapper"> <a href="categories.php"> BACK </a> </div>
	<div class="clearfix"> </div>
	<h1> 3D, 4D Carving &amp Antique Works </h1>
	
	<?php
		include("connection.php");
		$db = mysql_select_db("kanishGroupDb",$connection);
		$table = mysql_query("SELECT *FROM interiorworks WHERE carving3d='carving3d' ORDER BY id ASC");
			echo "<div class='imgWrapper'>";
			echo "<ul>";
		while($row=mysql_fetch_array($table)){
			$id = $row['id'];
			$img = $row['image'];
			echo "<li> <img src='../images/interiorworks/3dCarving/$img' />  
			
				<form action='remove3dCarving.php?id=$id' name='remove' method='post' onsubmit='return(removeFun())'> <input type='submit' class='removeBtn' name='remove' value='REMOVE' /> </form> </li> 
			";
			
			
			
			
			
			
		}
		
		echo "</ul>";
	?>
		
		<div class="newBtn"> Insert New Image </div>
		<div class="hiddenDiv">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="frm" id="frm" method="post" enctype="multipart/form-data">
					<input type="file" name="pic" />
					<input type="submit" name="submit" value="UPLOAD" />
			</form>
		</div>		
		</div>
		
		
		<?php
			
			if(isset($_POST['submit'])){		
			include("connection.php");
				$fileName =  $_FILES['pic']['name'];
				$uploaddir = '../images/interiorworks/3dCarving/';
				$targetFile = "../images/interiorworks/3dCarving/" . $fileName;
				if (isset($fileName)){
					$upload = mysql_query("INSERT INTO interiorworks (carving3d, image)VALUE('carving3d','$fileName')");	
					if(!$upload){ echo mysql_error(); }
					
					if (move_uploaded_file($_FILES['pic']['tmp_name'], $targetFile)) {
						echo "<h2 class='success'> successfully uploaded </h2>";
					}else{
						echo mysql_error();
					}
				}
			}
			
		?>
</body>

</html>


