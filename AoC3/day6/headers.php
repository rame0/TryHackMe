<?php 


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $labNum; ?></title>


    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">

    <!-- Core libraries bootstrap & jquery -->
    <script src="./js/bootstrap5.min.js"></script>
    <script src="./js/jquery-3.6.0.min.js"></script>

    <!-- Custom JS code -->
    <script src="./js/script.js"></script>

  </head>

    <header>
<div class="container">
  <ul class="nav">
  	<li class="nav-item">
    		<a class="nav-link" href="./index.php">Home</a>
	</li>
        <li class="nav-item">
                <a class="nav-link">/</a>
        </li>
 	<li class="nav-item">
	<a class="nav-link active" ><?php echo $labNum; ?></a>
        </li>
  </ul>
</div>
    </header>
<body>
  <div class="container" style="padding-top: 5%;">
	<img src="./img/xmas_tree.png" class="mx-auto d-block" width="200" height="300">
      <h1 class="display-4">McSys Control System</h1>
      <p class="lead">Note from McSys Control System: The access to this web app is limited!
<hr class="my-4">

<p><?php writeLogs()?></p>


<?php 
	$parameter = $_SERVER['QUERY_STRING'];
if(basename($_SERVER['PHP_SELF']) == "index.php" && strlen($parameter) == 0){
	header('Location: index.php?err=error.txt');
	die();
} else {
	if($_GET['err']){
		$errInclude = true;
	}
}
?>
<?php
function getUserAgent(){
  $log = getUserName().':' .$_SERVER['REMOTE_ADDR'].':'. $_SERVER['HTTP_USER_AGENT']. ':' .$_SERVER['REQUEST_URI']. "\n";
return $log;
}

function getUserName(){
	if(!isset($_SESSION['username'])){
		$username = "Guest";
	} else {
		$username = $_SESSION['username'];
	}
	return $username;
}


function writeLogs(){
	
	$logFile = "./includes/logs/app_access.log";
	$log = getUserAgent();
	$writer = fopen($logFile,"a+") or die("Unable to open file!");
	fwrite($writer, $log);
	//fclose($writer);
}

?