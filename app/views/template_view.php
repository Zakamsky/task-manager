<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 0:51
 */
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Task manager</title>
    <style>
        body,
        .wrapper.h-100{
            min-height: 100vh;
        }
        .form-box{
            margin-top: 2em;
            margin-right: auto;
            margin-left: auto;
            width: 850px;
            max-width: 90%;
            padding: 1.5rem;
            border: 1px solid #666666;
            border-radius: .25rem;
        }
        .card-footer{
            min-height: 55px;
        }
        .task-row{
            height: 390px;
            align-items: stretch;
        }
    </style>
</head>
<body>
<div class="wrapper h-100 d-flex flex-column justify-content-between">
    <header class="bg-info ">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

                    <div class="navbar-nav w-100">
                        <?php
                        echo '
                                    <a class="nav-item nav-link" href="/">Home</a>
                                    <a class="nav-item nav-link" href="/?m=addtask">add task</a>
                                    ';
                        if(isset($_COOKIE['user_login'])){
                            echo '<span class="avtorized ml-auto">you are logged as '.$_COOKIE['user_login'].' <a class="btn btn-outline-light" href="/?m=logout">logout</a> </span>';
                        } else {
                            echo '
                                        <a class="nav-item nav-link" href="/?m=login">login</a>
                                        <a class="nav-item nav-link" href="/?m=registration">registration</a>
                                    ';
                        };
                        ?>
                    </div>
                </div>
            </div>

        </nav>

    </header>

    <div class="container flex-grow-1">


        <?php include 'app/views/'.$content_view; ?>


    </div> <!-- .container -->

    <footer class="bg-dark p-4 text-light">
(C) Alex Elkin
</footer>
</div><!-- .wrapper -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>