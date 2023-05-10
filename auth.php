<!-- 

Форма авторизации, на данный момент условная.
Здесь идет проверка логина и пароля, задаются куки,
в которых хранится логин пользователя и выбранный ДЦ.

!-->
<?php 
if(isset($_POST['submitLogin']))
    {   
    if ($_POST['inputLogin']=="1234" AND $_POST['inputLogin']=="1234"){
        setcookie("login", $_POST['inputLogin'], time()+60*60*24*30, "/");
        setcookie("dc", $_POST['inputDC'], time()+60*60*24*30, "/");   
        header('Location: '.$_SERVER['REQUEST_URI']); exit;
    }
    else{
        echo "error";
        header('Location: '.$_SERVER['REQUEST_URI']); exit;
    }
    }
?>

<form method="POST">
    <div class="d-grid gap-2">
        <label for="inputLogin" class="form-label">Логин</label>
        <input name="inputLogin" type="text" id="inputLogin" placeholder="Логин" class="form-control">
        <label for="inputPassword" class="form-label">Пароль</label>
        <input name="inputPassword" type="password" id="inputPassword" placeholder="Пароль" class="form-control" >
        <label class="form-label">Дилерский центр</label>
        <select name="inputDC" class="form-select" required>
            <option selected disabled value="">Выбор ДЦ</option>
            <!--  Список ДЦ, параметр value совпадает с кодом подразделения в БД !-->
            <option value="ЦБ00000011">Бск АСП</option>
            <option value="ЦБ00000011">СКС-Лада АСП</option>
            <option value="ЦБ00000011">Остужева АСП</option>
            <option value="ЦБ00000011">9 января АСП</option>
            <option value="ЦБ00000022">Тамбов АСП</option>
            <option value="ЦБ00000022">Липецк АСП</option>
            <option value="ЦБ00000022">Ставрополь АСП</option>
            <option value="ЦБ00000022">Ростов АСП</option>
        </select>
        <br> 
        <button name="submitLogin" type="submit" type='button' class='btn btn-light'>Войти</button>
    </div>
</form>