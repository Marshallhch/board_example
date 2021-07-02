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

      <div class="write_insert_form">
        <div class="center">
          <h2 class="title">Board List</h2>

          <div class="board_list">
            <ul class="board_table">
              <!-- Ajax Contents Load Area -->
            </ul>

            <div class="paging">
              <button type="button" class="arrow_btn double first"><i class="fa fa-angle-double-left"></i></button>
              <button type="button" class="arrow_btn single prev"><i class="fa fa-angle-left"></i></button>
              <?php
                include $_SERVER['DOCUMENT_ROOT']."/board/connect/db_connect.php";
                $sql = "SELECT * FROM bor_comm";

                $page_result = mysqli_query($dbConn, $sql);
                $total_record = mysqli_num_rows($page_result);
                $page_num = 5;

                //echo $total_record;
                if($total_record % $page_num == 0){
                  $total_page = floor($total_record/$page_num);
                } else {
                  $total_page = floor($total_record/$page_num) + 1;
                }

                for($i = 1; $i <= $total_page; $i++){
              ?>
              <button type="button" class="paging_btn" onClick="getPage(<?=$i?>)"><?=$i?></button>
              <?php
                }
              ?>
              <button type="button" class="arrow_btn single next"><i class="fa fa-angle-right"></i></button>
              <button type="button" class="arrow_btn double last"><i class="fa fa-angle-double-right"></i></button>
            </div>
          </div>

          <div class="board_insert">
            <form action="/board/php/write_insert.php?id=<?=$userid?>" method="post" name="insert_form">
              <p class="input_tit">
                <label for="tit">제목</label>
                <input type="text" placeholder="글 제목을 입력해 주세요." id="tit" name="insert_tit">
              </p>
              <p class="input_con">
                <textarea name="insert_con" placeholder="글 내용을 입력해 주세요."></textarea>
              </p>
            </form>
          </div>  
          <div class="insert_btn">
            <?php
              if(!$userid){
            ?>
            <button type="button" id="btn" onClick="plzLogin()">글쓰기</button>
            <?php
              } else {
            ?>
            <button type="button" id="btn" onClick="sendMsg()">글쓰기</button>
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
    function plzLogin(){
      alert('글쓰기를 하시려면 로그인이 필요합니다.');
      return;
    }

    function sendMsg(){
      if(!document.insert_form.insert_tit.value){
        alert("제목을 입력해 주세요.");
        document.insert_form.insert_tit.focus();
        return;
      }

      if(!document.insert_form.insert_con.value){
        alert("이름을 입력해 주세요.");
        document.insert_form.insert_con.focus();
        return;
      }

      document.insert_form.submit();
    }
  </script>
  <script>
    $(function(){
      const url = "/board/ajax/bor_comm_ajax.php";
      $.get(
        url, 
        {page : 1},
        function(data){
          $(".board_table").html(data);
        }
      );
    });

    //const = 1; 변하지 않는 변수를 선언할 때 사용
    //let = 1; 향후 변경된 변수를 할당 할 때 사용
    //일단 const로 변수를 선언하고, 디버깅 창에서 오류 메시지가 뜨면 let으로 변경

    let currentPage = 1;
    const pageLength = $(".paging_btn").length;
    console.log(pageLength);
    function getPage(no){
      const url = "/board/ajax/bor_comm_ajax.php";
      $(".paging_btn").removeClass('active');
      $(".paging_btn").eq(no-1).addClass('active');
      $.get(
        url, 
        {page : no},
        function(data){
          $(".board_table").html(data);
          currentPage = no;
        }
      );
    }

    // $(".next").click(function(){
    //   if(currentPage == pageLength){
    //     getPage(pageLength);
    //   } else {
    //     getPage(currentPage + 1);
    //   } 
    // });

    // $(".prev").click(function(){
    //   if(currentPage == 1){
    //     getPage(1);
    //   } else {
    //     getPage(currentPage - 1);
    //   }
    // });

    //---------------
    function prevNext(pageNum, calcPage){
      if(currentPage == pageNum){
        getPage(pageNum);
      } else {
        getPage(currentPage + calcPage);
      }
    }

    $(".single").click(function(){
      if($(this).hasClass("prev")){
        prevNext(1, -1);
      } else {
        prevNext(pageLength, 1);
      }
    });
    //---------------

    $(".first").click(function(){
      getPage(1);
    });

    $(".last").click(function(){
      getPage(pageLength);
    });

    $(".paging_btn").eq(0).trigger('click');
  </script>
</body>

</html>