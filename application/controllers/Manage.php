<?php

class ManageController extends Yaf\Controller_Abstract
{


    public function apiHomeAction()
    {
        $model = new ManageApiModel();
        $result = $model->queryApiInfo();
        $this->_view->assign('result', $result);
    }

    public function queryApiInfoAction()
    {
        $id = $this->_request->getPost('id');
        $project = $this->_request->getPost('project');
        $path = $this->_request->getPost('path');

        $model = new ManageApiModel();

        $condition = '';
        $condition .= $id != '' ? " AND id=$id" : '';
        $condition .= $project != '' ? " AND project='$project'" : '';
        $condition .= $path != '' ? " AND path='$path'" : '';


        $result = $model->queryApiInfo($condition);
        echo json_encode($result);
        exit;
    }

    public function addApiInfoAction()
    {
        $data = $this->_request->getPost('data');
        $model = new ManageApiModel();
        if ($model->addApiInfo($data)) {
            echo 'SUCCESS';
        } else {
            echo 'FAILED';
        }
        exit;
    }

    public function updateApiInfoAction()
    {
        exit;
    }

    public function deleteApiInfoAction()
    {
        $id = $this->_request->getPost('id');
        $model = new ManageApiModel();
        echo $model->deleteApiInfoById($id);
        exit;
    }
}