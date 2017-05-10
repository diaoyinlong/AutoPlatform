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

        $model = new ManageApiModel();

        $condition = '';
        if ($id == '' && $project == '') {
            $condition = '';
        } else {
            $condition .= $id != '' ? " AND id=$id" : '';
            $condition .= $project != '' ? " AND project='$project'" : '';
        }

        $result = $model->queryApiInfo($condition);
        echo json_encode($result);
        exit;
    }
}