<div class="listTitle clear">
      <span>번호</span>
      <span>제목</span>
      <span>내용</span>
      <span>글쓴이</span>
    </div>

    <?php

      $page=$_REQUEST['page'];
      if($page == ''){
        $page = 1;
      }

      $from = ($page-1) * 4;

      $con=mysqli_connect("localhost", "marshall36", "hany3366", "marshall36");
      $sql="select * from community_example order by num desc limit $from, 4";

      $result=mysqli_query($con, $sql);

      while($row=mysqli_fetch_array($result)){
        $num=$row['num'];
        $title=$row['title'];
        $content=$row['content'];
        $id=$row['id'];
    ?>

    <div class="listTitle listContent clear">
      <span><?=$num?></span>

      <?php
        $sql="select * from example_reply where content_num='$num' order by num desc";
        $reply_result=mysqli_query($con, $sql);
        $reply_row=mysqli_fetch_array($reply_result);
        $reply_content=$reply_row['reply_content'];

        if(!$reply_row){
      ?>
      <span><a href="reply_form.php?num=<?=$num?>"><?=$title?></a></span>
      <?php
        } else {
      ?>

      <span><a href="reply_form.php?num=<?=$num?>"><?=$title?></a><b>[답글]</b></span>

      <?php
        }
      ?>
      <span><?=$content?></span>
      <span><?=$id?></span>


        <?php
          if(!$reply_row){
        ?>
          <span id="reply" style="display:none"></span>
        <?php
          } else {
        ?>
          <span id="reply"><?=$reply_content?></span>
        <?php
          }
        ?>
    </div>

    <?php
      }
    ?>