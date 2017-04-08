
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<!--    <meta http-equiv="content-type"content="text/html"charset="UTF-8">-->
    <title>js</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script src="jquery-3.1.0.js"type="text/javascript"></script>
    <style>
        #tooltip{
            position:absolute;
            border:1px solid #333;
            background:#f7f5d1;
            padding:1px;
            color:#333;
            display:none;
        }
        a:hover{
        text-decoration: none;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            var x=10;
            var y=20;
            $('a:eq(1)').mouseover(function (e) {
                this.mytitle=this.title;
                this.title='';
                var imagetitle=this.mytitle?'<br>'+this.mytitle:"";
                var tooltip="<div id='tooltip'><img src='"+this.href+"'alt='预览图'/>"+imagetitle+"</div>";
                $('body').append(tooltip);
                $('#tooltip').css({
                    "top":(e.pageY+y)+"px",
                    "left":(e.pageX+x)+"px"
                }).show("fast");
            }).mouseout(function () {
                this.title=this.mytitle;
                $("#tooltip").remove();
            }).mousemove(function (e) {
                $("#tooltip").css({
                    "top":(e.pageY+y)+"px",
                    "left":(e.pageX+x)+"px"
                })
            });
        });
            $(function(){
                var page = 1;
                var i = 4;
                var $parent = $("div.v_show");
                var $v_show = $parent.find("div.v_content_list");
                var $v_content = $parent.find("div.v_content");
                var v_width = $v_content.width() ;
                var len = $v_show.find("li").length;
                var page_count = Math.ceil(len / i) ;
                $("span.next").click(function(){
                    if( !$v_show.is(":animated") ){
                        if( page == page_count ){
                            $v_show.animate({ left : '0px'}, "slow");
                            page = 1;
                        }else{
                            $v_show.animate({ left : '-='+v_width }, "slow");
                            page++;
                        }
                        $parent.find("span").eq((page-1)).addClass("current").siblings().removeClass("current");
                    }
                });
                $("span.prev").click(function(){
                    if( !$v_show.is(":animated") ){
                        if( page == 1 ){
                            $v_show.animate({ left : '-='+v_width*(page_count-1) }, "slow");
                            page = page_count;
                        }else{
                            $v_show.animate({ left : '+='+v_width }, "slow");
                            page--;
                        }
                        $parent.find("span").eq((page-1)).addClass("current").siblings().removeClass("current");
                    }
                });
                $("#filterName").keyup(function(){
                $("table tbody tr")
                    .hide()
                    .filter(":contains('"+( $(this).val() )+"')")
                    .show();
            }).keyup();

        });


    </script>
</head>
<body>
<br>
<h1><a href="#" title="最喜欢的衣服">你最喜欢的衣服是?</a></h1>
<br>
<a href="upload/(7Y}01B`94I2IU2``_AB}{X.png" title="最喜欢的衣服"><img src="upload/$K4M)W([9F5PN4GGSYZ]UQ3.png"/></a>
<div class="v_show">
    <div class="v_caption">
        <h2 class="cartoon" title="卡通动漫">卡通动漫</h2>
        <div class="highlight_tip">
            <span class="current">1</span><span>2</span><span>3</span><span>4</span>
        </div>
        <div class="change_btn">
            <span class="prev" >上一页</span>
            <span class="next">下一页</span>
        </div>
        <em><a href="#">更多>></a></em>
    </div>
    <div class="v_content">
        <div  class="v_content_list">
            <ul>
                <li><a href="#"><img src="img/01.jpg" alt="海贼王" /></a><h4><a href="#">海贼王</a></h4><span>播放:<em>28,276</em></span></li>
                <li><a href="#"><img src="img/01.jpg" alt="海贼王" /></a><h4><a href="#">海贼王</a></h4><span>播放:<em>28,276</em></span></li>
                <li><a href="#"><img src="img/01.jpg" alt="海贼王" /></a><h4><a href="#">海贼王</a></h4><span>播放:<em>28,276</em></span></li>
                <li><a href="#"><img src="img/01.jpg" alt="海贼王" /></a><h4><a href="#">海贼王</a></h4><span>播放:<em>28,276</em></span></li>
                <li><a href="#"><img src="img/02.jpg" alt="哆啦A梦" /></a><h4><a href="#">哆啦A梦</a></h4><span>播放:<em>33,326</em></span></li>
                <li><a href="#"><img src="img/02.jpg" alt="哆啦A梦" /></a><h4><a href="#">哆啦A梦</a></h4><span>播放:<em>33,326</em></span></li>
                <li><a href="#"><img src="img/02.jpg" alt="哆啦A梦" /></a><h4><a href="#">哆啦A梦</a></h4><span>播放:<em>33,326</em></span></li>
                <li><a href="#"><img src="img/02.jpg" alt="哆啦A梦" /></a><h4><a href="#">哆啦A梦</a></h4><span>播放:<em>33,326</em></span></li>
                <li><a href="#"><img src="img/03.jpg" alt="火影忍者" /></a><h4><a href="#">火影忍者</a></h4><span>播放:<em>28,276</em></span></li>
                <li><a href="#"><img src="img/03.jpg" alt="火影忍者" /></a><h4><a href="#">火影忍者</a></h4><span>播放:<em>28,276</em></span></li>
                <li><a href="#"><img src="img/03.jpg" alt="火影忍者" /></a><h4><a href="#">火影忍者</a></h4><span>播放:<em>28,276</em></span></li>
                <li><a href="#"><img src="img/03.jpg" alt="火影忍者" /></a><h4><a href="#">火影忍者</a></h4><span>播放:<em>28,276</em></span></li>
                <li><a href="#"><img src="img/04.jpg" alt="龙珠" /></a><h4><a href="#">龙珠</a></h4><span>播放 <em>57,865</em></span></li>
                <li><a href="#"><img src="img/04.jpg" alt="龙珠" /></a><h4><a href="#">龙珠</a></h4><span>播放 <em>57,865</em></span></li>
                <li><a href="#"><img src="img/04.jpg" alt="龙珠" /></a><h4><a href="#">龙珠</a></h4><span>播放 <em>57,865</em></span></li>
                <li><a href="#"><img src="img/04.jpg" alt="龙珠" /></a><h4><a href="#">龙珠</a></h4><span>播放 <em>57,865</em></span></li>
            </ul>
        </div>
    </div>
</div>
<div>
    <br/>
    筛选：
    <input id="filterName" />
    <br/>

</div>
<table>
    <thead>
    <tr><th>姓名</th><th>性别</th><th>暂住地</th></tr>
    </thead>
    <tbody>
    <tr><td>张山</td><td>男</td><td>浙江宁波</td></tr>
    <tr><td>李四</td><td>女</td><td>浙江杭州</td></tr>
    <tr><td>王五</td><td>男</td><td>湖南长沙</td></tr>
    <tr><td>找六</td><td>男</td><td>浙江温州</td></tr>
    <tr><td>Rain</td><td>男</td><td>浙江杭州</td></tr>
    <tr><td>MAXMAN</td><td>女</td><td>浙江杭州</td></tr>
    <tr><td>王六</td><td>男</td><td>浙江杭州</td></tr>
    <tr><td>李字</td><td>女</td><td>浙江杭州</td></tr>
    <tr><td>李四</td><td>男</td><td>湖南长沙</td></tr>
    </tbody>
</table>

</body>
</html>