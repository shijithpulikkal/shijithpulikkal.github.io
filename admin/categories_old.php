<?php
	include("connection.php");
	$db = mysql_select_db("kanishGroupDb",$connection);

	
?>

<html> 
<head> 
<title> Kanish group </title>
<link href="css/adminStyles.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.min.js"> </script>
<script type="text/javascript"> 

	$(document).ready(function(){
		
		$("#category").change(function() {
			var val = $('#category').val();
				if(val=="Door"){
					window.location.href="glassdoor.php";
				}
				if(val=="Ceiling"){
					window.location.href="ceiling.php";
				}
				if(val=="Wall"){
					window.location.href="wall.php";
				}
				if(val=="Handrails"){
					window.location.href="handrails.php";
				}
				if(val=="Partition"){
					window.location.href="partition.php";
				}
				if(val=="Tabletop"){
					window.location.href="tableTop.php";
				}
			});
		
		$("#category2").change(function() {
			var val = $('#category2').val();
				if(val=="Multiwood"){
					window.location.href="carving_multiwood.php";
				}
				if(val=="MDF"){
					window.location.href="carving_mdf.php";
				}
				if(val=="Wood"){
					window.location.href="carving_wood.php";
				}
				if(val=="Face Engraving"){
					window.location.href="carving_faceEngraving.php";
				}
				if(val=="Face Embossing"){
					window.location.href="carving_faceEmbossing.php";
				}
				if(val=="'V'bit Carving"){
					window.location.href="carving_VbitCarving.php";
				}
				if(val=="ACP Cutting"){
					window.location.href="carving_acpCutting.php";
				}
				if(val=="Cutting & Carving"){
					window.location.href="carving_cuttingCarving.php";
				}
			});	
			$("#category3").change(function() {
			var val = $('#category3').val();
				if(val=="Kitchen Cupboard"){
					window.location.href="kichenCupboard.php";
				}
				if(val=="Modular Kitchen"){
					window.location.href="modularKichen.php";
				}
				if(val=="Wardrobe"){
					window.location.href="wardrobe.php";
				}
				if(val=="Cupboard"){
					window.location.href="cupboard.php";
				}
				if(val=="Coat"){
					window.location.href="coat.php";
				}
				if(val=="Dining Table"){
					window.location.href="diningTable.php";
				}
				if(val=="Canvas Wall"){
					window.location.href="canvaswall.php";
				}
				if(val=="Kids Room"){
					window.location.href="kidsRoom.php";
				}
				if(val=="Grillboard Partition"){
					window.location.href="grillboardPartition.php";
				}
				if(val=="Waveboards"){
					window.location.href="waveBoards.php";
				}
				if(val=="3D, 4D Carving & Antique Works"){
					window.location.href="3dCarving.php";
				}
				if(val=="Flower Pots"){
					window.location.href="flowerPots.php";
				}
				if(val=="Mugap"){
					window.location.href="mugap.php";
				}
				if(val=="Thoomanam"){
					window.location.href="thoomanam.php";
				}
				if(val=="Slatwall"){
					window.location.href="slatWall.php";
				}
			});	

			$("#category4").change(function() {
			var val = $('#category4').val();
				if(val=="Decorative Windows"){
					window.location.href="decorativeWindows.php";
				}
				if(val=="Dining Table"){
					window.location.href="productsDiningTable.php";
				}
				if(val=="Chair & Table Set"){
					window.location.href="chairAndTable.php";
				}
				if(val=="Mugap"){
					window.location.href="productsMugap.php";
				}
				if(val=="Thoomanam"){
					window.location.href="productsThoomanam.php";
				}
				if(val=="Interior & Exterior Lights"){
					window.location.href="lights.php";
				}
				
			});	
	});	
</script>
</head>
<body>
	<h1> Printing </h1>
<div class="categoryDiv">	
	<h2> Glass </h2>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="test()" name="frm1" id="frm1" method="post">
		<select name="category" id="category">			
				<option > SELECT CATEGORY </option>
				<option id="opt1"> Door </option> 
				<option id="opt2"> Ceiling </option> 
				<option id="opt3"> Wall </option> 
				<option id="opt4"> Handrails </option> 
				<option id="opt5"> Partition </option> 
				<option id="opt6"> Tabletop </option> 
				
		</select>
	</form>
	<a href="formboard.php"> formboard </a>
	<a href="mdf.php"> mdf </a>
	<a href="wpc.php"> wpc </a>
	<a href="acp.php"> acp </a>
	<a href="hylamsheet.php"> Hylamsheet </a>
	<a href="canvas.php"> Canvas </a>
	<a href="forex.php"> forex </a>
	<a href="acrylic.php"> acrylic </a>
</div>

<div class="categoryDiv">
	<h2> Carving </h2>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="frm2" id="frm2" method="post">
		<select name="category2" id="category2">			
				<option> SELECT CATEGORY </option>
				<option id="opt1"> Multiwood </option>  
				<option id="opt8"> MDF </option> 
				
				<option id="opt9"> Wood </option> 
				<option id="opt10"> Face Engraving </option> 
				<option id="opt11"> Face Embossing </option> 
				<option id="opt12"> 'V'bit Carving </option> 
				<option id="opt13"> ACP Cutting </option> 
				<option id="opt14"> Cutting &amp Carving </option> 
		</select>
	</form>
</div>
<div class="categoryDiv">	
	<h2> Interior Works </h2>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="frm2" id="frm3" method="post">
		<select name="category3" id="category3">			
				<option> SELECT CATEGORY </option>
				<option id="opt15"> Kitchen Cupboard </option> 
				<option id="opt16"> Modular Kitchen </option> 
				<option id="opt17"> Wardrobe </option> 
				<option id="opt18"> Cupboard </option> 
				<option id="opt19"> Coat </option> 
				<option id="opt20"> Dining Table </option> 
				<option id="opt21"> Canvas Wall </option> 
				<option id="opt22"> Kids Room </option> 
				<option id="opt23"> Grillboard Partition </option> 
				<option id="opt24"> Waveboards </option> 
				<option id="opt25"> 3D, 4D Carving & Antique Works </option> 
				<option id="opt26"> Flower Pots </option>
				<option id="opt27"> Mugap </option>
				<option id="opt28"> Thoomanam </option>
				<option id="opt29"> Slatwall </option>
		</select>
	</form>
</div>

<div class="categoryDiv">
	<h2> Products </h2>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="frm2" id="frm2" method="post">
		<select name="category4" id="category4">			
				<option> SELECT CATEGORY </option>
				<option id="opt30"> Decorative Windows </option>
				<option id="opt31"> Dining Table </option> 
				<option id="opt32"> Chair &amp; Table Set </option> 				
				<option id="opt33"> Mugap </option> 
				<option id="opt34"> Thoomanam </option> 
				<option id="opt35"> Interior &amp; Exterior Lights </option> 				
		</select>
	</form>
</div>
</body>

</html>


