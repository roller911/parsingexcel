<?php
session_start();

if (!empty($_SESSION['teachers'])):
   

?>
<body>
  
    <script src="scripts/load.js"></script>
 <h1 >Выберите файл.</h1>
    <form  class="was-validated" onload="updateSize();" method="post" enctype="multipart/form-data" name="uploadForm" action="src/selectexcel.php">
        <div class="mb-3">
        <input class="form-control" aria-label="file example" required id="uploadInput" type="file" name="filename" onchange="updateSize();" multiple/>selected files: <span id="fileNum">0</span>; total size: <span id="fileSize">0</span><br><br>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Семестр</label>
    <select name="selectsem"class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Выберите...</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
  </select>
<label for="validationCustom04" class="form-label">Группа</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Выберите...</option>
      <?php
      foreach ($grp_sql as $good):
      ?>
      <option><?php echo $good['name'];?></option>
<?php endforeach;?>
    </select>
</div><br>
        <input  class="btn btn-primary" type="submit" name="submit" value="Выполнить" />
    </div>
      </form>

<?php else: ?>
    <p>пожалуйста, авторизуйтесь</p>
<?php endif; ?>