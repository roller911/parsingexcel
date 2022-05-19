<body>
    <script src="scripts/load.js"></script>
 <h1 >Выберите файл.</h1>
    <form  class="was-validated" onload="updateSize();" method="post" enctype="multipart/form-data" name="uploadForm" action="src/selectexcel.php">
        <div class="mb-3">
        <input class="form-control" aria-label="file example" required id="uploadInput" type="file" name="filename" onchange="updateSize();" multiple/>selected files: <span id="fileNum">0</span>; total size: <span id="fileSize">0</span><br><br>
        <input  class="btn btn-primary" type="submit" name="submit" value="Выполнить" />
    </div>
      </form>
 
