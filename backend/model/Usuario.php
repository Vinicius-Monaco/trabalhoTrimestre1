<?php
class Usuario
{
  private $id;
  private $email;
  private $nome;
  private $senha;

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setSenha($senha)
  {
    $this->senha = $senha;
  }

  public function getSenha()
  {
    return $this->senha;
  }

  public function salvarUsuario()
  {
    $conn = conexao();
    if ($this->id) {
      $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");
      $stmt->bind_param("sssi", $this->nome, $this->email, $this->senha, $this->id);
    } else {
      $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $this->nome, $this->email, $this->senha);
    }
    $stmt->execute();
    $stmt->close();
    $conn->close();
  }

  public function deletarUsuario()
  {
    $conn = conexao();
    if ($this->id) {
      $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
      $stmt->bind_param("i", $this->id);
      $stmt->execute();
      $stmt->close();
    }
    $conn->close();
  }

  public static function listarUsuarios()
  {
    $conn = conexao();
    $stmt = $conn->prepare("SELECT id, nome, email FROM usuarios");
    $stmt->execute();
    $result = $stmt->get_result();
    $usuarios = [];
    while ($row = $result->fetch_assoc()) {
      $usuarios[] = $row;
    }
    $stmt->close();
    $conn->close();
    return $usuarios;
  }
}
?>