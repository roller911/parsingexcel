<form method="post" name="loadform" action="src/loadresult.php">
<table class="table table-bordered">
    <tr>
        <td rowspan="2">№п/п
</td>
        <td rowspan="2">Фио</td>
        <td colspan="4">Наименование дисциплины</td>
        <td rowspan="2">Средний балл</td>
        <td colspan="3">Пропуски занятий</td>
    </tr>
    <tr>
        <td>английский язык</td>
        <td>мдк 01.01</td>
        <td>уп 11</td>
        <td>русский язык</td>
        <td>уважительные</td>
        <td>неуважительные</td>
        <td>всего</td>
    </tr>
     <?php
      foreach ($sql as $good):
      ?>
    <tr>
        <td>#</td>
        <td id=""><?php echo $good['surname'];?> <?php echo $good['name'];?> <?php echo $good['patronymic'];?></td>

        <td><input type="text" name="result1" /></td>
        <td><input type="text" name="result2"/></td>
        <td><input type="text" name="result3"/></td>
        <td><input type="text" name="result4"/></td>
        <td></td>
        <td><input type="text" value="1" name="pruv"/></td>
        <td><input type="text" value="3" name="npruv"/></td>
        <td><?php 
       $pruv = $_POST[pruv];
        echo $pruv+$npruv;?></td>
    </tr>
    <?php endforeach;?>
<tr>
        <td colspan="2">Реализ. станд.по дисциплине</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2">Качество знаний по
дисциплине </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2">Кол-во «5» по пред-ту </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2">Кол-во «4» по пред-ту</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2">Кол-во «3» по пред-ту </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2">Кол-во «2» по пред-ту</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2">Средний бал по пред-ту</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
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
        <td colspan="8"></td>
    </tr>

</table>
<button  class="btn btn-primary" type="submit" name="submit_excel">Загурузить </button>

 </form>   

   


