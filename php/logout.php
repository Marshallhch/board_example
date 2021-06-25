<?php

  session_start();

  //세션 삭제
  unset($_SESSION['userid']);
  unset($_SESSION['userjob']);
  unset($_SESSION['userprofile']);

  //메인 페이지로 이동
  echo "
    <script>
      location.href='/board/index.php';
    </script>
  ";

?>