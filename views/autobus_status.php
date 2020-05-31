<?php
/**
 * Created by PhpStorm.
 * User: edythawne
 * Date: 31/05/18
 * Time: 04:44 PM
 */

require_once "../models/BusModel.php";

$bus = new BusModel();

$seatsTotal = 40;
$seatUsed = $bus->countSeatsUsed();
$seatsAvailable = $seatsTotal - $seatUsed;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<a href='#!' class='collection-item'>Asiento Usados : $seatUsed</a>
            <a href='#!' class='collection-item'>Asiento Disponibles : $seatsAvailable</a>";
}

exit();

?>