<?php
    error_reporting(E_ALL);
    $allFiles = scandir(__DIR__ . '/json');
?>

<a href='admin.php'>Загрузить тест.</a><br>
<a href=list.php>Список загруженных тестов.</a>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Список тестов</title>
    <link rel=" stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">
    <?php foreach($allFiles as $id => $file):
        if($file == '.' || $file == '..'){
            continue;
        }
        ?>
        <p>
            <a href="test.php?id=<?php echo $id ?>">
                <?php  echo $file?>
            </a>
        </p>
    <?php endforeach ?>
</div>
</body>
</html>
