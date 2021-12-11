<?php 
session_start();
include('./includes/creds.php');

  if($_SESSION['username'] !== $USER){
      header("Location: login.php");
      die();
  } else {
	  $labNum = "Logs";
	  require "./includes/header.php";
  }
?>

<div class="row">
  <div class="col-lg-12">
      <?php if (isset($error)) { ?>
          <span class="text text-danger"><b><?php echo $error; ?></b></span>
      <?php } ?>
    <p>Hi <?php echo $_SESSION['username']; ?></p>
<p>Here are the logs in the following format: <code>user:ip:USER-Agent:Page</code>. The log file location at: <code>./includes/logs/app_access.log</code><p>
<a href="reset.php?reset=<?php echo $PASS?>">Reset Logs</a>
<hr>
<pre><code>
<?php //nclude('./includes/logs/app_access.log');
$handle = fopen("includes/logs/app_access.log", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
	    // process the line read.
	    echo $line;
    }

    fclose($handle);
} else {
    // error opening the file.
} 

?>
</code></pre>
