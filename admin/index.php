<?php
	include("connection.php");

	if(isset($_POST['submit'])){
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$msg = "<div class='msg'> ENTER YOUR CREDENTIALS </div>";
		if($user && $pass){
			if($user=="kanish" AND $pass=="kanishBrij123"){
				header("location:categories.php");
			}else{

				echo "<script> alert('wrong username or password'); </script>";

			}
		}

	}

?>
<html>
<head>
<link href="css/adminStyles.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.min.js"> </script>
<script>

	$(document).ready(function(){

	});


</script>
</head>
<body>

<div class="loginDiv">


<h1> LOGIN </h1>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="frm" method="post" >

		<input type="text" name="username" placeholder="Username" />
		<input type="password" name="password" placeholder="Password" />
		<input type="submit" class="submit" name="submit" value="LOGIN" />

	</form>
	<?php
		if(isset($_SESSION['MSG'])){ echo $_SESSION['MSG']; }
	?>
</div>

</body>

</html>
