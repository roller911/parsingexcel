<section class="main-content">
        <div class="container">
       <a href="index.php?page=newstudents">Добавить студента</a>
   <ul class="rectangle list-group-horizontal">
    <?php
      foreach ($sql as $good):
      ?>
  <li class="d-flex justify-content-between"><a href="index.php?page=openstudents&id=<?php echo $good['id']; ?>"> <?php echo $good['surname'];?> <?php echo $good['name'];?> <?php echo $good['patronymic'];?> | <?php echo $good['status'];?> | <?php echo $good['idGroups'];?></a><button>Удалить</button></li>
<?php endforeach;?>
</ul> 
</div>     

</section>
