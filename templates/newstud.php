
<section class="content-main">
<div class="container-main">
<form class="row g-4 needs-validation" novalidate action="" method="post">
   <div class="col-md-4">
    <label for="validationCustom02" class="form-label" >Фамилия</label>
    <input type="text" class="form-control" name="surname" id="validationCustom02" value="<?php echo $good['surname']; ?>" required>  
  </div>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Имя</label>
    <input type="text" class="form-control" name="surname" id="validationCustom01" value="<?php echo $good['name']; ?>" required>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Отчество</label>
    <input type="text" class="form-control"  name="surname" id="validationCustom02" value="<?php echo $good['patronymic'];?>" required>
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">Статус</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Выберите...</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">Группа</label>
    <select class="form-select" id="validationCustom04" required>
      <option selected disabled value="">Выберите...</option>
      <option>...</option>
    </select>
  </div>  
  <div class="col-12">
    <button class="" type="submit">Сохранить изменения</button>
  </div>
</form>
</div>
</section>

