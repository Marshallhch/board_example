<?php

  $login_mem_id = $_POST['login_mem_id'];
  $login_mem_pass = $_POST['login_mem_pass'];

  //echo $login_mem_id.'<br>';
  //echo $login_mem_pass.'<br>';

  //로그인 순서
  //1. 아이디 조회 2. 조회된 아이디 판별(if 조건문) 3. 아이디가 존재하면 비밀번호 판별 4. 비밀번호가 일치하면 세션 정보 저장 5. 메인 페이지로 이동

  include $_SERVER['DOCUMENT_ROOT']."/board/connect/db_connect.php";
  //테이블에 있는 BOR_mem_id와 로그인 페이지에서 넘어온 $login_mem_id 문자열이 일치하는 데이터 조회
  $sql = "SELECT * FROM bor_mem WHERE BOR_mem_id = '$login_mem_id'";

  $login_result = mysqli_query($dbConn, $sql);
  //아이디 존재 여부 숫자 파악
  $id_match = mysqli_num_rows($login_result);

  //var_dump($id_match);

  if(!$id_match){
    echo "
      <script>
        alert('등록되지 않은 아이디 입니다.');
        history.go(-1);
      </script>
    ";
  } else {
    //테이블 데이터 값을 배열로 저장
    $login_row = mysqli_fetch_array($login_result);
    //비밀번호 데이터 추출하여 저장
    $db_pass = $login_row['BOR_mem_pass'];
    //추출된 문자열과 입력된 비밀번호 문자열 비교
    if($login_mem_pass != $db_pass){
      echo "
        <script>
          alert('비밀번호가 틀립니다.');
          history.go(-1);
        </script>
      ";
    } else {
      session_start();
      $_SESSION['userid'] = $login_row['BOR_mem_id'];
      $_SESSION['userjob'] = $login_row['BOR_mem_job'];
      $_SESSION['userprofile'] = $login_row['BOR_mem_pf'];

      echo "
        <script>
          location.href='/board/index.php';
        </script>
      ";
    }
  }
?>