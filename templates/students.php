<?php
session_start();

if (!empty($_SESSION['teachers'])):
   

?>
<section class="main-content">
        <div class="container">
       <a href="index.php?page=newstudents">Добавить студента</a>
   <ul class="rectangle list-group-horizontal">
    <?php
      foreach ($sql as $good):
      ?>
  <li class="d-flex justify-content-between"><a href="index.php?page=openstudents&id=<?php echo $good['id']; ?>"> <?php echo $good['surname'];?> <?php echo $good['name'];?> <?php echo $good['patronymic'];?> | <?php echo $good['status'];?> </a><button>Удалить</button></li>
<?php endforeach;?>
</ul> 
</div>     

</section>
<?php else: ?>
    <p>пожалуйста, авторизуйтесь</p>
<?php endif; ?>