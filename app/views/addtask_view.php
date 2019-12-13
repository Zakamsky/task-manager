<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 14:14
 */
?>

<form method = "post" class="form-box" action="/addtask/message">
    <div class="form-group">
        <label for="InputTaskName">User name</label>
        <input type="text" name="taskname" class="form-control" id="InputTaskName" required>
    </div>
    <div class="form-group">
        <label for="InputEmail">Email address</label>
        <input type="email" name="taskemail" class="form-control" id="InputEmail" required>
    </div>
    <div class="form-group">
        <label for="FormControlTextarea">Example textarea</label>
        <textarea name="tasktext" class="form-control" id="FormControlTextarea" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
