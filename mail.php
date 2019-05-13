<?php
$emailto='่jamez_jame@hotmail.com'; //อีเมล์ผู้รับ<br>
$subject="1"; //หัวข้อ<br>
$header= "Content-type: text/html; charset=utf-8";
$header="from: "."ss"." E-mail : "."thanawat17810@gmail.com"; //ชื่อและอีเมลผู้ส่ง<br>
$messages= "sss"."<br>"; //ข้อความ<br>
$messages= "จาก "."sss"."<br>"; //ข้อความ<br>
$send_mail = mail($emailto,$subject,$messages,$header);
if(!$send_mail) 
{
    echo "ยังไม่สามารถส่งเมลล์ได้ในขณะนี้";
}
else{
    echo "ส่งเมลล์สำเร็จ";
{
?>