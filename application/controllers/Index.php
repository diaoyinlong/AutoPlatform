<?php

class IndexController extends Yaf\Controller_Abstract
{
    public function indexAction()
    {
        echo phpinfo();
    }

    public function testAction()
    {
//        $data = $this->_request->getPost('data');
//        echo $data;
//        $conn = oci_connect('lift_c', 'homelink', '10.12.9.50:1521/lftong');
//        if (!$conn) {
//            $e = oci_error();
//            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
//        } else {
//            $stmt = oci_parse($conn, "select * from lift_c.t_core_account");
//            oci_execute($stmt);
//            $result=oci_fetch_assoc($stmt);
//            print_r($result);
//        }

//        $db = new Oracle('dev');
//        $data = $db->query("select * from lift_c.t_core_account where rownum<=10");
//        print_r($data);
        var_dump(Yaf\Registry::get('config')->toArray());

        exit;
    }
}