<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>喵~</title>
<link rel="stylesheet" href="../css/main.css">
<link type="image/x-icon" rel="shortcut icon" href="../img/favicon.ico" />
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script src="../js/vue.js"></script>

<style>
</style>
</head>
<body id="body">
<div id="cover">
  <img src="../img/animated-logo.gif" width="126" height="128" alt="">
  <span class="separator"><span class="progress" style="transform: scaleX(0);"></span></span>
  <div class="login_">
    <input type="text" id="login" name="login" placeholder="key">
    <input type="text" id="loginName" name="loginName" placeholder="username">
    <input type="password" id="loginPwd" name="loginPwd" placeholder="pwd">
    <span class="bar bar-1"></span>
    <span class="bar bar-2"></span>
    <span class="bar bar-3"></span>
    <span class="bar bar-4"></span>
    <span class="bar bar-1 hover"></span>
    <span class="bar bar-2 hover"></span>
    <span class="bar bar-3 hover"></span>
    <span class="bar bar-4 hover"></span>
  </div>
  <p class="login_info">您输入的key错误！</p>
</div>
<div id="m_content" class="" >
  <div id="nav">
    <div id="nav_1">第一页</div>
    <div id="nav_2">第二页</div>
  </div>
  <div id="main">
      <div class="title">
      <p>Miaow Galaxy</p>
    </div>
  </div>
  <div id="chat">
    <div class="bg">
        <video autoplay loop="loop" preload class="video" width="100%">
            <source type="video/mp4" src="http://overwatch.nos.netease.com/1/assets/video/Embers.mp4">
            <source type="video/webm" src="http://overwatch.nos.netease.com/1/assets/video/Embers_1.webm">
        </video>
    </div>
    <div id="toTop">
      <img src="http://alioss.g-cores.com/assets/totop-4489de3bdf698735aae759e5da990bc8ecb48fd5852e674fc5ba4fcdddfd3471.png" alt="Totop">
    </div>
    <div class="message_content">
        <div class="messageList">
              <!-- comments -->
              <div class="commentList">
                  <div class="comment_" v-for="comment in commentList">
                      <div class="comment_portrait"><img src="../img/banners.jpg" ></div>
                      <div class="comment_main">
                          <div class="comment_info">
                              <p class="comment_memberName" v-text="comment.username"><span></span></p>
                              <p class="comment_time"><span >{{comment.addtime | newTime}}</span></p>
                          </div>
                          <div>
                              <p class="comment_content" v-text="comment.comments">
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- 输入框 -->
              <div class="comment_text">
                <div class="comment_portrait"><img src="../img/banners.jpg" ></div>
                <div class="comment_textMain">
                  <textarea id="commentText" name="comment" cols="45" rows="8" aria-required="true" required="required" style="margin: 0px; width: 99%; height: 128px;"></textarea>
                </div>
                <button class="submit_comment" >
                    发送
                </button>
              </div>
        </div>
    </div>
  </div>
</div>

<!-- 是否登录 -->
<?php
session_start();

if(isset($_SESSION['views']))
{
  $_SESSION['views']=$_SESSION['views']+1;
}
else
{
  //echo "<script>$('#login_').css('display','none')</script>";
  //$_SESSION['views']=1;
}
//echo "<script>$('.login_').css('display','none')</script>";
//echo "浏览量：". $_SESSION['views'];
?>


<script type="text/javascript">
var vm = new Vue({
        el: '#m_content',
        data: {
          isMale:false,
          commentList:[],
          allMemberList:[{memberName:"kkk",isMale:true,department:"cqb"},{memberName:"lll",isMale:true,department:"cqb"},{memberName:"lbw3",department:"cqb"},{memberName:"lbw4",department:"cqb"}]
        },
        methods: {
          showAllMemberList:function(data){
              console.log(11)
          },
          showCommentList:function(data){
              this.commentList=data;
          },
       },
       filters: {
        newTime: function (value) {
          return new Date(parseInt(value)).toLocaleString()//.replace(/年|月/g, "-").replace(/日/g, " ");
        }
      },
      })
vm.showAllMemberList();//vm.showCommentList();
</script>
<script>
//上下滑页
$(function(){
    window.scrollTo(0,0);
    var presentPage=0;
    var mainPage=0;
    var chatPage=1;
    var bodyHeight=$("#body").css("height");
    var $content=$("#m_content");


    $(document).on("mousewheel DOMMouseScroll", function (e) {
        
        var delta = (e.originalEvent.wheelDelta && (e.originalEvent.wheelDelta > 0 ? 1 : -1)) ||  // chrome & ie
                    (e.originalEvent.detail && (e.originalEvent.detail > 0 ? -1 : 1));              // firefox
        if (delta > 0) {
            // 向上滚
            //console.log("wheelup");
            if(presentPage){
                if(document.getElementsByClassName("commentList")[0].scrollTop==0){
                $content.css("transform","")
                presentPage=mainPage;
            }}
        } else if (delta < 0) {
            // 向下滚
            //console.log("wheeldown");
            if(!presentPage){
                $content.css("transform","translate(0px,-"+bodyHeight+")")
                presentPage=chatPage;
            }
        }
    });


    $("#toTop").click(function(){
        var delay=0;
        if($("#chat")[0].scrollTop!=0){$("#chat").animate({scrollTop: '0px'}, 300);delay=300}
        setTimeout(function(){
            $content.css("transform","")
            presentPage=mainPage;
            console.log(delay)
        },delay)
    })
});



$(function(){//$start
  loadImg("http://dl.bizhi.sogou.com/images/2013/08/19/360005.jpg",addImg);//加载图片
  function loadImg(url,callback){
    var img = new Image();
        $("#cover").css("display","block");
        $("#cover .progress").css("transform","scaleX(0)");
        $("#cover").css("display");
        $("#cover .progress").css("transform","scaleX(.2)");

        img.onload = function(){
          img.onload = null;
          $("#cover .progress").css("transform","scaleX(1)");
          callback(img);
        }

    img.src=url;
  }
  function addImg(img){
    $("#main").attr("style","background: url(\"http://dl.bizhi.sogou.com/images/2013/08/19/360005.jpg\") no-repeat;background-size: cover;");
      //setTimeout(function(){$("#cover").addClass('hide');},400);//显示主页
  }
  
//comment


  $(".submit_comment").click(submit_comment_)//提交comment
  $("#commentText").keydown(function(e){
    if(e.keyCode==13){
       submit_comment_();
       event.preventDefault();
    }
  });
  function submit_comment_(){
    submitComment({"username":"lbw","comments":$("#commentText").val(),"imgurl":"../img/banners.jpg","now":new Date().getTime()});
    $("#commentText").val("");
  }

  getComment();//显示comment
});//$end

function submitComment(_para){
    console.log(_para)
    ajaxPost(domainUrl+"data/local/addComment.php",backing,_para);
}
function getComment(){
  ajaxPost(domainUrl+"data/local/getComment.php",showComment);
}

function backing(data){
  console.log(data);
  getComment();
};

function showComment(data){
  console.log(eval(data));
  vm.showCommentList(eval(data));
  setTimeout(function(){
    $(".commentList").animate({scrollTop: document.getElementsByClassName("commentList")[0].scrollHeight}, 300);
  },100)
}



//登录
//
//
var KEY=readOnly("CatGalaxy");
var MEMBER_ID=readOnly(0);


$(function(){setTimeout(function(){$('#login').focus()},100)});
//$(".login_")[0].onmousedown=function(){$('#login').focus();event.preventDefault();}
$("#login").focus(function(){
  $(".login_").addClass("hover");
})
$("#login").blur(function(){
  $(".login_").removeClass("hover");checkLoginKey();
})
$("#loginName").focus(function(){
  $(".login_").addClass("hover");
})
$("#loginName").blur(function(){
  $(".login_").removeClass("hover");
})
$("#loginPwd").focus(function(){
  $(".login_").addClass("hover");
})
$("#loginPwd").blur(function(){
  $(".login_").removeClass("hover");
})

$("#login").keydown(function(e){
    if(e.keyCode==32){
       $("#loginName").focus().val("");
       event.preventDefault();
    }else if(e.keyCode==13){
       $("#loginName").focus().val("");
       event.preventDefault();
    }else{

    }
});
$("#loginName").keydown(function(e){
    if(e.keyCode==32){
       $("#loginPwd").focus().val("");
       event.preventDefault();
    }else if(e.keyCode==13){
       $("#loginPwd").focus().val("");
       event.preventDefault();
    }else{

    }
});
$("#loginPwd").keydown(function(e){
    if(e.keyCode==13){
      setTimeout(function(){$("#cover").addClass('hide');},400);//显示主页 登录
    }
})
$("#login")[0].oninput=function(){
    $("#login").val(trimLogin($("#login").val()));
    if($("#login").val().length>=9){$("#loginName").focus().val("");}
};
$("#loginName")[0].oninput=function(){
    //$("#loginName").val(trimName($("#loginName").val()));
};
$("#loginPwd")[0].oninput=function(){
    $("#loginPwd").val(trimPwd($("#loginPwd").val()));
};
function checkLoginInput(){

}
function trimPwd(str){
  return str.replace(/\D*/g, "").replace(/\d*/,function($1){
  if($1.length>=6){return $1.match(/\d{6}/);}else{return $1}})
}
function trimName(str){
  //return str.replace(/\D*/g, "");
}
function trimLogin(str){
  return str.replace(/^\S/, function($1){return $1.toLocaleUpperCase()}).replace(/\S*/,function($1){
  if($1.length>=9){return $1.match(/\S{9}/);}else{return $1}}).replace(/^Catg/,function($1){return "CatG"}).replace(/^Moeg/,function($1){return "MoeG"});
}

function checkLoginKey(){//社区key
  var key = $("#login").val();
  ajaxPost(domainUrl+"data/local/loginKey.php",backLoginKey,{"loginkey":key});
}
function backLoginKey(data){
  console.log(data);
  if(data==0){
    $(".login_info").html("您输入的key错误！");
    $("#login").val("");
  }else{
    window.KEY=data;
    $(".login_info").html("");
  }
}
function intoParty(key){//登录社区

}


//////nav 导航栏
$("#nav_1").click(function(){console.log(1);$("#main").load("pc1.html")});
$("#nav_2").click(function(){console.log(2);$("#main").load("pc2.html")});


/*(function (doc, win) {
    var docEl = doc.documentElement,
    resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
    recalc = function () {
        var clientWidth = docEl.clientWidth;
        if (!clientWidth) return;
        docEl.style.fontSize = 20 * (clientWidth / 320) + 'px';
        browserRedirectCss()
    };
    if (!doc.addEventListener) return;
    win.addEventListener(resizeEvt, recalc, false);
    doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);
*/
/*
(function($){$.getUrlParam= function(name){
  var reg= new RegExp("(^|&)"+name +"=([^&]*)(&|$)");
  var r= window.location.search.substr(1).match(reg);
  if (r!=null) return unescape(r[2]); return null;
  }
})(jQuery);

window.onscroll= function(event){
  console.log(1)
}
*/

</script>
</body>
</html>