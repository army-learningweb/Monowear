<?php

if(isset($_POST['btn-save'])){
    $details = $_POST['details'];

    echo $details;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="ckeditor/ckeditor.js"></script>
    <title>Document</title>
</head>

<body>
    <style>
        #wrapper {
            max-width: 960px !important;
            margin: 0px auto;
        }

        input {
            margin-top: 10px;
        }
    </style>

    <div id="wrapper">
        <h1>Ckeditor Ckfinder ( Trình soạn thảo bài viết )</h1>
        <form action="" method="post">
            <textarea name="details" class="ckeditor" cols="30" rows="10"></textarea>
            <input type="submit" name="btn-save" value="Thêm bài viết">
        </form>

    </div>
</body>

</html>