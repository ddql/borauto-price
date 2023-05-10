<!-- Форма поиска !-->

<input class="form-control form-control-lg" name="search" id="search"  type="text" placeholder="Поиск по vin, названию, цене и т.д." aria-label=".form-control-lg example">

<?php if($_POST['param']) {
	$param = json_decode($_POST['param']);
	$row = get_text($param->id);
	echo json_encode($row);
	exit();
}?>
