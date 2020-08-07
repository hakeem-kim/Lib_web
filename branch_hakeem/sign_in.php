<?php
  include "./db_info.php";

  $e_mail = $_POST['email'];
  $pwd = $_POST['pwd'];

  if($e_mail == NULL || $pwd == NULL){
    echo "입력하지 않은 데이터가 있습니다. 모두 입력해주세요.";
    echo "<a href=index.html>다시 돌아가기</a>";
    exit();
  }else{
    echo "ID,PW를 전부 입력 하셨습니다."."<br>";
  }

  $check_id = "SELECT * FROM user where email = '$e_mail'"; // user 테이블 중, u_id 필드에서 $id와 같은 것이 있는지 없는지 조회한다.

  $result_id = $mysqli->query($check_id); // mysqli 에서 $check_id의 쿼리문을 실행한다. Returns FALSE on failure. For successful SELECT, SHOW, DESCRIBE or EXPLAIN queries mysqli_query() will return a mysqli_result object. or other successful queries mysqli_query() will return TRUE.  실패하면 FALSE를 반환, 성공하면 TRUE와 mysqli_result 객체를 반환한다.
  // mysqli_result 객체의 변수, 함수를 가지고 있다. 변수로는 cunrrent_filed, filed_count, lengths, num_rows와 13개 함수를 가지고 있다. 대표적인 함수로는 fetch_array.  $result_id 에 저장된 데이터를 이용하려면 mysqli_query 객체를 활용해야 된다.

  if($result_id->num_rows==1){  // mysqi_result 객체의 변수 중 하나 인 num_rows고 이것은 반환된 행의 개수를 담고있다.
    echo "아이디 존재확인 완료."."<br>";
  } else{
    echo "아이디가 존재하지 않습니다.";
    echo "<a href=index.html>다시 돌아가기</a>";
    exit();
  }

  $temp = $result_id->fetch_array(); //수신된 데이터베이스의 테이블 정보를 배열에 삽입
  // $result_id가 가지고 있는 methods 중에는 fetch_array가 있고. 이 fetch_array는 내가 입력한 쿼리의 행을 한개씩 반환한다.
  $number = $temp['pwd']; // %temp 배열의 'password' 위치에 해당되는 문자열 값을 $number에 저장

  if($number == $pwd){ // 데이터베이스의 $number 값과 입력받은 $pwd 값이 일치하면 실행
    echo "비밀번호 일치확인 완료."."<br>";
  } else{
    echo "비밀번호가 일치하지 않습니다.";
    echo "<a href=index.html>다시 돌아가기</a>";
    exit();
  }

  if( $result_id->num_rows==1 && $number == $pwd ){
    echo "로그인 되었습니다.";
  } else{
    echo "다시 로그인 해주세요.";
    echo "<a href=index.html>다시 돌아가기</a>";
    exit();
  }

?>
