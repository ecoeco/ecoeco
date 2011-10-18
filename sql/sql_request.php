<?php
require_once 'config.php';


// Вставка строк
$result = mysql_query("INSERT INTO catalog_product (id_category, name, price, img_big, img_small, img_cad, description)
    VALUES ('1', 'TS-20', '5000', 'img_big/ts-20.jpg', 'img_small/ts-20.jpg', 'img_small/ts-20_cad.jpg', '')");

  
//$result = mysql_query("INSERT INTO catalog_product (id_category, name, price, description)
  // VALUES ('1', 'Acer TravelMate 5710G', '5000', 'процессор и видеокарта')");	
// Удаление строк
// $result = mysql_query("DELETE FROM emps WHERE id_dept = '2'");

// Изменение строк
// $result = mysql_query("UPDATE emps SET last_name = 'Иванова' WHERE id_emp = '5'");

/*
if ($result)
{
	echo 'Успешно';
}
else {
	echo 'Ошибка';
}
*/
//_____________________________________________________________________________________________________


// Выборка данных
//$result = mysql_query('SELECT id_product, img_big FROM catalog_product');
//					 ('SELECT * FROM depts'); // вытащить все поля
//					 ('SELECT * FROM depts ORDER BY id_dept DESC'); // сортировать по id_dept убыванию (ASC возростанию - по умолчанию)
//					 ('SELECT * FROM depts ORDER BY id_dept LIMIT 1'); // показать только одну запись (диапазон 3,10: с 3-й по 10-ю)

//echo mysql_fetch_array($result);
//$row = mysql_fetch_array($result);
//echo $row[0];
/*$id=2;
$result = mysql_query(sprintf('SELECT name, img_big FROM catalog_product WHERE id = %d', $id));
echo $row['img_big'];
*/
//$a = Acer TravelMate 5730

/*
while ($row = mysql_fetch_array($result))
{
    if ($row[0] == 1)
	{
	echo $row[1];
	}
	//echo '<li>';
    /*echo '<a href="dept.php?id_dept=' . $row[0] . '">';*/
    //echo $row[1];
    //echo '</a>';
    //echo '</br>';
//}



/*
$result = mysql_query('SELECT id_dept, name FROM depts');
$count = mysql_num_rows($result);

for ($i = 0; $i < $count; $i++)
{
    $row = mysql_fetch_array($result);
    echo '<li>';
    echo '<a href="dept.php?id_dept=' . $row['id_dept'] . '">';
    echo $row['name'];
    echo '</a>';
    echo '</li>';
}

*/

/*
mysql_query("DELETE FROM emps WHERE id_dept='2'");
$count = mysql_affected_rows();
echo 'Уволены все сотрудники из отдела маркетинга. Их было $count чел.';
*/

?>