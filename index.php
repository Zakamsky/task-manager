<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 01.12.2019
 * Time: 13:49
 */
include("config.php");
//include("model.php");
//error_reporting("e_notice");

$task_per_page = 3;
$total_pages = 1;

if(isset($_GET['m'])){
    $module = $_GET['m'];
}
else {
    $module = 'model';
}
if (file_exists("./modules/$module.inc.php"))
{
    include_once("./modules/$module.inc.php");
}
else {
    include_once("$module.php");
}

$m = new $module;
$output_method = $m -> output();

//global $total_pages;
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
            body{
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

                            <div class="navbar-nav">
                                <?php
                                echo '
                                    <a class="nav-item nav-link" href="/">Home</a>
                                    <a class="nav-item nav-link" href="/?m=addtask">add task</a>
                                    ';
                                if(isset($_COOKIE['user_login'])){
                                    echo '<span class="avtorized ml-auto">you logged in as '.$_COOKIE['user_login'].' <a class="btn btn-outline-light" href="/?m=logout">logout</a> </span>';
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
                <div class="container d-flex">

                </div>

              </header>
            <div class="container h-100">
                <?php if (is_string($output_method))echo $output_method; ?>

                <?php if (is_array($output_method)): ?>

                    <div class="sorter d-inline-flex flex-wrap mt-5">
                        <span class="sorter__label pr-3 mb-3 mb-sm-0">sort by:</span>
                        <div class="btn-group btn-group-sm  " role="group" aria-label="Basic example">

                            <a href="/?sort=user_name"
                               class="btn btn-primary <?php if(isset($_GET['sort']) && $_GET['sort'] === 'user_name' && !isset($_GET['order']) ) echo 'active'; ?>"
                            >
                                name a-z
                            </a>
                            <a href="/?sort=user_name&order=desc"
                               class="btn btn-primary <?php if(isset($_GET['sort']) && $_GET['sort'] === 'user_name' && isset($_GET['order'])) echo 'active'; ?>"
                            >
                                name z-a
                            </a>
                            <a href="/?sort=task_email"
                               class="btn btn-primary <?php if(isset($_GET['sort']) && $_GET['sort'] === 'task_email' && !isset($_GET['order'])) echo 'active'; ?>"
                            >
                                e-mail a-z
                            </a>
                            <a href="/?sort=task_email&order=desc"
                               class="btn btn-primary <?php if(isset($_GET['sort']) && $_GET['sort'] === 'task_email' && isset($_GET['order'])) echo 'active'; ?>"
                            >
                                e-mail z-a
                            </a>
                            <a href="/?sort=task_status"
                               class="btn btn-primary <?php if(isset($_GET['sort']) && $_GET['sort'] === 'task_status' && !isset($_GET['order'])) echo 'active'; ?>"
                            >
                                status a-z
                            </a>
                            <a href="/?sort=task_status&order=desc"
                               class="btn btn-primary <?php if(isset($_GET['sort']) && $_GET['sort'] === 'task_status' && isset($_GET['order'])) echo 'active'; ?>"
                            >
                                status z-a
                            </a>
                        </div>
                    </div>
                    <div class="row my-5">

                        <?php if (is_array($output_method))$tasks = $output_method;?>
                        <?php foreach ($tasks as $task): ?>
                            <div class="col-md-6 col-lg-4 pb-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex">
                                        <h5 class="card-title mb-0"><?php echo $task['user_name']?></h5>
                                        <?php if (isset($_COOKIE['user_login'])): ?>
                                            <a href="/?m=edittask&id=<?php echo $task['id']?>" class="card-link ml-auto disabled">edit</a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo $task['task_email']?></h6>
                                        <p class="card-text">
                                            <?php echo $task['task_text']?>
                                        </p>
                                    </div>
                                    <div class="card-footer d-flex">
                                        <?php if ($task['task_status'] == 1): ?>
                                            <div class="border border-warning rounded text-warning p-1 small mr-auto">Complited</div>
                                        <?php endif; ?>
                                        <?php if ($task['task_edited'] == 1): ?>
                                            <div class="border border-warning rounded text-warning p-1 small ml-auto">edited by admin</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <?php if ($total_pages > 1): ?>
                        <?PHP
                            $baseurl = '/?';
                            if(isset($_GET['sort'])){
                                $baseurl .= 'sort='.$_GET['sort'].'&';
                            };
                            if(isset($_GET['order'])){
                                $baseurl .= 'order='.$_GET['order'].'&';
                            };
                            $pag_url = $baseurl."page=";
                            $pag_url_first = $pag_url.'1';
                            $pag_url_last = $pag_url.$total_pages;
                            $pag_url_prev = $pag_url.'1';
                            if(isset($_GET['page']) && $_GET['page'] > 2){
                                $pag_url_prev = $pag_url.($_GET['page']-1);
                            }
                            if(isset($_GET['page'])){
                                $pag_url_next = $pag_url.($_GET['page']+1);
                            }else{
                                $pag_url_next = $pag_url.'2';
                            }
                        ?>
                        <ul class="pagination mb-5">

                            <?php if (isset($_GET['page']) && ($_GET['page'] > 1)): ?>

                                <li class="page-item">
                                    <a class="page-link" href="<?php echo $pag_url_first; ?>">first</a>
                                </li>

                            <?php endif; ?>
                            <?php if(isset($_GET['page']) && ($_GET['page'] > 2)): ?>

                                <li class="page-item">
                                    <a class="page-link" href="<?php echo $pag_url_prev; ?>"><?php echo ($_GET['page'] - 1); ?></a>
                                </li>

                            <?php endif; ?>

                                <li class="page-item active" aria-current="page">
                                    <span class="page-link">
                                        <?php if (isset($_GET['page'])){echo $_GET['page'];}else{echo '1';}; ?>
                                    </span>
                                </li>

                            <?php if((!isset($_GET['page']) && $total_pages > 3) || isset($_GET['page']) && ($_GET['page'] < $total_pages)): ?>

                                <li class="page-item">
                                    <a class="page-link" href="<?php echo $pag_url_next; ?>">
                                        <?php if (isset($_GET['page'])){echo $_GET['page']+1;}else{echo '2';}; ?>
                                    </a>
                                </li>

                            <?php endif; ?>
                            <?php if(!isset($_GET['page']) || isset($_GET['page']) && ($_GET['page'] < ($total_pages - 1))): ?>

                                <li class="page-item">
                                    <a class="page-link" href="<?php echo $pag_url_last; ?>">last</a>
                                </li>

                            <?php endif; ?>
                            </ul>

                    <?php endif; ?>

                <?php endif; ?>
            </div> <!-- .container -->

        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
