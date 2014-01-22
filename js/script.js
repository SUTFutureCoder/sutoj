$(function(){$(".carousel").jCarouselLite({btnNext:".next1",btnPrev:".prev1"});});

/*开始走马灯*/
function startmarquee(lh/*line-height*/,speed/*50*/,delay/*3000*/,id/*element id*/){
  var t;
  var p=false;
  var o=document.getElementById(id);
  o.innerHTML+=o.innerHTML;
  o.onmouseover=function(){p=true}
  o.onmouseout=function(){p=false}
  o.scrollTop = 0;
  function start(){
    t=setInterval(scrolling,speed);
    if(!p) o.scrollTop += 2;
  }
  function scrolling(){
    if(o.scrollTop%lh!=0){
    o.scrollTop += 2;
    if(o.scrollTop>=o.scrollHeight/2) o.scrollTop = 0;
    }else{
    clearInterval(t);
    setTimeout(start,delay);
    }
  }
  setTimeout(start,delay);
}

/*启动效果*/
try{
startmarquee(26,50,3000,"marqueebox0");
}catch(e){}