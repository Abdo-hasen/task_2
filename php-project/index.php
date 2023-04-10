<?php include "inc/header.php" ?>
<?php

if(!isset($_SESSION["auth"])){
    header("location:login.php");
    die;
}

?>
<?php include "inc/nav.php" ?>

<h1> Home Page </h1>
<h1>welcome again</h1>

<?php include "inc/footer.php" ?>




