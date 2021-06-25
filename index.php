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
      
      <div class="center">
        <h1>Main Page</h1>
      </div>

    </section>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/board/js/custom.js"></script>
</body>

</html>