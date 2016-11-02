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
	    <link href="/ThinkPHP3.2.3_wish/Public/Admin/Flat/dist/css/node.css" rel="stylesheet">
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		<div id='wrap'>
			<a href="<?php echo U('Admin/Rbac/addNode');?>" class="add-app">添加应用</a>

			<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
				<p>
					<strong><?php echo ($app['title']); ?></strong>
					[<a href="<?php echo U('Admin/Rbac/addNode',array('pid'=>$app['id'],level=>2));?>">添加控制器</a>]
					[<a href="">修改</a>]
					[<a href="">删除</a>]
				</p>
				<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
						<dt>
							<strong><?php echo ($action['title']); ?></strong>
							[<a href="<?php echo U('Admin/Rbac/addNode',array('pid'=>$action['id'],level=>3));?>">添加方法</a>]
							[<a href="">修改</a>]
							[<a href="">删除</a>]
						</dt>
						<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
								<strong><?php echo ($method['title']); ?></strong>
								[<a href="">修改</a>]
								[<a href="">删除</a>]
							</dd><?php endforeach; endif; ?>
					</dl><?php endforeach; endif; ?>
			</div><?php endforeach; endif; ?>
		</div>
	</body>
</html>