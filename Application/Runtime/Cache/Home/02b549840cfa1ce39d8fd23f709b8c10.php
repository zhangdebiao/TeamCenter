<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">

    <!-- Bootstrap -->
    <link href="/TeamCenter/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/TeamCenter/Public/css/bootstrap-select.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/TeamCenter/Public/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/TeamCenter/Public/bootstrap/js/bootstrap.min.js"></script>
    <script src="/TeamCenter/Public/js/bootstrap-select.js"></script>
<style type="text/css">
button,p,h1,h2,h3,h4,h5,h6,a,td,small {
font-family:Microsoft YaHei;
}
</style>
</head>
<body>
	<!-- 头部 -->
	
<style type="text/css">
body {
  padding-top: 70px;
  padding-bottom: 20px;
}
</style>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/TeamCenter/" style="font-family:Microsoft YaHei"><?php echo C('SITE_TITLE');?></a> 
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            <!--<li id="index"><a href="/">首页</a></li>--> <!-- class="active"-->
			<li id="inform"><a href="<?php echo U('../Home/Inform');?>">公告</a></li>
    	<li id="res"><a href="<?php echo U('../Home/Res');?>">资源</a></li>
			<li id="talk"><a href="<?php echo U('../Home/Talk');?>">讨论</a></li>
			<li id="member"><a href="<?php echo U('../Home/Member');?>">成员</a></li>
      <li class="dropdown" id="project">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">项目协作 <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo U('../Home/Project');?>"><span class="glyphicon glyphicon-home"></span> 我的项目</a></li>
            <li><a href="<?php echo U('../Home/Projectlist');?>"><span class="glyphicon glyphicon-th-list"></span> 项目列表</a></li>
          </ul>
        </li>
        <li id="about"><a href="<?php echo U('../Home/About');?>">关于</a></li>
          </ul>

<?php if(is_login()): ?><ul class="nav navbar-nav navbar-right">
        			<li class="dropdown">
          			<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-bottom:0px;">
					<img src="<?php echo return_display(session('user_auth_sign'));?>" alt="display" class="img-rounded" style="width:25px;height:25px;" />
					<?php echo cookie('user_name');?> <?php if(getInboxalert()): ?><span class="badge"><?php echo getInboxalert();?></span><?php endif; ?>
          			<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo U('../Home/User/people');?>/<?php echo cookie('user_id');?>"><span class="glyphicon glyphicon-home"></span>  我的主页</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo U('../Home/Inbox');?>"><span class="glyphicon glyphicon-envelope"></span>  私信 <?php if(getInboxalert()): ?><span class="badge"><?php echo getInboxalert();?></span><?php endif; ?></a></li>
    				<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo U('../Home/User/settings');?>"><span class="glyphicon glyphicon-cog"></span>  设置</a></li>
    				<!--内容中心-->
					<!--<li role="presentation" class="divider"></li><li role="presentation"><a role="menuitem" tabindex="-1" href="/system/content"><span class="glyphicon glyphicon-hdd"></span>  内容中心</a></li>-->
					<!--/内容中心-->
					<li role="presentation" class="divider"></li>
    				<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo U('../Home/User/logout');?>"><span class="glyphicon glyphicon-off"></span>  退出登录</a></li>
  					</ul></li></ul>
<?php else: ?>
		  <form class="navbar-form navbar-right" role="form" action="/member/login.php" method="post">
            <!--<div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password" required>
            </div>
            <button type="submit " class="btn btn-success">登录</button>-->
            <a class="btn btn-success" role="button" href="<?php echo U('../Home/User/login');?>">登录</a>
            <a class="btn btn-primary" role="button" href="<?php echo U('../Home/User/register');?>">注册</a>
          </form>
          <script type="text/javascript">window.location.href="../Home/User/login";</script><?php endif; ?>

		</div><!--/.navbar-collapse -->
      </div>
    </div>

	<!-- /头部 -->
	
	<!-- 主体 -->
	
<title>收件箱 - <?php echo C('SITE_TITLE');?></title>

<script type="text/javascript">
function postmsg(){
    $.ajax({
            type:"POST",
            url:"<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];?>",
            data:{
                  type:'send',
                  toname:$("#toname").val(),
                  content:$("#comenttext").val()
                  },
            cache:false, //不缓存此页面   
            success:function(re){
        alert(re);
        location.replace(location);
            }
        });


  }
</script>

<div class="modal fade" id="wmsg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">发送私信</h4>
      </div>
      <div class="modal-body">
      <input type="text" class="form-control" id="toname" placeholder="请输入要私信的用户名 只能输一个哦( • ̀ω•́ )✧..."><hr>
<textarea name="content" onKeyDown='if (this.value.length>=500){if(event.keyCode != 8)event.returnValue=false;}' class="form-control" rows="5" id="comenttext"></textarea>
<hr>
<div class="alert alert-info">长度限500字</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" onclick="postmsg()" data-dismiss="modal">提交</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container">

<div class="col-md-8">
<div class="page-header">
  <h3>我的私信 <small><button class="btn btn-success" data-toggle="modal" data-target="#wmsg">写私信</button></small></h3>
</div>
<?php if(is_array($inbox_index)): $i = 0; $__LIST__ = $inbox_index;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p><?php if(($vo['from'] == 1)): if(($vo['uid1'] == cookie('user_id'))): ?>我发送给<a href="/TeamCenter/Home/User/people/<?php echo ($vo["uid2"]); ?>"><?php echo getUsername($vo['uid2']);?></a>
  <?php else: ?>
  <a href="/TeamCenter/Home/User/people/<?php echo ($vo["uid1"]); ?>"><?php echo getUsername($vo['uid1']);?></a><?php endif; ?>

  <?php else: ?>

  <?php if(($vo['uid1'] == cookie('user_id'))): ?><a href="/TeamCenter/Home/User/people/<?php echo ($vo["uid2"]); ?>"><?php echo getUsername($vo['uid2']);?></a>
  <?php else: ?>
  我发送给<a href="/TeamCenter/Home/User/people/<?php echo ($vo["uid1"]); ?>"><?php echo getUsername($vo['uid1']);?></a><?php endif; endif; ?>
  ：<?php echo ParseMdLine(getInboxcontent($vo['inbox_id']));?>...</p>
  <p><span><?php echo ($vo['time']); ?></span><span style="float:right"><a href="/TeamCenter/Home/Inboxpage/<?php echo ($vo['uid1'] == cookie('user_id')?$vo['uid2']:$vo['uid1']); ?>" target="_BLANK">共<?php echo ($vo['numb']); ?>条对话</a></span></p>
  <hr><?php endforeach; endif; else: echo "" ;endif; ?>


</div><!--col-md-8-->

<div class="col-md-4" id="space_height">

</div>

</div><!--container-->


	<!-- /主体 -->

	<!-- 底部 -->
	<div class="container">
<hr>
<footer>
&copy; Company 2018 All rights reserved - Design By <a href="http://sqlmap.run/">lalala</a>
<div class="navbar-right">
<a href="mailto:843345000@qq.com">联系我们</a>
<!-- · 
<a>帮助中心</a>
</div>-->
<br />
</footer>
</div>

<script type="text/javascript">
  document.getElementById("space_height").style.cssText="height:"+(document.body.scrollHeight-160)+"px";
</script>
	<!-- /底部 -->
</body>
</html>