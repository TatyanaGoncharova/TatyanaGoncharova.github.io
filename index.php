<!DOCTYPE html>
<html>

<head>
  <title>
    Тестовое задание
  </title>
  <meta charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

  <div id="header">

    <div class="info">
    	<p> Телефон 8(926)777-77-77</p>
    	<p> E-mail: test@test.ru </p>
    	<h1>Комментарии</h1>
    </div>
    <div class="logo">
    	<img src="https://future-group.ru/local/templates/future-group_2017/future_2017/dist/images/logo.svg" alt="Наш логотип" />
    	<p> internet agency </p>
    </div>   

  </div>

  <div id="content">
    <div class="main_content">
<?
/* Основные настройки */
$user = 'root';
$password = 'root';
$db = 'gbook';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);
/* Основные настройки 

/* Сохранение записи в БД */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['msg']));

echo date();
  $sql = "INSERT INTO `msgs`(`name`, `email`, `msg`) 
  VALUES ('$name', '$email', '$message');";

    if (empty($name) || empty($email) || empty($message)) {
        echo "<h1>Заполните все поля</h1>";
    } else {
    
        mysqli_real_query($link, $sql);
    }
   echo mysqli_error($link);
}

/* Сохранение записи в БД */

/* Удаление записи из БД */
if (isset($_GET['del'])) {
    $del = (int)$_GET['del'];
    $sql = "DELETE FROM `msgs` WHERE id = $del;";
    mysqli_real_query($link, $sql);
}
/* Удаление записи из БД */

/* Вывод записей из БД */

$sql = " SELECT `id`, `name`, `email`, `msg`, `datetime` FROM `msgs` ORDER BY id DESC;";


$result = mysqli_query($link, $sql);
mysqli_close($success);

$rows = mysqli_num_rows($result);
echo "<p> Всего комментариев: $rows";
$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);

$text = '';
foreach ($messages as $message) {
$date=date_create($message['datetime'])->Format('H:i d.m.Y');

    $text .= <<<TEXT
<p>
    <a href="mailto:{$message['email']}">{$message['name']}</a>
    {$message['dt']} {$date} <br>
    {$message['msg']}
    <p align="right">
    <a
    href="http://localhost/chat.dev/index.php?del={$message['id']}">
    Удалить
    </a>
    </p>
</p>
TEXT;
}
echo $text;
/* Вывод записей из БД */
?>
<hr>
<h3>Оставить комментарий</h3>

<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
 Ваше имя: <br/><input type="text" name="name"/><br/>
 Ваш Email: <br/><input type="text" name="email"/><br/>
 Ваш комментарий: <br/><textarea name="msg"></textarea><br/>

<br/>

<input type="submit" value="Отправить"/>

</form>
</div>
</div>

  <div id="footer">
    <div class="logo">
    	<img src="https://future-group.ru/local/templates/future-group_2017/future_2017/dist/images/logo.svg" alt="Наш логотип" />
    	<p> internet agency </p>
    </div> 
    <div class="footer_info">
        <p> Телефон 8(926)777-77-77</p>
    	<p> E-mail: test@test.ru </p>
    	<p> Адрес: г.Москва </p>
    	<div class="copy"> &copy; 2000 &ndash; <?= date('Y')?> Futurе. Все права защищены
   		</div>
    </div>

  </div>
</body>

</html>