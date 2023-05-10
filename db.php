
<?php
    // Подключение к базе данных
    $connectionDB = mysqli_connect(
        "localhost", // Название хоста
        "username", // username
        "password", // Пароль пользователя
        "name" // Название базы данных
    );
    // Проверка подключения
    if (mysqli_connect_errno()) {
        echo "Невозможно подключится к MySQL: " . mysqli_connect_error();
    }
?>