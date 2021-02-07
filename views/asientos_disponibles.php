<?php
/**
 * Created by PhpStorm.
 * User: edythawne
 * Date: 29/05/18
 * Time: 11:35 AM
 */

// Importación de archivos php
require_once "../models/BusModel.php";

// Creacion de objeto
$bus = new BusModel();
$array = $bus->getSeats();
$html = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $html .= "<select class='browser-default' id='inp_number' name='inp_number' required>
             <option value='' disabled selected>Seleccione Asiento</option>";

    for ($i = 1; $i <= 40; $i++) {
        if (is_null(@$array[$i])){
            $html .= "<option value='$i'>$i</option>";
        } else {
            $json = json_decode($array[$i]);
            if ($json->numero != $i) {
                $html .= "<option value='$i'>$i</option>";
            }
        }
    }

    $html .= "</select>
        <script>
            $(document).ready(function(){
                $('select').formSelect();
            });
        </script>";

    echo $html;

    exit();

}

?>