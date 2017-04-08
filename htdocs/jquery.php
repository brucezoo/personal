<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>jQuery</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/xxka_style.css" />
<!--    <link href="css/skin_0.css" rel="stylesheet" type="text/css" id="cssfile" />-->
<!--    <link href="css/default.css" rel="stylesheet" type="text/css" />-->
<!--    <script src="js/jquery.cookie.js" type="text/javascript"></script>-->
    <script src="jquery-3.1.0.js"type="text/javascript"></script>
    <style>
    *{margin:0;padding:0;}
    body { font-size: 13px; line-height: 130%; padding: 60px; }
    #web_skin{position:absolute;top:420px;left:800px;display:inline;}
    #msg{position:absolute;top:150px;left:800px;}
    #content { position:absolute;top:55px;left:800px;width: 220px; border: 1px solid #0050D0;background: #96E555;display:inline-block ;}
    .inline{position:absolute;top:55px;left:450px;display:inline-block;}
    .inline span{border: 1px solid #0050D0;display:inline}
    span { width: 200px; margin: 10px; background: #666666; cursor: pointer;color:white;display:inline-block;}
    p {width:200px;background:#888;color:white;height:16px;}
    img{float:right;position: relative;cursor: pointer}
    table		{ display:inline-block;border:0;border-collapse:collapse;}
    td	{ font:normal 12px/17px Arial;padding:2px;width:100px;}
    th			{ font:bold 12px/17px Arial;text-align:left;padding:4px;border-bottom:1px solid #333;width:100px;}
    .parent		{ background:#FFF38F;cursor:pointer;}  /* 偶数行样式*/
    .odd		{ background:#FFFFEE;}  /* 奇数行样式*/
    .selected		{ background:#FF6500;color:#fff;}
    </style>

    <script type="text/javascript">
        $(function(){
            $("#large").click(function () {
                if(!$("#panel h5.head").is(":animated")){
                    if($("#panel h5.head").height()<100){
                        $("#panel h5.head").animate({height:"+=50"})
                    }
                }
            });
            $("#small").click(function () {
                if(!$("#panel h5.head").is(":animated")){
                    if($("#panel h5.head").height()>24){
                        $("#panel h5.head").animate({height:"-=50"})
                    }
                }
            });
            $("#panel h5.head").bind('click.p',b=function(){
//                $(this).next().fadeTo(2000,0.2);
                $(this).next().slideToggle();
                return false;
            });
//            $("#panel h5.head").trigger('click.p');
            $("img").click(function () {
                $(this).animate({left:"-=400px",height:"+=100px",opacity:"1"},3000)
                        .animate({top:"+=100px",width:"+=100px"},3000,function () {
                            $(this).css("border","5px solid blue");
                        })
                    .delay(1000)
                        .slideUp()

                if($(this).is(":animated")){
                    alert('正在放映动画')
                }
                return false;
            })
            $("#efsfe").hover(function () {
                $(this).stop(false,true)
                        .animate({height:"+=150px",width:"+=300px"},3000)
                return false;
            },function () {
                $(this).stop(false,true)
                        .animate({height:"+=22px",width:"+=60px"},3000)

            })

            $('#content span').bind("click.p",a=function(e){
//                $('span').unbind("click");
                var txt = $('#msg').html() + "<p>内层span元素被点击.<p/><br>";
                $('#msg').html(txt);
                e.stopPropagation();
            });
            $('#content').bind("click",function(e){
                var txt = $('#msg').html() + "<p>外层div元素被点击.<p/><br>";
                $('#msg').html(txt);
                e.stopPropagation();
            });
//            $("tbody>tr:odd").addClass("odd");
//            $("tbody>tr:even").addClass("even");
//            $("tr:contains('男')").addClass("selected");
            $(":checkbox:checked").parents("tr").addClass("selected");
//            $("table tbody>tr").hide().filter(":contains('李')").show();
//            $("tr.parent").click(function () {
//                if($(this).hasClass("selected")){
//                    $(this).removeClass("selected")
//                        .find(":checkbox").attr("checked",false);
//                }else{
//                    $(this).addClass("selected")
//                        .find(":checkbox").attr("checked",true);
//                }
//                var hasselected=$(this).hasClass("selected");
//                $(this)[hasselected?"removeClass":"addClass"]("selected")
//                   .find(":checkbox").attr("checked",!hasselected);
//                $(this).addClass("selected").siblings().removeClass("selected")
//                    .end()
//                    .find(":radio").attr("checked",true)
//                $(this).toggleClass("selected")
//                    .siblings(".child_"+this.id).toggle();
//            }).click();
            $("#filterName").keyup(function () {
                $("table tbody tr").hide().filter(":contains('"+($(this).val())+"')").show();
            }).keyup();
            $("#bigger").click(function () {
                var text=$("div.content").css("font-size");
                var textfontsize=parseInt(text,10);
                var unit=text.slice(-2);
                    if(textfontsize<22){
                        textfontsize+=2;
                    }
                $("div.content").css("font-size",textfontsize+unit)
            })
            $("#smaller").click(function () {
                var text=$("div.content").css("font-size");
                var textfontsize=parseInt(text,10);
                var unit=text.slice(-2);
                if(textfontsize>12){
                    textfontsize-=2;
                }
                $("div.content").css("font-size",textfontsize+unit)
            })
            $("div.tab_menu ul li").click(function () {
                $(this).addClass("selected")
                    .siblings().removeClass("selected");
                var index=$("div.tab_menu ul li").index(this);
                $("div.tab_box>div")
                    .eq(index).show()
                    .siblings().hide();
            }).hover(function () {
                $(this).addClass("hover");
            },function () {
                $(this).removeClass("hover");
            });
            $("#skin li").click(function () {
                $("#"+this.id).addClass("selected")
                    .siblings().removeClass("selected");
                $("#cssfile").attr("href","css/"+this.id+".css");
                $.cookie("mycssskin",this.id,{path:'/',expires:10});
            });
            var cookie_skin=$.cookie("mycssskin");
            if(cookie_skin){
                $("#"+cookie_skin).addClass('selected')
                    .siblings().removeClass('selected');
                $("#cssfile").attr("href","css/"+cookie_skin+".css");
                $.cookie("mycssskin",cookie_skin,{path:'/',expires:10});
            }
        })
    </script>
</head>
<body>
<div>
    筛选：
    <input id="filterName" />
</div>
<table>
    <thead>
    <tr><th>姓名</th><th>性别</th><th>暂住地</th></tr>
    </thead>
    <tbody>
    <tr class="parent selected" id="row_01"><td colspan="3">前台设计组</td></tr>
    <tr class="child_row_01"><td>张山</td><td>男</td><td>浙江宁波</td></tr>
    <tr class="child_row_01"><td>李四</td><td>女</td><td>浙江杭州</td></tr>

    <tr class="parent selected" id="row_02"><td colspan="3">前台开发组</td></tr>
    <tr class="child_row_02"><td>王五</td><td>男</td><td>湖南长沙</td></tr>
    <tr class="child_row_02"><td>找六</td><td>男</td><td>浙江温州</td></tr>

    <tr class="parent selected" id="row_03"><td colspan="3">后台开发组</td></tr>
    <tr class="child_row_03"><td>Rain</td><td>男</td><td>浙江杭州</td></tr>
    <tr class="child_row_03"><td>MAXMAN</td><td>女</td><td>浙江杭州</td></tr>
    </tbody>
</table>
<div class="inline">
<span id="bigger">内容放大</span><span id="smaller">内容缩小</span>
<span id="large">高度放大</span><span id="small">高度缩小</span>
<div id="panel">
    <h5 class="head">什么是jQuery?</h5>
    <div class="content">
        jQuery是继Prototype之后又一个优秀的JavaScript库，它是一个由 John Resig 创建于2006年1月的开源项目。jQuery凭借简洁的语法和跨平台的兼容性，极大地简化了JavaScript开发人员遍历HTML文档、操作DOM、处理事件、执行动画和开发Ajax。它独特而又优雅的代码风格改变了JavaScript程序员的设计思路和编写程序的方式。
    </div>
</div>
</div>
<br>



<div id="content">
    外层div元素
    <span>内层span元素</span>
    外层div元素
</div>
<br>

<div id="msg"></div>
<br>
<button id="del">删除事件</button>
<br>
<div class="tab">
    <div class="tab_menu">
        <ul>
            <li class="selected">时事</li>
            <li>体育</li>
            <li>娱乐</li>
        </ul>
    </div>
    <div class="tab_box">
        <div>时事</div>
        <div class="hide">体育</div>
        <div class="hide">娱乐</div>
    </div>
</div>
<div id="web_skin">
<ul id="skin">
    <li id="skin_0" title="灰色" class="selected">灰色</li>
    <li id="skin_1" title="紫色">紫色</li>
    <li id="skin_2" title="红色">红色</li>
    <li id="skin_3" title="天蓝色">天蓝色</li>
    <li id="skin_4" title="橙色">橙色</li>
    <li id="skin_5" title="淡绿色">淡绿色</li>
</ul>

<div id="div_side_0">
    <div id="news">
        <h1 class="title">时事新闻</h1>
    </div>
</div>

<div id="div_side_1">
    <div id="game">
        <h1 class="title">娱乐新闻</h1>
    </div>
</div>
</div>
<br>
<img src="uploads/image/201608/14718331326530.png">
<img id="efsfe"src="upload/SH)YUZ4USC]6JMJ4YBIEG`W.png">
</body>
</html>
<?php
require ("jquery_test.php")
?>