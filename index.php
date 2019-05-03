
<!DOCTYPE html>
<html>
<head>
	<base href="http://localhost/php_yorum/" />
	<title>Bulutasarim.com</title>
	<style type="text/css">
		body{
			margin: 0 auto;
			padding: 0;
		}
		nav{
			height: 50px;
			background-color: red;
			margin-bottom: 25px;
		}
		section{
			margin: 0 auto;
			width: auto;
			text-align: center;
		}
		.sub{
			background-color: burlywood;
			width: 25%;
			text-align: center;
			margin: 0 auto;
			margin-bottom: 15px;
			position: relative;
			top: -4px;
		}
		.sub a{
			text-decoration: none;
			font-size: 15px;
			font-weight: 600;
			font-family:sans-serif;
			color:#421916;
		}
		.tarih{
			width: 200px;
			margin: 0 auto;
		}

ul{
	list-style: none;
	text-align: -webkit-auto;
}
li a {
	background-color: #ccc;
	padding-right: 3px;
	padding-left: 3px;
	color: black;
	text-decoration-line: none;
	font-family: sans-serif;

}
ul li{
	border-bottom: 1px solid white;
}

	</style>
	<link rel="icon" href="fav/favicon.ico" type="image/x-icon">
</head>
<body>
	<nav>
		<div>

		</div>
	</nav>
	<section>
		<div>
			<?php
			include 'baglan.php';


			
			

				$icerik=$db->prepare('
				SELECT
				*
				FROM
				icerikler
				ORDER BY icerik_tarih DESC
				
				');
				$icerik-> execute();	
							

			$icerikgetir=$icerik->fetchAll(PDO::FETCH_ASSOC);

			foreach ($icerikgetir as $key => $value) {
				?>

				<img src="<?php echo $value['img'];?>" width="25%">
				<div class="sub"><a ><?php echo substr($value['icerik_tarih'],0,10);?></a><br>
					<a href="<?php echo $value['seo'];?>"><?php echo $value['konu'];?></a> 
				</div>			
			<?php }

			
			?>

		</div>

	</section>







</body>
</html>