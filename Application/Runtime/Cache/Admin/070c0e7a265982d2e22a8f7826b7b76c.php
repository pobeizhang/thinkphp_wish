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
	    <link rel="shortcut icon" href="/ThinkPHP3.2.3_wish/Public/Admin/Flat/img/favicon.ico">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		<table class="table table-hover" border="1">
			<tr class="active">
			  <th style="text-align: center;vertical-align: middle;">ID</th>
			  <th style="text-align: center;vertical-align: middle;">角色名称</th>
			  <th style="text-align: center;vertical-align: middle;">角色描述</th>
			  <th style="text-align: center;vertical-align: middle;">开启状态</th>
			  <th style="text-align: center;vertical-align: middle;">操作</th>
			</tr>
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				<td style="text-align: center;vertical-align: middle;"><?php echo ($v['id']); ?></td>
				<td style="text-align: center;vertical-align: middle;"><?php echo ($v['name']); ?></td>
				<td style="text-align: center;vertical-align: middle;"><?php echo ($v['remark']); ?></td>
				<td style="text-align: center;vertical-align: middle;"><?php if($v['status']==1): ?>开启<?php else: ?>关闭<?php endif; ?></td>
				<td style="text-align: center;vertical-align: middle;">
					<a href="<?php echo U('Admin/Rbac/access',array('rid'=>$v['id']));?>" class="btn btn-sm btn-danger">配置权限</a>
				</td>
			</tr><?php endforeach; endif; ?>
		</table>
	</body>
</html>