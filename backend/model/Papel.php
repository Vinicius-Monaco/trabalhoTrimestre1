<?php
require '../Conexao.php';

class Papel
{
  private $id;
  private $papel;

  public function getPapel()
  {
    return $this->papel;
  }

  public function setPapel($papel)
  {
    $this->papel = $papel;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function salvarPapel()
  {
    try {
      $conexao = new Conexao();
      $conn = $conexao->getConexao();
      $stmt = $conn->prepare("INSERT INTO papel (papel) VALUES (?)");
      $stmt->execute([$this->getPapel()]);
    } catch (PDOException $th) {
      echo "There is some problem in connection ". $th->getMessage();
      return false;
    }
    return true;
  }

  public function deletarPapel()
  {
    $conn = conexao();
    if ($this->id) {
      $stmt = $conn->prepare("DELETE FROM papel WHERE id = ?");
      $stmt->bind_param("i", $this->id);
      $stmt->execute();
      $stmt->close();
    }
    $conn->close();
  }

  public static function listarPapeis()
  {
    $conn = conexao();
    $stmt = $conn->prepare("SELECT id, papel FROM papel");
    $stmt->execute();
    $result = $stmt->get_result();
    $papeis = [];
    while ($row = $result->fetch_assoc()) {
      $papeis[] = $row;
    }
    $stmt->close();
    $conn->close();
    return $papeis;
  }
}
?>