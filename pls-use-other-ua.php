<html>
<head>
    <meta charset="UTF-8">
    <title>使用浏览器打开</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="format-detection" content="telephone=no">
    <meta content="false" name="twcClient" id="twcClient">
    <meta name="aplus-touch" content="1">
    <style>
        body,html{width:100%;height:100%}
        *{margin:0;padding:0}
        body{background-color:#fff}
        #browser img{
            width:50px;
        }
        #browser{
            margin: 0px 10px;
            text-align:center;
        }
        #contens{
            font-weight: bold;
            margin:-285px 0px 10px;
            text-align:center;
            font-size:20px;
            margin-bottom: 125px;
        }
        .top-bar-guidance{font-size:15px;color:#fff;height:70%;line-height:1.8;padding-left:20px;padding-top:20px;background:url(//gw.alicdn.com/tfs/TB1eSZaNFXXXXb.XXXXXXXXXXXX-750-234.png) center top/contain no-repeat}
        .top-bar-guidance .icon-safari{width:25px;height:25px;vertical-align:middle;margin:0 .2em}
        .app-download-tip{margin:0 auto;width:290px;text-align:center;font-size:15px;color:#2466f4;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAcAQMAAACak0ePAAAABlBMVEUAAAAdYfh+GakkAAAAAXRSTlMAQObYZgAAAA5JREFUCNdjwA8acEkAAAy4AIE4hQq/AAAAAElFTkSuQmCC) left center/auto 15px repeat-x}
        .app-download-tip .guidance-desc{border:none;background-color:#fff;padding:0 5px}
        .app-download-btn{outline:none;display:block;width:214px;height:40px;line-height:40px;margin:18px auto 0 auto;text-align:center;font-size:18px;color:#2466f4;border-radius:20px;border:.5px #2466f4 solid;text-decoration:none}
    </style>
</head>
<body>
<div class="top-bar-guidance">
    <p>点击右上角<img src="user/plugins/yourls-ban-useragent/img/pg.png" class="icon-safari"> <span id="openm">浏览器打开</span></p>
    <p>可以继续浏览本站哦~</p>
</div>
<a style="display: none;" href="" id="vurl" rel="noreferrer"></a>
<div id="contens">
1.防止腾讯屏蔽本站链接<br /><br />
2.建议用QQ浏览器打开效果最佳<br /><br >
</div>

<div id="browser">
    <a href="mttbrowser://url=<?php echo $y_url; ?>"><img src="user/plugins/yourls-ban-useragent/img/qq.jpg"></img></a>
    <a href="googlechrome://browse?url=<?php echo $y_url; ?>"><img src="user/plugins/yourls-ban-useragent/img/360.jpg"></img></a>
    <a href="alipays://platformapi/startapp?appId=20000067&url=<?php echo $t_url; ?>"><img src="user/plugins/yourls-ban-useragent/img/zfb.jpg"></img></a>
    <a href="googlechrome://browse?url=<?php echo $y_url; ?>"><img src="user/plugins/yourls-ban-useragent/img/gg.jpg"></img></a>
    <a href="ucbrowser://<?php echo $y_url; ?>"><img src="user/plugins/yourls-ban-useragent/img/sh.jpg"></img></a>
    <a href="bdbrowser://<?php echo $y_url; ?>"><img src="user/plugins/yourls-ban-useragent/img/bd.jpg"></img></a>
</div>
<div class="app-download-tip">
    <span class="guidance-desc">点击上方图标or复制本站网址自行打开</span>
</div>
</script>
<input class="app-download-btn" type="text" value="<?php echo $y_url; ?>" lass="app-download-btn" readonly="readonly" id="url" onclick="copyUrl()">

<script type="text/javascript">
function copyUrl(){
var ele = document.getElementById("url");
ele.select();
document.execCommand("Copy");
alert("复制链接成功！");
}
</script>
<script>
function openu(u){
document.getElementById("vurl").href= u;
document.getElementById("vurl").click();
}
var url = window.location.href;
    if(navigator.userAgent.indexOf("QQ/")> -1){
        openu("ucbrowser://"+url);
        openu("mttbrowser://url="+url);
        openu("baiduboxapp://browse?url="+url);
        openu("googlechrome://browse?url="+url);
        openu("mibrowser:"+url);
        openu("taobao://"+url.split("://")[1]);
        openu("alipays://platformapi/startapp?appId=20000067&url="+url);
        $("html").on("click",function(){
            openu("ucbrowser://"+url);
            openu("mttbrowser://url="+url);
            openu("baiduboxapp://browse?url="+url);
            openu("googlechrome://browse?url="+url);
            openu("mibrowser:"+url);
            openu("taobao://"+url.split("://")[1]);
            openu("alipays://platformapi/startapp?appId=20000067&url="+url);
        });
    }else if(navigator.userAgent.indexOf("MicroMessenger") > -1){
        if(navigator.userAgent.indexOf("Android") > -1){
            var iframe = document.createElement("iframe");
            iframe.style.display = "none";
            document.body.appendChild(iframe);
        }else{
             
        }
    }
</script>
</html>
