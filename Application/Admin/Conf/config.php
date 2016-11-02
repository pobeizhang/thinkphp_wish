<?php
return array(
	'RBAC_SUPERADMIN'			=>'admin',			//超级管理员账户名称
	'ADMIN_AUTH_KEY'			=>'superadmin',		//超级管理员识别
	'USER_AUTH_ON'				=>true, 			//是否开启验证
	'USER_AUTH_TYPE'			=>1,				//验证类型(1：登录验证，2：时时验证)	
	'USER_AUTH_KEY'				=>'user_id',			//用户认证识别号
	'NOT_AUTH_MODULE'			=>'',				//无需认证的控制器
	'NOT_AUTH_ACTION'			=>'',				//无需认证的动作方法
	'RBAC_ROLE_TABLE'			=>'dl_role',		//角色表名称
	'RBAC_USER_TABLE'			=>'dl_role_user',	//角色与用户的中间表名称
	'RBAC_ACCESS_TABLE'			=>'dl_access',		//权限表名称
	'RBAC_NODE_TABLE'			=>'dl_node',		//节点表名称
    //去电伪静态后缀名
    'URL_HTML_SUFFIX'		=>	''
);