<?php

    session_start();
     require_once '../../connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);
    //ищем в БД запись с введенными логином и паролем
    $check_user = mysqli_query($link, "SELECT * FROM `teachers` WHERE `login` = '$login' AND `password` = '$password'");

  
    if (mysqli_num_rows($check_user) > 0) {
   
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['teachers'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "name" => $user['name'],
            "patronymic" => $user['patronymic'],
            "email" => $user['email'],
            "role"=>$user['role']
        ];
        header('Location: ../../index.php?page=students');
    }else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../../index.php?page=index_profile');
    }
    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>