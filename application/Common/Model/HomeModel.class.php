<?php
namespace Common\Model;
use Common\Model\CommonModel;
class HomeModel extends CommonModel {

    protected $_validate = array(
        array('building_id,unit,floor,num', 'checkHome', '同样的记录已经存在！', 1, 'callback', CommonModel:: MODEL_INSERT   ),
    	array('id,building_id,unit,floor,num', 'checkHomeUpdate', '同样的记录已经存在！', 1, 'callback', CommonModel:: MODEL_UPDATE   ),
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
		
	}
}