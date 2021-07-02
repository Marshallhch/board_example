<?php

  $insert_id = $_GET['id'];
  $insert_tit = addslashes($_POST['insert_tit']);
  $insert_con = addslashes($_POST['insert_con']);
  $insert_reg = date('Y-m-d');
  $insert_hit = 0;

  // echo $insert_id.'<br>';
  // echo $insert_tit.'<br>';
  // echo $insert_con.'<br>';
  // echo $insert_reg.'<br>';
  // echo $insert_hit.'<br>';

  include $_SERVER['DOCUMENT_ROOT']."/board/connect/db_connect.php";
  $sql = "INSERT INTO bor_comm(
    BOR_comm_id,
    BOR_comm_tit,
    BOR_comm_con,
    BOR_comm_reg,
    BOR_comm_hit
  ) VALUES (
    '$insert_id',
    '$insert_tit',
    '$insert_con',
    '$insert_reg',
    '$insert_hit'
  )";

  mysqli_query($dbConn, $sql);

  echo "
    <script>  
      alert('글이 등록되었습니다.');
      location.href='/board/pages/community.php';
    </script>
  ";

?>