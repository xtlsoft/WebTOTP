<?php
    if(!defined("IN_TOTP")) die("Access denied.");
?>
<!Doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>TOTP工具 - Powered by SZCK</title>
        <!--Load ZUI-->
        <link href="//api.xtlsoft.top/frontend/zui/css/zui.min.css" rel="stylesheet" />
        <script src="//api.xtlsoft.top/frontend/zui/lib/jquery/jquery.js"></script>
        <script src="//api.xtlsoft.top/frontend/zui/js/zui.min.js"></script>
        <!--End-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
            <!-- 导航头部 -->
            <div class="navbar-header">
                <!-- 品牌名称或logo -->
                <a class="navbar-brand" href="./">TOTP Tool</a>
            </div>
            <!-- 导航项目 -->
            <div class="collapse navbar-collapse navbar-collapse-example">
                <!-- 一般导航项目 -->
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="./?initkey=<?=$_GET['initkey']?>">刷新</a></li>
                        <?php if($action!='login'){ ?><li><a href="./">更换key</a></li><?php } ?>
                        <li><a href="mailto:xtl@xtlsoft.top">联系作者</a></li>
                    </ul>
            </div><!-- END .navbar-collapse -->
            </div>
        </nav>
        <?php
            if($action=="login"){
        ?>
        
        <div class="panel" style="width:500px;margin:10px auto;">
            <div class="panel-heading">
                <center><b>登录</b></center>
            </div>
            <div class="panel-body">
                <form method="get">
                    <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">输入密钥</span>
                                <input type="text" name="initkey" class="form-control" id="pwdInput" />
                            </div>
                    </div>
                    <center><button type="submit" class="btn btn-primary">提交</button></center>
                </form>
            </div>
            <div class="panel-footer">
                <center>Powered by SZCK</center>
            </div>
        </div>

        <?php
            }elseif($action=="index"){
        ?>
            <div class="panel panel-success" style="margin:10px">
                <div class="panel-heading">
                    <b>登陆成功！</b>
                </div>
                <div class="panel-body">
                    尽情使用吧！XTL制作！15秒自动刷新！
                </div>
            </div>
            </div>
        <div class="panel panel-primary" style="margin:10px">
            <div class="panel-heading">
                <b>管理</b>
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>密钥</th>
                        <th>一次性密码</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $_GET['initkey'] ?></td>
                        <td><?php echo Google2FA::oath_hotp(Google2FA::base32_decode($_GET['initkey']), Google2FA::get_timestamp()) ?></td>
                    </tr>
                </tbody>
            </table>
        <?php
            }
        ?>
        
    </body>
</html>