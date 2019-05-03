<?php 
include 'baglan.php';
if(isset($_POST["yorum"])){
$icerik_id = $_POST["icerik_id"];
$kullanici_ad = $_POST["kullanici_ad"];
$mail = $_POST["mail"];
$yorum = $_POST["yorum"];
$yorum_alt = $_POST["yorum_alt"];
if(!empty($icerik_id) AND !empty($kullanici_ad) AND !empty($mail) AND !empty($yorum)){
$ekle=$db->prepare("INSERT INTO yorumlar SET
	icerik_id=?,
	kullanici_ad=?,
	mail=?,
	yorum=?,
	yorum_alt=?
	");
$ekle->execute(array($icerik_id,$kullanici_ad,$mail,$yorum,$yorum_alt));
$son_id = $db->lastInsertId();
if($ekle){
$getir = array(
	'html'=> array()
);
$son=$db->prepare("SELECT * FROM yorumlar WHERE id={$son_id}");
$son->execute();
$getir = array();
$getir = $son->fetch(PDO::FETCH_ASSOC);
$getir["html"] = '<li id="'.$getir["id"].'"><div class="comment_body"><i class="fa fa-pencil"></i> <span class="user"> '.$getir["kullanici_ad"].'</span><p> '.$getir["yorum"].'</p></div><!-- comments toolbar --><div class="comment_toolbar"><!-- inc. date and time --><div class="comment_details"><ul><li><i class="fa fa-clock-o"></i> '.date("H:i:s",strtotime($getir["tarih"])).' </li><li><i class="fa fa-calendar"></i> '.date("Y-m-d",strtotime($getir["tarih"])).'</li></ul></div></div></li>';
echo json_encode($getir);
}}}

?>
