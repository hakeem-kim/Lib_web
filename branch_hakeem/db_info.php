<?php


$mysql_hostname = "localhost"; //localhost 즉 자기자신을 말한다.
$mysql_username = "hakeem"; //본인이 생성한 계정으로 접속을 한다.
$mysql_password = "2607"; // 생성계정의 설정된 비밀번호
$mysql_database = "lib"; //접속하고자 하는 데이터베이스
$mysql_port = '3306'; // 접속할 때 사용하는 포트 번호
$mysql_charset = 'UTF8';

//2. DB 연결

$mysqli = new mysqli($mysql_hostname, $mysql_username, $mysql_password, $mysql_database, $mysql_port, $mysql_charset );

if($mysqli){
  echo "MySQL 접속 성공"."<br>";
}else{
  echo "MySQL 접속 실패"."<br>";
}

function mq($sql){
  global $mysqli;
  return $mysqli->query($sql);
}


?>
