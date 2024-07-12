<?php
class ConexaoBanco extends PDO {
    private static $instancia = null;

    public function __construct($dsn, $usuario, $senha) {
        parent::__construct($dsn, $usuario, $senha);
    }

    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            self::$instancia = new ConexaoBanco('mysql:dbname=TrabalhoPHP;host=localhost', 'root', '');
        }
        return self::$instancia;
    }
}
?>
