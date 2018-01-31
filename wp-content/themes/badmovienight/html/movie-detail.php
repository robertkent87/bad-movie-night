<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Detail | Demo</title>
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
    <div class="container mt-5">
        <div class="row" id="movie-detail">
            <div class="col-md-3">
                <img class="img-fluid" src="http://via.placeholder.com/500x741?text=Poster" alt="Card image cap">
                <table class="table">
                    <tr>
                        <th>Rating</th>
                        <td>4.1</td>
                    </tr>
                    <tr>
                        <th>Genres</th>
                        <td>Mystery, Horror</td>
                    </tr>
                    <tr>
                        <th>Runtime</th>
                        <td>2h 30m</td>
                    </tr>
                    <tr>
                        <th>Director</th>
                        <td>Alan Smithy</td>
                    </tr>
                    <tr>
                        <th>Collection</th>
                        <td>Christmas</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-9">
                <h1>Movie Title
                    <small class="text-muted">(2009)</small>
                </h1>
                <p>This text is not final and should be replaced. What you are reading now is not what you will be
                    reading in this space once this website goes live. This is placeholder text that our web designers
                    put here to make sure words appear properly on your website.</p>

                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a href="#details" id="details-tab" data-toggle="tab" role="tab"
                           class="nav-link active">Details</a>
                    </li>
                    <li class="nav-item">
                        <a href="#user_reviews" id="reviews-tab" data-toggle="tab" role="tab" class="nav-link">User
                            Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a href="#stream_options" id="stream-tab" data-toggle="tab" role="tab" class="nav-link">Where to watch it</a></li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane show active" id="details" role="tabpanel">
                        <p>
                            <img src="http://via.placeholder.com/1280x720?text=Trailer+or+image" alt=""
                                 class="img-fluid">
                        </p>

                        <h3>Cast</h3>
                        <div class="row">
                            <div class="col">Person name</div>
                            <div class="col">Person name</div>
                            <div class="col">Person name</div>
                            <div class="col">Person name</div>
                        </div>

                        <h3>Why it's bad</h3>
                        <p>This text is not final and should be replaced. What you are reading now is not what you will
                            be
                            reading in this space once this website goes live. This is placeholder text that our web
                            designers
                            put here to make sure words appear properly on your website.</p>
                    </div>
                    <div class="tab-pane" id="user_reviews" role="tabpanel">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">List-based media object</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </li>
                            <li class="media my-4">
                                <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">List-based media object</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">List-based media object</h5>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="stream_options" role="tabpanel">
                        <table class="table">
                            <tr>
                                <th>Netflix</th>
                                <td>https://www.link.com</td>
                            </tr>
                            <tr>
                                <th>Amazon</th>
                                <td>https://www.link.com</td>
                            </tr>
                            <tr>
                                <th>YouTube</th>
                                <td>https://www.link.com</td>
                            </tr>
                            <tr>
                                <th>Other</th>
                                <td>https://www.link.com</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Movie listing -->
        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>