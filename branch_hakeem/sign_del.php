<?php
  include "db_info.php";

  //$id = $_POST['user_id'];
  $e_mail = $_POST['email'];
  $pwd = $_POST['pwd'];
  $name = $_POST['name'];
  $gender = $_POST['gender'];


  if($e_mail == NULL || $pwd == NULL || $name == NULL || $gender == NULL){
    echo "입력하지 않은 데이터가 있습니다. 모두 입력 해주세요.<br>";
    echo "<a href=index.html>다시 돌아가기</a>";
    exit();
  }
  else{
    echo "회원탈퇴 정보를 전부 입력 하셨습니다."."<br>";
  }

  $check = "SELECT * FROM user where email = '$e_mail'";
  $result = $mysqli->query($check);

  if($result->num_rows == 0){
    echo "아이디가 존재하지 않습니다.";
    echo "<a href=del_register.html><br>다시 돌아가기</a>";
    exit();
  } else{
    echo "탈퇴할 ID : $e_mail 입니다."."<br>";
  }

  $temp = $result->fetch_array();
  $temp_pwd = $temp['pwd'];
  $temp_name = $temp['name'];
  $temp_gender = $temp['gender'];

  if($temp_pwd == $pwd && $temp_name == $name && $temp_gender == $gender) {

    echo "데이터 일치확인 완료.<br>";
  } else {
    echo "데이터가 일치하지 않습니다.";
    echo "<a href=del_register.html>다시 돌아가기</a>";
    exit();
  }

  $query = "DELETE FROM user where user_id = '$id'";
  $execute = $mysqli->query($query);

  if($execute){
    echo "회원탈퇴 되었습니다.";
    echo "<a href=index.html>다시 돌아가기</a>";
    //header("location:index.html");
  } else{
    echo "오류 발생..."."<br>";
    echo $mysqli->error;
  }
?>
