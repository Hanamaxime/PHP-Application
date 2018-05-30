<?php
require_once './views/yuriy/parking/config.php';
require_once './models/PDO_DB.php';

$token  = $_POST['stripeToken'];
$email  = $_POST['stripeEmail'];
$amount = $_POST['type'];

$customer = \Stripe\Customer::create(array(
    'email' => $email,
    'source'  => $token
));

$charge = \Stripe\Charge::create(array(
    'customer' => $customer->id,
    'amount'   => $amount,
    'currency' => 'cad',
    "metadata" => array("date_of_visit" => $_POST['date'],
                        "plate" => $_POST['plate'])
));

if($amount == 500){
    $vehicle = 'Bicycle';
    $amnt = 5;
} else if ($amount == 1000){
    $vehicle = 'Motorcycle';
    $amnt = 10;
} else if ($amount == 2000){
    $vehicle = 'Car';
    $amnt = 20;
} else if ($amount == 3000){
    $vehicle = 'SUV';
    $amnt = 30;
} else if ($amount == 5000){
    $vehicle = 'BUS/RV';
    $amnt = 50;
}

$db = array(
    'id' => $charge->id,
    'licence_plate' => $_POST['plate'],
    'date_of_visit' => $_POST['date'],
    'vehicle_type' => $vehicle,
    'email' => $email,
    'charged' => $amnt
);

        $conn = PDO_DB::connectDB();
        $conn->query("SET NAMES utf8");
        $cmd = $conn->prepare("INSERT INTO parking2 (id, licence_plate, date_of_visit, vehicle_type, email, charged)
                VALUES (:id, :licence_plate, :date_of_visit, :vehicle_type, :email, :charged)");
        $cmd->bindValue(':id', $db['id'], PDO::PARAM_STR);
        $cmd->bindValue(':licence_plate', $db['licence_plate'], PDO::PARAM_STR);
        $cmd->bindValue(':date_of_visit', $db['date_of_visit'], PDO::PARAM_STR);
        $cmd->bindValue(':vehicle_type', $db['vehicle_type'], PDO::PARAM_STR);
        $cmd->bindValue(':email', $db['email'], PDO::PARAM_STR);
        $cmd->bindValue(':charged', $db['charged'], PDO::PARAM_INT);
        $cmd->execute();



echo '<h1>Successfully charged!</h1>';
?>