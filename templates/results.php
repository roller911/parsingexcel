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
        <?php foreach ($obj as $good):
        
echo "<td colspan={$i}>Наименование дисциплины</td>";
endforeach;?>
        <td rowspan="2">Средний балл</td>
        <td colspan="3">Пропуски занятий</td>
    </tr>
   

    <tr>
        <?php
      foreach ($obj as $good):
      
        echo "<td class='mark'>{$good['name']}</td>";
        endforeach;?>
        <td>Уважительные</td>
        <td>Неуважительные</td>
        <td>Всего</td>
    </tr>
     

     <?php
     $c=0;
      foreach ($sql as $good):
      
    echo "<tr>
        <td>#</td>
        <td class='student'>{$good['surname']} {$good['name']} {$good['patronymic']}</td>";

    
    $i=0;
      foreach ($obj as $good):
    


     echo" <td><input type='text' size='1' id=r{$c}c{$i} oninput='srzn()'value=0></td>";
     $i++;
       endforeach;

       echo "<td><input type='text' id='sr{$c}'></td>
        <td><input type='text' size='1' id='pr1'></td>
        <td><input type='text' size='1' id='pr2'></td>
        <td ><p id='pr_result'></td>
    </tr>";
    $c++;
    endforeach;?>






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
   


