<?php
/*
* This file will terminate bundle products  if customer product terminate from bundle order. 
*/

use WHMCS\Database\Capsule;

add_hook('AfterModuleTerminate', 1, function($vars) { //$vars['params']['service']
    $data = Capsule::table('tblhosting')->where('id', $vars['params']['service'])->first();
    if ($data) {
        $orderdata = Capsule::table('tblorders')->where('id', $data->orderid)->first();
        $orderd = unserialize($orderdata->orderdata);
        if (!empty($orderd['bundleids'])) {
            foreach ($orderd['bundleids'] as $bundle) {
                $bundledata = Capsule::table('tblbundles')->where('id', $bundle)->first();
                $bdata = unserialize($bundledata->itemdata);
                foreach ($bdatFa as $bd) {
                    if ($bd['pid'] != $vars['params']['pid']) {
                        $servicedata = Capsule::table('tblhosting')->where('packageid', $bd['pid'])->where('orderid', $data->orderid)->first();
                        $command = 'ModuleTerminate';
                        $postData = array(
                            'accountid' => $servicedata->id,
                        );
                        $adminUsername = ''; // Optional for WHMCS 7.2 and later
                        $results = localAPI($command, $postData, $adminUsername);
                        //print_r($results);
                    }
                }
            }
        }
    }
});
