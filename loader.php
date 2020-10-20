<?php session_start();?>
<div class="container">
    <form class="form-signin" method="post" enctype="multipart/form-data">
        <h2>Загрузка фото</h2>
        <a href='myphoto.php' class='btn btn-lg btn-primary btn-block'>Мои фото</a>
        <a href='loader.php' class='btn btn-lg btn-primary btn-block'>Загрузить фото</a>
        <a href='logout.php' class='btn btn-lg btn-primary btn-block'>Выйти</a>
        <input type="file" name="image" value="">
        <button class="btn btn-lg btn primary btn-block" type="submit">Загрузить</button>
    </form>
</div>

<?php
if (isset($_SESSION['admin']))
{
    echo "<a href='allphoto.php' class='btn btn-lg btn-primary btn-block'>Все фото</a>";
}
require ('connect.php');
$username=$_SESSION['username'];
$folderUploads = 'uploads';
$image = $_FILES['image'];
$date = Date('d.m.Y.H.i.s.u');
if($image) {
    $image_name = $image['name'];
    $date=$date.$image_name;
    $tmp_name = $image['tmp_name'];
    if(!move_uploaded_file($tmp_name, $folderUploads . DIRECTORY_SEPARATOR. $date)){
        echo "Не удалось загрузить файл";
    }
    else
    {
        $query= "INSERT INTO photos (username,url) VALUES('$username','$date')";
        $result = mysqli_query($connection,$query);
    }
}

?>
