<?php
	/**
	 * 自定义打印函数
	 */
	function p($arr)
	{
		dump($arr,1,'<pre>',0);
	}

	/**
	 * 自定义表情替换函数
	 */
	function phiz_replace($content)
	{
		preg_match_all('/\[.*?\]/is', $content, $match);
		//如果$match[0]为真，说明发布的内容中有表情的存在
		if($match[0]){
			//去除data/phiz.php中的表情数组
			$phiz=F('phiz','','./data/');
			foreach ($match[0] as $v) {
				foreach($phiz as $key=>$value){
					if($v=='['.$value.']'){
						$content=str_replace($v, "<img src='".__ROOT__."/Public/Home/Images/phiz/".$key.".gif' />",$content);
						break;
					}
				}
			}
		}
		return $content;
	}