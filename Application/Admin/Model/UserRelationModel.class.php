<?php namespace Admin\Model;
use Think\Model\RelationModel;

	class UserRelationModel extends RelationModel
	{
		protected $tableName='User';
		protected $_link=array(
			'role'=>array(
				'mapping_type'=>self::MANY_TO_MANY,
				'foreign_key'=>'user_id',
				'relation_foreign_key'=>'role_id',
				'relation_table'=>'dl_role_user',
				'mapping_fields'=>'id,name,remark'
				)
			);
	}
 ?>