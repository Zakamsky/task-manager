<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 14:14
 */?>
<h1 class="display-1 m-5 text-center" >
    <?php echo $data['title']?>
</h1>
<p class="h1 text-uppercase text-center">
    <?php echo $data['text']?>
    <br/>
    <?php if (isset($data['link'])): ?>
        <a class="btn btn-outline-primary mt-4 mr-3" href="<?php echo $data['link']?>"><?php echo $data['link-title']?></a>
    <?php endif; ?>

    <a class="btn btn-outline-primary mt-4" href="/">to home</a>
</p>
