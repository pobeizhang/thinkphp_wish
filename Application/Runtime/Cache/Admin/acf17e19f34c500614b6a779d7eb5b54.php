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
			  <th style="text-align: center;vertical-align: middle;">用户名称</th>
			  <th style="text-align: center;vertical-align: middle;">锁定状态</th>
			  <th style="text-align: center;vertical-align: middle;">上一次登录时间</th>
			  <th style="text-align: center;vertical-align: middle;">上一次登录ip</th>
			  <th style="text-align: center;vertical-align: middle;">用户所属组别</th>
			  <th style="text-align: center;vertical-align: middle;">操作</th>
			</tr>
			<?php if(is_array($users)): foreach($users as $key=>$v): ?><tr>
					<td style="text-align: center;vertical-align: middle;"><?php echo ($v['id']); ?></td>
					<td style="text-align: center;vertical-align: middle;"><?php echo ($v['username']); ?></td>
					<td style="text-align: center;vertical-align: middle;"><?php if($v["locked"]): ?>锁定<?php endif; ?></td>
					<td style="text-align: center;vertical-align: middle;"><?php echo (date('Y-m-d H:i:s',$v['logintime'])); ?></td>
					<td style="text-align: center;vertical-align: middle;"><?php echo ($v['loginip']); ?></td>
					<td style="text-align: center;vertical-align: middle;">
						<ul style="list-style: none;">
							<?php if($v["username"] == C("RBAC_SUPERADMIN")): ?>超级管理员
							<?php else: ?>
								<?php if(is_array($v["role"])): foreach($v["role"] as $key=>$vv): ?><li>
										<?php echo ($vv['name']); ?>(<?php echo ($vv['remark']); ?>)
									</li><?php endforeach; endif; endif; ?>
						</ul>
					</td>
					<td style="text-align: center;vertical-align: middle;">
						<?php if($v["locked"]==0): ?><a href="<?php echo U('Admin/Rbac/lockUser',array('id'=>$v['id']));?>"><?php if($v["username"]!=admin): ?>锁定<?php endif; ?></a>
						<?php else: ?>
							<a href="<?php echo U('Admin/Rbac/UnLockUser',array('id'=>$v['id']));?>"><?php if($v["username"]!=admin): ?>解除锁定<?php endif; ?></a><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; ?>
		</table>
	</body>
</html>