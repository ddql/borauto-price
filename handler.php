<?php 
//ф-я, добавляющая апострофы каждому элементу массива и преобразующая его в строку
function add_apostrophe($array){
    foreach ($array as &$value) { 
        $value = "'".$value."'"; 
    } 
    unset($value); 
    return implode(", ", $array);
}

if (!empty($_COOKIE['dc']))
{
    //подключение к БД
    try {
	$dbh = new PDO('mysql:dbname=dbname;host=localhost', 'login', 'passw');
    } catch (PDOException $e) {
    	die($e->getMessage());
    }
    // список параметров к фильтрации
    $input = $_POST['search'];

    setcookie( "search", $input);
    
    $parameters['price_start']  = !empty($_COOKIE['price_start'])  ? $_COOKIE['price_start']  : null;
    $parameters['price_end']  = !empty($_COOKIE['price_end'])  ? $_COOKIE['price_end']  : null;
    $parameters['run_start']  = !empty($_COOKIE['run_start'])  ? $_COOKIE['run_start']  : null;
    $parameters['run_end']  = !empty($_COOKIE['run_end'])  ? $_COOKIE['run_end']  : null;
    $parameters['year_start']  = !empty($_COOKIE['year_start'])  ? $_COOKIE['year_start']  : null;
    $parameters['year_end']  = !empty($_COOKIE['year_end'])  ? $_COOKIE['year_end']  : null;
    $parameters['stock_start']  = !empty($_COOKIE['stock_start'])  ? $_COOKIE['stock_start']  : null;
    $parameters['stock_end']  = !empty($_COOKIE['stock_end'])  ? $_COOKIE['stock_end']  : null;
    $dc_name = add_apostrophe(explode(",",$_COOKIE['dc']));
    $body_type_filter = !empty($_COOKIE['type_body'])  ? " AND   (body_type IN (".add_apostrophe(explode(",",$_COOKIE['type_body']))."))"  : "";
    $gear_type_filter = !empty($_COOKIE['type_gear'])  ? " AND   (transmission IN (".add_apostrophe(explode(",",$_COOKIE['type_gear']))."))"  : "";
    // запрос в бд
    $sql= "SELECT * FROM `car_list`
    WHERE (dc_name IN ($dc_name))
    AND   (price  >= :price_start or :price_start is null)
    AND   (price  <= :price_end or :price_end is null)
    AND   (run  >= :run_start or :run_start is null)
    AND   (run  <= :run_end or :run_end is null)
    AND   (year  >= :year_start or :year_start is null)
    AND   (year  <= :year_end or :year_end is null)
    AND   (stock_days  >= :stock_start or :stock_start is null)
    AND   (stock_days  <= :stock_end or :stock_end is null)".
    $body_type_filter.
    $gear_type_filter."
    AND   ((vin LIKE '%$input%')
        OR (comment LIKE '%$input%') 
        OR (mark_id LIKE '%$input%') 
        OR (folder_id LIKE '%$input%') 
        OR (run LIKE '%$input%') 
        OR (body_type LIKE '%$input%') 
        OR (color LIKE '%$input%') 
        OR (year LIKE '%$input%') 
        OR (license_plate LIKE '%$input%') 
        OR (vehiclemodification LIKE '%$input%')
        OR (extras LIKE '%$input%')
        )
     ORDER BY price";
    $sth = $dbh->prepare($sql);
    $sth->execute($parameters);
    $result = $sth->fetchAll();
    // вывод результатов запроса
    echo "<ol class='list-group list-group-numbered'>";
    foreach ($result as $Result){
    ?>
        <li class="list-group-item <?php if ($Result['car_order_manager']) echo 'list-group-item-dark';?>  d-flex justify-content-between align-items-center" onclick='fill("<?php echo $Result['vin']; ?>")'>
            <div class="ms-2 me-auto">
                
                
                <?php if (strpos($Result['dc_name'], 'новые')){?>
                <!-- первая строка в списке для НА -->
                <div class="fw-bold"> 
                    <a style="color: #000; text-decoration: none;" href="info.php?vin=<?php echo $Result['vin'];?>"><?php echo $Result['mark_id'].' '.str_replace('Рестайлинг', '', $Result['folder_id']).' '.$Result['body_type'].' '.$Result['year'].'&nbspг '?></a>
                </div>
                <!-- вторая строка в списке для НА -->
                <?php echo $Result['color']." ".$Result['vehiclemodification']." <span class='badge text-bg-light rounded-pill'>".substr($Result['vin'], -6)."</span>";?>
            </div> 
            <!-- вывод цены для НА -->
            <span class="badge bg-primary rounded fs-6 position-relative" ><?php echo number_format($Result['price'], 0, '.', ' '); ?>
                <span class="badge text-bg-success rounded-pill position-absolute top-100 start-50 translate-middle mt-1"><?php echo "рек. ".$Result['recommended_price']; ?></span>
            </span> 
                 
                
                <?php } else {?>
                <!-- первая строка в списке для БУ -->
                <div class="fw-bold"> 
                    <a style="color: #000; text-decoration: none;" href="info.php?vin=<?php echo $Result['vin'];?>"><?php echo $Result['mark_id'].' '.str_replace('Рестайлинг', '', $Result['folder_id']).' '.$Result['year'].'&nbspг '?></a>
                </div>
                <!-- вторая строка в списке для БУ -->
                <?php echo $Result['color']." ".$Result['modification_id']." <span class='badge text-bg-light  rounded-pill'>".substr($Result['vin'], -6)."</span>";?>
            </div> 
                <!-- вывод цены для БУ -->
            <span class="badge bg-primary rounded fs-6 position-relative" ><?php echo number_format($Result['price'], 0, '.', ' '); ?>
                <?php if ($Result['purchase_type']=="Агентский договор") echo '<span class="badge text-bg-danger rounded-pill position-absolute top-100 start-50 translate-middle mt-1">Комиссия</span>';?>
            </span> 
            
        <?php } echo "</li>";
        
    }
    
echo "</ol>";
}
?>
