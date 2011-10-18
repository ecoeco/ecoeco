Добавление строк в catalog_category
INSERT INTO `test`.`catalog_category` (`id_category`, `group_id`, `name`, `img`, `description`) VALUES 
(NULL, '4', 'OBX 20 mm', 'img_small/catalog/hinge/obx_20mm.jpg', ''), 
(NULL, '4', 'OBX 18 mm', 'img_small/catalog/hinge/obx_18mm.jpg', ''),
(NULL, '4', 'Frame construction OBX (pick-up element)', 'img_small/catalog/hinge/pick-up_element.jpg', ''),
(NULL, '4', 'Accessories', 'img_small/catalog/hinge/accessories.jpg', ''),
(NULL, '5', 'Locks', 'img_small/catalog/glass/locks.jpg', ''), 
(NULL, '5', 'Hinges', 'img_small/catalog/glass/hinges.jpg', ''),
(NULL, '5', 'Fittings', 'img_small/catalog/glass/fittings.jpg', '');

Обновление столбца
         БД      таблица             столбец      на что измениется								таблица				№строки
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 1;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 2;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 3;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 4;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 5;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 6;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 7;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 8;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 9;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 10;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 11;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 12;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 13;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 14;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 15;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 16;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 17;
UPDATE `test`.`catalog_product` SET `img_ral` = 'img_small/product/door_closer/ral/.jpg' WHERE `catalog_product`.`id_product` = 18;

Выборка из двух таблиц
SELECT * FROM quote, quote_item WHERE quote.id_quote=quote_item.id_quote_item AND quote.activ=1 AND quote.customer_id='ecoeco'