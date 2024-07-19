<?php
require '../model/Papel.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $acao = $_POST['acao'];

  if ($acao == 'criar') {
    $papel = new Papel();
    $papel->setPapel($_POST['papel']);
    $papel->salvarPapel();
    echo json_encode(['status' => 'success', 'message' => 'Papel criado', 'papel' => $_POST['papel']]);
  } elseif ($acao == 'deletar') {
    $id = $_POST['id'];
    $papel = new Papel();
    $papel->deletarPapel($id);
    echo json_encode(['status' => 'success', 'message' => 'Papel deletado', 'id' => $id]);
  }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $papel = new Papel();
  $papeis = $papel->listarPapeis();
  echo json_encode($papeis);
} else {
  echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>