img_big/furniture_for_door_with_profiled//D_110/d-110_cad.jpg

UPDATE `test`.`catalog_product` SET `img_small` = 'img_small/product/fitting_technology/fittings_series/D_110/d-110_inox.jpg' WHERE `catalog_product`.`id_product` =19;
UPDATE `test`.`catalog_product` SET `img_small` = 'img_small/product/fitting_technology/fittings_series/D_120/d-120_inox.jpg' WHERE `catalog_product`.`id_product` =22;
UPDATE `test`.`catalog_product` SET `img_small` = 'img_small/product/fitting_technology/fittings_series/D_190/d-190_inox.jpg' WHERE `catalog_product`.`id_product` =23;
UPDATE `test`.`catalog_product` SET `img_small` = 'img_small/product/fitting_technology/fittings_series/D_210/d-210_inox.jpg' WHERE `catalog_product`.`id_product` =24;
UPDATE `test`.`catalog_product` SET `img_small` = 'img_small/product/fitting_technology/fittings_series/D_310/d-310_inox.jpg' WHERE `catalog_product`.`id_product` =25;
UPDATE `test`.`catalog_product` SET `img_small` = 'img_small/product/fitting_technology/fittings_series/D_330/d-330_inox.jpg' WHERE `catalog_product`.`id_product` =27;
UPDATE `test`.`catalog_product` SET `img_small` = 'img_small/product/fitting_technology/fittings_series/D_410/d-410_inox.jpg' WHERE `catalog_product`.`id_product` =29;
UPDATE `test`.`catalog_product` SET `img_small` = 'img_small/product/fitting_technology/fittings_series/D_490/d-490_inox.jpg' WHERE `catalog_product`.`id_product` =31;
UPDATE `test`.`catalog_product` SET `img_small` = 'img_small/product/fitting_technology/fittings_series/D_510/d-510_inox.jpg' WHERE `catalog_product`.`id_product` =32;


UPDATE `test`.`catalog_product` SET `img_big` = 'img_big/furniture_for_door_with_profiled/D_115/d-115-pt_inox.jpg' WHERE `catalog_product`.`id_product` =33;
UPDATE `test`.`catalog_product` SET `img_big` = 'img_big/furniture_for_door_with_profiled/D_116/d-116-pt_inox.jpg' WHERE `catalog_product`.`id_product` =34;
UPDATE `test`.`catalog_product` SET `img_big` = 'img_big/furniture_for_door_with_profiled/D_210/d-210-pt_inox.jpg' WHERE `catalog_product`.`id_product` =35;
UPDATE `test`.`catalog_product` SET `img_big` = 'img_big/furniture_for_door_with_profiled/D_310/d-310-pt_inox.jpg' WHERE `catalog_product`.`id_product` =36;
UPDATE `test`.`catalog_product` SET `img_big` = 'img_big/furniture_for_door_with_profiled/D_315/d-315-pt_inox.jpg' WHERE `catalog_product`.`id_product` =37;
UPDATE `test`.`catalog_product` SET `img_big` = 'img_big/furniture_for_door_with_profiled/D_335/d-335-pt_inox.jpg' WHERE `catalog_product`.`id_product` =38;
UPDATE `test`.`catalog_product` SET `img_big` = 'img_big/furniture_for_door_with_profiled/D_410/d-410-pt_inox.jpg' WHERE `catalog_product`.`id_product` =39;
UPDATE `test`.`catalog_product` SET `img_big` = 'img_big/furniture_for_door_with_profiled/D_415/d-415-pt_inox.jpg' WHERE `catalog_product`.`id_product` =40;
UPDATE `test`.`catalog_product` SET `img_big` = 'img_big/furniture_for_door_with_profiled/D_510/d-510-pt_inox.jpg' WHERE `catalog_product`.`id_product` =41;
UPDATE `test`.`catalog_product` SET `img_big` = 'img_big/furniture_for_door_with_profiled/D_515/d-515-pt_inox.jpg' WHERE `catalog_product`.`id_product` =42;


INSERT INTO `test`.`catalog_product` (`id_product`, `id_category`, `name`, `price`, `img_big`, `img_small`, `img_small_cat`, `img_cad`, `img_ral`, `txt`, `ma`, `number of hits`) 
VALUES 	(NULL, '7', 'ES 1', '99', 'img_big/protective_fittings/es_1.jpg', 'img_small/product/fitting_technology/protective_fittings/es_1.jpg', 'img_small/catalog/fitting/protective_fittings/es_1-th.jpg', '', '', '', '', ''),
		(NULL, '7', 'ES 1 short plate', '99', 'img_big/protective_fittings/es_1_short_plate.jpg', 'img_small/product/fitting_technology/protective_fittings/es_1_short_plate.jpg', 'img_small/catalog/fitting/protective_fittings/es_1_short_plate-th.jpg', '', '', '', '', ''),
		(NULL, '7', 'ES 1 with narrow plate', '99', 'img_big/protective_fittings/es_1_with_narrow_plate.jpg', 'img_small/product/fitting_technology/protective_fittings/es_1_with_narrow_plate.jpg', 'img_small/catalog/fitting/protective_fittings/es_1_with_narrow_plate-th.jpg', '', '', '', '', ''),
		(NULL, '7', 'ES 2', '99', 'img_big/protective_fittings/es_2.jpg', 'img_small/product/fitting_technology/protective_fittings/es_2.jpg', 'img_small/catalog/fitting/protective_fittings/es_2-th.jpg', '', '', '', '', ''),
		(NULL, '7', 'ES 3', '99', 'img_big/protective_fittings/es_3.jpg', 'img_small/product/fitting_technology/protective_fittings/es_3.jpg', 'img_small/catalog/fitting/protective_fittings/es_3-th.jpg', '', '', '', '', '');



UPDATE `test`.`catalog_product` SET `txt` = 'txt/es_0.txt' WHERE `catalog_product`.`id_product` =52;
UPDATE `test`.`catalog_product` SET `txt` = 'txt/es_1.txt' WHERE `catalog_product`.`id_product` =53;
UPDATE `test`.`catalog_product` SET `txt` = 'txt/es_1_short_plate.txt' WHERE `catalog_product`.`id_product` =54;
UPDATE `test`.`catalog_product` SET `txt` = 'txt/es_1_with_narrow_plate.txt' WHERE `catalog_product`.`id_product` =55;
UPDATE `test`.`catalog_product` SET `txt` = 'txt/es_2.txt' WHERE `catalog_product`.`id_product` =56;
UPDATE `test`.`catalog_product` SET `txt` = 'txt/es_3.txt' WHERE `catalog_product`.`id_product` =57;


INSERT INTO `test`.`catalog_product` (`id_product`, `id_category`, `name`, `price`, `img_big`, `img_small`, `img_small_cat`, `img_cad`, `img_ral`, `txt`, `ma`, `number of hits`) 
VALUES 	(NULL, '12', 'GBS 81', '99', 'img_big/panic/gbs/gbs_81.jpg', 'img_small/product/panic/gbs/gbs_81.jpg', 'img_small/catalog/panic/gbs_81-th.jpg', 'img_small/product/panic/gbs/gbs_81_cad.jpg', '24', 'txt/gbs_81.txt', '0', ''),
		(NULL, '12', 'GBS 82', '99', 'img_big/panic/gbs/gbs_82.jpg', 'img_small/product/panic/gbs/gbs_82.jpg', 'img_small/catalog/panic/gbs_82-th.jpg', 'img_small/product/panic/gbs/gbs_82_cad.jpg', '25', 'txt/gbs_82.txt', '0', ''),
		(NULL, '12', 'GBS 83', '99', 'img_big/panic/gbs/gbs_83.jpg', 'img_small/product/panic/gbs/gbs_83.jpg', 'img_small/catalog/panic/gbs_83-th.jpg', 'img_small/product/panic/gbs/gbs_83_cad.jpg', '25', 'txt/gbs_83.txt', '0', ''),
		(NULL, '12', 'GBS 90', '99', 'img_big/panic/gbs/gbs_90.jpg', 'img_small/product/panic/gbs/gbs_90.jpg', 'img_small/catalog/panic/gbs_90-th.jpg', 'img_small/product/panic/gbs/gbs_90.jpg', '26', 'txt/gbs_90.txt', '0', ''),
		(NULL, '12', 'GBS 91', '99', 'img_big/panic/gbs/gbs_91.jpg', 'img_small/product/panic/gbs/gbs_91.jpg', 'img_small/catalog/panic/gbs_91-th.jpg', 'img_small/product/panic/gbs/gbs_91.jpg', '27', 'txt/gbs_91.txt', '0', ''),
		(NULL, '12', 'GBS 92', '99', 'img_big/panic/gbs/gbs_92.jpg', 'img_small/product/panic/gbs/gbs_92.jpg', 'img_small/catalog/panic/gbs_92-th.jpg', 'img_small/product/panic/gbs/gbs_92.jpg', '28', 'txt/gbs_92.txt', '0', '');