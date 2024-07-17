<?php
require '../model/Usuario.php';

class UsuarioController {
  public function criarUsuario() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $usuario = new Usuario();
      $usuario->setNome($_POST['nome']);
      $usuario->setEmail($_POST['email']);
      $usuario->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));
      $usuario->salvarUsuario();
    }
  }

  public function atualizarUsuario() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $usuario = new Usuario();
      $usuario->setId($_POST['id']);
      $usuario->setNome($_POST['nome']);
      $usuario->setEmail($_POST['email']);
      $usuario->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));
      $usuario->salvarUsuario();
    }
  }

  public function deletarUsuario() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $usuario = new Usuario();
      $usuario->setId($_POST['id']);
      $usuario->deletarUsuario();
    }
  }

  public function listarUsuarios() {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      return Usuario::listarUsuarios();
    }
  }

  public function obterUsuarioPorId($id) {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $usuarios = Usuario::listarUsuarios();
      foreach ($usuarios as $usuario) {
        if ($usuario['id'] == $id) {
          return $usuario;
        }
      }
    }
    return null;
  }
}
?>
