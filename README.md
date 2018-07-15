# whmcsbundleproductremove
when a customer order a bundle product remove a product from cart . This hook will remove other product as well


Create a hook file inside whmcs hook folder. i.e whmcsrootfolder/includes/hooks/removebundlercart.php and put this code to file. 

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
