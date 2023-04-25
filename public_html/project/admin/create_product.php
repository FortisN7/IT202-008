<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}

if (isset($_POST["name"]) && isset($_POST["submit"])) {
    $name = se($_POST, "name", "", false);
    $desc = se($_POST, "description", "", false);
    $cat = se($_POST, "category", "", false);
    $stock = se($_POST, "stock", 0, false);
    $ppu = se($_POST, "unit_price", 0.00, false);
    $image = se($_POST, "image", 'https://upload.wikimedia.org/wikipedia/commons/d/d1/Image_not_available.png', false);
    $vis = se($_POST, "visibility", 0, false);
    if ($vis == "on") {
        $vis = 1;
    }
    else {
        $vis = 0;
    }
    if (empty($stock)) {
        $stock = 0;
    }
    if (empty($ppu)) {
        $ppu = 0.00;
    }
    if (empty($image)) {
        $image = 'https://upload.wikimedia.org/wikipedia/commons/d/d1/Image_not_available.png';
    }
    
    if (empty($name)) {
        flash("Name is required", "warning");
    }
    else {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Products (name, description, category, stock, unit_price, image, visibility) VALUES(:name, :desc, :cat, :stock, :ppu, :image, :vis)");
        try {
            $stmt->execute([":name" => $name, ":desc" => $desc, ":cat" => $cat, ":stock" => $stock, ":ppu" => $ppu, ":image" => $image, ":vis" => $vis]);
            flash("Successfully created product $name!", "success");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                flash("A product with this name already exists, please try another", "warning");
            } else {
                flash(var_export($e->errorInfo, true), "danger");
            }
        }
    }
}
?>
<div class="container-fluid">
    <h1>Create Product</h1>
    <!-- (name, description, category, stock, unit_price, image, visibility [true, false]) -->
    <form method="POST">
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" name="name" id="name" maxlength="255" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control" name="description" id="description" maxlength="255" ></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="category">Category</label>
            <input class="form-control" name="category" id="category" maxlength="255" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="stock">Stock</label>
            <input type="number" placeholder="0" class="form-control" name="stock" id="stock" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="unit_price">Price Per Unit</label>
            <input type="number" placeholder="0.00" class="form-control" name="unit_price" id="unit_price" step="0.01" min="0" max="99999999.99" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">Image URL</label>
            <input type="url" placeholder="https://example.com" class="form-control" name="image" id="image" maxlength="255"/>
        </div>
        <div class="mb-3">
            <input type="checkbox" class="checkbox" name="visibility" id="visibility" checked>
            <label class="form-label" for="visibility">Check for Visibility</label>
        </div>
        <input type="submit" class="btn btn-primary" value="Create Product" name="submit"/>
    </form>
</div>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>