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

       echo "<td><input type='text' size='1' id='sr{$c}'></td>
        <td><input type='text' size='1' id='pr1'></td>
        <td><input type='text' size='1' id='pr2'></td>
        <td ><p id='pr_result'></td>
    </tr>";
    $c++;
    endforeach;
    $k1=0;
    
echo "<tr>
        <td colspan='2'>Реализ. станд.по дисциплине</td>";
foreach ($obj as $good):
echo "<td><input type='text' id=real{$k1} size='1'> </td>";
$k1++;
endforeach;
echo "</tr>
    <tr>
        <td colspan='2'>Качество знаний по
дисциплине </td>";
$k2=0;
foreach ($obj as $good):
echo "<td><input type='text' id=kach{$k2} size='1'> </td>";
$k2++;
endforeach;
echo "</tr>
    <tr>
        <td colspan='2'>Кол-во «5» по пред-ту </td>";

$m5=0;
foreach ($obj as $good):
echo "<td><input type='text' id=kol5{$m5} size='1'> </td>";
$m5++;
endforeach;
echo "</tr>

    <tr>
        <td colspan='2'>Кол-во «4» по пред-ту</td>";
$m4=0;
foreach ($obj as $good):
echo "<td><input type='text' id=kol4{$m4} size='1'> </td>";
$m4++;
endforeach;
 echo "</tr>
    <tr>
        <td colspan='2'>Кол-во «3» по пред-ту </td>";
$m3=0;
foreach ($obj as $good):
echo "<td><input type='text' id=kol3{$m3} size='1'> </td>";
$m3++;
endforeach;
echo "</tr> <tr>
        <td colspan='2'>Кол-во «2» по пред-ту</td>";
$m2=0;
foreach ($obj as $good):
echo "<td><input type='text' id=kol2{$m2} size='1'> </td>";
$m2++;
endforeach;
echo "</tr> <tr>
        <td colspan='2'>Средний бал по пред-ту</td>";
        $r=0;
foreach ($obj as $good):
echo "<td><input type='text' id='srp{$r}'' size='1'> </td>";
$r++;
endforeach;
echo "</tr>
    <tr>
        <td colspan='2'>Реал. станд.по группе</td>
        <td><input type='text' size='1' id='realgr'/></td>
    </tr>
    <tr>
        <td colspan='2'>Качество знаний по гр
</td>
        <td><input type='text' size='1' id='kachggr'/></td>
    </tr>
    <tr>
        <td colspan='2'>Средний балл по группе</td>
        <td><input type='text' size='1' id='srzngr'/></td>
    </tr>";
    ?>


</table>

<button  class="btn btn-primary" type="submit" name="submit_excel">Загурузить </button>




 </form>   
<?php else: ?>
    <p>пожалуйста, авторизуйтесь</p>
<?php endif; ?>
   


