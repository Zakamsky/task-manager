<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12.12.2019
 * Time: 14:14
 */?>

<form action="/login/message" method="post" class="form-box">
    <div class="form-group">
        <label for="InputTaskName">User name</label>
        <input type="text" name="username" class="form-control" id="InputTaskName" required>
    </div>
    <div class="form-group">
        <label for="InputPassword">Password</label>
        <input type="password" name="password" class="form-control" id="InputPassword" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>