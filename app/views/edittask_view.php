<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 14:14
 */?>
<form method = "post" class="form-box" action="/edittask/message">
    <input name="task_id" type="text" hidden readonly value="<?php echo $data['id']?>">
    <div class="form-group">
        <label for="InputTaskName">User name</label>
        <input value="<?php echo $data['user_name']?>" readonly type="text" name="taskname" class="form-control" id="InputTaskName" >
    </div>
    <div class="form-group">
        <label for="InputEmail">Email address</label>
        <input value="<?php echo $data['task_email']?>" readonly type="email" name="taskemail" class="form-control" id="InputEmail">
    </div>
    <div class="form-group">
        <label for="FormControlTextarea">Example textarea</label>
        <textarea name="tasktext" class="form-control" id="FormControlTextarea" rows="3"><?php echo $data['task_text']?></textarea>
    </div>
    <div class="custom-control custom-checkbox pb-3">
        <input value="1" type="checkbox" name="taskcomplite" class="custom-control-input" id="taskchek">
        <label class="custom-control-label" for="taskchek">Task complited</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/" class="btn btn-secondary">close without change</a>
</form>
