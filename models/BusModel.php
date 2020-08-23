<?php
/**
 * Created by PhpStorm.
 * User: edythawne
 * Date: 24/05/18
 * Time: 07:11 PM
 */

require_once 'SessionModel.php';

class BusModel {

    private $SESSION_NAME = "bus";
    protected $session = null;


    /**
     * BusModel constructor.
     */
    public function __construct() {
        $this->session = SessionModel::getInstance();
    }

    /**
     * Devuelve el valor del array
     * @return int
     */
    public function countSeatsUsed() {
        if ($this->session->__isset($this->SESSION_NAME)) {
            return count($this->session->__get($this->SESSION_NAME));
        } else {
            return 0;
        }
    }

    /**
     * Regresa la SESSION
     * @return mixed|null
     */
    public function getSeats() {
        if ($this->session->__isset($this->SESSION_NAME)) {
            return $this->session ->__get($this->SESSION_NAME);
        } else {
            return null;
        }
    }

    /**
     * Guardar asiento en una sesion si es que no exite.
     * @param $obj_seat
     * @return array
     */
    public function assignSeat($object) {
        $json = json_decode($object);

        if ($this->availableSeat($json->numero) === 0) {
            $this->session->set($this->SESSION_NAME, $json->numero, $object);
            return array("msj" => "Registro Exitoso");
        } else if ($this->availableSeat($json->numero) === 1) {
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
        $result = $this->countSeatsUsed();

        if ($result>= 1){
            for ($i = 1; $i < $result; $i++){
                if (!is_null($this->session->__get($this->SESSION_NAME))){
                    $json = json_decode($this->session->__get($this->SESSION_NAME)[$i]);
                    if ($numero === $json->numero){
                        $isAvailable = 1;
                    }
                }
            }
        }
        return $isAvailable;
    }

    /**
     * REgresa los datos de una session en especifico
     * @param $number
     * @return mixed
     */
    public function getSeat($number) {
        return $this->session->__get($this->SESSION_NAME)[$number];
    }

    /**
     * Elimina una posición del array de sessiones
     * @param $number
     */
    public function removeSeat($number) {
        //unset($_SESSION["bus"][$number]);
        $this->session->remove($this->SESSION_NAME, $number);
    }

    /**
     * Actualiza datos de una posición en especifico
     * @param $number
     * @param $obj_seat
     * @return mixed
     */
    public function updateSeat($number, $obj_seat) {
        $this->session->set($this->SESSION_NAME, $number, $obj_seat);
        return array("msj" => "Actualización Exitosa");
    }

}