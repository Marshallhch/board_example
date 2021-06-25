//Mobile Menu Active Function
$(function(){

  let bool = false;

  $(".mobile-menu").click(function(){
    $(this).toggleClass('on');
    if($(this).hasClass('on')){
      $(this).find('i').attr('class', 'fa fa-times');
      $("header").stop().animate({left:0}, 300);
      bool = true;
      console.log(bool);
    } else {
      $(this).find('i').attr('class', 'fa fa-bars');
      $("header").stop().animate({left:'-100%'}, 300);
      bool = false;
      console.log(bool);
    }
  });

  $(window).resize(function(){
    if(bool == false){
      let wWidth = $(this).width();
      if(wWidth >= 1050){
        $("header").css({left:0});
      } else {
        $("header").css({left:'-100%'});
      }
    } else {
      $("header").css({left:0});
    }
  });
});




