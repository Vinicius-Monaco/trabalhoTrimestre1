<?php
require '../conexao.php';

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
    $conn = conexao();
    if ($this->id) {
      $stmt = $conn->prepare("UPDATE papel SET papel = ? WHERE id = ?");
      $stmt->bind_param("si", $this->papel, $this->id);
    } else {
      $stmt = $conn->prepare("INSERT INTO papel (papel) VALUES (?)");
      $stmt->bind_param("s", $this->papel);
    }
    $stmt->execute();
    $stmt->close();
    $conn->close();
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