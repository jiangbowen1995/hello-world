<?php
namespace Common\Model;
use Common\Model\CommonModel;
class WorkerModel extends CommonModel{
	
	protected $_validate = array(
		//array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
		array('business_id', 'require', '请选择商户！', 1, 'regex', 3),
		array('xingming', 'require', '请填写姓名！', 1, 'regex', 3),
		array('shenfenzheng', 'require', '请身份证号码！', 1, 'regex', 3),
        array('xingming,shenfenzheng', 'checkHome', '同样的记录已经存在！', 1, 'callback', CommonModel:: MODEL_INSERT   ),
    	array('id,xingming,shenfenzheng', 'checkHomeUpdate', '同样的记录已经存在！', 1, 'callback', CommonModel:: MODEL_UPDATE   )
	);

    public function checkHome($data) {
        $find = $this->where($data)->find();
        if ($find) {
            return false;
        }
        return true;
    }

    public function checkHomeUpdate($data) {
    	$id=$data['id'];
    	unset($data['id']);
    	$find = $this->field('id')->where($data)->find();
    	if (isset($find['id']) && $find['id']!=$id) {
    		return false;
    	}
    	return true;
    }
	
	protected function _before_write(&$data) {
		parent::_before_write($data);
		
		if(!$data['xingman']){$data['xingman'] = 0;}
		if(!$data['xianyi']){$data['xianyi'] = 0;}
		if(!$data['xidu']){$data['xidu'] = 0;}
		if(!$data['gaowei']){$data['gaowei'] = 0;}
		if(!$data['falungong']){$data['falungong'] = 0;}
		if(!$data['shijishen']){$data['shijishen'] = 0;}
		if(!$data['mentuhui']){$data['mentuhui'] = 0;}
		if(!$data['sanbanpurenpai']){$data['sanbanpurenpai'] = 0;}
		if(!$data['jingwai']){$data['jingwai'] = 0;}
		if(!$data['guanggua']){$data['guanggua'] = 0;}
	}
	
}

