<?php
/**
 * Created by PhpStorm.
 * User: edythawne
 * Date: 24/05/18
 * Time: 07:13 PM
 */

class AsientoModel implements JsonSerializable {

    private $numero;
    private $disponible;

    private $nombre;
    private $apellidos;
    private $destino;
    private $origen;
    private $date;
    private $precio;

    /**
     * AsientoModel constructor.
     * @param $numero
     * @param $disponible
     * @param $nombre
     * @param $apellidos
     * @param $deatino
     * @param $porigen
     * @param $precio
     * @param $date
     */
    public function __construct($numero, $disponible, $nombre, $apellidos, $deatino, $porigen, $precio, $date) {
        $this->setNumero($numero);
        $this->setDisponible($disponible);
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setDestino($deatino);
        $this->setOrigen($porigen);
        $this->setPrecio($precio);
        $this->setDate($date);
    }


    /**
     * @return mixed
     */
    public function getNumero() {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero) {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getDisponible() {
        return $this->disponible;
    }

    /**
     * @param mixed $disponible
     */
    public function setDisponible($disponible) {
        $this->disponible = $disponible;
    }

    /**
     * @return mixed
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getDestino() {
        return $this->destino;
    }

    /**
     * @param mixed $destino
     */
    public function setDestino($destino) {
        $this->destino = $destino;
    }

    /**
     * @return mixed
     */
    public function getOrigen() {
        return $this->origen;
    }

    /**
     * @param mixed $origen
     */
    public function setOrigen($origen) {
        $this->origen = $origen;
    }

    /**
     * @return mixed
     */
    public function getApellidos() {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date) {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getPrecio() {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    /**
     * jsonSerialize
     * @return array|mixed
     */
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}