<?php
require "connect.php";

$data=$_POST;
$payment_id = $data['payment_id'];
$payment_request_id = $data['payment_request_id'];



$stmt = $pdo->prepare('INSERT INTO webhook
			(imojo_id, payment_id, status) VALUES ( :mk, :yr, :mi)');
		$stmt->execute(array(
			':mk' => $_POST['imojo_id'],
			':yr' => $_POST['payment_id'],
			':mi' => $_POST['status'])
		);
?>