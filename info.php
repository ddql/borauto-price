<!-- Страница с информацией по автомобилю !-->
<!DOCTYPE html>
<html lang="ru">
    <head>
        <link rel="icon" type="image/png" href="https://borauto.ru/favicon.png"/>
        <title>Карточка автомобиля</title>
    	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
        <meta name="viewport" content="width=device-width, user-scalable=yes">
        <script type="text/javascript" src="script.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>    <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            pre {
                margin-top: 10px;
                max-width: 900px;
                white-space: pre-line;
                font-family: sans-serif;
                font-style: italic;
            } 
        </style>
    </head>

    <body>
        <?php include "nav.php";?>
        <div class="container-fluid" style="margin-top: 77px">
            <?php
            if (isset($_COOKIE['login'])){
                include "db.php";
                $vincode =  htmlspecialchars($_GET["vin"]);
                if ($vincode){
                $comment_sql = "SELECT * FROM car WHERE vin LIKE '%$vincode%'";
                $ExecQuery = mysqli_query($connectionDB, $comment_sql);
                while ($Result = mysqli_fetch_array($ExecQuery)) {
                    if ($Result['car_order_exists']=='YES'){
                        echo "<h1>Авто в предоплате</h1>";
                    }?>
                    <b>Авто:  </b>
                    <br><?php echo $Result['mark_id']." ".$Result['folder_id'];?>
                    <br><b>VIN:  </b>
                    <br><?php echo $Result['vin']; ?> (<a  target="_blank" href="https://xn--90adear.xn--p1ai/check/auto#<?php echo $Result['vin'];?>">гибдд</a>, <a target="_blank" href="<?php echo $Result['autoteka_url'];?>">автотека</a>)
                    <br><b>Актуальная стоимость:  </b>
                    <br><?php echo $Result['price'];?>
                    <br><b>Цвет:  </b>
                    <br><?php echo $Result['color'];?>
                    <br><b>Год:  </b>
                    <br><?php echo $Result['year'];?>
                    <br><b>Владельцев в ПТС:</b>
                    <br><?php echo $Result['Owners'];?>
                    <br><b>Пробег:</b>
                    <br><?php echo $Result['run'];?>
                    <br><b>Комментарий:</b>
                    <br><?php  echo "<pre>".$Result['manager_comment']."</pre>" ?>
                    <b>СВА:  </b>
                    <br><?php echo $Result['Sva_fio'];?>
                    <br><b>Количество дней на складе:</b>
                    <br><?php echo json_decode($Result['Stock_days'])->{'parking_days'};?>
                    <br><b>Вид поступления:  </b>
                    <br><?php echo $Result['type_purchase'];?> 
                    <br><b>Планируемая прибыль:  </b>
                    <br><?php echo $Result['Planned_Profit'];?> 
                    
                    <br><br><button onclick="javascript:history.back(); return false;" type="button" class="btn btn-light">Назад</button><br>
                    <?php }
                }
                else{
                    echo "ошибка выбора автомобиля";
                }
            }
            else{
                include "auth.php"; 
            }
        
        ?>
        </div>
    </body>
</html>