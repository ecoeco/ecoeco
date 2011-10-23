<?php
class ProductModel
{
    public $_data;
	
	//
	//Текущий продукт
	//
    public function load($id)
    {
        $result = mysql_query(sprintf('SELECT * FROM catalog_product WHERE id_product = %d', intval($id))) or die("Invalid query: " . mysql_error());
        if ($row = mysql_fetch_array($result)) {
            foreach ($row as $product) 
			{
                $product = htmlspecialchars ($product);
            }
			$this->_data = array ();
            $this->_data = $this->_data + $row;
        }
		return $this;
    }
	public function getData()
    {
        return $this->_data;
    }
	
	//
	// Смежные продукты
	//
    function getRelatedProducts()
    {
        $result_cat = mysql_query(sprintf('SELECT id_category, name FROM catalog_category WHERE id_category = %d', intval($this->_data['id_category']))) or die("Invalid query: " . mysql_error());
        if ($category['cat'] = mysql_fetch_array($result_cat))
        {
            foreach($category['cat'] as $cat)
            {
				$cat = htmlspecialchars ($cat);
            }
        }
			
        $result_product = mysql_query(sprintf('SELECT id_product, name, id_category FROM catalog_product WHERE id_category = %d', intval($this->_data['id_category']))) or die("Invalid query: " . mysql_error());
        while ($category['cat_product'][] = mysql_fetch_array($result_product))
        {
            foreach($category['cat_product'] as $id)
            {
                foreach($id as $cat_product)
                {
                    $cat_product = htmlspecialchars ($cat_product);
                }
            }
        }
		$this->_data = $this->_data + $category;
        return $this;
    }
	
	// Печать блока RAL в templates\Product\view.php
	function printRalProduct()
	{ 
		// Пока есть номера в базе но нет описания к продукту
		$i=23;
		while ( $i++<60 )
		{
			$ral['ral'][$i] = '<p></p>';
		}
		//////////////////////
		$ral['ral']['23'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1125.jpg" title="EN 1125 FOR PANIC LOCKS WITH HORIZONTAL OPERATING RODS. Panic door locks are especially used where there are people that are not familiar with the place and panic situations may arise, i.e. in buildings that are open to the public. Undoubtedly, EN 1125 contributes most effectively to the protection of human life in emergencies and panic situations." alt="en_1125" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />
			<img src="img_small/product/norms/al.gif" title="Алюминий" alt="Aluminium" height="25" />
			<img src="img_small/product/norms/ku.gif" title="Нейлон" alt="Nylon" height="25" />';
		
		$ral['ral']['22'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1125.jpg" title="EN 1125 FOR PANIC LOCKS WITH HORIZONTAL OPERATING RODS. Panic door locks are especially used where there are people that are not familiar with the place and panic situations may arise, i.e. in buildings that are open to the public. Undoubtedly, EN 1125 contributes most effectively to the protection of human life in emergencies and panic situations." alt="en_1125" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />
			<img src="img_small/product/norms/al.gif" title="Алюминий" alt="Aluminium" height="25" />';
		
		$ral['ral']['21'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />
			<img src="img_small/product/norms/al.gif" title="Алюминий" alt="Aluminium" height="25" />';
		
		$ral['ral']['20'] = '<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<img src="img_small/product/norms/rostfrei.jpg" title="" alt="rostfrei" height="25" />
			<img src="img_small/product/norms/din_cert.jpg" title="" alt="din cert" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />';
		
		$ral['ral']['19'] = '<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<img src="img_small/product/norms/rostfrei.jpg" title="" alt="rostfrei" height="25" />
			<img src="img_small/product/norms/din_cert.jpg" title="" alt="din cert" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />
			<img src="img_small/product/norms/al.gif" title="Алюминий" alt="Aluminium" height="25" />';
		
		$ral['ral']['18'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<img src="img_small/product/norms/ogl.gif" title="" alt="ogl" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />';
		
		$ral['ral']['17'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<img src="img_small/product/norms/en_179.jpg" title="Emergency exit locks are used where there are people that are familiar to the place no panic situations are expected, i.e. in residential, office and commercial buildings. However, the standard assumes that the persons concerned are familiar with the escape routes and with operating the emergency exits." alt="en_179" height="25" />
			<img src="img_small/product/norms/okl.gif" title="" alt="okl" height="25" />
			<img src="img_small/product/norms/ogl.gif" title="" alt="ogl" height="25" />
			<img src="img_small/product/norms/sgl.gif" title="" alt="sgl" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />';
		
		$ral['ral']['16'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />';
		
		$ral['ral']['15'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<div></div>
			<img src="img_small/product/norms/okl.gif" title="" alt="okl" height="25" />
			<img src="img_small/product/norms/ogl.gif" title="" alt="ogl" height="25" />
			<img src="img_small/product/norms/sgl.gif" title="" alt="sgl" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />';
		
		$ral['ral']['14'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<img src="img_small/product/norms/en_179.jpg" title="Emergency exit locks are used where there are people that are familiar to the place no panic situations are expected, i.e. in residential, office and commercial buildings. However, the standard assumes that the persons concerned are familiar with the escape routes and with operating the emergency exits." alt="en_179" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />
			<img src="img_small/product/norms/al.gif" title="Алюминий" alt="Aluminium" height="25" />
			<img src="img_small/product/norms/ku.gif" title="Нейлон" alt="Nylon" height="25" />';
		
		$ral['ral']['13'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<img src="img_small/product/norms/en_179.jpg" title="Emergency exit locks are used where there are people that are familiar to the place no panic situations are expected, i.e. in residential, office and commercial buildings. However, the standard assumes that the persons concerned are familiar with the escape routes and with operating the emergency exits." alt="en_179" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />';
		
		$ral['ral']['12'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<img src="img_small/product/norms/en_179.jpg" title="Emergency exit locks are used where there are people that are familiar to the place no panic situations are expected, i.e. in residential, office and commercial buildings. However, the standard assumes that the persons concerned are familiar with the escape routes and with operating the emergency exits." alt="en_179" height="25" />
			<img src="img_small/product/norms/okl.gif" title="" alt="okl" height="25" />
			<img src="img_small/product/norms/ogl.gif" title="" alt="ogl" height="25" />
			<img src="img_small/product/norms/sgl.gif" title="" alt="sgl" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />
			<img src="img_small/product/norms/al.gif" title="Алюминий" alt="Aluminium" height="25" />';
		
		$ral['ral']['11'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<img src="img_small/product/norms/en_179.jpg" title="Emergency exit locks are used where there are people that are familiar to the place no panic situations are expected, i.e. in residential, office and commercial buildings. However, the standard assumes that the persons concerned are familiar with the escape routes and with operating the emergency exits." alt="en_179" height="25" />
			<img src="img_small/product/norms/ogl.gif" title="" alt="ogl" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />
			<img src="img_small/product/norms/al.gif" title="Алюминий" alt="Aluminium" height="25" />';
		
		$ral['ral']['10'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<div></div>
			<img src="img_small/product/norms/okl.gif" title="" alt="okl" height="25" />
			<img src="img_small/product/norms/ogl.gif" title="" alt="ogl" height="25" />
			<img src="img_small/product/norms/sgl.gif" title="" alt="sgl" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />
			<img src="img_small/product/norms/al.gif" title="Алюминий" alt="Aluminium" height="25" />';
		
		$ral['ral']['9'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<div></div>
			<img src="img_small/product/norms/ogl.gif" title="" alt="ogl" height="25" />
			<img src="img_small/product/norms/sgl.gif" title="" alt="sgl" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />
			<img src="img_small/product/norms/al.gif" title="Алюминий" alt="Aluminium" height="25" />';
		
		$ral['ral']['8'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<div></div>
			<img src="img_small/product/norms/ogl.gif" title="" alt="ogl" height="25" />
			<img src="img_small/product/norms/sgl.gif" title="" alt="sgl" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />';
		
		$ral['ral']['7'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<img src="img_small/product/norms/en_179.jpg" title="Emergency exit locks are used where there are people that are familiar to the place no panic situations are expected, i.e. in residential, office and commercial buildings. However, the standard assumes that the persons concerned are familiar with the escape routes and with operating the emergency exits." alt="en_179" height="25" />
			<img src="img_small/product/norms/okl.gif" title="" alt="okl" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />';
		
		$ral['ral']['6'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1906.jpg" title="This standard designates door furniture that is subject to severe wear. High resistance and extreme stress resistance ensure more safety in public buildings." alt="en_1906" height="25" />
			<img src="img_small/product/norms/en_179.jpg" title="Emergency exit locks are used where there are people that are familiar to the place no panic situations are expected, i.e. in residential, office and commercial buildings. However, the standard assumes that the persons concerned are familiar with the escape routes and with operating the emergency exits." alt="en_179" height="25" />
			<img src="img_small/product/norms/okl.gif" title="" alt="okl" height="25" />
			<img src="img_small/product/norms/ogl.gif" title="" alt="ogl" height="25" />
			<img src="img_small/product/norms/sgl.gif" title="" alt="sgl" height="25" />
			<div >
			</br>
			Возможные материалы:</br>
			<img src="img_small/product/norms/er.gif" title="Нержавеющая сталь" alt="Stainless Steel" height="25" />
			<img src="img_small/product/norms/al.gif" title="Алюминий" alt="Aluminium" height="25" />
			<img src="img_small/product/norms/ku.gif" title="Нейлон" alt="Nylon" height="25" />';
		
		$ral['ral']['5'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1154_a.jpg" title="This standard is applied where it must be ensured that a manually opened door closes automatically. Door closers according to EN 1154 ensure reliable and controlled closing of movable leaf doors." alt="en_1154_a" height="25" />
			<img src="img_small/product/norms/ce.jpg" title="" alt="CE" height="25" />';
		
		$ral['ral']['4'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1154_a.jpg" title="This standard is applied where it must be ensured that a manually opened door closes automatically. Door closers according to EN 1154 ensure reliable and controlled closing of movable leaf doors." alt="en_1154_a" height="25" />
			<img src="img_small/product/norms/ce.jpg" title="" alt="CE" height="25" />
			<div ></div>
				</br>
			<p class="mat" style="background-color:#8b929a">Нерж. мат</p>
			<p class="mat" style="background-color:#8b929a">Нерж. полиров.</p>';
		
		$ral['ral']['3'] = '<img src="img_small/product/norms/feuer.jpg" title="" alt="feuer" height="25" />
			<img src="img_small/product/norms/en_1154_a.jpg" title="This standard is applied where it must be ensured that a manually opened door closes automatically. Door closers according to EN 1154 ensure reliable and controlled closing of movable leaf doors." alt="en_1154_a" height="25" />
			<img src="img_small/product/norms/ce.jpg" title="" alt="CE" height="25" />
				<div ></div>
				</br>
			<p class="mat" style="background-color:#fff;height:18px;padding-top:2px;padding-left:2px;padding-right:2px;color:#000;border: 1px solid #000">Белый RAL 9016</p>
			<p class="mat" style="background-color:#b2b3b5">Серый RAL 9006</p>
			<p class="mat" style="background-color:#42290a">Корич. RAL 8014</p>
			<p class="mat" style="background-color:#8b929a">Нерж. мат</p>
			<p class="mat" style="background-color:#8b929a">Нерж. полиров.</p>
			<p class="mat" style="background-color:#000000">Черный RAL 9005</p>';
		
		$ral['ral']['2'] = '<p class="mat" style="background-color:#fff;height:18px;padding-top:2px;padding-left:2px;padding-right:2px;color:#000;border: 1px solid #000">Белый RAL 9016</p>
			<p class="mat" style="background-color:#b2b3b5">Серый RAL 9006</p>
			<p class="mat" style="background-color:#42290a">Корич. RAL 8014</p>
			<p class="mat" style="background-color:#8b929a">Нерж. мат</p>
			<p class="mat" style="background-color:#8b929a">Нерж. полиров.</p>
			<p class="mat" style="background-color:#000000">Черный RAL 9005</p>';
		
		$ral['ral']['1'] = '<p class="mat" style="background-color:#fff;height:18px;padding-top:2px;padding-left:2px;padding-right:2px;color:#000;border: 1px solid #000">Белый RAL 9016</p>
			<p class="mat" style="background-color:#b2b3b5">Серый RAL 9006</p>
			<p class="mat" style="background-color:#42290a">Корич. RAL 8014</p>';
		$ral['ral']['0'] = '<p></p>';
		
		$rals['ral'] = $ral['ral'][intval($this->_data['img_ral'])];
		$this->_data = $this->_data + $rals;
		return $this;
	}
	
	function selectColorQuoteProduct()
	{	$ral=intval($this->_data['img_ral']);
		if($ral == '9' or $ral == '10' or $ral == '11' or $ral == '12' or $ral == '19' or $ral == '21' or $ral == '22')
		{
		$rals['select_color'] = '<select size="1" name="color">
				<option disabled selected="selected" value="0" >Выберите Цвет</option>
				<option value="Нержавеющая сталь">Нержавеющая сталь</option>
				<option value="Алюминий">Алюминий</option>
			</select>';
		}
		elseif($ral == '7' or $ral == '8' or $ral == '13' or $ral == '15' or $ral == '16' or $ral == '17' or $ral == '18' or $ral == '20')
		{
		$rals['select_color'] = '<select size="1" name="color">
				<option disabled selected="selected" value="0" >Выберите Цвет</option>
				<option value="Нержавеющая сталь">Нержавеющая сталь</option>
			</select>';
		}
		elseif($ral == '6' or $ral == '14' or $ral == '23')
		{
		$rals['select_color'] = '<select size="1" name="color">
				<option disabled selected="selected" value="0" >Выберите Цвет</option>
				<option value="Нержавеющая сталь">Нержавеющая сталь</option>
				<option value="Алюминий">Алюминий</option>
				<option value="Нейлон">Нейлон</option>
			</select>';
		}
		elseif($ral == '5')
		{
		$rals['select_color'] = '<select size="1" name="color">
				<option disabled selected="selected" value="0" >Выберите Цвет</option>
				<option selected value="Нерж. мат" >Нерж. мат</option>
			</select>';
		}

		elseif($ral == '4')
		{
		$rals['select_color'] = '<select size="1" name="color">
				<option disabled selected="selected" value="0" >Выберите Цвет</option>
				<option value="Нерж. мат">Нерж. мат</option>
				<option value="Нерж. полиров.">Нерж. полиров.</option>
			</select>';
		}
		elseif($ral == '3')
		{
		$rals['select_color'] = '<select size="1" name="color">
				<option disabled selected="selected" value="0" >Выберите Цвет</option>
				<option value="Белый RAL 9016">Белый RAL 9016</option>
				<option value="Серый RAL 9006">Серый RAL 9006</option>
				<option value="Коричневый RAL 8014">Коричневый RAL 8014</option>
				<option value="Нерж. мат">Нерж. мат</option>
				<option value="Нерж. полиров.">Нерж. полиров.</option>
				<option value="Черный RAL 9005">Черный RAL 9005</option>
			</select>';
		}
		elseif($ral == '2')
		{
			$rals['select_color'] = '<select size="1" name="color">
				<option disabled selected="selected" value="0" >Выберите Цвет</option>
				<option value="Белый RAL 9016">Белый RAL 9016</option>
				<option value="Серый RAL 9006">Серый RAL 9006</option>
				<option value="Коричневый RAL 8014">Коричневый RAL 8014</option>
				<option value="Нерж. мат">Нерж. мат</option>
				<option value="Нерж. полиров.">Нерж. полиров.</option>
				<option value="Черный RAL 9005">Черный RAL 9005</option>
			</select>';
		}
		elseif($ral == '1')
		{
			$rals['select_color']= '<select size="1" name="color">
				<option disabled selected="selected" value="0" >Выберите Цвет</option>
				<option value="Белый RAL 9016">Белый RAL 9016</option>
				<option value="Серый RAL 9006">Серый RAL 9006</option>
				<option value="Коричневый RAL 8014">Коричневый RAL 8014</option>
			</select>';
		}else
		{
			$rals['select_color']= '<p></p>';
		}
		$this->_data = $this->_data + $rals;
		return $this;
		
	}
	
}

//
//  Видео на сайте	
//


/*
 <object ID="WMPlay" width="1024" height="576" classid="CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701" standby="Loading Microsoft Windows Media Player componentsпїЅ" type="application/x-oleobject">
 <PARAM name="URL" value="eco_movies/ECO_Image_Movie.wmv">
 <PARAM name="AllowChangeDisplaySize" value="True">
 <PARAM NAME=ShowControls VALUE=1>
 <PARAM NAME=ShowDisplay VALUE=1>
 <PARAM NAME=ShowStatusBar VALUE=1>
 <PARAM NAME=AutoStart VALUE=FALSE>
 <PARAM NAME=InvokeURLS Value=False>
 <embed name="WMplay" width="1024" height="576" type="application/x-mplayer2" pluginspage="http://www.microsoft.com/Windows/Downloads/Contents/Products/MediaPlayer/" src="eco_movies/ECO_Image_Movie.wmv" AutoStart="True"></embed>
 </object>

 */
// Установка счетчика посещения
//$_COOKIE ['counter'] ++;
//setcookie ("counter", $_COOKIE ['counter']);