<?php
include_once '../conexao.php';

class Papel {
  private $id;
  private $papel;
  public function getPapel() {
    return $this->papel;
  }
  public function setPapel($papel) {
    $this->$papel = $papel;
  }
  public function getId() {
    return $this->id;
  }
  public function setId($id) {
    $this->$id = $id;
  }
  public function salvarPapel() {
    $conn = ConexaoBanco();
    echo $conn;
  }
}
?>