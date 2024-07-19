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
  public function listarPapeis() {
      $conexao = new Conexao();
      $conn = $conexao->getConexao();
      $stmt = $conn->query("SELECT papel FROM papel");
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
  }
?>