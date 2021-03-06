<?php
include "./lib/db.php";
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>BOOK LIST</h1>

    <form method="post">
      <select name="selected">
        <option value="title">제목</option>
        <option value="author">작가</option>
        <option value="publisher">출판사</option>
      </select>
      <input type="text" name="search" placeholder="검색내용">
      <input type="submit" value="검색">
    </form>
    <div>
      <table>
        <tr>
          <td><a href="./book_list.php">메인</a></td>
          <td><a href="?genre=1">문학</a></td>
          <td><a href="?genre=2">인문/사회</a></td>
          <td><a href="?genre=3">자기계발</a></td>
          <td><a href="?genre=4">비즈니스/경제</a></td>
          <td><a href="?genre=5">라이프스타일</a></td>
          <td><a href="?genre=6">만화</a></td>
          <td><a href="?genre=7">과학</a></td>
          <td><a href="?genre=8">컴퓨터</a></td>
          <td><a href="?genre=9">수험서/자격증</a></td>
          <td><a href="?genre=10">예술/대중문화</a></td>
          <td><a href="?genre=11">외국</a></td>
          <td><a href="?genre=12">오디오북</a></td>
          <td><a href="?genre=13">기타</a></td>
       </tr>
      </table>
    </div>
    <?php
    if(isset($_GET['genre'])) {
    $sql = mq("select * from book where genre='".$_GET['genre']."'");
  } else if(isset($_POST['selected'])) {
    $sql = mq("select * from book where ".$_POST['selected']." LIKE'%".$_POST['search']."%'");
  } else {
    $sql = mq("select * from book ");
  }
    while($booklist = $sql->fetch_array()){
      $filtered = array(
        'title' => htmlspecialchars($booklist['title']),
        'author' => htmlspecialchars($booklist['author']),
        'publisher' => htmlspecialchars($booklist['publisher']),
        'the_date' => htmlspecialchars($booklist['the_date']),
        'genre' => htmlspecialchars($booklist['genre']),
        'file' => htmlspecialchars($booklist['file'])
      );?>

      <table class="list" cellpadding="5" border="1" align="center">
      <tr class="tltle">
        <th>Title</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>The_Day</th>
        <th>Genre</th>
        <th>Image</th>
      </tr>
      <tr class="value">
        <td><p><?= $filtered['title'] ?></p></td>
        <td><p><?= $filtered['author'] ?></p></td>
        <td><p><?= $filtered['publisher'] ?></p></td>
        <td><p><?= $filtered['the_date'] ?></p></td>
        <td><p><?= $filtered['genre'] ?></p></td>
        <td><p><img src="./file/<?= $filtered['file'] ?>" alt="이미지 없음"></p></td>
      </tr>
      </table>
    <?php   } ?>
  </body>
</html>
