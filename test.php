<?php
$file_list = glob('uploads/*.json');
$test = [];
foreach ($file_list as $key => $file) {
    if ($key == $_GET['test']) {
        $file_test = file_get_contents($file_list[$key]);
        $decode_file = json_decode($file_test, true);
        $test = $decode_file;
    }
}
$question = $test[0]['question'];
$answers[] = $test[0]['answers'];
// Считаем кол-во правильных ответов
$result_true = 0;
foreach ($answers[0] as $item) {
    if ($item['result'] === true) {
        $result_true++;
    }
}
$post_true = 0;
$post_false = 0;
if (count($_POST) > 0) {
    // Проверяем и считаем правильность введенных ответов
    foreach ($_POST as $key => $item) {
        if ($answers[0][$key]['result'] === true) {
            $post_true++;
        }else{
            $post_false++;
        }
    }
    // Сравниваем и выводим результат
    if ($post_true === $result_true && $post_false === 0) {
        echo 'Правильно!';
    }elseif ($post_true > 0 && $post_false > 0) {
        echo 'Почти угадали =)';
    }else{
        echo 'Вы ошиблись =(';
    }
}
?>

<a href='admin.php'>Загрузить тест.</a><br>
	<a href=list.php>Список загруженных тестов.</a>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<div align="center">
 	<ul>
 			 			<h3><a href="test.php?nameTest=test-1.json">test-1.json</a></h3>
 	 			
  	</ul>
 	</div>
 </body>
 </html>
