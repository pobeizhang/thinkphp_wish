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
	    <link href="/ThinkPHP3.2.3_wish/Public/Admin/Flat/dist/css/node.css" rel="stylesheet">
	    <script src="/ThinkPHP3.2.3_wish/Public/Admin/Flat/dist/js/jquery-1.7.2.min.js"></script>
	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	    <!--[if lt IE 9]>
	      <script src="dist/js/vendor/html5shiv.js"></script>
	      <script src="dist/js/vendor/respond.min.js"></script>
	    <![endif]-->
	    <script type='text/javascript'>
	    	$(function(){
	    		$('input[level=1]').click(function(){
	    			var inputs=$(this).parents('.app').find('input');
	    			$(this).attr('checked') ? inputs.attr('checked','checked') : inputs.removeAttr('checked');
	    		});

	    		$('input[level=2]').click(function(){
	    			var inputs=$(this).parents('dl').find('input');
	    			$(this).attr('checked') ? inputs.attr('checked','checked') : inputs.removeAttr('checked');
	    		});
	    	});
	    </script>
	</head>
	<body>
		<form action="<?php echo U('Admin/Rbac/setAccess');?>" method="post">
			<div id='wrap'>
				<a href="<?php echo U('Admin/Rbac/role');?>" class="add-app">返回</a>
				<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
						<p>
							<strong><?php echo ($app['title']); ?></strong>
							<input type="checkbox" name="access[]" value="<?php echo ($app['id']); ?>_1" level='1' <?php if($app["access"]): ?>checked<?php endif; ?>>
						</p>
						<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
								<dt>
									<strong><?php echo ($action['title']); ?></strong>
									<input type="checkbox" name="access[]" value="<?php echo ($action['id']); ?>_2" level='2'  <?php if($action["access"]): ?>checked<?php endif; ?>>
								</dt>
								<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
										<strong><?php echo ($method['title']); ?></strong>
										<input type="checkbox" name="access[]" value="<?php echo ($method['id']); ?>_3" level='3'  <?php if($method["access"]): ?>checked<?php endif; ?>>
									</dd><?php endforeach; endif; ?>
							</dl><?php endforeach; endif; ?>
					</div><?php endforeach; endif; ?>
			</div>
			<input type="hidden" name="rid" value="<?php echo ($rid); ?>">
			<input type="submit" value="保存修改" style="display: block;margin: 20px auto;">
		</form>
	</body>
</html>