<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News | Demo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

	<?php include 'includes/header.php'; ?>

    <div class="container mt-5">
        <h1>News</h1>
        <div class="row" id="news-list">
            <div class="col-md-6 mb-4">
                <article class="card" id="news-post">
                    <a href="article.php">
                        <img src="http://via.placeholder.com/350x200" alt="" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="article.php">News article</a></h5>
                        <small class="news-date text-secondary"><?= date('D, jS M Y'); ?></small>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="article.php" class="btn btn-primary">Read more</a>
                    </div>
                </article>
            </div>
            <div class="col-md-6 mb-4">
                <article class="card" id="news-post">
                    <img src="http://via.placeholder.com/350x200" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">News article</h5>
                        <small class="news-date text-secondary"><?= date('D, jS M Y'); ?></small>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="news-article.php" class="btn btn-primary">Read more</a>
                    </div>
                </article>
            </div>
            <div class="col-md-6 mb-4">
                <article class="card" id="news-post">
                    <img src="http://via.placeholder.com/350x200" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">News article</h5>
                        <small class="news-date text-secondary"><?= date('D, jS M Y'); ?></small>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="news-article.php" class="btn btn-primary">Read more</a>
                    </div>
                </article>
            </div>
        </div>
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

	<?php include 'includes/footer.php'; ?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>