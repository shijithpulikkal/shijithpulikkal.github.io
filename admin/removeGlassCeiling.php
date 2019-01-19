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
	<h1> Ceiling </h1>
	
	<?php
		$getId = $_GET['id'];
		include("connection.php");
		$db = mysql_select_db("kanishGroupDb",$connection);
		$removed = mysql_query("DELETE FROM printing WHERE id='$getId'");
		if($removed){
			echo "<div class='imgWrapper'> IMAGE REMOVED <br /> <a href='ceiling.php'> BACK </a> </div>";
		}else{
			echo mysql_error();
		}
			
		
		
		
		
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
			$fileName = $_FILES['pic']['name'];
			$uploaddir = '../images/glass/';
			$uploadfile = $uploaddir . basename($_FILES['pic']['name']);
			
			$upload = mysql_query("INSERT INTO printing (glass, image)VALUE('ceiling','$fileName')");
			
			if (move_uploaded_file($_FILES['pic']['tmp_name'], $uploadfile)) {
				echo "successfully uploaded";
			}else{
				echo mysql_error();
			}	
			}
			if(isset($_SET['remove'])){
				echo "REMOVE BUTTON";
			}
		?>
</body>

</html>


