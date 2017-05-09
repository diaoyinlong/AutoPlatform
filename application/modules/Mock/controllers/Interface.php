<?php

class InterfaceController extends Yaf\Controller_Abstract
{
    public function getSignAction()
    {
        $data = $this->_request->getPost('data');
        echo Tool::getSign($data);
        exit;
    }

    public function updateTransitAmountAction()
    {
        $account = $this->_request->getPost('account');
        $env = $this->_request->getPost('env');
        $payment = $this->_request->getPost('payment');

        $mockModel = new MockModel();
        if ($mockModel->updateTransitAmount($env, $account, $payment)) {
            echo 'success';
        } else {
            echo 'failed';
        }
        exit;
    }

    public function blockAction()
    {
        $data1 = $this->_request->getPost('jsonStr');
        $data2 = $this->_request->getPost('json');
        if ($data1 || $data2) {
            echo 'SUCCESS';
        } else {
            echo 'FAILED';
        }
    }
}