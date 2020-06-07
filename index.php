<?php

function db_conn() {
    try{
        $pdo = new PDO('mysql:dbname=test_table;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
        exit('DbConnectError:'.$e->getMessage());
    }
    return $pdo;
}

$pdo = db_conn();
$stmt = $pdo->prepare("INSERT INTO test_table(id,value1,value2,value3) VALUES(null,:value1,:value2,:value3)");
$array = [];

for($i = 0;$i < 100;$i++) {

    $aa = "aa".$i;
    $bb = "bb".$i;
    $cc = "cc".$i;

    $ar = [$aa,$bb,$cc];
    array_push($array,$ar);

}

var_dump($array);


foreach($array as $value) {
    $aa = $value[0];
    $bb = $value[1];
    $cc = $value[2];

    $stmt->bindValue(":value1", $aa, PDO::PARAM_STR);
    $stmt->bindValue(":value2", $bb, PDO::PARAM_STR);
    $stmt->bindValue(":value3", $cc, PDO::PARAM_STR);

    $status = $stmt->execute();

    if($status==false){
        $error = $stmt->errorInfo();
        exit("SQLError:".$error[2]);
    }else{
    }
}

for($i = 0;$i < 100;$i++) {

    $aa = "aa".$i;
    $bb = "bb".$i;
    $cc = "cc".$i;

    $stmt->bindValue(":value1", $aa, PDO::PARAM_STR);
    $stmt->bindValue(":value2", $bb, PDO::PARAM_STR);
    $stmt->bindValue(":value3", $cc, PDO::PARAM_STR);

    $status = $stmt->execute();

    if($status==false){
        $error = $stmt->errorInfo();
        exit("SQLError:".$error[2]);
    }else{
    }
    
}



//var_dump($array);
?>