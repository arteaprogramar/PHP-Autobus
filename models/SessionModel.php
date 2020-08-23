<?php

class SessionModel {

    const SESSION_STARTED = TRUE;
    const SESSION_NOT_STARTED = FALSE;

    // Estado de la SESSION
    private $sessionState = self::SESSION_NOT_STARTED;

    // Instancia de la clase
    private static $instance;

    /**
     * SessionModel constructor.
     */
    public function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        self::$instance->startSession();
        return self::$instance;
    }

    /**
     * Inicia la session
     * @return bool
     */
    public function startSession() {
        if ($this->sessionState == self::SESSION_NOT_STARTED) {
            $this->sessionState = session_start();
        }

        return $this->sessionState;
    }

    /**
     * Asigna datos a la session
     * @param $name
     * @param $value
     */
    public function __set($name, $value) {
        $_SESSION[$name] = $value;
    }

    public function set($name, $subname, $value){
        $_SESSION[$name][$subname] = $value;
    }

    /**
     * Regresar valor de SESSION
     * @param $name
     * @return mixed
     */
    public function __get($name) {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return null;
        }
    }

    /**
     * Determina si una variable está definida y no es NULL
     * @param $name
     * @return bool
     */
    public function __isset($name) {
        return isset($_SESSION[$name]);
    }

    /**
     * Remover item de SESSION
     * @param $name
     */
    public function __unset($name) {
        unset($_SESSION[$name]);
    }

    /**
     * Remove item in array SESSION
     * @param $name
     * @param $subname
     */
    public function remove($name, $subname){
        unset($_SESSION[$name][$subname]);
    }

    /**
     * Destruye la session actual
     * Regresa TRUE si la session fue destruida
     * Regresa FALSO si la sesion no pudo destruirse
     * @return bool
     */
    public function destroy() {
        if ($this->sessionState == self::SESSION_STARTED) {
            $this->sessionState = !session_destroy();
            unset($_SESSION);
            return !$this->sessionState;
        }

        return FALSE;
    }

}