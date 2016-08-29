<?php

include(dirname(__FILE__).'/config/config.inc.php');
include(dirname(__FILE__).'/init.php');

$codes = array(
	'1Ieabz',
	'qDrsk6',
	'pzedcx',
	'WnuG2o',
	'SuRXF2',
	'hS8GM5'
);


foreach ($codes as $code) {
	
	if(CartRule::cartRuleExists($code)) {
		echo 'Code ' . $code .' already exists! Skipping... <br>';
		continue;
	}

	$cartRuleObj = new CartRule();
	$cartRuleObj->date_from = date('Y-m-d H:i:s');
	$cartRuleObj->date_to = '2046-12-12 00:00:00';
	$cartRuleObj->name[Configuration::get('PS_LANG_DEFAULT')] = 'Discount Code';
	$cartRuleObj->quantity = 1;
  $cartRuleObj->code = $code;
  $cartRuleObj->quantity_per_user = 1;
  $cartRuleObj->reduction_percent = 20;
  $cartRuleObj->reduction_amount = 0;
  $cartRuleObj->free_shipping = 0;
  $cartRuleObj->active = 1;
  $cartRuleObj->minimum_amount = 0;
  $cartRuleObj->add();

    echo 'Done ' . $code .' <br>';
}

die('All done');
