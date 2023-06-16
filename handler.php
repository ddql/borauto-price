<?php 
// "живой поиск". идет проверка по наименованию склада, названию автомобиля, цене, пробегу и комментарию менеджера
include "db.php";               //подключение бд
$Name = $_POST['search'];       //получаем значение из строки поиска
$Dc_name = $_COOKIE['dc'];      //получаем склад из куки
$Dc_array = explode(',',$Dc_name);
foreach ($Dc_array as &$value) { 
    $value = "'".$value."'"; 
} 
unset($value); 
$Dc_query = implode(" OR dc_name LIKE ", $Dc_array);
$Query = "
SELECT * FROM car_list WHERE (dc_name LIKE ". $Dc_query.") AND 
((vin LIKE '%$Name%')
OR (comment LIKE '%$Name%') 
OR (mark_id LIKE '%$Name%') 
OR (folder_id LIKE '%$Name%') 
OR (run LIKE '%$Name%') 
OR (price LIKE '%$Name%') )
ORDER BY price";                //запрос в бд
$ExecQuery = mysqli_query($connectionDB, $Query);?>

        <!-- Вывод списка автомобилей !-->
<ol class="list-group list-group-numbered">
<?php while ($Result = mysqli_fetch_array($ExecQuery)) { ?>
    <li class="list-group-item d-flex justify-content-between align-items-center" onclick='fill("<?php echo $Result['vin']; ?>")'>
        <div class="ms-2 me-auto">
            <div class="fw-bold"> 
                <a style="color: #000; text-decoration: none;" href="info.php?vin=<?php echo $Result['vin'];?>">
                    <?php 
                    echo $Result['mark_id'].' '.$Result['folder_id'].' '.$Result['year'].' г '?>
                </div>
                <?php echo $Result['color']." ";
                if ($Result['transmission']=="Автоматическая КП"):
                    echo "AT";
                elseif ($Result['transmission']=="Вариатор"):
                    echo "CVT";
                elseif ($Result['transmission']=="Роботизированная КП"):
                    echo "AMT";
                else: 
                    echo "MT";
                endif;
                echo ' '.substr($Result['vin'], -6);?>
                </a>
        </div> 

        <span class="badge bg-primary rounded fs-6" ><?php echo $Result['price']; ?>
             <?php if ($Result['purchase_type']=="Агентский договор") echo '<span class="badge text-bg-danger rounded-pill position-absolute top-100 start-50 translate-middle mt-1">Комиссия</span>';?>                                           
        </span>
    </li>
<?php 
}?>
</ol>
