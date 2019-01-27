<?php

include_once('includes/connect.php');
include_once('includes/article.php');

$article = new Article;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $article->fetch_data($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My little blog page</title>
  <link rel="stylesheet" href="assets/style.css" />
  <link rel="stylesheet" href="assets/normalize.css" />
</head>
<body>
<div class = "container">
    <a href="index.php" id="logo">Mani raksti</a>
    <h4>
      <?php echo $data['article_title']; ?>
      <small>- ievietots <?php echo date($data['article_time']); ?>;</small>
    </h4>
      <p><?php echo $data['article_content']; ?></p>
      <a href="index.php">&larr; Atpakaļ</a>
</div>
</body>
</html>
<?php
} else {
  header('Location: index.php');
  exit();
}
?>
