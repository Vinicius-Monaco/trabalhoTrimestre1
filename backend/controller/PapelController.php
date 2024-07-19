<?php
require '../model/Papel.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $papel = new Papel();
  $papel->setPapel($_POST['papel']);
  $papel->salvarPapel();
  echo $_POST['papel'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $papel = new Papel();
  $papeis = $papel->listarPapeis();
  foreach($papeis as $p) {
    echo $p['papel'];
  }
}

//   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $papel = new Papel();
//     $papel->setId($_POST['id']);
//     $papel->setPapel($_POST['papel']);
//     $papel->salvarPapel();
// }

//   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $papel = new Papel();
//     $papel->setId($_POST['id']);
//     $papel->deletarPapel();
// }

//   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     return Papel::listarPapeis();
//   }

//   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     $papeis = Papel::listarPapeis();
//     foreach ($papeis as $papel) {
//       if ($papel['id'] == $id) {
//         return $papel;
//       }
//   }
// }
?>