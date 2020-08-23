<?php
/**
 * Created by PhpStorm.
 * User: edythawne
 * Date: 28/05/18
 * Time: 02:41 PM
 */

// Importación de archivos php
require_once "../models/BusModel.php";

// Creacion de objetos
$bus = new BusModel();
$array = $bus->getSeats();

$num_lugar = 0;
$html = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // The request is using the POST method
    $html .= "<table class='centered'> <thead></thead> <thbody> <tr> <td class='black'><img src='public/assets/aso.png'></td>  <td colspan='4'></td>  </tr>";

    for ($i = 0; $i < 10; $i++) {
        $html .= '<tr>';

        for ($j = 0; $j < 4; $j++) {
            $num_lugar = $num_lugar + 1;

            if (is_null($array[$num_lugar])) {
                $html .= "<td class='teal green darken-4 white-text'>$num_lugar<br><img src='public/assets/asv.png'></td>";
            } else {
                $json = json_decode($array[$num_lugar]);

                if ($json->numero == $num_lugar) {
                    $html .= "<td class='black white-text'><a class='modal-trigger' href='#_info' onclick='infoAsiento($num_lugar)'>$num_lugar</a><br><img src='public/assets/aso.png'></td>";
                }
            }

            if ($j == 1) {
                $html .= "<td> </td>";
            }
        }
        $html .= "</tr>";
    }


    $html .= "</thbody></table>";

    echo $html;
    exit();
}

?>