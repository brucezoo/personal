
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body { font-size:12px;}
        #getscript{position:absolute;left:550px;}
        .comment { width:100px;margin-top:10px; padding:10px; border:1px solid #ccc;background:#DDD;}
        .comment h6 { font-weight:700; font-size:14px;}
        .para { margin-top:5px; text-indent:2em;background:#DDD;}
        .block{width:80px;height:80px;background:#DDD;}
        #loading{
            width:80px;
            height: 20px;
            background:#bbb;
            color:#000;
            display:none;
        }
        #messagewindow {
            height: 250px;
            border: 1px solid;
            padding: 5px;
            overflow: auto;
            font-size: 20px;
        }
        #wrapper {
            position:absolute;display: inline-block;left:670px;top:300px;
            width: 438px;
        }
        #chat{position:absolute;left:800px;top:280px;}
        #myForm{position:absolute;left:300px;top:350px;}
        #container{position:absolute;left:300px;top:650px;}
        * { font-family: Verdana; font-size: 96%; }
        label { width: 10em; float: left; }
        #commentForm {width: 50em;position:absolute;left:670px;top:10px}
        label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
        p { clear: both; }
        .submit { margin-left: 12em; }
        em { font-weight: bold; padding-right: 1em; vertical-align: top; }
        em.error{
            background: url("img/unchecked.gif") no-repeat 0px 0px;
            padding-left: 16px;
        }
        em.success{
            background: url("img/checked.gif") no-repeat 0px 0px;
            padding-left: 16px;
        }
        #myList{
            width: 80px;
            background: #EEE;
            padding: 5px;
            list-style: none;
            margin-left: 0.25in;
        }
        #myList a{
            text-decoration: none;
            color: #0077B0;
        }
        #myList a:hover{
            text-decoration: underline;
        }
        #myList .qlink{
            font-size: 12px;
            color: #666;
            margin-left: 10px;
        }
        #color{margin-left: 25px;}
    </style>
    <link type='text/css' href='css/demo.css' rel='stylesheet' />
    <link type='text/css' href='css/basic.css' rel='stylesheet' />
    <link type='text/css' href='css/box.css' rel='stylesheet' />
    <script src="jquery.js" type="text/javascript"></script>
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script src="js/jquery.metadata.js" type="text/javascript"></script>
    <script src="js/jquery.form.js" type="text/javascript"></script>
    <script src="js/jquery.simplemodal.js" type="text/javascript"></script>
    <script src="jquery.cookie.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.ui.core.js"></script>
    <script type="text/javascript" src="js/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="js/jquery.ui.mouse.js"></script>
    <script type="text/javascript" src="js/jquery.ui.sortable.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.18.custom.js"></script>
    <script type="text/javascript" src="js/jquery.tiy.js"></script>
    <script language="javascript" type="text/javascript">
        function Ajax() {
            var xmlHttpReq=null;
            if(window.ActiveXObject){
                xmlHttpReq=new ActiveXObject("Microsoft.XMLHTTP");
            }else if(window.XMLHttpRequest){
                xmlHttpReq=new XMLHttpRequest();
            }
            if(xmlHttpReq!=null){
                xmlHttpReq.open("GET","test_ajax.php",true);
                xmlHttpReq.onreadystatechange=RequestCallback;
                xmlHttpReq.send(null);
            }
            function RequestCallback() {
                if(xmlHttpReq.readyState==4){
                    if(xmlHttpReq.status==200){
                        document.getElementById("restext").innerHTML=xmlHttpReq.responseText;
                    }
                }
            }
        }
        $(function() {
            $("#send").click(function () {
                $("#resText").load("load_test.html div:not(:first)")
            });
            $("#html_send").click(function () {
//                $.get("get1.php",{
//                    username:$("#username").val(),
//                    content:$("#content").val()
//                },function (data,textStatus) {
//                    $("#resText").html(data)
//                });
                $.ajax({
                    type: "GET",
                    url: "get1.php",
                    dataType: "html",
                    data: //                    {
//                    username:$("#username").val(),
//                    content:$("#content").val()
//                    },
                        $("#form1").serialize(),
                    success: function (data, textStatus) {
//                        alert($("#form1").serialize());
//                        alert("成功");
//                        var obj={a:1,b:2,c:3}
//                        var sfe=$.param(obj);
//                        alert(sfe);
//                        alert($("#form1").serialize());
                        $("#resText").html(data)
                    }
                })
            });
            $("#xml_send").click(function () {
                $.get("get2.php",
//                    {
//                    username:$("#username").val(),
//                    content:$("#content").val()
//                },
                    "username=" + encodeURIComponent($("#username").val())
                    + "&content=" + encodeURIComponent($("#content").val()),
                    function (data, textStatus) {
                        var username = $(data).find("comment").attr("username");
                        var content = $(data).find("content").text();
                        var txtHtml = "<div class='comment'><h6>" + username + ":</h6><p class='para'>" + content + "</p></div>";
                        $("#resText").html(txtHtml);
                    })
            });
            $("#json_send").click(function () {
                $.get("get3.php", {
                    username: $("#username").val(),
                    content: $("#content").val()
                }, function (data, textStatus) {
                    var username = data.username;
                    var content = data.content;
                    var txtHtml = "<div class='comment'><h6>" + username + ":</h6><p class='para'>" + content + "</p></div>";
                    $("#resText").html(txtHtml);
                }, "json")
            });
            $("#load_send").click(function () {
                $("#resText").load("get1.php?username=" + $("#username").val() + "&content=" + $("#content").val())
            })
            $("#html_send1").click(function () {
                $.post("get1.php", {
                    username: $("#username").val(),
                    content: $("#content").val()
                }, function (data, textStatus) {
                    $("#resText").html(data)
                })
            });
            $("#xml_send1").click(function () {
                $.post("get2.php", {
                    username: $("#username").val(),
                    content: $("#content").val()
                }, function (data, textStatus) {
                    var username = $(data).find("comment").attr("username");
                    var content = $(data).find("content").text();
                    var txtHtml = "<div class='comment'><h6>" + username + ":</h6><p class='para'>" + content + "</p></div>";
                    $("#resText").html(txtHtml);
                })
            });
            $("#json_send1").click(function () {
                $.post("get3.php", {
                    username: $("#username").val(),
                    content: $("#content").val()
                }, function (data, textStatus) {
                    var username = data.username;
                    var content = data.content;
                    var txtHtml = "<div class='comment'><h6>" + username + ":</h6><p class='para'>" + content + "</p></div>";
                    $("#resText").html(txtHtml);
                }, "json")
            });
            $("#load_send1").click(function () {
                $("#resText").load("get1.php", {
                    username: $("#username").val(),
                    content: $("#content").val()
                })
            });
            $("#getscript_send").click(function () {
//                $.getScript("test.js");
                $.ajax({
                    type: "GET",
                    url: "test.js",
                    dataType: "script",
                    success: function () {
                        $("#loading").show();
                    }
                })
            });
            $("#getscript").click(function () {
//            $.getScript("jquery.color.js",function () {
//                    $(".block").animate({backgroundColor: 'red'}, 1000);
//                    $(".block").animate({backgroundColor: 'blue'}, 1000);
//                });
                $.ajax({
                    type: "GET",
                    url: "jquery.color.js",
                    dataType: "script",
                    complete: function () {
                        $(".block").animate({backgroundColor: 'red'}, 1000);
                        $(".block").animate({backgroundColor: 'blue'}, 1000);
                    }
                })
            });
            $("#getjson").click(function () {
                $.getJSON("test.json", function (data) {
                    $("#resText").empty();
                    var html = '';
                    $.each(data, function (commentIndex, comment) {
                        html += "<div class='comment'><h6>" + comment['username'] + ":</h6><p class='para'>" + comment['content'] + "</p></div>";
                    });
                    $("#resText").html(html)
                })
            });
            $("#getjson1").click(function () {
                $.ajax({
                    type: "GET",
                    async: false,
                    url: "https://public-api.wordpress.com/rest/v1/sites/wtmpeachtest.wordpress.com/posts",
                    dataType: "jsonp",
                    jsonp: "callback",
                    jsonpCallback:"flightHandler",
                    success: function(data){
                        alert(data.posts[0].content);
                        $("#username").val('zhufeng');
                    },
                    error: function(){
                        alert('fail');
                    }
                });
            });
            $.ajaxPrefilter(function (options) {
                options.global = true;
            });
            $("#getjson1").ajaxStart(function () {
                $("#loading").show();
            });
            $("#loading").ajaxStop(function () {
                $(this).hide();
            });
//            聊天室
            timestamp = 0;
            updateMsg();
            $("#chatform").submit(function(){
                $.ajax({
                    type:"POST",
                    url:"backend.php",
                    dataType:"html",
                    data:{
                        message:$("#msg").val(),
                        name:$("#author").val(),
                        action:"postmsg",
                        time:timestamp
                    },
                    success:function(xml){
                        $("#msg").val("");
                        addMessages(xml);
                    }
//                    error:function (xml) {
//                        alert("错误");
//                        alert(xml.status)
//                    }
                });
                return false;
            });
//            表单验证
            $("#commentForm").validate(
                {meta: "validate",
                errorElement:"em",
                success:function (em) {
                    em.text('').addClass("success");
                }
            });
            $.validator.addMethod(
                "formula",
                function (value,element,param) {
                    return value==eval(param);
                },
                "请输入数学公式计算的正确结果"
            );
//            $("#test").click(function () {
//                $(this).ajaxSubmit(function () {
////                var querystring=$("#myForm *").fieldValue();
//                    var querystring = $("#myForm").formSerialize();
//                    alert(querystring);
//                    $.post("demo.php", querystring, function (data) {
////                        alert(data);
//                        $("#output1").html(data).show();
//                    });
//                });
//                return false;
//            });
//            重置表单
            $("#test1").click(function () {
                $("#myForm").resetForm();
            });
//            清空表单
            $("#test2").click(function () {
                $("#myForm").clearForm();
            });
            var options={
                target:'#output1',
                beforeSubmit:validate,
                complete:showResponse,
                resetForm:true
            };
            $("#myForm").ajaxForm(options);
//            提示框，弹出框架
            $('.open-basic-dialog-ok').click(function (e) {
                $('#basic-dialog-ok').modal();
                return false;
            });
            $('.open-basic-dialog-warn').click(function (e) {
                $('#basic-dialog-warn').modal();
                return false;
            });

            $('.open-basic-ifr').click(function (e) {
                showIframe("http://www.baidu.com","ifr-dialog-content");
                return false;
            });
//            cookie
            var COOKIE_NAME="name";
            var COOKIE="check";
            if($.cookie(COOKIE_NAME)){
                $("#name").val($.cookie(COOKIE_NAME))
            }
            if($.cookie(COOKIE)){
                $("#check").attr("checked",$.cookie(COOKIE))
            }
            $("#check").click(function () {
               if(this.checked){
                   $.cookie(COOKIE_NAME,$("#name").val(),{path:'/',expires:10});
                   $.cookie(COOKIE,"true",{path:'/',expires:10});
               } else{
                   $.cookie(COOKIE_NAME,null,{path:'/'});
                   $.cookie(COOKIE,null,{path:'/'});
               }
            });
//            jQuery UI
            $("#myList").sortable({
                delay:1,
                stop:function () {
                    alert($("#myList").sortable('serialize'));
                    $.post(
                        "sortable.php",
                        $("#myList").sortable('serialize'),
                        function (response) {
                            alert(response)
                        }
                    )
                }
            });
            $("#myList_mood").click(function () {
               alert($(this).text());
            });
            $("#red_color").click(function () {
               $(this).next().color("black");
            });
            $("#goheader").click(function(){
                $("body").scrollTo(500);
                return false;
            });
            $('#panel').fadeIn(function(){
                // Using $.proxy :
                $('#panel button').click($.proxy(function(){
                    // this 指向 #panel
                    $(this).fadeOut();
                },this));
            });

//            $('#myForm').ajaxForm({
//                // 声明 服务器返回数据的类型.
//                dataType:  'json',
//                success:   processJson
//            });
//            $('#myForm').ajaxForm({
//                // 声明 服务器返回数据的类型.
//                dataType:  'xml',
//                success:   processXml
//            });
//            $('#myForm').ajaxForm({
//                // 用服务器返回的数据 更新 id为 htmlcssrain 的内容.
//                target: '#output1',
//                success: function() {
//                    $('#output1').fadeIn('slow');
//                }
//            });
        });
        function showIframe(src , id ){
            $("#ifr-dialog-container").attr("src",src);
            $('#ifr-dialog').modal({opacity:30,"overlayClose":true,"containerId":id });
        }
        function processJson(data) {
            // 'data'是一个json对象，从服务器返回的.
            $('#output1').html(data.name +  "   "+data.address + "  "+data.comment);
        }
        function processXml(responseXML) {
//            alert(responseXML);
            // 'responseXML' 是一个XML的文档 ，从服务器返回的.
            var name = $('name', responseXML).text();
            var address = $('address', responseXML).text();
            var comment = $('comment', responseXML).text();
            $('#output1').html(name +  "   "+address + "  "+comment);
        }
        function showRequest(formData,jqForm,options) {
//            var queryString=$.param(formData);
//            alert(queryString);
            var formElement=jqForm[0];
            var address=formElement.address.value;
            alert(address);
            return true;
        }
        function showResponse(responseText,statusText,xhr,$form) {
            alert('状态：'+ statusText +'\n返回的内容是:\n'+ responseText);
        }
        function validate(formData,jqForm,options) {
            var usernameValue = $('input[name=name]').fieldValue();
            var addressValue = $('input[name=address]').fieldValue();
//            alert(usernameValue);
            if (!usernameValue[0] || !addressValue[0]) {
                alert('用户名和地址不能为空，自我介绍可以为空！');
                return false;
            }
//            var formElement=jqForm[0];
//            var address=formElement.address.value;
//            var name=formElement.name.value;
//            if(!name||!address){
//                alert('姓名,地址,不能为空');
//                return false;
//            }
//            $.each(formData,function (index,value) {
////                alert(value);
//                if(!value["value"]){
//                    alert('姓名,地址,自我介绍不能为空');
//                    return false;
//                }
//            });
            var queryString=$.param(formData);
            return true;
//            for(var i=0;i < formData.length;i++){
//                if(!formData[i].value){
//                    alert('姓名,地址,自我介绍不能为空');
//                    return false;
//                }
//            }
//            var queryString=$.param(formData);
//            return true;
        }
        function updateMsg(){
            $.ajax({
                type:"POST",
                url:"backend.php",
                dataType:"html",
                cache:false,
                data:{
                    time:timestamp
                },
                success:function(xml) {
                    $("#load").remove();
                    addMessages(xml);
                }
//                error:function (xml) {
//                    alert("错误");
//                    alert(xml.status)
//                }
            });
            setTimeout('updateMsg()',500);
        }
        function addMessages(xml) {
            if($("status",xml).text() == "2") return;
            $("message",xml).each(function() {
                timestamp = $("time",xml).text();
                var author = $("author",this).text();
                var content = $("text",this).text();
                var htmlcode = " <strong>"+author+"</strong> <i>"+timestamp+"</i><br>"+content+"<br />";
                $("#messagewindow").prepend( htmlcode );
            });
        }
        jQuery.fn.scrollTo = function(speed) {
            var targetOffset = $(this).offset().top;
            $('html,body').stop().animate({scrollTop: targetOffset}, speed);
            return this;
        };
    </script>

</head>
<body>
<div id="getscript">
<button id="go">运行</button>
<div class="block"></div>
</div>
<input type="button" id="send" value="Ajax获取" />
<input type="button" value="Ajax提交" onclick="Ajax();"/>
<input type="button" id="getscript_send" value="getscript方法" />
<input type="button" id="getjson" value="getjson方法" />
<input type="button" id="getjson1" value="ajax跨域取数据" />
<!--<div id="loading">加载中...</div>-->
<form id="form1" action="#">
    <p>评论:</p>
    <p>姓名: <input type="text" name="username" id="username" /></p>
    <p>内容: <textarea name="content" id="content"  rows="2" cols="20"></textarea></p>
    <p>get方法<input type="button" id="html_send" value="html片段提交"/><input type="button" id="xml_send" value="xml文档提交"/><input type="button" id="json_send" value="json文件提交"/><input type="button" id="load_send" value="load方法提交"/></p>
    <p>post方法<input type="button" id="html_send1" value="html片段提交"/><input type="button" id="xml_send1" value="xml文档提交"/><input type="button" id="json_send1" value="json文件提交"/><input type="button" id="load_send1" value="load方法提交"/></p>

</form>

<div id="restext"></div>
<div  class="comment">
    已有评论：
</div>
<div id="resText" ></div>
<form class="cmxform" id="commentForm" method="get" action="">
    <fieldset>
        <legend>一个简单的验证带验证提示的评论例子</legend>
        <p>
            <label for="cusername">姓名</label>
            <em>*</em><input id="cusername" name="username" size="25" class="{validate:{required:true,minlength:2,messages:{required:'请输入姓名',minlength:'请至少输入2个字符'}}}" />
        </p>
        <p>
            <label for="cemail">电子邮件</label>
            <em>*</em><input id="cemail" name="email" size="25"  class="{validate:{required:true, email:true, messages:{required:'请输入电子邮件', email:'请检查电子邮件的格式'}}}" />
        </p>
        <p>
            <label for="curl">网址</label>
            <em>  </em><input id="curl" name="url" size="25"  value="" class="{validate:{url:true, messages:{url:'请检查网址的格式'}}}">
        </p>
        <p>
            <label for="ccomment">你的评论</label>
            <em>*</em><textarea id="ccomment" name="comment" cols="22"class="{validate:{required:true, messages:{required:'请输入您的评论'}}}" ></textarea>
        </p>
        <p>
            <label for="cvalcode">验证码</label>
            <input id="cvalcode" name="valcode" size="25"  value=""class="{validate:{formula:'7+9'}}" />=7+9
        </p>
        <p>
            <input class="submit" type="submit" value="提交"/>
        </p>
    </fieldset>
</form>
<p id="chat">jQuery + ajax在线聊天</p>
<br>
<div id="wrapper">
    <p id="messagewindow"><span id="load">加载中...</span></p>
    <form id="chatform"action="backend.php"method="post">
        姓名： <input type="text" id="author" size="50"/><br />
        内容： <input type="text" id="msg"  size="50"/>   <br />
        <input id="submit"type="submit" value="发送" /><br /><br>
    </form>
</div>
<form id="myForm" action="demo.php" method="post">
    名　　 称：<input type="text" name="name" id="name"/> <input type="checkbox" name="check" id="check"/>记住名称<br/><br/>
    地 　　址：<input type="text" name="address"/><br/><br/>
    自我介绍： <textarea name="comment"></textarea> <br/><br/>
    性     别：<input type="radio"value="男"checked/>男 <input type="radio"value="女"/>女<br/><br/>
    <input type="submit" id="test" value="提交" /><br/><br/>
    <div id="output1"></div>
</form>
　<input type="submit" id="test1" value="重置" />　<input type="submit" id="test2" value="清空" />
<input type="submit" id="jsontest" value="json方式返回" /> <br/>
<input type="submit" id="xmltest" value="xml方式返回" /> <br/>
<input type="submit" id="htmltest" value="html方式返回" /> <br/>
<div id='container'>

    <div id='logo'>
        <h1>Simple<span><a href="http://www.ericmmartin.com/projects/simplemodal-demos/">Modal</a></span></h1>
        <span class='title'>一个简单的遮罩层，可以制作提示框，对话框，弹出层，弹出iframe等...</span>
    </div>
    <div id='content'>
        <div id='basic-modal'>
            <p>提示框-ok：<input type='button' name='basic' value='Demo' class='open-basic-dialog-ok'/> or <a href='#' class='open-basic-dialog-ok'>Demo</a></p>
            <p>提示框-warn：<input type='button' name='basic' value='Demo' class='open-basic-dialog-warn'/> or <a href='#' class='open-basic-dialog-warn'>Demo</a></p>
            <p>弹出iframe：<input type='button' name='basic' value='Demo' class='open-basic-ifr'/> or <a href='#' class='open-basic-ifr'>Demo</a></p>
        </div>
    </div>

    <!-- 弹出内容 -->

    <div id="basic-dialog-ok">
        <!-- 普通弹出层 [[ -->
        <div class="box-title show"><h2>提示</h2></div>
        <div class="box-main">
            <div class="tips">
				<span class="tips-ico">
					<span class="ico-ok"><!-- 图标class可以为： ico-ok , ico-error , ico-info , ico-question , ico-warn , ico-wait --></span>
				</span>
                <div class="tips-content">
                    <div class="tips-title">申请成功，我们将短信通知您！</div>
                    <div class="tips-line"></div>
                </div>
            </div>
            <div class="box-buttons"><button type="button" class="simplemodal-close">关 闭</button></div>
        </div>
        <!-- 普通弹出层 ]] -->
    </div>

    <div id="basic-dialog-warn">
        <!-- 普通弹出层 [[ -->
        <div class="box-title show"><h2>提示</h2></div>
        <div class="box-main">
            <div class="tips">
				<span class="tips-ico">
					<span class="ico-warn"><!-- 图标 --></span>
				</span>
                <div class="tips-content">
                    <div class="tips-title">系统繁忙，请稍候重试</div>
                    <div class="tips-line"></div>
                </div>
            </div>
            <div class="box-buttons"><button type="button" class="simplemodal-close">关 闭</button></div>
        </div>
        <!-- 普通弹出层 ]] -->
    </div>

    <div id="ifr-dialog" >
        <!-- iframe弹出层 [[ -->
        <iframe frameborder="0" scrolling="yes" id="ifr-dialog-container" src="javascript:;" class="box-iframe"></iframe>
        <!-- iframe弹出层 ]] -->
    </div>

</div>
<ul id="myList">
    <li id="myList_mood"><a href="#">心情</a></li>
    <li id="myList_photo">
        <a href="#">相册</a>
        <a href="#" class="qlink">上传</a>
    </li>
    <li id="myList_blog">
        <a href="#">日志</a>
        <a href="#" class="qlink">发表</a>
    </li>
    <li id="myList_vote"><a href="#">投票</a></li>
    <li id="myList_share"><a href="#">分享</a></li>
    <li id="myList_group"><a href="#">群组</a></li>
</ul>
<div id="color">
<div class="a"id="red_color">red</div>
<div style="color:blue">blue</div>
<div style="color:green">green</div>
<div style="color:yellow">yellow</div>
</div>
<div id="panel">
    <button>Close</button>
    <a href="#nogo" id="goheader">返回顶部</a>
</div>

</body>
</html>
<?php
if(php_sapi_name()==='cli-server'){
    echo "php内置服务器";
}else{
    echo "其他服务器";
}