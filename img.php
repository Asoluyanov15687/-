<?php session_start();?>
<?php
$img=$_GET['img'];
echo "<img src='uploads/$img' width='1300' height='700'>";
echo "<a href='myphoto.php' class='btn btn-lg btn-primary btn-block'>Вернуться в фото</a>";
require('connect.php');
$query = "Update photos set viewcount=viewcount+1 where url='$img'";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$query = "SELECT * FROM photos where url='$img'";
$result = mysqli_query($connection,$query) or die(mysqli_error($connection));
while($row = mysqli_fetch_array($result)) {
    $uname=$row['username'];}
if (isset($_SESSION['admin']) or $uname==$_SESSION['username']) {
    echo "<form method='post'> <input type='submit' name='delete' value='Удалить фото' class='btn btn-lg btn-primary btn-block'/></form>";
    if(isset($_POST['delete']))
    {
        $query = "Delete from photos where url='$img'";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        echo "<meta http-equiv=\"refresh\" content=\"0; url=myphoto.php\">";
    }
}
?>