<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Board Sample</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/board/css/style.css">
  <link rel="stylesheet" href="/board/css/media.css">
</head>

<body>
  <div class="wrap clear">
    
    <?php
      include $_SERVER['DOCUMENT_ROOT'].'/board/include/header.php';
    ?>

    <?php
      include $_SERVER['DOCUMENT_ROOT'].'/board/include/landing.php';
    ?>

    <section id="community">

      <div class="write_insert_form details">
        <div class="center">
          <h2 class="title">Board Detail List</h2>

          <?php

            $con_idx = $_GET['idx'];
            include $_SERVER['DOCUMENT_ROOT']."/board/connect/db_connect.php";
            $sql = "SELECT * FROM bor_comm WHERE 	BOR_comm_idx = $con_idx";

            $detail_result = mysqli_query($dbConn, $sql);
            //var_dump($detail_result);
            $detail_row = mysqli_fetch_array($detail_result);

            $detail_idx = $detail_row['BOR_comm_idx'];
            $detail_id = $detail_row['BOR_comm_id'];
            $detail_tit = $detail_row['BOR_comm_tit'];
            $detail_con = $detail_row['BOR_comm_con'];
            $detail_reg = $detail_row['BOR_comm_reg'];
            $detail_hit = $detail_row['BOR_comm_hit'];
            //echo $detail_id;

          ?>
          
          <form action="/board/php/detail_update.php?update_idx=<?=$detail_idx?>" method="post" class="update_form">
            <div class="detail_tit">
              <h3 class="detail_tit_txt"><?=$detail_tit?></h3>
              <input type="text" value="<?=$detail_tit?>" class="detail_input" name="detail_update_tit">
            </div>

            <div class="board_list update_list">
              <ul class="board_table">
                
              <li class="board_tit">
                <span>번호</span>
                <span>아이디</span>
                <span>내용</span>
                <span>등록일</span>
                <span>조회수</span>
              </li>
              <li class="board_contents detail_contents">
                <span><?=$detail_idx?></span>
                <span><?=$detail_id?></span>
                <span>
                  <em class="detail_txt"><?=$detail_con?></em>
                  <textarea class="detail_textarea" name="detail_update_con"><?=$detail_con?></textarea>
                </span>
                <span><?=$detail_reg?></span>
                <span><?=$detail_hit?></span>
              </li>

              </ul>
            </div> 
            <div class="update_smt_btn">
              <button type="submit">수정하기</button> 
            </div>        
          </form>
          <div class="insert_btn detail_btn">  

            <?php
              if(!$userid || $userid != $detail_id){
            ?>
              <button type="button" class="go_back">돌아가기</button>
            <?php
              } else {
            ?>
              <button type="button" class="detail_update">수정</button>        
              <button type="button" onClick="detail_delete(<?=$detail_idx?>)">삭제</button>      
              <button type="button" class="go_back">돌아가기</button>   
            <?php
              }
            ?>
          </div>    
        </div>
      </div>

    </section>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/board/js/custom.js"></script>
  <script>
    //const detail_update = document.querySelector('.detail_update');
    //const detail_delete = document.querySelector('.detail_delete');
    const go_back = document.querySelector('.go_back');

    go_back.addEventListener('click', function(){
      location.href='/board/pages/community.php';
    });

    function detail_delete(delete_idx){
      const isDelete = confirm('정말로 삭제하시겠습니까?');
      if(!isDelete){
        return false;
      } else {
        location.href='/board/php/detail_delete.php?delete_idx=' + delete_idx;
      }
      
    }
  </script>
  <script>
    $(function(){
      $(".detail_update").click(function(){
        $(this).toggleClass("on");
        if($(this).hasClass('on')){
          $(this).text('수정취소');
          $(".detail_input, .detail_textarea, .update_smt_btn").show();
          $(".detail_tit_txt, .detail_txt").hide();
        } else {
          $(this).text('수정');
          $(".detail_input, .detail_textarea, .update_smt_btn").hide();
          $(".detail_tit_txt, .detail_txt").show();
        }
      });
    });
  </script>
</body>

</html>