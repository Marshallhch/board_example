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
    
    <section id="member-info">
      
      <div class="login-form">
        <div class="center">
          <h2 class="title">Login</h2>

          <form action="/board/php/login.php" method="post" name="login_form">
            <p>
              <label for="id">아이디</label>
              <input type="text" id="id" placeholder="아이디를 입력해 주세요." name="login_mem_id">
            </p>
            <p>
              <label for="">비밀번호</label>
              <input type="password" placeholder="비밀번호 입력해 주세요." name="login_mem_pass">
            </p>
          </form>

          <div class="login_btns">
            <button id="login_submit">로그인</button>
            <button id="go_join">회원가입</button>
          </div>
          <script>
            const go_join = document.querySelector("#go_join");
            const login_submit = document.querySelector("#login_submit");

            go_join.addEventListener('click', function(){
              location.href='/board/pages/join_form.php';
            });

            login_submit.addEventListener('click', function(){
              
              if(!document.login_form.login_mem_id.value){
                alert("아이디를 입력해 주세요.");
                document.login_form.login_mem_id.focus();
                return;
              }

              if(!document.login_form.login_mem_pass.value){
                alert("비밀번호를 입력해 주세요.");
                document.login_form.login_mem_pass.focus();
                return;
              }

              document.login_form.submit();

            });
          </script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="/board/js/custom.js"></script>
        </div>     
      </div>

    </section>
  </div>
</body>

</html>