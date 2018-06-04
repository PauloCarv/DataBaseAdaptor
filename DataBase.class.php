<?php

/**
 * Classe para ligação a uma Base de Dados 
 * PDO - PHP
 * 
 * @author Paulo Maia Carvalho
 */

class DataBase {

    const CONNECT_TIMEOUT = 5;  // in seconds

    /**
     * Variavel caminho BD
     *
     * @var string
     */
    private $dsn;

    /**
     * Username BD
     *
     * @var string
     */
    private $username;

    /**
     * password BD
     *
     * @var string
     */
    private $password;

    /**
     * Ligaçao BD
     *
     * @var object
     */
    private $connection;

    /**
     * Options do PDO
     *
     * @var array
     */
    private $pdoOptions;




    /**
     * Construtor da Classe
     *
     * @param string $dsn Host da Ligação
     * @param string $username Username da BD
     * @param string $password Password da BD
     * 
     * @return void
     */
    public function __construct($dsn, $username, $password)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;

        $this->pdoOptions = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_TIMEOUT => self::CONNECT_TIMEOUT
        
        ];

        $this->makeConnection();
    }

    /**
     * Criar Ligação
     *
     * @return object
     */
    protected function makeConnection() {

        $this->connection = new PDO($this->dsn, $this->username, $this->password, $this->pdoOptions);

        return $this->connection;
    }

    /**
     * Verifica a ligação à BD
     *
     * @return boolean
     */
    public function isConnected() {

        return (boolean) $this->connection;
    }



    
}