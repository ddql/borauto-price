<?php 
// "живой поиск". идет проверка по коду ДЦ, названию автомобиля, цене, пробегу и комментарию менеджера
include "db.php";               //подключение бд
$Name = $_POST['search'];       //получаем значение из строки поиска
$Dc = $_COOKIE['dc'];           //получаем код ДЦ
$Query = "
SELECT * FROM car WHERE Code_DS LIKE '%$Dc%' AND 
((vin LIKE '%$Name%')
OR (manager_comment LIKE '%$Name%') 
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

        <span class="badge bg-primary rounded fs-6" ><?php echo $Result['price']; ?></span>
    </li>
<?php 
}?>
</ol>
