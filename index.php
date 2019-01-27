<?php

include_once('includes/connect.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();

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
    <ol>
        <?php foreach ($articles as $article) { ?>
          <li>
            <a href="article.php?id=<?php echo $article['article_id']; ?>">
              <?php echo $article['article_title']; ?>
            </a>
            <small> - ievietots <?php echo date($article['article_time']); ?>;</small>
            </li>
        <?php } ?>
    </ol>
</body>
</html>
