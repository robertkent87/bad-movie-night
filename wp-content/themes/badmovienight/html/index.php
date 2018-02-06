<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Demo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Demo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="jumbotron">
            <h1>This is a demo</h1>
            <p class="lead">This text is not final and should be replaced. What you are reading now is not what you will
                be reading in this space once this website goes live. This is placeholder text that our web designers
                put here to make sure words appear properly on your website.</p>
        </div>
        <div class="row" id="movie-listing">
            <!-- Search Form -->
            <div class="col-3">
                <form action="">
                    <div class="form-group">
                        <label for="keywords">Keywords</label>
                        <input type="text" name="keywords" id="keywords" class="form-control">
                    </div>
                    <div class="form-group">

                        <label for="genres">Genre</label>
                        <div class="form-check">
                            <input type="checkbox" name="genre_1" id="genre_1" class="form-check-input">
                            <label for="genre_1" class="form-check-label">Genre one</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="genre_1" id="genre_1" class="form-check-input">
                            <label for="genre_1" class="form-check-label">Genre two</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="genre_1" id="genre_1" class="form-check-input">
                            <label for="genre_1" class="form-check-label">Genre three</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="director">Director</label>
                        <select name="director" id="director" class="form-control">
                            <option value="">Joe Bloggs</option>
                            <option value="">Jane Doe</option>
                            <option value="">Some Person</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <select name="year" id="year" class="form-control">
                            <option value="">2018</option>
                            <option value="">2017</option>
                            <option value="">2016</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="collection">Collection</label>
                        <select name="collection" id="collection" class="form-control">
                            <option value="">Christmas</option>
                            <option value="">80s</option>
                            <option value="">Heros</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Filter</button>
                </form>
            </div>
            <!-- /Search Form -->

            <!-- Movie listing -->
            <div class="col-9">
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <a href="movie-detail.php">
                                <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="movie-detail.php">Movie title</a></h5>
                                <p class="card-text">2009 5.5</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Movie title</h5>
                                <p class="card-text">2009 5.5</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Movie title</h5>
                                <p class="card-text">2009 5.5</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Movie title</h5>
                                <p class="card-text">2009 5.5</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Movie title</h5>
                                <p class="card-text">2009 5.5</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Movie title</h5>
                                <p class="card-text">2009 5.5</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Movie title</h5>
                                <p class="card-text">2009 5.5</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Movie title</h5>
                                <p class="card-text">2009 5.5</p>
                            </div>
                        </div>
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
            <!-- /Movie listing -->
        </div>
    </div>
    <footer class="bg-dark text-white">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-4">
                    <h3>Latest News</h3>
                    <ul class="list-unstyled">
                        <li class="media">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">List-based media object</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin.
                            </div>
                        </li>
                        <li class="media my-4">
                            <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"
                                 alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">List-based media object</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin.
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">List-based media object</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Recent Tweets</h3>
                    <ul class="list-unstyled">
                        <li class="media">
                            <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"
                                 alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">List-based media object</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin.
                            </div>
                        </li>
                        <li class="media my-4">
                            <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"
                                 alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">List-based media object</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin.
                            </div>
                        </li>
                        <li class="media">
                            <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"
                                 alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">List-based media object</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Get In Touch</h3>
                    <form action="">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <p>&copy; <?= date('Y') ?> <a href="https://robert-kent.com" target="_blank">Robert Kent</a>. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>