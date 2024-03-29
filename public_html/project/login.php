<?php
require_once(__DIR__ . "/../../partials/nav.php");

//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);

    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email/Username must not be empty", "danger");
        $hasError = true;
    }
    if (str_contains($email, "@")) {
        //sanitize
        //$email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = sanitize_email($email);
        //validate
        /*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            flash("Invalid email address");
            $hasError = true;
        }*/
        if (!is_valid_email($email)) {
            flash("Invalid email address");
            $hasError = true;
        }
    } else {
        if (!is_valid_username($email)) {
            flash("Invalid username");
            $hasError = true;
        }
    }
    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }
    if (strlen($password) < 8) {
        flash("Password too short", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, username, password from Users where email = :email or username = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["password"];
                    unset($user["password"]);
                    if (password_verify($password, $hash)) {
                        //flash("Welcome $email");
                        $_SESSION["user"] = $user; //sets our session data from db
                        //login bug happening here was fixed by setting $LocalWorks = false in nav.php
                        try {
                            //lookup potential roles
                            $stmt = $db->prepare("SELECT Roles.name FROM Roles 
                            JOIN UserRoles on Roles.id = UserRoles.role_id 
                            where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");
                            $stmt->execute([":user_id" => $user["id"]]);
                            $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we'll want multiple
                        } catch (Exception $e) {
                            error_log(var_export($e, true));
                        }
                        //save roles or empty array
                        if (isset($roles)) {
                            $_SESSION["user"]["roles"] = $roles; //at least 1 role
                        } else {
                            $_SESSION["user"]["roles"] = []; //no roles
                        }
                        flash("Welcome, " . get_username());
                        die(header("Location: home.php")); 
                    } else {
                        flash("Invalid password", "danger");
                    }
                } else {
                    flash("Username/Email not found", "danger");
                }
            }
        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
}
?>

<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        
        let noError = true;
        let email = form.email.value;
        let password = form.password.value;

        // Uses flash() from helpers.js
        if (email.indexOf("@") !== -1) {
            //treat input as email
            if (email == "") {
                flash("Email must not be empty");
                noError = false;
            }
            if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
                flash("Must be a valid email");
                noError = false;
            }
            if (email.length < 3) {
                flash("Email is too short");
                noError = false;
            }
            if (email.length > 100) {
                flash("Email is too long");
                noError = false;
            }
        }
        else {
            //treat input as username
            if (email == "") {
                flash("Username must not be empty");
                noError = false;
            }
            if (email.length < 3) {
                flash("Username is too short");
                noError = false;
            }
            if (email.length > 30) {
                flash("Username is too long");
                noError = false;
            }
        } 

        if (password == "") {
            flash("Password must not be empty");
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

        return noError;
    }
</script>

<div class="container-fluid">
    <h1 >Login</h1>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <label class="form-label" for="email">Username/Email</label>
            <input class="form-control" type="text" id="email" name="email" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="pw">Password</label>
            <input class="form-control" type="password" id="pw" name="password" required minlength="8" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Login" />
    </form>
</div>

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>