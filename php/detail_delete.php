<?php

  $delete_idx = $_GET['delete_idx'];
  //echo $delete_idx."번 글의 삭제 기능이 들어가는 페이지 입니다.";

  include $_SERVER['DOCUMENT_ROOT']."/board/connect/db_connect.php";
  $sql = "DELETE FROM bor_comm WHERE BOR_comm_idx = $delete_idx";

  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('글이 삭제되었습니다.');
      location.href='/board/pages/community.php';
    </script>
  ";

?>