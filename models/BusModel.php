<?php
/**
 * Created by PhpStorm.
 * User: edythawne
 * Date: 24/05/18
 * Time: 07:11 PM
 */

class BusModel {

    /**
     * BusModel constructor.
     */
    public function __construct() {
        $this->initSession();
    }

    /**
     * Iniciador de Session
     */
    public function initSession() {
        session_start();
    }

    /**
     * Guardar asiento en una sesion si es que no exite.
     * @param $obj_seat
     * @return array
     */
    public function assignSeat($obj_seat) {
        $object = json_decode($obj_seat);
        if ($this->availableSeat($object->numero) === 0) {
            $_SESSION["bus"][$object->numero] = $obj_seat;
            return array("msj" => "Registro Exitoso");
        } else if ($this->availableSeat($object->numero) === 1) {
            return array("msj" => "No disponible");
        }
    }

    /**
     * Validacion de asiento si existe o no
     * @param $numero
     * @return int
     */
    public function availableSeat($numero) {
        $isAvailable = 0;
        if (count($_SESSION["bus"]) >= 1) {
            for ($i = 1; $i < count($_SESSION["bus"]); $i++) {
                $object = json_decode($_SESSION["bus"][$i]);
                if ($numero === $object->numero) {
                    $isAvailable = 1;
                }
            }
        } else {

        }
        return $isAvailable;
    }

    /**
     * Regresa la session
     * @return mixed
     */
    public function getSeats() {
        return ($_SESSION["bus"]);
    }

    /**
     * Devuelve el valor del array
     * @return int
     */
    public function countSeatsUsed() {
        return count($_SESSION["bus"]);
    }

    /**
     * REgresa los datos de una session en especifico
     * @param $number
     * @return mixed
     */
    public function getSeat($number) {
        return ($_SESSION["bus"][$number]);
    }

    /**
     * Elimina una posición del array de sessiones
     * @param $number
     */
    public function removeSeat($number) {
        unset($_SESSION["bus"][$number]);
    }

    /**
     * Actualiza datos de una posición en especifico
     * @param $number
     * @param $obj_seat
     * @return mixed
     */
    public function updateSeat($number, $obj_seat) {
        $_SESSION["bus"][$number] = $obj_seat;
        return array("msj" => "Actualización Exitosa");
    }

}