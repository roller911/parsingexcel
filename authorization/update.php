 <?php $id=$_REQUEST['id'];
            $name=trim($_REQUEST['name']);
            $discription=trim($_REQUEST['discription']);
            $price=trim($_REQUEST['price']);
            $update_sql="UPDATE product SET name ='$name',discription='$discription',price='$price'";
            mysqli_query($update_sql) or die("Ошибка вставки" . mysql_error());
            echo '<p>Запись успешно обновлена!</p>';
        ?>