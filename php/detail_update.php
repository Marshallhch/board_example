<?php

  $update_idx = $_GET['update_idx'];
  $update_tit = addslashes($_POST['detail_update_tit']);
  $update_con = addslashes($_POST['detail_update_con']);
  $update_tit = nl2br($update_tit);
  $update_con = nl2br($update_con);

  // echo $update_idx.'<br>';
  // echo $update_tit.'<br>';
  // echo $update_con.'<br>';
  include $_SERVER['DOCUMENT_ROOT']."/board/connect/db_connect.php";
  //UPDATE Temp_Table SET field3='수정1', field4='수정2' WHERE field1 = 'data2';
  $sql = "UPDATE bor_comm SET BOR_comm_tit='$update_tit', BOR_comm_con='$update_con' WHERE BOR_comm_idx=$update_idx";

  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('수정이 완료되었습니다.');
      history.go(-1);
    </script>
  ";
?>