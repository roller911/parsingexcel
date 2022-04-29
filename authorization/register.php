<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link href="/css/site.css" rel="stylesheet">
</head>

<body>
    <form action="authorization/handler_form/signup.php" method="post" enctype="multipart/form-data">
        <div id="range1">
            <div class="outer">
                <div class="middle">
                    <div class="inner">
                        <div class="login-wr">
                            <div class="form">
                                <div class="form_text">
                                    Фамилия
                                </div>
                                <input type="text" name="full_name" placeholder="Введите свою фамилию">
                                <div class="form_text">
                                    Имя
                                </div>
                                <input type="text" name="full_name" placeholder="Введите свое полное имя">
                                <div class="form_text">
                                    Отчество
                                </div>
                                <input type="text" name="full_name" placeholder="Введите свое отчество">
                                <div class="form_text">
                                    Логин
                                </div>
                                <input type="text" name="login" placeholder="Введите свой логин">

                                <div class="form_text">
                                    Почта
                                </div>
                                <input type="email" name="email" placeholder="Введите адрес своей почты">
                                   <!-- <div style="color:red;"> <?= $_SESSION['error_email'] ?></div>-->
                                   <div class="form_text">
                                    Телефон
                                </div>
                                <input type="text" name="full_name" placeholder="Введите свой номер телефона">
                                <div class="form_text">
                                    Пароль
                                </div>
                                <input type="password" name="password" placeholder="Введите пароль">

                                <div class="form_text">
                                    Подтверждение пароля
                                </div>
                                <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
                                <button type="submit"> Зарегистрироваться </button>
                                <p>
                                    У вас уже есть аккаунта? <a href="index.php?page=index_profile">Авторизируйтесь</a>
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