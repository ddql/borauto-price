<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="icon" type="image/png" href="https://borauto.ru/favicon.png"/>
    <title>Прайс-лист менеджера боравто</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=yes">
    <script type="text/javascript" src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <!-- подключаем меню !-->
    <?php include "nav.php";?>
    <div class="container-fluid" style="margin-top: 77px">
<!-- 
            проверяем, залогинился ли клиент, если да - выводим форму поиска и 
            div id="display" (туда отправляются результаты поиска)
            если нет - выводим авторизацию 
!-->
                <?php 
                if (isset($_COOKIE['login'])){
                    include "search.php";?>
                    <div id="display" style="margin-top: 10px"></div><?php
                }
                else
                {
                    include "auth.php"; 
                }
                ?>
                
    </div>
</body>
</html>