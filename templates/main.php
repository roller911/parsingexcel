<body>
    <script src="scripts/load.js"></script>
    <script src="node_modules/expess/index.js"></script>
 <h1>Upload file</h1>
    <form action="/upload" method="post" enctype="multipart/form-data">
        <label>Файл</label><br>
        <input type="file" name="filedata" /><br><br>
        <input type="submit" value="Send" />
      </form>
