<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("includes/admin.php"); ?>

<?php define( "TITLE", "Daily Images | Admin Panel"); include( 'includes/header.php'); ?>

<?php
$id= trim(htmlspecialchars(mysqli_real_escape_string($connection, $_GET['item'])));
$menu = "SELECT * FROM  dailyspecial WHERE dailyspecial_id ='$id' ";
$result = mysqli_query($conn, $menu);
$row = mysqli_fetch_array($result);
?>
<main>
    <section class="well well__offset-3">
        <div class="container">
            <h2><em>Change</em> image for <?php echo $row['title']; ?></h2>
            <div class="row box-2">
<?php
$result=mysqli_query($connection, "SELECT * FROM img_upload ORDER BY ID DESC");
while($row = mysqli_fetch_array($result))
{ ?>
     <div class="grid_4">
                    <div class="img">
                        <div class="lazy-img" style="padding-bottom: 76.21621621621622%;"> <a href="changedailyimage.php?id=<?php echo $row['ID']; ?>&daily=<?php echo $id; ?>">

                            <img class="lazy-loaded" data-src="http://examserver49.dk/img/<?php echo  $row['filename'];?>">
                            </a></div>
                    </div>
                    <h3><a href="changedailyimage.php?id=<?php echo $row['ID']; ?>" class="btn">Change to this image</a></h3>
                </div>
                <?php
}
?>
    </div>
        </div>
    </section>
</main>
<?php include( 'includes/footer.php'); ?>
mysqli_close($connection);
?> 

</body>
</html>