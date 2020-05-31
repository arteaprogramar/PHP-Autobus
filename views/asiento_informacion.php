<?php
/**
 * Created by PhpStorm.
 * User: edythawne
 * Date: 31/05/18
 * Time: 11:34 AM
 */

require_once "../models/BusModel.php";

$bus = new BusModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seat = $_POST["asiento"];
    $object = json_decode($bus->getSeat($seat));

    echo " <form method='post'>
            <div class='row'>
                <div class='input-field col s12 l4 m6'>
                    <input id='_inp_name' type='text' class='validate' value='$object->nombre' required>
                    <label for='_inp_name'>Nombre</label>
                </div>
                <div class='input-field col s12 l4 m6'>
                    <input id='_inp_first_name' type='text' class='validate' value='$object->apellidos' required>
                    <label for='_inp_first_name'>Apellidos</label>
                </div>
                <div class='input-field col s12 l4 m6'>
                    <input id='_inp_destiny' type='text' class='validate' value='$object->destino' required>
                    <label for='_inp_destiny'>Destino</label>
                </div>
                <div class='input-field col s12 l4 m6'>
                    <input id='_inp_origin' type='text' class='validate' value='$object->origen' required>
                    <label for='_inp_origin'>Origen</label>
                </div>
                <div class='input-field col s12 l4 m6'>
                    <input id='_inp_cost' type='number' class='validate' value='$object->precio' required>
                    <label for='_inp_cost'>Precio</label>
                </div>
                <div class='input-field col s12 l4 m6'>
                    <input disabled id='_inp_number' type='number' class='validate' value='$object->numero' required>
                    <label for='_inp_number'>Asiento</label>
                </div>
                <div class='input-field col s12 l12 m12'>
                    <div class='col s12 l12 m12'>
                        <a class='modal-close waves-effect waves-light btn right' onclick='actualizarAsiento()'>
                            <i class='material-icons center'>update</i>
                        </a>
                        <a class='modal-close waves-effect waves-light btn right' style='margin-right: 10px' onclick='eliminarAsiento($seat)'>
                            <i class='material-icons center'>delete</i>
                        </a>
                    </div>
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function() {
                M.updateTextFields();
            });    
        </script>";
}


?>