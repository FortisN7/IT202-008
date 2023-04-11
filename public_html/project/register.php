<?php
require_once(__DIR__ . "/../../partials/nav.php");
?>
<div class="container-fluid">
    <h1>Register</h1>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" required maxlength="100" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" required minlength="3" maxlength="30" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="pw">Password</label>
            <input class="form-control" type="password" id="pw" name="password" required minlength="8" maxlength="60" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="confirm">Confirm</label>
            <input class="form-control" type="password" name="confirm" required minlength="8" maxlength="60" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Register" />
    </form>
</div>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        
        let noError = true;
        let email = form.email.value;
        let password = form.password.value;
        let confirm = form.confirm.value;
        let username = form.username.value;

        // Uses flash() from helpers.js
        if (username == "") {
            flash("Username must not be empty");
            noError = false;
        }
        if (username.length < 3) {
            flash("Username is too short");
            noError = false;
        }
        if (username.length > 30) {
            flash("Username is too long");
            noError = false;
        }
        if (email == "") {
            flash("Email must not be empty");
            noError = false;
        }
        if (email.length > 100) {
            flash("Username is too long");
            noError = false;
        }
        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
            flash("Must be a valid email");
            noError = false;
        }

        if (password == "") {
            flash("Password must not be empty");
            noError = false;
        }
        if (confirm == "") {
            flash("Confirm password must not be empty");
            noError = false;
        }
        if (password.length < 8) {
            flash("Password is too short");
            noError = false;
        }
        if (password.length > 60) {
            flash("Password is too long");
            noError = false;
        }
        if (password.length > 0 && password !== confirm) {
            flash("Passwords must match");
            noError = false;
        }

        return noError;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"]) && isset($_POST["username"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se(
        $_POST,
        "confirm",
        "",
        false
    );
    $username = se($_POST, "username", "", false);
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty", "danger");
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!preg_match('/^[a-z0-9_-]{3,30}$/i', $username)) {
        flash("Username must only be alphanumeric and can only contain - or _. Username must also only be 3-30 characters.", "danger");
        $hasError = true;
    }
    if (empty($password)) {
        flash("Password must not be empty", "danger");
        $hasError = true;
    }
    if (empty($confirm)) {
        flash("Confirm password must not be empty", "danger");
        $hasError = true;
    }
    if (strlen($password) < 8) {
        flash("Password too short", "danger");
        $hasError = true;
    }
    if (strlen($password) > 0 && $password !== $confirm) {
        flash("Passwords must match", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users (email, password, username) VALUES(:email, :password, :username)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username]);
            flash("Successfully registered!");
        } catch (PDOException $e) {
            users_check_duplicate($e->errorInfo);
        }
    }
}
?>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>