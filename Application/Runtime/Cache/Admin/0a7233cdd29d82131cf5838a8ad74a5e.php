<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="/ThinkPHP3.2.3_wish/Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="/ThinkPHP3.2.3_wish/Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link href="/ThinkPHP3.2.3_wish/Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
	    <link rel="shortcut icon" href="/ThinkPHP3.2.3_wish/Public/Admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		<div class="alert alert-success">添加角色</div>
		<form action="<?php echo U('Admin/Rbac/addRoleHandle');?>" method="post">
			<div class="form-group">
				<label for="exampleInputEmail1">角色名称</label>
				<input id="exampleInputEmail1" class="form-control" type="text"  required name="name">
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">角色描述</label>
				<input id="exampleInputEmail1" class="form-control" type="text" required name="remark">
			</div>
			
			<div class="form-group">
				<label for="exampleInputEmail1">是否开启:</label>
				<input id="exampleInputEmail1" type="radio" checked name="status" value="1">开启
				<input id="exampleInputEmail1" type="radio" name="status" value="0">关闭
			</div>
			<button class="btn btn-primary btn-block" type="submit"> 保存添加 </button>
		</form>
	</body>
</html>