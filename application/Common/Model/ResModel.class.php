<?php
namespace Common\Model;
use Common\Model\CommonModel;
class ResModel extends CommonModel{
	
	protected $_validate = array(
		//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
		array('name', 'require', '请填写类别姓名！', 1, 'regex', 3),
		//array('cate_id', 'require', '请选择类别！', 1, 'regex', 3),
        array('name', 'checkRes', '同样的记录已经存在！', 1, 'callback', CommonModel:: MODEL_INSERT   ),
    	array('id,,name', 'checkResUpdate', '同样的记录已经存在！', 1, 'callback', CommonModel:: MODEL_UPDATE   )
	);

    public function checkRes($data) {
        $find = $this->where($data)->find();
        if ($find) {
            return false;
        }
        return true;
    }

    public function checkResUpdate($data) {
    	$id=$data['id'];
    	unset($data['id']);
    	$find = $this->field('id')->where($data)->find();
    	if (isset($find['id']) && $find['id']!=$id) {
    		return false;
    	}
    	return true;
    }
}

