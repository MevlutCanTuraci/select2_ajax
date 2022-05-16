<?php

include 'config.php';

if (!isset($_POST["q"])) {
    $fetchData = $conn->query("select * from brands order by brandName limit 5")->fetchAll(PDO::FETCH_ASSOC);
}
else {
    $search = $_POST["q"];
    $fetchData = $conn->query("select * from brands where brandName like '%" . $search . "%' limit 5")->fetchAll(PDO::FETCH_ASSOC);
}

$data = array();

foreach ($fetchData as $key) {
    $data[] = array("id" => $key['id'], "text" => $key['brandName']);
}

echo json_encode($data);

