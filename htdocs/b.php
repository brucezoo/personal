<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type"content="text/html"charset="UTF-8">
<title>jquery</title>
<script src="jquery-3.1.0.js"type="text/javascript"></script>
    <style type="text/css">
        .boxx{width: 300px;padding: 20px;margin: 20px;
            border:4px dashed #CCCCCC;}
        .content{width:250px;margin: 10px 0;
            padding:20px;border: 2px solid #ff6666;}
        li{padding:10px;}
        .red{color:red}
        .blue{color:blue}
        #tooltip{
            position:absolute;
            border:1px solid #333;
            background:#f7f5d1;
            padding:1px;
            color:#333;
            display:none;
        }
    </style>
<!--    <link href="jquery演示/default.css" rel="stylesheet">-->
    <link href="jquery演示/default.css" type="text/css"rel="stylesheet">
    <link href="jquery演示/default(2).css" type="text/css"rel="stylesheet">

    <script type="text/javascript">
        $(function () {
            var $category = $('.SubCategoryBox>ul li:gt(5):not(:last)');
            $category.hide();
            var $togglebtn = $('div.showmore>a');
            $togglebtn.click(function () {
                $('.SubCategoryBox>ul li').toggle(function () {
                    $category.hide();
                    $(this).find('span')
                        .css("background", "url(jquery演示/down.gif)no-repeat 0 0")
                        .text('显示全部品牌');
                    $('.SubCategoryBox>ul li').removeClass('promoted');
                }, function () {
                    $category.show();
                    $(this).find('span')
                        .css("background", "url(jquery演示/up.gif)no-repeat 0 0")
                        .text('精简显示品牌');
                    $('.SubCategoryBox>ul li').filter(":contains('佳能'),:contains('尼康'),:contains('奥林巴斯')")
                        .addClass('promoted')
                })
                return false;
            });
            $(".level1>a").click(function () {
                if ($('.level2').is(":visible")) {
                    $('.level2').animate({height: "hide"})
                } else {
                    $(this).addClass("current")
                        .next().animate({height: "show"})
                        .parent().siblings().children("a").removeClass("current")
                        .next().hide();
                }
                return false;
            })
            $("#btn").click(function () {
                var items = $("input[name='check']:checked");
                alert("选中的个数为" + items.length)
            });
            $("p").click(function () {
                $(this).text()
            })

            $(".boxx li").click(function () {
                $(this).clone(true).appendTo(".boxx")
                $(this).toggleClass("blue")
            })
            $('<li class="content">妞子</li>').appendTo(".boxx");
            $(".boxx li b").replaceWith("超短袖")
            $('<li class="content"><i>超长袖</i></li>').replaceAll(".boxx li:eq(1)")
            $(".boxx p").wrapAll("<b></b>")
            var $para = $("p:first");
            $para.attr({"title": "最不喜欢的衣服", 'class': "content"});
            var p_txt = $para.attr('title');
            $('body').append(p_txt);
            $para.click(function () {
                $para.toggleClass("red");
            });
            $("#single").val(["选择3号"]);
            $("#multiple").val(["选择2号", "选择3号"]);
            $(":checkbox").val(["1"]);
            $(":radio").val(["radio1"]);
            var $ul = $('ul').children();
            for (var i = 0, len = $ul.length; i < len; i++) {
//                alert($ul[i].innerHTML);
            }
            $('p:eq(0)').css("opacity", "0.3")
            var $select = $('select');
            $select.scrollTop(30)
//            $para.removeClass("content");
//            $para.addClass("red")
//            $para.removeAttr("class")
//            var $li=$(".boxx li:eq(0)").detach();
            var x = 10;
            var y = 20;
            $('p a.red').mouseover(function (e) {
                this.mytitle = this.title;
                this.title = '';
                var tooltip = "<div id='tooltip'>" + this.mytitle + "</div>";
                $('body').append(tooltip);
                $('#tooltip').css({
                    "top": (e.pageY + y) + "px",
                    "left": (e.pageX + x) + "px"
                }).show("fast");
            }).mouseout(function () {
                this.title = this.mytitle;
                $("#tooltip").remove();
            }).mousemove(function (e) {
                $("#tooltip").css({
                    "top": (e.pageY + y) + "px",
                    "left": (e.pageX + x) + "px"
                })
            })
            $("#large").css("background", "yellow")
            $("#large").click(function () {
                if (!$("div.content").is(":animated")) {
                    if ($("select:eq(1)").height() < 100) {
                        $("select:eq(1)").animate({scrollTop: "-=10"})
                    }
                }
                var $multiple=$("select:eq(1)").prop("multiple")
                alert($multiple);
            });
            $("#small").click(function () {
                if (!$("div.content").is(":animated")) {
                    if ($("#panel h5.head").height() > 24) {
                        $("#panel h5.head").animate({height: "-=50"})
                    }
                }
            });
            $("#checkedall").click(function () {
                $("[name=items]:checkbox").prop("checked", true)
            })
            $("#checkedno").click(function () {
                if($(":checkbox:has(:checked)")){
                    $("[name=items]:checkbox:checked").attr("checked", false)
                }
            })
            $("#checkedrev").click(function () {
                $("[name=items]:checkbox").each(function () {
                    $(this).attr("checked", !$(this).attr("checked"))
                })
            })
            $("#send").click(function () {
                var str = "你选中的是\n";
                $("[name=items]:checkbox:checked").each(function () {
                    str += $(this).val() + "\r";
                })
                alert(str)
            })
            $("#checkedallorno").click(function () {
                $("[name=items]:checkbox").attr("checked", this.checked)
            })
            $("[name=items]:checkbox").click(function () {
                var flag=true;
                $("[name=items]:checkbox").each(function () {
                    if(!this.checked){
                    flag=false;
                }
                });
                $("#checkedallorno").attr("checked",flag)
            })
            $("[name=items]:checkbox").click(function () {
                var $tmp = $("[name=items]:checkbox");
                $("#checkedallorno").attr("checked", $tmp.length == $tmp.filter(":checked").length)
            });
            $("#add").click(function () {
                $("#multiple option:selected").appendTo("#multiple2")
            })
        })
//        window.onload = function() {
//            var btn = document.getElementById("btn");
//            btn.onclick = function () {
//                var array = new Array();
//                var items = document.getElementsByName("check");
//                for (i = 0; i < items.length; i++) {
//                    if (items[i].checked) {
//                        array.push(items[i].value)
//                    }
//                }
//                alert("个数为：" + array.length)
//            }
//        }
    </script>
</head>
<body>
<p><a href="#" title="最不喜欢的衣服"class="red">你最不喜欢的衣服是？</a></p>
<div class="boxx">
<p title="最喜欢的衣服"class="red">你最喜欢的衣服是？</p>
    <li class="content"><b>短袖</b></li    <li class="content">长袖</li>
    <li class="content">短袖T恤</li>
    <li class="content">长袖T恤</li>

</div>
<input type="checkbox"id="cr">
<label for="cr">同意注册协议</label>
<p>nfjkwb</p>
<div class="box">
    <ul class="menu">
        <li class="level1">
            <a href="#none">衬衫</a>
            <ul class="level2">
                <li><a href="#none">短袖衬衫</a></li>
                <li><a href="#none">长袖衬衫</a></li>
                <li><a href="#none">短袖T恤</a></li>
                <li><a href="#none">长袖T恤</a></li>
            </ul>
        </li>
        <li class="level1">
            <a href="#none">卫衣</a>
            <ul class="level2">
                <li><a href="#none">开襟卫衣</a></li>
                <li><a href="#none">套头卫衣</a></li>
                <li><a href="#none">运动卫衣</a></li>
                <li><a href="#none">童装卫衣</a></li>
            </ul>
        </li>
        <li class="level1">
            <a href="#none">裤子</a>
            <ul class="level2">
                <li><a href="#none">短裤</a></li>
                <li><a href="#none">休闲裤</a></li>
                <li><a href="#none">牛仔裤</a></li>
                <li><a href="#none">免烫卡其裤</a></li>
            </ul>
        </li>
    </ul>
</div>
<div class="SubCategoryBox">
    <ul>
        <li ><a href="#">佳能</a><i>(30440) </i></li>
        <li ><a href="#">索尼</a><i>(27220) </i></li>
        <li ><a href="#">三星</a><i>(20808) </i></li>
        <li ><a href="#">尼康</a><i>(17821) </i></li>
        <li ><a href="#">松下</a><i>(12289) </i></li>
        <li ><a href="#">卡西欧</a><i>(8242) </i></li>
        <li ><a href="#">富士</a><i>(14894) </i></li>
        <li ><a href="#">柯达</a><i>(9520) </i></li>
        <li ><a href="#">宾得</a><i>(2195) </i></li>
        <li ><a href="#">理光</a><i>(4114) </i></li>
        <li ><a href="#">奥林巴斯</a><i>(12205) </i></li>
        <li ><a href="#">明基</a><i>(1466) </i></li>
        <li ><a href="#">爱国者</a><i>(3091) </i></li>
        <li ><a href="#">其它品牌相机</a><i>(7275) </i></li>
    </ul>
    <div class="showmore">
        <a href="more.html"><span><img src="jquery演示/down.gif">显示全部品牌</span></a>
    </div>
</div>
<script type="text/javascript">
//    jQuery.noConflict();
    (function ($){

            $("li").click(function () {
                $(this).addClass("red").siblings().removeClass("red")

        })

    })(jQuery)
//    $(document).ready(function () {
//        alert("hello world");
//    });
//    $(document).ready(function () {
//        alert("hello jquery");
//    });
</script>
<script type="text/javascript">
    (function ($) {
       var $cr=$("#cr");
        var cr=$cr[0];
        $("#cr").click(function () {
            if($("#cr").is(':checked')){
                alert("继续操作")
            }
        })
    })(jQuery)
</script>
<form method="post" action="#">
    <input type="checkbox" value="1" name="check" checked="checked"/>
    <input type="checkbox" value="2" name="check" />
    <input type="checkbox" value="3" name="check" checked="checked"/>
    <input type="button" value="你选中的个数" id="btn"/>
</form>
<input type="button"id="checkedall" value="全选"/>
<input type="button"id="checkedno" value="全不选"/>
<input type="button"id="checkedrev" value="反选"/>
<input type="checkbox"id="checkedallorno" value="全选/全不选"/>全选/全不选
<input type="button"id="send" value="提交"/>

<br/><br/>

<select id="single">
    <option>选择1号</option>
    <option>选择2号</option>
    <option>选择3号</option>
</select>
<span id="large">放大</span><span id="small"style="background: red;border: 1px solid">缩小</span>
<select id="multiple" multiple="multiple" style="height:50px;">
    <option selected="selected">选择1号</option>
    <option>选择2号</option>
    <option>选择3号</option>
    <option>选择4号</option>
    <option selected="selected">选择5号</option>
</select>
<select multiple id="multiple2"style="height: 50px;width: 70px;"></select>
<span id="add">选中添加到右边&gt;&gt;</span>
<span id="add_all">选中添加到右边&gt;&gt;</span>
<br/><br/>


<input type="checkbox"name="items"value="check1"/> 多选1
<input type="checkbox"name="items" value="check2"/> 多选2
<input type="checkbox"name="items" value="check3"/> 多选3
<input type="checkbox"name="items" value="check4"/> 多选4

<br/>

<input type="radio" value="radio1" name="a"/> 单选1
<input type="radio" value="radio2" name="a"/> 单选2
<input type="radio" value="radio3" name="a"/> 单选3

</body>
</html>
