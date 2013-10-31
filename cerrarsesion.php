<?php
  session_start();
    if ( !$_SESSION['SCC']['usuario'] )
			header("Location: ../index.php");
			
  unset($_SESSION['SCC']['usuario']); 
  session_destroy();
  header("Location: index.php");
  exit;
?>