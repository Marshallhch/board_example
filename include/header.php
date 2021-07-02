<?php

  session_start();
  if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
  } else {
    $userid = "";
  }

  if(isset($_SESSION['userjob'])){
    $userjob = $_SESSION['userjob'];
  } else {
    $userjob = "";
  }

  if(isset($_SESSION['userprofile'])){
    $userprofile = $_SESSION['userprofile'];
  } else {
    $userprofile = "";
  }

  // echo $userid.'<br>';
  // echo $userjob.'<br>';
  // echo $userprofile.'<br>';

?>

<header>
  <div class="profile">
    <?php
      if(!$userid){
    ?>
    <!--삽입 HTML 코드-->
      <div class="profile-img">
        <img src="/board/img/default-user.png" alt="">
      </div>
      <div class="profile-txt">
        <h3>Your ID</h3>
        <p>Your Job</p>
      </div>
    <?php
    } else {
    ?>
      <!--삽입 HTML 코드-->
      <div class="profile-img">
        <img src="/board/img/<?=$userprofile?>" alt="" onerror="this.src='/board/img/default-user.png'">
      </div>
      <div class="profile-txt">
        <h3><?=$userid?></h3>
        <p><?=$userjob?></p>
      </div>
    <?php
      }
    ?>

  </div>
  <ul class="navi">
    <li class="active"><a href="/board/"><i class="fa fa-globe"></i>Welcome</a></li>
    <li><a href="#"><i class="fa fa-pencil"></i>About Me</a></li>
    <li><a href="#"><i class="fa fa-paperclip"></i>My Gallery</a></li>
    <li><a href="/board/pages/community.php"><i class="fa fa-link"></i>Community</a></li>
  </ul>
  <ul class="sns">
    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
  </ul>

  <div class="log_info">
    <?php
      if(!$userid){
    ?>
      <a href="/board/pages/login_form.php">로그인</a>
      <a href="/board/pages/join_form.php">회원가입</a>
    <?php
      } else {
    ?>
      <a href="/board/php/logout.php">로그아웃</a>
    <?php
      }
    ?>

  </div>
</header>