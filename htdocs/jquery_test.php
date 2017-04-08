
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title></title>
    <link href="css/default.css" rel="stylesheet" type="text/css" />
    <link href="css/skin_0.css" rel="stylesheet" type="text/css" id="cssfile" />
    <!--   引入jQuery -->
    <script src="jquery-3.1.0.js" type="text/javascript"></script>
    <!--   引入jQuery的cookie插件 -->
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function(){
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
        });
    </script>
</head>
<body>
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

</body>
</html>
