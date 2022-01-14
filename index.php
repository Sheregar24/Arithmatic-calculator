<?php 
include("db.php");
session_start();
// Redirect the user to login page if he is not logged in.
if(!isset($_SESSION['loggedIn'])){
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home </title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

		<style type="text/css">
		#nav{
			background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,18,127,1) 43%, rgba(9,9,121,1) 100%, rgba(0,212,255,1) 100%);
			padding: 10px;
			color: white;
			}
			.navbar-light .navbar-nav .nav-link {
			color: white;
			}
		</style>
	</head>
	<body>

		<nav id="nav" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="">Arithmetic operation</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto offset-md-8 float-right">
				
				<li class="nav-item">
					<span class="nav-link">Welcome  <?php echo $_SESSION["loggedIn"] ;?></span>
				</li>
				<li class="nav-item">
					<span class="nav-link"> | </span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Log Out</a>
				</li>
			</ul>
			</div>
		</div>
		</nav>
		<br>
		<br>
		<br>


		<div class="container" style="padding:100px;width:100%;text-align:center;">
			<div>
				<input type=text  id='t1'>
				<input type=button value='show' onClick='add_element()'>
			</div>
			<p id=disp></p>
			<br>
			<div>
				<input type=button value='mean' onClick='mean()'>
				<input type=button value='median' onClick='median()'>
				<input type=button value='mode' onClick='mode()'>
			</div><br>
			<!-- display outputs -->
			<div>
				<p id="mean">Mean : </p>
				<p id="median">Median : </p>
				<p id="mode">Mode : </p>
			</div>
		</div>

		
			
		<script>
			
			let x = 0;
			let array = Array();

			function add_element()
			{
			array[x] = document.getElementById("t1").value;
			x++;
			document.getElementById("t1").value = "";
			display_array();
			}

			
			function display_array()
			{
			
			let e = "<hr/>";	
			for (let y=0; y<array.length; y++)
			{
				e += ""+array[y]+",";
			}
			document.getElementById("disp").innerHTML = e;
			}
			
		
			function mean(){
				let total = 0;
				for (let i = 0; i < array.length; i++) {
					total += parseInt(array[i]);
					console.log(total);
				}
				let result1= total / array.length;
				document.getElementById("mean").innerHTML += result1;
			}

			function median(){	
				let middle = Math.floor(array.length / 2);
				array = [...array].sort((a, b) => a - b);
				let result2= array.length % 2 !== 0 ? array[middle] : (array[middle - 1] + array[middle]) / 2;
				document.getElementById("median").innerHTML += result2;
			}

			function mode(){
				const mode = {};
				let max = 0, count = 0;

				for(let i = 0; i < array.length; i++) {
					const item = array[i];
					
					if(mode[item]) {
					mode[item]++;
					} else {
					mode[item] = 1;
					}
					
					if(count < mode[item]) {
					max = item;
					count = mode[item];
					}
				}	
			let result3= max;
			document.getElementById("mode").innerHTML += result3;
			}
		</script>
	</body>
</html>