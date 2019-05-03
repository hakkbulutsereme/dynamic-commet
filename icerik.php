
<!DOCTYPE html>
<html>
<head>
	<title>Bulutasarim.com</title>
	<style>
		@import url(https://fonts.googleapis.com/css?family=Lato:300,400);
		@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
		*,
		*:before,
		*:after {
			margin: 0;
			padding: 0;
			-webkit-box-sizing: border-box;
			transition: all 0.2s ease;
		}

		body, html {
			height: 100%;
			width: 100%;
		}

		body {
			font-family: "Lato", sans-serif;
			font-size: 1rem;
			color: #333;
			background-color: #f4f4f4;
		}

		.user_avatar {
			width: 65px;
			height: 65px;
			display: inline-block;
			vertical-align: middle;
		}
		.user_avatar img {
			width: 100%;
			height: 100%;
			border-radius: 50%;
		}

		.comment_block {
			width: 65%;
			height: 100%;
			margin: 0 auto;
			padding: 10px;
		}
		.comment_block .create_new_comment {
			width: 100%;
			padding: 20px 0;
		}
		.comment_block .create_new_comment .input_comment {
			display: inline-block;
			vertical-align: middle;
			margin-left: 10px;
			width: calc(100% - 75px);
		}
		.comment_block .create_new_comment .input_comment input {
			width: 100%;
			font-family: "Lato", sans-serif;
			font-weight: 300;
			font-size: 1.3rem;
			padding: 10px;
			border: none;
			border-bottom: 2px solid #f2f2f2;
		}
		.comment_block .create_new_comment .input_comment textarea{
			width: 100%;
			font-family: "Lato", sans-serif;
			font-weight: 300;
			font-size: 1.3rem;
			padding: 10px;
			border: none;
			border-bottom: 2px solid #f2f2f2;
		}
		.comment_block .create_new_comment .input_comment input:focus {
			outline: none;
			border-bottom: 2px solid #e6e6e6;
		}
		.comment_block .create_new_comment .input_comment textarea:focus {
			outline: none;
			border-bottom: 2px solid #e6e6e6;
		}
		.comment_block .new_comment {
			width: 100%;
			height: auto;
			padding: 20px 0;
			border-top: 1px solid #e6e6e6;
		}
		.comment_block .new_comment .user_comment {
			list-style-type: none;
		}
		.comment_block .new_comment .comment_body {
			display: inline-block;
			vertical-align: middle;
			width: calc(100% - 75px);
			min-height: 65px;
			margin-left: 10px;
			padding: 5px 10px;
			font-size: .9rem;
			color: #555;
			background-color: #FFF;
			border-bottom: 2px solid #f2f2f2;
		}
		.comment_block .new_comment .comment_body .replied_to {
			margin: 5px 0px;
			background-color: #fafafa;
			border-bottom: 2px solid #f2f2f2;
			border-radius: 5px;
		}
		.comment_block .new_comment .comment_body .replied_to p {
			padding: 5px;
		}
		.comment_block .new_comment .comment_body .replied_to span {
			color: #6495ED;
			margin-right: 2px;
		}
		.comment_block .new_comment .comment_toolbar {
			width: 100%;
		}
		.comment_block .new_comment .comment_toolbar ul {
			list-style-type: none;
			padding-left: 75px;
			font-size: 0;
		}
		.comment_block .new_comment .comment_toolbar ul li {
			display: inline-block;
			padding: 5px;
			font-size: .7rem;
			color: #aaa;
		}
		.comment_block .new_comment .comment_toolbar ul li:hover {
			cursor: pointer;
		}
		.comment_block .new_comment .comment_toolbar .comment_details {
			display: inline-block;
			vertical-align: middle;
			width: 70%;
			text-align: left;
		}
		.comment_block .new_comment .comment_toolbar .comment_tools {
			display: inline-block;
			vertical-align: middle;
			width: 30%;
			text-align: right;
		}
		.comment_block .new_comment .comment_toolbar .comment_tools li:hover {
			color: #CCC;
		}
		.comment_block .new_comment .user:hover {
			color: #6495ED;
			text-decoration: underline;
		}
		.comment_block .new_comment .love:hover {
			color: #FF6347;
		}

	</style>



</head>
<body>
	<nav>
		<div class="geri">
			<a href="./"> GERİ</a>
		</div>
	</nav>
	
	<div class="comment_block" style="margin-bottom: 100px;">
		<?php

		include 'baglan.php';
		$icerik=$db->prepare("select * from icerikler where seo=:seo");
		$icerik->execute(array('seo' => $_GET['seo']));
		$icerikgetir=$icerik->fetch(PDO::FETCH_ASSOC);


		?>
		<div style="text-align: center;">
			<img src="<?php echo $icerikgetir['img'];?>" width="50%">
			<div class="sub">
				<a href="<?php echo $icerikgetir['seo'];?>"><?php echo $icerikgetir['konu'];?></a>
			</div><br>
			<p class="metin"><?php echo $icerikgetir['metin'];?></p>
			<p class="metin">Tarih: <?php echo ($icerikgetir['icerik_tarih']);?></p>
		</div>


		<div class="create_new_comment">
			<form method="POST" id="yorum">
				<!-- current #{user} avatar -->
				<div class="input_comment" style="width: 380px;">
					<input type="text" id="kullanici_ad" name="kullanici_ad" placeholder="Kullanıcı Adı">
				</div>		 	<div class="input_comment"  style="width: 390px;">
					<input type="mail" id="mail" name="mail" placeholder="Mail Adresi">
				</div>		 	<div class="input_comment">
					<textarea type="text" id="yorum_text" name="yorum" placeholder="Yorumunuz.."></textarea>
					<input type="hidden" name="icerik_id" value="<?php echo $icerikgetir['id'];?>">
					<input type="hidden" id="yorum_alt" name="yorum_alt" value="<?php if(isset($_GET["comment"])){echo $_GET['comment'];}  ?>">
				</div>
				<div class="input_comment">
					<input type="button" name="ekle" id="ekle" value="Yorum Yap">
				</div>
			</div>


			<div class="new_comment">

				<!-- build comment -->
				<ul class="user_comment">

					<?php 

function yorum($id,$array,$alt){ 
						global $db;


  if(!empty($id)){ // koşul başı 1 içerik id numarası geliyorsa sorguyu başlatıyoruz.
  	$comment = array("all" => array(),
  		"alt" => array()
    );// Yorumları tek sorguda dizin olarak toplama için.


  	$yorum=$db->prepare("SELECT * FROM yorumlar WHERE icerik_id=:icerik_id ORDER BY tarih DESC");
  	$yorum->execute(array("icerik_id" => $id));

  	while($liste = $yorum->fetch(PDO::FETCH_ASSOC)){

  if($liste["yorum_alt"] > 0){ // başka bir yorumun yanıtı ise ayırıyoruz.
  	$comment["alt"][$liste["yorum_alt"]][$liste["id"]] = $liste;
  	
  }else{ // Asıl yorum ise ayırıyoruz.
  	$comment["all"][$liste["id"]] = $liste;

  }

}
// koşul sonu 2
  $for = $comment["all"];//Tüm ana yorumları bir değişkene attık
  $alt = $comment["alt"];//Tüm alt yorumları bit değişkene attık



  }else{//Eğer 1. prametre boş ise alt yorum metodu devreye giriyor. 2. paremetredeki alt yorumları listeletiyoruz.

  	$for= $array;
  }
//print_r($for);  

  foreach($for as $liste)

  	{if(isset($liste["id"])){
  		?>
  		<li id="<?php echo $liste["id"]; ?>">
  			<div class="comment_body">
  				<i class="fa fa-pencil"></i> <span class="user"><?php echo $liste["kullanici_ad"]; ?></span><p><?php echo $liste["yorum"]; ?></p>
  			</div>

  			<!-- comments toolbar -->
  			<div class="comment_toolbar">

  				<!-- inc. date and time -->
  				<div class="comment_details">
  					<ul>
  						<li><i class="fa fa-clock-o"></i> <?php echo date("H:i:s",strtotime($liste["tarih"])); ?></li>
  						<li><i class="fa fa-calendar"></i> <?php echo date("Y-m-d",strtotime($liste["tarih"])) ?></li>
  						<li><i class="fa fa-comment"></i><a href="?comment=<?php echo $liste["id"]; ?>">Yanıtla</a></li>

  					</ul>
  				</div>
  			</div>
  			<?php if (isset($alt[$liste["id"]]) ) {// Koşul başı 2 ana yorumun altında bir alt yorum varsa alt yorum dizininden sorguluyoruz.
  				echo "<ul class='user_comment ' style='width:80%;'>";
			 		yorum("",$alt[$liste["id"]],$alt); // Alt yorum metodu için ana yorumun alt yorumlarının dizinini  ve tüm alt yorumların dizinini yolluyoruz.
			 		echo "</ul>";
			 	} ?>
			 </li>
			<?php }}} 



yorum($icerikgetir['id'],"",""); // sadece içerik id numarasıyla listeme yapmak için 2. ve 3. parametreler boş olacak.




?>



</ul>

</div>

</div>



















<script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
<script type="text/javascript">

	$("#ekle").on("click",function () {
		var yorum = $("#yorum").serialize();
		$.ajax({
			url:"yorum.php",
			type:"POST",
			data:yorum,
			dataType:"JSON",
			success:function(argument) {
				if (argument.yorum_alt == 0) {
					$(".user_comment").html(argument.html + $(".user_comment").html());	
				}else{
					$("#"+argument.yorum_alt).html($("#"+argument.yorum_alt).html() + "<ul class='user_comment ' style='width:80%;'>"+  argument.html +"</ul>");	
				}
				

				$("#kullanici_ad").val('');
				$("#mail").val('');
				$("#yorum_text").val('');
				$("#yorum_alt").val('');
			}
		});
	});
</script>






</body>
</html>
