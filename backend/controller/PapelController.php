<?php
require '../model/Papel.php';

class PapelController
{
  public function criarPapel()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $papel = new Papel();
      $papel->setPapel($_POST['papel']);
      $papel->salvarPapel();
    }
  }

  public function atualizarPapel()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $papel = new Papel();
      $papel->setId($_POST['id']);
      $papel->setPapel($_POST['papel']);
      $papel->salvarPapel();
    }
  }

  public function deletarPapel()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $papel = new Papel();
      $papel->setId($_POST['id']);
      $papel->deletarPapel();
    }
  }

  public function listarPapeis()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      return Papel::listarPapeis();
    }
  }

  public function obterPapelPorId($id)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $papeis = Papel::listarPapeis();
      foreach ($papeis as $papel) {
        if ($papel['id'] == $id) {
          return $papel;
        }
      }
    }
    return null;
  }
}
?>