<!-- Здесь происходит выгрузка из хмл файла в sql запрос !-->
<meta charset="utf-8">
<?php
include "db.php";                                               //подключаем бд
$delete = "DELETE FROM car ";                                   //удаляем все строки
$xml = simplexml_load_file('xml/price1.xml');                   //загружаем хмл файл
                                                                //формируем запрос
$query="
INSERT INTO car (Code_DS, Sva_fio, type_purchase, Stock_days, manager_comment, 
Planned_Profit, car_order_manager, diag_results, dop_price, Autoinspect_ID, def_ved, autoteka_url, 
mark_id, folder_id, modification_id, body_type, drive, transmission, engine_volume, engine_power, engine_type, 
date_admission, Owners, run, wheel, color_hex, color, availability, custom, state, year, price, credit_discount, 
tradein_discount, insurance_discount, dealer_discount, registry_year, vin, car_order_exists, description, 
extras, uploading_type) VALUES 
 ";
 $i=0;
foreach ($xml->cars->car as $car)
{
    if ($i!=0) {$query.=", (";}
    else {$query.="(";}
    $query.="'".$car->Code_DS."', ";
    $query.="'".$car->Sva_fio."', ";
    $query.="'".$car->type_purchase."', ";
    $query.="'".json_encode($car->Stock_days, JSON_UNESCAPED_UNICODE)."', ";
    $query.="'".$car->manager_comment."', ";
    $query.="'".$car->Planned_Profit."', ";
    $query.="'".json_encode($car->car_order_manager, JSON_UNESCAPED_UNICODE)."', ";
    $query.="'".json_encode($car->diag_results, JSON_UNESCAPED_UNICODE)."', ";
    $query.="'".$car->dop_price."', ";
    $query.="'".$car->Autoinspect_ID."', ";
    $query.="'".json_encode($car->def_ved, JSON_UNESCAPED_UNICODE)."', ";
    $query.="'".$car->autoteka_url."', ";
    $query.="'".$car->mark_id."', ";
    $query.="'".$car->folder_id."', ";
    $query.="'".$car->modification_id."', ";
    $query.="'".$car->body_type."', ";
    $query.="'".$car->drive."', ";
    $query.="'".$car->transmission."', ";
    $query.="'".$car->engine_volume."', ";
    $query.="'".$car->engine_power."', ";
    $query.="'".$car->engine_type."', ";
    $query.="'".$car->date_admission."', ";
    $query.="'".$car->Owners."', ";
    $query.="'".$car->run."', ";    
    $query.="'".$car->wheel."', ";
    $query.="'".$car->color_hex."', ";
    $query.="'".$car->color."', ";
    $query.="'".$car->availability."', ";
    $query.="'".$car->custom."', ";
    $query.="'".$car->state."', ";
    $query.="'".$car->year."', ";
    $query.="'".$car->price."', ";
    $query.="'".$car->credit_discount."', ";
    $query.="'".$car->tradein_discount."', ";
    $query.="'".$car->insurance_discount."', ";
    $query.="'".$car->dealer_discount."', ";
    $query.="'".$car->registry_year."', ";
    $query.="'".$car->vin."', ";
    $query.="'".$car->car_order_exists."', ";
    $query.="'".json_encode($car->description, JSON_UNESCAPED_UNICODE)."', ";
    $query.="'".json_encode($car->extras, JSON_UNESCAPED_UNICODE)."', ";
    $query.="'".$car->uploading_type."') ";
    $i++;
}
echo $query;
    mysqli_query($connectionDB, $delete) or die(mysqli_error($link));
    mysqli_query($connectionDB, $query) or die(mysqli_error($link));   
?>