<!-- Здесь происходит выгрузка из хмл файла в sql запрос !-->
<meta charset="utf-8">
<?php
include "db.php";                                                               // подключаем бд
$delete = "DELETE FROM car_list ";                                              // удаляем все строки
mysqli_query($connectionDB, $delete) or die(mysqli_error($link));   
$xml = simplexml_load_file('xml/test0.xml');                                    // загружаем хмл файл

foreach ($xml->cars->car as $car)                                               // построчно импортируем в бд
{
    $dataSet = [
        "dc_name" => $car->dc_name,                                             // склад ДЦ
        "vin" => $car->vin,                                                     // винкод
        "mark_id" => $car->mark_id,                                             // марка
        "folder_id" => $car->folder_id,                                         // модель
        "modification_id" => $car->modification_id,                             // модификация            
        "body_type" => $car->body_type,                                         // тип кузова
        "transmission" => $car->transmission,                                   // тип кпп
        "owners" => $car->owners,                                               // кво владельцев
        "color" => $car->color,                                                 // цвет авито
        "year" => $car->year,                                                   // год выпуска авто
        "run" => $car->run,                                                     // пробег авто
        "price" => $car->price,                                                 // розничная цена
        "recommended_price" => $car->recommended_price,                         // РРЦ
        "purchase_price" => $car->purchase_price,                               // цена закупки
        "optional_equipment_price" => $car->optional_equipment_price,           // стоимость доп
        "license_plate" => $car->license_plate,                                 // гос номер
        "comment" => $car->comment,                                             // комментарий менеджера
        "manager" => $car->manager,                                             // менеджер, который выкупал автомобиль
        "stock_days" => $car->stock_days,                                       // кво дней на складе
        "purchase_type" => $car->purchase_type,                                 // тип поступления на склад
        "expenses_repair" => $car->expenses_repair,                             // сумма расходов на ремонт
        "expenses_resources" => $car->expenses_resources,                       // сумма расходов на оборотку
        "last_price_change" => $car->last_price_change,                         // количество дней с посл. переоценки
        "autoteka_url" => $car->autoteka_url,                                   // ссылка на автотеку
        "car_order_manager" => $car->car_order_manager,                         // заказ автомобиля(при наличии).менеджер
        "vehiclemodification" => $car->vehiclemodification,                     // вариант комплектации
        "extras" => $car->extras                                                // базовые опции
        ];
    $keys = join(',', array_keys($dataSet));
    $values = join("','", array_values($dataSet));
    $query="INSERT INTO car_list ($keys) VALUES ('$values')";
    echo $query;
    mysqli_query($connectionDB, $query) or die(mysqli_error($link));   
}

?>
