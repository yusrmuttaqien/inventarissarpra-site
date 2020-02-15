<?php 

// Sambut berdasar Jam

$date = new DateTime("now", new DateTimeZone('Asia/Bangkok') );
$nig = $date->format('H');
$dates= $date->format('H:i:s');

if($nig == 1){
    $res = "Dini Hari";
}elseif($nig == 2){
    $res = "Dini Hari";
}elseif($nig == 3){
    $res = "Dini Hari";
}elseif($nig == 4){
    $res = "Dini Hari";
}elseif($nig == 5){
    $res = "Dini Hari";
}elseif($nig == 6){
    $res = "Selamat Pagi";
}elseif($nig == 7){
    $res = "Selamat Pagi";
}elseif($nig == 8){
    $res = "Selamat Pagi";
}elseif($nig == 9){
    $res = "Selamat Pagi";
}elseif($nig == 10){
    $res = "Selamat Siang";
}elseif($nig == 11){
    $res = "Selamat Siang";
}elseif($nig == 12){
    $res = "Selamat Siang";
}elseif($nig == 13){
    $res = "Selamat Siang";
}elseif($nig == 14){
    $res = "Selamat Sore";
}elseif($nig == 15){
    $res = "Selamat Sore";
}elseif($nig == 16){
    $res = "Selamat Sore";
}elseif($nig == 17){
    $res = "Selamat Sore";
}elseif($nig == 18){
    $res = "Selamat Malam";
}elseif($nig == 19){
    $res = "Selamat Malam";
}elseif($nig == 20){
    $res = "Selamat Malam";
}elseif($nig == 21){
    $res = "Selamat Malam";
}elseif($nig == 22){
    $res = "Tengah Malam";
}elseif($nig == 23){
    $res = "Tengah Malam";
}elseif($nig == 0){
    $res = "Tengah Malam";
}

?>