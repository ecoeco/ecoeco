<?php
require_once 'config.php';


// ������� �����
$result = mysql_query("INSERT INTO catalog_product (id_category, name, price, img_big, img_small, img_cad, description)
    VALUES ('1', 'TS-20', '5000', 'img_big/ts-20.jpg', 'img_small/ts-20.jpg', 'img_small/ts-20_cad.jpg', '')");

  
//$result = mysql_query("INSERT INTO catalog_product (id_category, name, price, description)
  // VALUES ('1', 'Acer TravelMate 5710G', '5000', '��������� � ����������')");	
// �������� �����
// $result = mysql_query("DELETE FROM emps WHERE id_dept = '2'");

// ��������� �����
// $result = mysql_query("UPDATE emps SET last_name = '�������' WHERE id_emp = '5'");

/*
if ($result)
{
	echo '�������';
}
else {
	echo '������';
}
*/
//_____________________________________________________________________________________________________


// ������� ������
//$result = mysql_query('SELECT id_product, img_big FROM catalog_product');
//					 ('SELECT * FROM depts'); // �������� ��� ����
//					 ('SELECT * FROM depts ORDER BY id_dept DESC'); // ����������� �� id_dept �������� (ASC ����������� - �� ���������)
//					 ('SELECT * FROM depts ORDER BY id_dept LIMIT 1'); // �������� ������ ���� ������ (�������� 3,10: � 3-� �� 10-�)

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
echo '������� ��� ���������� �� ������ ����������. �� ���� $count ���.';
*/

?>