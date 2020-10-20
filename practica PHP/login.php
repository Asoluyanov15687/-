<?php session_start(); ?>
<div class="container">
    <form class="form-signin" method="post">
        <h2>Вход</h2>
        <input type="text" name="username" class="form-control" placeholder="username" required>
        <input type="password" name="password" class="form-control" placeholder="password" required>
        <button class="btn btn-lg btn primary btn-block" type="submit">Войти</button>
        <a href="Registration.php" class="btn btn-lg btn-primary btn-block">Зарегистрироваться</a>
    </form>
</div>
<?php
require ('connect.php');
if (isset($_POST['username']) and isset($_POST['password']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query = "SELECT * FROM users where username='$username' and password='$password'";
    $result = mysqli_query($connection,$query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    if($count==1)
    {
        $_SESSION['username']=$username;
    }
    else
    {
        $fsmg="ошибка";
    }
}
if(isset($_SESSION['username']))
{
    $username=$_SESSION['username'];
    $query = "SELECT lvl FROM users where username='$username'";
    $result = mysqli_query($connection,$query) or die(mysqli_error($connection));
    while($row = mysqli_fetch_array($result)) {
        $lvl=$row['lvl'];
        if ($lvl==1){
            $_SESSION['admin']=TRUE;
        }
    }
    echo "<a href='loader.php?user=$username'>";
    echo "<meta http-equiv=\"refresh\" content=\"0; url=loader.php\">";
}
?>
</body>
</html>