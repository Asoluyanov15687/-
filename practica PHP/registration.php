<?php
require ('connect.php');
if (isset($_POST['username']) && isset($_POST['password']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query= "INSERT INTO users (username,password) VALUES('$username','$password')";
    $result = mysqli_query($connection,$query);

    if($result)
    {
        $smsg = "Регистрация выполнена";
    }
    else
    {
        $fsmsg = "Ошибка";
    }
}
?>
    <div class="container">
        <form class="form-signin" method="post">
            <h2>Регистрация</h2>
            <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php }?>
            <?php if(isset($fsmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div><?php }?>
            <input type="text" name="username" class="form-control" placeholder="username" required>
            <input type="password" name="password" class="form-control" placeholder="password" required>
            <button class="btn btn-lg btn primary btn-block" type="submit">Зарегистрироваться</button>
            <a href="login.php" class="btn btn-lg btn-primary btn-block">Войти</a>
        </form>
    </div>
</body>
</html>