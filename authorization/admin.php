<?php
session_start();
if (!$_SESSION['teachers']) {
    header('Location: /');
}
$id_user = $_SESSION['teachers']['id'];


?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>


<body>
    <div id="authorization">
        <form id="login">
            <table align="center">
                <tr>
                    <td colspan="2" align="center">
                        <h2>Вы вошли как администратор</h2>
                    </td>
                </tr>
                <tr>
                    <td> Ваше ФИО</td>
                    <td style="padding-left: 25px;">
                        <p><?= $_SESSION['teachers']['surname'] ?></p>
                    </td>
                </tr>
                <tr>
                    <td> Ваш адрес электронной почты</td>
                    <td style="padding-left: 25px;">
                        <p><?= $_SESSION['teachers']['email'] ?></p>
                    </td>
                </tr>

            </table>


            <table>
                <tr>
                    <td></td>
                    <td><b>Наименование</b></td>
                    <td><b>Количество</b></td>
                    <td><b>Цена за единицу</b></td>
                    <td><b>Итого</b></td>
                </tr>


                <?php

        //подключаемся к БД и выбираем все данные о наших товарах

                
        //выбираем только те товары, чей id соответствует id товар из массива //$_SESSION['add_id'] добавленных в корзину

           


    // Выводим итоговую сумму заказа
        ?>
                <tr>
                    <td align="right" colspan="6"><b> </b></td>
                </tr>
                <tr>
                    <td colspan="6" class="exit">
                        <p><a href="authorization/handler_form/logout.php" class="logout">Выход</a></p>
                    </td>
                </tr>
            </table>
        </form>

    </div>
<div>
  
<table>
    <tr><th>ID</th><th>Название</th><th>Стоимость</th><th></th></tr>
    
    <tr>
    <td></td>
    <td></td>
    <td> </td>
    <td><input type='text' name='name' value='' /></p></td>
    <td><input type='text' name='price' value='' /></p></td>
    <td><button href="index.php?page=update&up_id=<?=$good_m['id']?>">Изменить</button></td>
</tr>
</table>




</div>
</body>
</html>