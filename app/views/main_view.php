<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 1:07
 */
?>

<?php //print_r($data) ?>


<div class="sorter d-inline-flex flex-wrap mt-5">
    <span class="sorter__label pr-3 mb-3 mb-sm-0">sort by:</span>
    <div class="btn-group btn-group-sm  " role="group" aria-label="Basic example">

        <a href="/main/index/?sort=user_name"
           class="btn btn-primary <?php if(isset($_GET['sort']) && $_GET['sort'] === 'user_name' && !isset($_GET['order']) ) echo 'active'; ?>"
        >
            name a-z
        </a>
        <a href="/main/index/?sort=user_name&order=desc"
           class="btn btn-primary <?php if(isset($_GET['sort']) && $_GET['sort'] === 'user_name' && isset($_GET['order'])) echo 'active'; ?>"
        >
            name z-a
        </a>
        <a href="/main/index/?sort=task_email"
           class="btn btn-primary <?php if(isset($_GET['sort']) && $_GET['sort'] === 'task_email' && !isset($_GET['order'])) echo 'active'; ?>"
        >
            e-mail a-z
        </a>
        <a href="/main/index/?sort=task_email&order=desc"
           class="btn btn-primary <?php if(isset($_GET['sort']) && $_GET['sort'] === 'task_email' && isset($_GET['order'])) echo 'active'; ?>"
        >
            e-mail z-a
        </a>
        <a href="/main/index/?sort=task_status"
           class="btn btn-primary <?php if(isset($_GET['sort']) && $_GET['sort'] === 'task_status' && !isset($_GET['order'])) echo 'active'; ?>"
        >
            status a-z
        </a>
        <a href="/main/index/?sort=task_status&order=desc"
           class="btn btn-primary <?php if(isset($_GET['sort']) && $_GET['sort'] === 'task_status' && isset($_GET['order'])) echo 'active'; ?>"
        >
            status z-a
        </a>
    </div>
</div>
<div class="row my-5 task-row">

    <?php foreach ($data['tasks'] as $task): ?>
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

<?php $total_pages = $data['total_pages']; ?>
<?php if ($total_pages > 1): ?>
    <?PHP
    $baseurl = '/main/index/?';
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
