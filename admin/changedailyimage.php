<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("includes/admin.php"); ?>

<main>
        <section class="well well__offset-3">

<?php

$id= trim(htmlspecialchars(mysqli_real_escape_string($conn, $_GET['id'])));
$daily= trim(htmlspecialchars(mysqli_real_escape_string($conn, $_GET['daily'])));

?>

<?php
$result=mysqli_query($connection, "SELECT * FROM img_upload WHERE ID ='$id'");
while($row = mysqli_fetch_array($result))
{ 
    $filename = $row['filename'];
}
   ?>  
   
   <?php
$query = "UPDATE `examserver49_dk_db`.`dailyspecial` SET `img` = '$filename' WHERE dailyspecial_id = '$daily'";
$result = mysqli_query($connection, $query) or die('Error, query failed');
?>


    </section>
</main>
<?php
mysqli_close($connection);

// Redirect to delete.php.
header("location:dailyspecial.php");
?> 