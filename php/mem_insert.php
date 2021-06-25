<?php

  //echo "회원 입력 페이지 입니다.";

  $mem_id = $_POST['mem_id'];
  $mem_name = $_POST['mem_name'];
  $mem_email = $_POST['mem_email'];
  $mem_pass = $_POST['mem_pass'];
  $mem_job = $_POST['mem_job'];

  //시간 date() 참조 : https://offbyone.tistory.com/38

  $mem_profile_name = $_FILES['mem_profile']['name'];
  $mem_profile_tmp = $_FILES['mem_profile']['tmp_name'];
  $mem_profile_err = $_FILES['mem_profile']['error'];

  $mem_regi_day = date('Y-m-d');

  // echo $mem_id.'<br>';
  // echo $mem_name.'<br>';
  // echo $mem_email.'<br>';
  // echo $mem_pass.'<br>';
  // echo $mem_job.'<br>';
  // echo $mem_profile_name.'<br>';
  // echo $mem_profile_tmp.'<br>';
  // echo $mem_profile_err.'<br>';
  // echo $mem_regi_day.'<br>';

  //논리곱과 논리합
  //특정 연산자 기준으로 양쪽 모두 true일 때 true인 경우 논리곱
  //특정 연산자 기준으로 양쪽 중 하나만 true여도 true인 경우 논리합
  //연산자 : 논리곱(&&), 논리합(||)

  //사진 업로드 파일 경로
  $profile_upload_dir = $_SERVER['DOCUMENT_ROOT'].'/board/img/';

  if($mem_profile_name && !$mem_profile_err){
    $uploaded_url = $profile_upload_dir.$mem_profile_name;
    if(!move_uploaded_file($mem_profile_tmp, $uploaded_url)){
      die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
    }
  } else {
    $mem_profile_name = "";
  }

  //접속정보
  include $_SERVER['DOCUMENT_ROOT']."/board/connect/db_connect.php";
  //sql 명령문
  $sql = "INSERT INTO bor_mem (
    BOR_mem_id,
    BOR_mem_name,
    BOR_mem_email,
    BOR_mem_pf,
    BOR_mem_pass,
    BOR_mem_job,
    BOR_mem_regi_day
  ) VALUES(
    '{$mem_id}',
    '{$mem_name}',
    '{$mem_email}',
    '{$mem_profile_name}',
    '{$mem_pass}',
    '{$mem_job}',
    '{$mem_regi_day}'
  )";

  mysqli_query($dbConn, $sql);

  echo "
    <script>
      alert('회원가입이 완료되었습니다.');
      location.href='/board/index.php';
    </script>
  ";

?>