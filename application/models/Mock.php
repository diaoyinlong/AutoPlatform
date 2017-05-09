<?php

class MockModel
{
    public function updateTransitAmount($env, $account, $payment)
    {
        $db = new Oracle($env, 'core');
        $fieldArr = ['acc.aif_balance_amount' => "acc.aif_balance_amount+$payment", 'acc.aif_onpassage_amount' => "acc.aif_onpassage_amount-$payment"];
        $condition = "acc.aif_name = hldba.f_string_encrypt('$account')";
        $table = 'lift_c.t_core_account acc';
        return $db->update($fieldArr, $condition, $table);
    }
}