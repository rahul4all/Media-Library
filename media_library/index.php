
<?php include('connectdb.php'); 

session_start();
$_SESSION['stats']=0;
if($_SESSION['stats'] == 1){
    header('Location: index1.php');
    echo $_SESSION['stats'];
}

if(isset($_POST['submit'])){
    $uname = $_POST['username'];
    $upass = $_POST['password'];
	$uppercase = preg_match('#[A-Z]#', $upass);
$lowercase = preg_match('#[a-z]#', $upass);
$number    = preg_match('#[0-9]#', $upass);
$special   = preg_match('#[\W]{2,}#', $upass); 
$length    = strlen($upass) >= 4;

if($uppercase && $lowercase && $number && $length) {
  
   	
	 $sql = "SELECT * FROM login WHERE uname = '".$uname."' AND upass = '".$upass."';";
	 $message1 = " wrong username or password you are not authorized to access";
    echo "<script type='text/javascript'>alert('$message1');</script>";
	echo "\n";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        $_SESSION['stats']=1;
        echo $_SESSION['stats'];
        header('Location: index1.php');
    }else{
        $_SESSION['stats']=0;
        echo $_SESSION['stats'];
    }
	
	
   }else{
   $message="Not a valid Password"; 
   	 echo "<script type='text/javascript'>alert('$message');</script>";
   }
   
}
?>
<html>
    <head>
        <title>Personal Media Library</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--<link rel="stylesheet" href="assets/css/font-awesome.min.css"/>-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    </head>
    <body class="landing">
        <div id="page-wrapper">
				<header id="header" class="alt">
					<h1><a href="index.php">Media Liberary</a> <?php echo ' by Rahul Singh' ?></h1>
					<nav id="nav">
						<ul>
						
							
							<li><a href="index.php" class="icon fa-angle-down">Guest</a>
							    <ul>
							        <li><a href="index1.php">Guest Mode</a></li>
							    </ul>
							</li>
							
						</ul>
					</nav>
				</header>
              
              <section id="cta">

                
					<h2>LOG IN</h2>
					<p></p>

					<form method="post" action="" enctype="multipart/form-data">
						<div class="row uniform 50%">
							<div class="12u 12u(mobilep)">
								<input type="text" name="username" id="username" placeholder="Username" />
							</div>
							<div class="12u 12u(mobilep)">
								<input type="password" name="password" id="password" placeholder="Password" />
							</div>
							<div class="12u 12u(mobilep)">
								<input type="submit" name="submit" value="Log In" class="fit" />
							</div>
						</div>
					</form>

				</section>
              
               <footer id="footer">
					<ul class="icons">
						<li><a href="https://www.facebook.com/sahilrox95" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://github.com/sahilrox95" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="http://plus.google.com/101693140848542248910" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; All rights reserved.</li><li>Design: <a href="https://github.com/sahilrox95">Rahul Singh</a></li>
					</ul>
				</footer>
        </div>
        <!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
    </body>
</html>
