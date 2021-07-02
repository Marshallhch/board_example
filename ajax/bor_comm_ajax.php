<li class="board_tit">
  <span>번호</span>
  <span>아이디</span>
  <span>제목</span>
  <span>등록일</span>
  <span>조회수</span>
</li>

<?php

  $page = $_GET['page'];
  //echo $page;

  $view_per_page = 5;
  $from = ($page - 1) * $view_per_page;

  include $_SERVER['DOCUMENT_ROOT']."/board/connect/db_connect.php";
  $sql = "SELECT * FROM bor_comm ORDER BY BOR_comm_idx DESC LIMIT $from, $view_per_page";

  $bor_result = mysqli_query($dbConn, $sql);
  while($bor_row = mysqli_fetch_array($bor_result)){
    $bor_idx = $bor_row['BOR_comm_idx'];
    $bor_id = $bor_row['BOR_comm_id'];
    $bor_tit = $bor_row['BOR_comm_tit'];
    $bor_reg = $bor_row['BOR_comm_reg'];
    $bor_hit = $bor_row['BOR_comm_hit'];
?>
<li class="board_contents">
  <span><?=$bor_idx?></span>
  <span><?=$bor_id?></span>
  <span>
    <a href="/board/pages/detail_form.php?idx=<?=$bor_idx?>"><?=$bor_tit?></a>
  </span>
  <span><?=$bor_reg?></span>
  <span><?=$bor_hit?></span>
</li>
<?php
  }
?>