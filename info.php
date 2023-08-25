<!-- Страница с информацией по автомобилю !-->
<!DOCTYPE html>
<html lang="ru">
    <head>
        <link rel="icon" type="image/png" href="https://borauto.ru/favicon.png"/>
        <title>Карточка автомобиля</title>
    	<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
        <meta name="viewport" content="width=device-width, user-scalable=yes">
       
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
        <?php include "nav.php";
        include "autohub.php";
        include "autoteka.php";
        ?>
        <div class="container-fluid" style="margin-top: 77px">

        <button onclick="javascript:history.back()" type="button" class="btn btn-light w-100">Назад</button>
            <?php
            if (isset($_COOKIE['login'])){
                include "db.php";
                $vincode =  htmlspecialchars($_GET["vin"]);
                if ($vincode){
                $comment_sql = "SELECT * FROM car_list WHERE vin LIKE '%$vincode%'";
                $ExecQuery = mysqli_query($connectionDB, $comment_sql);
                while ($Result = mysqli_fetch_array($ExecQuery)) {
                    if ($Result['car_order_manager']) echo "<h1>Авто в предоплате у ".$Result['car_order_manager']."</h1>";?>
                    <b>Авто:  </b>
                    <br><?php echo $Result['mark_id']." ".$Result['folder_id'];?>
                    <br><b>VIN:  </b>
                    <br><?php echo $Result['vin']; ?> (<a  target="_blank" href="https://xn--90adear.xn--p1ai/check/auto#<?php echo $Result['vin'];?>">гибдд</a>, 
                        <a target="_blank" href="<?php if($Result['autoteka_url']) echo $Result['autoteka_url']; else echo 'https://autoteka.ru/report_by_vin/'.$Result['vin'];?>">автотека</a>)
                    <br><b>Цена продажи:  </b>
                    <br><?php echo $Result['price'];?>
                    <?php if ($Result['recommended_price']) echo"<br><b>РРЦ:  </b><br>".$Result['recommended_price'];?>
                    <?php if ($Result['optional_equipment_price']) echo"<br><b>Сумма ДОП:  </b><br>".$Result['optional_equipment_price'];?>
                    <br><b>Модификация:  </b>
                    <br><?php echo $Result['modification_id'];?>
                    <br><b>Кузов:  </b>
                    <br><?php echo $Result['body_type'];?>
                    <br><b>Цвет:  </b>
                    <br><?php echo $Result['color'];?>
                    <br><b>Год:  </b>
                    <br><?php echo $Result['year'];?>
                    <?php if($Result['owners']) echo"<br><b>Владельцев в ПТС:</b><br>".$Result['owners'];?>
                    <?php if($Result['run']) echo"<br><b>Пробег:</b><br>".$Result['run'];?>
                    <br><b>Гос.номер:</b>
                    <br><?php echo $Result['license_plate'];?>
                    <br><b>Комментарий:</b>
                    <br><?php  echo "<pre>".$Result['comment']."</pre>" ?>
                    
                    <div class="d-grid gap-2">
                    <button onclick="window.open('goto.php?vin=<?php echo $Result['vin']; ?>', '_blank');" type="button" class="btn btn-light w-100">Найти объявление на авито</button>
                    
                    <?php if (get_autoteka_pdf($Result['vin'])!=null) {?>
                    <button onclick="window.open('<?php echo get_autoteka_pdf($Result['vin']); ?>', '_blank');" type="button" class="btn btn-light w-100">Перейти к отчету Автотеки</button>
                    <?php }?>
                    </div>
                    
                    <?php if ($Result['vehiclemodification']) echo"<b>Вариант комплектации:  </b><br>".$Result['vehiclemodification'];?>
                    <?php if ($Result['extras']) echo"<br><b>Базовые опции:  </b><br>".$Result['extras'];?>
                    <?php if ($Result['manager']) echo"<br><b>СВА:  </b><br>".$Result['manager'];?>
                    <br><b>Количество дней на складе:</b>
                    <br><?php echo  $Result['stock_days'];?>
                    <br><b>Сумма закупки:</b>
                    <br><?php echo  $Result['purchase_price'];?>
                    <?php if ($Result['purchase_type']) echo "<br><b>Вид поступления:  </b><br>".$Result['purchase_type'];?>
                    <?php if ($Result['expenses_repair']) echo "<br><b>Факт. расходы на ремонт:  </b><br>".$Result['expenses_repair'];?>
                    <?php if ($Result['expenses_resources']) echo "<br><b>Процент за ресурсы:  </b><br>".$Result['expenses_resources'];?>
                    <?php if ($Result['last_price_change']) echo "<br><b>Дней с переоценки:  </b><br>".$Result['last_price_change'];?>
                    <?php $all_expenses=$Result['expenses_repair']+$Result['expenses_resources']; if ($Result['expenses_repair']) echo "<br><b>Итого расходы:  </b><br>".$all_expenses;?>
                    <?php $profit=$Result['price']-$Result['purchase_price']-$Result['expenses_repair']-$Result['expenses_resources'];  if ($Result['expenses_repair']) echo "<br><b>Планируемая прибыль:  </b><br>".$profit;?>
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
