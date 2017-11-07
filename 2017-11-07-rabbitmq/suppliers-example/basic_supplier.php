<?php

$supplierData = [];

$i = 0;
while ($i < 1000) {
	$id = uniqid('supplierData');
	$supplierData[$id] = $i;
	$i++;
}

if (!empty($supplierData)) {
	foreach ($supplierData as $id => $data) {
		usleep(500000);
		echo "Processing data ID {$id} data {$data}" . PHP_EOL;
	}
}
