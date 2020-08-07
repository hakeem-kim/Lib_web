<?php
  include "db_info.php";

  // $id = $_POST['user_id'];
  $pwd = $_POST['pwd'];
  $e_mail = $_POST['email'];
  $addr = $_POST['addr'];
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $tel = $_POST['tel'];

  if($pwd == NULL || $e_mail == NULL || $addr == NULL || $name == NULL || $gender == NULL || $tel == NULL){
    echo "입력하지 않은 데이터가 있습니다. 모두 입력 해주세요.<br>";
    echo "<a href=register.html>다시 돌아가기</a>";
    exit();
  }
  else{
    echo "회원가입 정보를 전부 입력 하셨습니다."."<br>";
  }

  $check = "SELECT * FROM user where email = '$e_mail'";
  $result = $mysqli->query($check);

  if($result->num_rows == 1){
    echo "아이디가 이미 존재합니다.";
    echo "<a href=register.html><br>다시 돌아가기</a>";
    exit();
  } else{
    echo "아이디 중복검사 통과."."<br>";
  }

  $query = "INSERT INTO user (pwd, email, addr, name, gender, tel)
  VALUES('$pwd','$e_mail','$addr','$name','$gender','$tel')";

  $execute = $mysqli->query($query);

  if($execute){
    echo "회원가입 되었습니다.";
    echo "<a href=index.html>다시 돌아가기</a>";
    //header("location:index.html");
  } else{
    echo "오류 발생..."."<br>";
    echo "<a href=register.html>다시 돌아가기</a><br>";
    echo $mysqli->error;
  }
?>
