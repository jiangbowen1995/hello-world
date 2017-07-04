<?php
namespace Admin\Model;
use Common\Model\CommonModel;
class AttModel extends CommonModel {
	 protected $_validate = array(
	 		// 在新增的时候验证name字段是否唯一
	 		array('att','','字段值已存在',0,'unique',1), 
	 		array('attname','','特征名称已存在',0,'unique',1), 
	 	);

	
}