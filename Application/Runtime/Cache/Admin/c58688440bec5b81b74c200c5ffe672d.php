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
		<table class="table table-hover">
			<tr class="active">
			  <th style="text-align: center;">ID</th>
			  <th style="text-align: center;">发布者</th>
			  <th style="text-align: center;">内容</th>
			  <th style="text-align: center;">发布时间</th>
			  <th style="text-align: center;">操作</th>
			</tr>
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				<td style="text-align: center;"><?php echo ($v['id']); ?></td>
				<td style="text-align: center;"><?php echo ($v['username']); ?></td>
				<td style="text-align: center;"><?php echo (phiz_replace($v['content'] )); ?></td>
				<td style="text-align: center;"><?php echo (date("Y-m-d H:i:s",$v['time'] )); ?></td>
				<td style="text-align: center;">
					<a href="<?php echo U('Admin/Msgmanager/delete',array('id'=>$v['id']));?>" class="btn btn-sm btn-danger">删除</a>
				</td>
			</tr><?php endforeach; endif; ?>
			<style>
				.pages a,.pages span {
				    display:inline-block;
				    padding:2px 5px;
				    margin:0 1px;
				    border:1px solid #f0f0f0;
				    -webkit-border-radius:3px;
				    -moz-border-radius:3px;
				    border-radius:3px;
				}
				.pages a,.pages li {
				    display:inline-block;
				    list-style: none;
				    text-decoration:none; color:#58A0D3;
				}
				.pages a.first,.pages a.prev,.pages a.next,.pages a.end{
				    margin:0;
				}
				.pages a:hover{
				    border-color:#50A8E6;
				}
				.pages span.current{
				    background:#50A8E6;
				    color:#FFF;
				    font-weight:700;
				    border-color:#50A8E6;
				}
			</style>
			<tr>
				<td colspan="5" align="center">
				<div class="pages">
					<?php echo ($page); ?>
				</div>
				</td>
			</tr>

		</table>
	</body>
</html>