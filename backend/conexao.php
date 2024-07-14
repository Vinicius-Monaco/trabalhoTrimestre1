<?php
    function conexao() {
        return new PDO("mysql:host=localhost;dbname=TrabalhoPHP", "roor", "");
    }
?>