<?php

class Connection {

    static private $instance = null;
    private $dbcon;
    private $dbconsgp;

    function __construct() {
        $conn_string = "host=192.168.1.185 port=5432 dbname=traslation user=postgres password=sgp@sgp4s3r@2017";
        /* $conn_string = "host=localhost port=5432 dbname=traslation user=postgres password=12345"; */
        $this->dbcon = pg_connect($conn_string) or die('connection failed');

        $this->dbconsgp = pg_connect("host='192.168.1.185' port=5432 dbname='sgp' user='sysecure' password='S7s3c2r3SGPdb'")
                or die('Error de Conexion: ' . pg_last_error());
        /* print_r($this->dbconsgp); */
    }

    public function getConnection() {
        return $this->dbcon;
    }

    /* connecttion Sgp */

    public function getConnectionSgp() {
        return $this->dbconsgp;
    }

    public function getError() {
        return $this->dbcon->ErrorMsg();
    }

    public function execute($sql) {
        $result = pg_query($this->dbcon, $sql);
        return $result;
    }

    public function execute_sgp($sqlsgp) {
        $result_sgp = pg_query($this->dbconsgp, $sqlsgp);
        return $result_sgp;
    }

    public function fetch_result($sql) {
        $result = pg_query($this->dbcon, $sql);        
        $val = pg_fetch_result($result, 0, 0);
        return $val;
    }

    //pg_close
    public function closeConnection() {
        pg_close($this->dbcon);
    }

    public function closeConnectionSgp() {
        pg_close($this->dbconsgp);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

}

?>
