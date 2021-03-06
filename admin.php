<?php
    error_reporting(E_ALL);
    $message = '';
    $valid_extensions = 'json';
    if(isset($_FILES['file'])){
        if(isset($_FILES['file']['name'])){
            $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        }else{
            $message = 'ошибка загрузки файла';
            exit;
        }
        if($file_extension != $valid_extensions){
            $message = '"' . $file_extension . '"' . ' - неопустимый формат файла';
        }else{
            if($_FILES['file']['error'] == 0){
                if(move_uploaded_file($_FILES['file']["tmp_name"], 'json/'.$_FILES['file']["name"])){
                    $message = 'файл ' . '"' . $_FILES['file']["name"] . '"' . ' успешно загружен';
                }else{
                    $message = 'ошибка загрузки файла';
                }
            }
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Форма загрузки файлов</title>
    <link rel=" stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">
    <p><?= $message ?></p>
    <form enctype="multipart/form-data" method="post" action="admin.php">
        <input type="file" multiple name="file">
        <input type="submit" value="Отправить">
    </form>
    <p>
        <a href="list.php">Перейти к решению тестов</a>
    </p>
</div>
</body>
</html>