<?php session_start(); ?>
<div class="container">
    <form class="form-signin" method="post">
        <h2>Все фото</h2>
        <a href='myphoto.php' class='btn btn-lg btn-primary btn-block'>Мои фото</a>
        <a href='loader.php' class='btn btn-lg btn-primary btn-block'>Загрузить фото</a>
        <a href='logout.php' class='btn btn-lg btn-primary btn-block'>Выйти</a>
    </form>
</div>
<?php
if (isset($_SESSION['admin'])) {
    echo "<a href='allphoto.php' class='btn btn-lg btn-primary btn-block'>Все фото</a>";
    require('connect.php');
    $username = $_SESSION['username'];
    $query = "SELECT * FROM photos";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    while ($row = mysqli_fetch_array($result)) {
        $url = $row['url'];
        $viewcount=$row['viewcount'];
        echo "<a href='img.php?img=$url' title='Количество просмотров-$viewcount'><img src='uploads/$url' width='350' height='300'></a>";
        $url = '';
    }
}
?>
</body>
</html>
