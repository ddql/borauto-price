<!-- Навигация сайта !-->
<nav class="navbar bg-body-tertiary fixed-top">
      <div class="container-fluid">
        <!-- Логотип !-->
        <a class="navbar-brand" href="/">
            <img src="https://a3381f52-5e9a-4db6-babe-4d7b4a71b25f.selcdn.net/26.04.23_10-24/bundles/holdingborauto2022/images/logo.svg?v32" width="170" height="42" alt="" >
        </a>
        <!-- Проверка, залогинен ли пользователь, если да - выводится меню, если нет, выводится только шапка !-->
        <?php if (isset($_COOKIE['login'])){?>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Настройки<h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav">
                <!-- Выбор дц. пользователь выбирает подразделение, по нажатию кнопки куки обновляется с новым значением дц !-->
                <li class="nav-item">
                    <?php 
                    if(isset($_POST['submitDC']) AND isset($_POST['inputDC'])){   
                        setcookie("dc", implode(',',$_POST['inputDC']), time()+60*60*24*30, "/");   
                        setcookie("login", $_COOKIE['login'], time()+60*60*24*30, "/");   
                        header('Location: /'); exit;
                    }
                        
                    ?>
                   <form method="POST">
                        <div class="d-grid gap-3">
                              <select name="inputDC[]" class="form-select" multiple="multiple">
                                <option>ДЦ 9 января_АМ_склад бу ам</option>
                                <option>ДЦ 9 января_АМ_склад новые ам</option>
                                <option>ДЦ Бк_АМ_склад бу ам</option>
                                <option>ДЦ Бк_АМ_склад новые ам</option>
                                <option>ДЦ Липецк_АМ_склад бу ам</option>
                                <option>ДЦ Липецк_АМ_склад новые ам</option>
                                <option>ДЦ Остужева_АМ_склад бу ам</option>
                                <option>ДЦ Остужева_АМ_склад новые ам</option>
                                <option>ДЦ Ростов_АМ_склад бу ам</option>
                                <option>ДЦ Ростов_АМ_склад новые ам</option>
                                <option>ДЦ СКС-Лада_АМ_склад бу ам</option>
                                <option>ДЦ СКС-Лада_АМ_склад новые ам</option>
                                <option>ДЦ Ставрополь_АМ_склад бу ам</option>
                                <option>ДЦ Ставрополь_АМ_склад новые ам Лада1</option>
                                <option>ДЦ Ставрополь_АМ_склад новые ам УАЗ</option>
                                <option>ДЦ Тамбов_АМ_склад бу ам</option>
                                <option>ДЦ Тамбов_АМ_склад новые ам</option>
                                <option>ДЦ Аксай_АМ_склад бу ам</option>
                              </select>
                            <button name="submitDC" type="submit" type='button' class='btn btn-light'>Установить склад</button>
                        </div>
                    </form>
                
                </li>
                <!-- Форма выхода, по нажатию кнопки открывается 'logout.php', где обнуляются куки и обновляется страница  !-->
                <li class="nav-item">
                    <br>
                    <div class="d-grid gap-3">
                        <label>Вы вошли как 
                            <?php echo $_COOKIE['login'];?>
                        </label>
                        <button onclick="document.location='logout.php'" type="submit"  type='button' class='btn btn-light'>Выйти</button>
                    </div>
                </li>  
                <li class="nav-item">
                
                </li>  
                
          </div>
        </div>
        <?php }?>
      </div>
      
    </nav>
