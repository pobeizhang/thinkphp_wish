<?php 
	
	/**
	 * 重组节点信息为多维数组
	 * @param  [type]  $node [要处理的节点数组]
	 * @param  integer $pid  [父级id]
	 * @return [type]        [description]
	 */
	function node_merge($node,$access,$pid=0)
	{
		$arr=array();
		foreach ($node as $v) {
			if (is_array($access)) {
				$v['access']=in_array($v['id'], $access)?1:0;
			}
			if($v['pid']==$pid){
				$v['child']=node_merge($node,$access,$v['id']);
				$arr[]=$v;
			}
		}
		return $arr;
	}
 ?>