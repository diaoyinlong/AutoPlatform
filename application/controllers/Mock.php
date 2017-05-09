<?php

class MockController extends Yaf\Controller_Abstract
{
    public function linkQCAction()
    {
        date_default_timezone_set('Asia/Chongqing');
        $time = date('Y-m-j G:i:s');
        $this->_view->assign('time', $time);
    }
}