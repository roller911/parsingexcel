<?php
session_start();

if (!empty($_SESSION['teachers'])):
   

?>

<nav aria-label="...">
  <ul class="pagination pagination-sm">
    <div class="col-md-3">       
    <select class="form-select"  required>
      <option selected disabled value="">Выберите семестр</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
  </select>
  <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Выберите группу</option>
      <?php
      foreach ($grp_sql as $good):
      ?>
      <option><?php echo $good['name'];?></option>
<?php endforeach;?>
    </select>
</nav>
</br>

<form method="post" name="loadform" action="src/loadresult.php">
<table class="table table-bordered table-sm">
    <tr>
        <td rowspan="2">№п/п
</td>
        <td rowspan="2">Фио</td>
        <td colspan="4">Наименование дисциплины</td>
        <td rowspan="2">Средний балл</td>
        <td colspan="3">Пропуски занятий</td>
    </tr>
   

    <tr>
        <?php
      foreach ($obj as $good):
      ?>
        <td><?php echo $good['name'];?></td>
        <?php endforeach;?>
        <td>Уважительные</td>
        <td>Неуважительные</td>
        <td>Всего</td>
    </tr>
     

     <?php
      foreach ($sql as $good):
      ?>
    <tr>
        <td>#</td>
        <td id=""><?php echo $good['surname'];?> <?php echo $good['name'];?> <?php echo $good['patronymic'];?></td>

    <?php
      foreach ($obj as $good):
      ?>


      <td><input type="text" size="1" id=""></td>
      <?php endforeach;?>

        <td></td>
        <td><input type="text" size="1" id="pr1"></td>
        <td><input type="text" size="1" id="pr2"></td>
        <td ><p id="pr_result"></td>
    </tr>
    <?php endforeach;?>





<tr>
        <td colspan="2">Реализ. станд.по дисциплине</td>
       <?php
      foreach ($obj as $good):
      ?>
      <td></td>
      <?php endforeach;?>
    </tr>
    <tr>
        <td colspan="2">Качество знаний по
дисциплине </td>
       <?php
      foreach ($obj as $good):
      ?>
      <td></td>
      <?php endforeach;?>
    </tr>
    <tr>
        <td colspan="2">Кол-во «5» по пред-ту </td>
        <?php
      foreach ($obj as $good):
      ?>
      <td></td>
      <?php endforeach;?>

    </tr>

    <tr>
        <td colspan="2">Кол-во «4» по пред-ту</td>
       <?php
      foreach ($obj as $good):
      ?>
      <td></td>
      <?php endforeach;?>
    </tr>
    <tr>
        <td colspan="2">Кол-во «3» по пред-ту </td>
      
    </tr>
    <tr>
        <td colspan="2">Кол-во «2» по пред-ту</td>
      <?php
      foreach ($obj as $good):
      ?>
      <td></td>
      <?php endforeach;?>
    </tr>
    <tr>
        <td colspan="2">Средний бал по пред-ту</td>
        <?php
      foreach ($obj as $good):
      ?>
      <td></td>
      <?php endforeach;?>
    </tr>
    <tr>
        <td colspan="2">Реал. станд.по группе</td>
        <td colspan="8"></td>
    </tr>
    <tr>
        <td colspan="2">Качество знаний по гр
</td>
        <td colspan="8"></td>
    </tr>
    <tr>
        <td colspan="2">Средний балл по группе</td>
        <td colspan="8"><input type="text" id=""/></td>
    </tr>

</table>

<button  class="btn btn-primary" type="submit" name="submit_excel">Загурузить </button>




 </form>   
<?php else: ?>
    <p>пожалуйста, авторизуйтесь</p>
<?php endif; ?>
   


