<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Article | Demo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

	<?php include 'includes/header.php'; ?>

    <div class="container mt-5">
        <img src="http://via.placeholder.com/950x300" alt="" class="img-fluid mb-5">

        <h1>Lorem ipsum dolor sit amet consectetuer adipiscing
            elit</h1>
        <p><?= date('D, jS M Y'); ?></p>

        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing
            elit. Aenean commodo ligula eget dolor. Aenean massa.
            Cum sociis natoque penatibus et magnis dis parturient
            montes, nascetur ridiculus mus. Donec quam felis,
            ultricies nec, pellentesque eu, pretium quis, sem.</p>

        <h2>Aenean commodo ligula eget dolor aenean massa</h2>

        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing
            elit. Aenean commodo ligula eget dolor. Aenean massa.
            Cum sociis natoque penatibus et magnis dis parturient
            montes, nascetur ridiculus mus. Donec quam felis,
            ultricies nec, pellentesque eu, pretium quis, sem.</p>

        <ul>
            <li>Lorem ipsum dolor sit amet consectetuer.</li>
            <li>Aenean commodo ligula eget dolor.</li>
            <li>Aenean massa cum sociis natoque penatibus.</li>
        </ul>

        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing
            elit. Aenean commodo ligula eget dolor. Aenean massa.
            Cum sociis natoque penatibus et magnis dis parturient
            montes, nascetur ridiculus mus. Donec quam felis,
            ultricies nec, pellentesque eu, pretium quis, sem.</p>

        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing
            elit. Aenean commodo ligula eget dolor. Aenean massa.
            Cum sociis natoque penatibus et magnis dis parturient
            montes, nascetur ridiculus mus. Donec quam felis,
            ultricies nec, pellentesque eu, pretium quis, sem.</p>


        <table class="table">
            <tr>
                <th>Entry Header 1</th>
                <th>Entry Header 2</th>
                <th>Entry Header 3</th>
                <th>Entry Header 4</th>
            </tr>
            <tr>
                <td>Entry First Line 1</td>
                <td>Entry First Line 2</td>
                <td>Entry First Line 3</td>
                <td>Entry First Line 4</td>
            </tr>
            <tr>
                <td>Entry Line 1</td>
                <td>Entry Line 2</td>
                <td>Entry Line 3</td>
                <td>Entry Line 4</td>
            </tr>
            <tr>
                <td>Entry Last Line 1</td>
                <td>Entry Last Line 2</td>
                <td>Entry Last Line 3</td>
                <td>Entry Last Line 4</td>
            </tr>
        </table>


        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing
            elit. Aenean commodo ligula eget dolor. Aenean massa.
            Cum sociis natoque penatibus et magnis dis parturient
            montes, nascetur ridiculus mus. Donec quam felis,
            ultricies nec, pellentesque eu, pretium quis, sem.</p>
    </div>

	<?php include 'includes/footer.php'; ?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>