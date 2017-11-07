<?php

$supplierData = [];
$i = 0;
while ($i < 1000) {
	$id = uniqid('basicSupplier');
	$supplierData[$id] = $i;
	$i++;
}

if (!empty($supplierData)) {
	foreach ($supplierData as $dataId => $data) {
		usleep(500000);
		echo "Processing data ID: {$dataId}, data: {$data}" . PHP_EOL;
	}
}
