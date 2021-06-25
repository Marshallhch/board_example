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
      
      <div class="join-form">
        <div class="center">
          <h2 class="title">Join Us</h2>

          <form action="/board/php/mem_insert.php" method="post" name="join_form" encType="multipart/form-data">
            <p>
              <label for="id">아이디</label>
              <input type="text" id="id" placeholder="아이디를 입력해 주세요." name="mem_id">
            </p>
            <p>
              <label for="">이름</label>
              <input type="text" placeholder="이름을 입력해 주세요." name="mem_name">
            </p>
            <p>
              <label for="">이메일</label>
              <input type="text" placeholder="이메일을 입력해 주세요." name="mem_email">
            </p>
            <p>
              <label for="">비밀번호</label>
              <input type="password" placeholder="비밀번호를 입력해 주세요." name="mem_pass">
            </p>
            <p>
              <label for="">비밀번호 확인</label>
              <input type="password" placeholder="비밀번호 확인을 입력해 주세요." name="mem_pass_check">
            </p>
            <p>
              <label for="">직업</label>
              <input type="text" placeholder="직업을 입력해 주세요." name="mem_job">
            </p>
            <p>
              <label for="">프로필</label>
              <input type="file" name="mem_profile">
            </p>
          </form>

          <div class="join_btns">
            <button id="submit">제출</button>
            <button id="reset">리셋</button>
          </div>
        </div>     
      </div>

    </section>
  </div>

  <script>
  
  const submitBtn = document.querySelector('#submit');

  submitBtn.addEventListener('click', function(){
    
    if(!document.join_form.mem_id.value){
      alert("아이디를 입력해 주세요.");
      document.join_form.mem_id.focus();
      return;
    }

    if(!document.join_form.mem_name.value){
      alert("이름을 입력해 주세요.");
      document.join_form.mem_name.focus();
      return;
    }

    if(!document.join_form.mem_pass.value){
      alert("비밀번호를 입력해 주세요.");
      document.join_form.mem_pass.focus();
      return;
    }

    if(!document.join_form.mem_pass_check.value){
      alert("비밀번호 확인을 입력해 주세요.");
      document.join_form.mem_pass_check.focus();
      return;
    }

    if(document.join_form.mem_pass.value != document.join_form.mem_pass_check.value){
      alert("비밀번호와 비밀번호 확인이 다릅니다.");
      document.join_form.mem_pass_check.focus();
      return;
    }

    if(!document.join_form.mem_job.value){
      alert("직업을 입력해 주세요.");
      document.join_form.mem_job.focus();
      return;
    }

    const extensions = ['jpg', 'png', 'jpeg'];
    const imgValue = document.join_form.mem_profile.value;
    const imgExt = imgValue.split('.');
    console.log(imgExt[1]);

    //includes 참조 : https://developer.mozilla.org/ko/docs/Web/JavaScript/Reference/Global_Objects/Array/includes

    if(!extensions.includes(imgExt[1])){
      alert('jpg, png, jpeg 형식의 이미지를 올려주세요.');
      return;
    }

    document.join_form.submit();

  });
  
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/board/js/custom.js"></script>
</body>

</html>