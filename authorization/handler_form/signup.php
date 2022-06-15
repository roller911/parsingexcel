<?php

    session_start();
    require_once '../../connect.php';


    $full_name = $_POST['full_name'];
    $name = $_POST['name'];
    $patronymic = $_POST['patronymic'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    //проверяем есть ли пользователь в БД с таким логином
    $check_user = mysqli_query($link, "SELECT * FROM `teachers` WHERE `login` = '$login' ");
    //mysqli_num_rows() - возвращает число рядов в результирующей выборке
  
    if (mysqli_num_rows($check_user) > 0) {
        $_SESSION['message'] = 'Такой логин уже используется';
        header('Location:  ../../index.php?page=register');

    }else{

    if ($password === $password_confirm) {


        $password = md5($password);

        if (mysqli_query($link, "INSERT INTO `teachers`  VALUES (NULL, '$full_name', '$login','$email','$password','$name','$patronymic')")){
            echo "успешно";
        }else{
            echo "не вошел";
        }

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../../"index.php?page=index_profile"');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../../index.php?page=register');
    }
}
?>
