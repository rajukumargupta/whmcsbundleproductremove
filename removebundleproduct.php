<?php
if ($_GET['a'] == 'remove') {
    $bundleproduct = $_SESSION['cart']['products'][$_GET['i']]['bnum'];
    foreach ($_SESSION['cart']['products'] as $key => $products) {
        if ($bundleproduct == $products['bnum']) {
            unset($_SESSION['cart']['products'][$key]);
        }
    }
}
?>
