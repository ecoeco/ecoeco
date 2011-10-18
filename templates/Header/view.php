<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta content="text/html; charset=Windows-1251" http-equiv="content-type" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/style_left_menu.css" type="text/css" />
<link rel="stylesheet" href="admin/style_admin.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/styles_feedback.css" />
<link rel="stylesheet" type="text/css" href="comments/styles.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="scripts/script_fancybox.js"></script>
</head>
<body>
    <div id="header">ECO Schulte
        <div id="logo">
            <img src="img_small/eco-logo.png" alt="ECO Schulte"/>
        </div>
        <div id="catalog">
            <ul id="menu_catalog">
                <li>
					<a href="index.php">На главную</a>
				</li>
				<li>
					<a href="comments.php">Форум</a>
				</li>
            </ul>
        </div>
		<div>
			<div id="print_session_msg">
				<?php print_session_msg();?>
			</div>
			<?php unset($_SESSION['msg']) ; ?>
			<?php if ($header['number'] > 0) : ?>
				<a  href="quote.php" style="font-size: 8pt; font-family: Arial, sans-serif; color: White"><?php echo 'В Корзине ' . $header['number'] . ' товара на ' . $header['total_sum'] . ' €' ; ?></a>
			<?php elseif ($header['number'] <= 0) : ?>
				<a  href="quote.php" style="font-size: 8pt; font-family: Arial, sans-serif; color: White">Корзина пуста</a>
			<?php endif ?>
		</div>	
    </div>
