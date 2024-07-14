<?php
  require '../model/Papel.php';
  class PapelController {
    public function criarPapel() {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $papel = new Papel();
        $papel->setPapel($_POST['papel']);
        $papel->salvarPapel();
      }
    }
  }
?>