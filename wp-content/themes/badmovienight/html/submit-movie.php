<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Submit Movie | Demo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

	<?php include 'includes/header.php'; ?>

    <div class="container mt-5">
        <h1>Submit a movie</h1>
        <form action="">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" name="year" id="year" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="link">IMDB link</label>
                <input type="url" name="link" id="link" class="form-control">
            </div>
            <div class="form-group">
                <label for="reason">Reason this film be included</label>
                <textarea name="reason" id="reason" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

	<?php include 'includes/footer.php'; ?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>