 <?php
// ini_set('display_errors', 1);
// if (isset($_POST['joketext'])) {
//     try {
//         include_once __DIR__ . '/include/databaseconnection.php';
//         include_once __DIR__ . '/include/databasefunction.php';
//         insert($pdo,'joke', ['authorId' => 1,
// 'jokeText' => $_POST['joketext'],
// 'jokedate' => new DateTime()]);
//         header('location: jokes.php');
//     } catch (PDOExeption $e) {
//         $title = 'An error has occurred';
//         $output = '<br>Database error: ' . $e->getMessage() . '<br> in ' . $e->getFile() . ' <br> line:' . $e->getLine() . '<br>';
//     }
// } else {
//     $title = 'Add a new joke';
//     ob_start();
//     include __DIR__ . '/addjoke.html.php';
//     $output = ob_get_clean();
// }
// include __DIR__ . '/layout.html.php';
