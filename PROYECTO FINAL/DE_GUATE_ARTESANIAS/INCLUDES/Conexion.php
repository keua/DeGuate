<?php

class conexion {

    public static function conectar() {
        $host = "localhost";
        $port = 3306;
        $socket = "";
        $user = "root";
        $password = "root";
        $dbname = "DE_GUATE_ARTESANIAS_DB";
        return new mysqli($host, $user, $password, $dbname);
    }

}

//$con->close();
