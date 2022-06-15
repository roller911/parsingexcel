<?php
session_start();

if ($_SESSION['teachers']) {
   
}


?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link href="../css/main.css" rel="stylesheet">
</head>
<body>
    <!-- signin-->
    <form method="POST" action="authorization/handler_form/signin.php">
        <div id="range1">
            <div class="outer">
                <div class="middle">
                    <div class="inner">
                        <div class="login-wr">
                            <div class="form">
                                <div class="form_text">
                                    Логин
                                </div>
                                <input type="text" name="login" placeholder="Пользователь">
                                <div class="form_text">
                                    Пароль
                                </div>
                                <input type="password" name="password" placeholder="Пароль">
                                <button type="submit">Войти</button>
                                <p>
                                    <a href="index.php?page=register">Зарегистрироваться</a>!
                                </p>
                                <?php
                                    if ($_SESSION['message']) {
                                        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                                    }
                                    unset($_SESSION['message']);
                                ?>
                                <p>
                                    <a href="index.php">На главную</a>!
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>