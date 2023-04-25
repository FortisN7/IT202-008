<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/nav.php");
if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH/home.php"));
}

$TABLE_NAME = "Products";
$id = se($_GET, "id", -1, false);

//update the item
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
        $stmt = $db->prepare("UPDATE $TABLE_NAME SET name = :name, description = :desc, category = :cat, stock = :stock, unit_price = :ppu, image = :image, visibility = :vis WHERE id = :id");
        try {
            $stmt->execute([":name" => $name, ":desc" => $desc, ":cat" => $cat, ":stock" => $stock, ":ppu" => $ppu, ":image" => $image, ":vis" => $vis, ":id" => $id]);
            flash("Successfully edited product $name!", "success");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                flash("A product with this name already exists, please try another", "warning");
            } else {
                flash(var_export($e->errorInfo, true), "danger");
            }
        }
    }
}


//get the table definition
$result = [];
//echo "<pre>" . var_export($columns, true) . "</pre>";
$db = getDB();
//get the item

$stmt = $db->prepare("SELECT name, description, category, stock, unit_price, image, visibility FROM $TABLE_NAME where id =:id");
try {
    $stmt->execute([":id" => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product) {
        $name = se($product, "name", "", false);
        $desc = se($product, "description", "", false);
        $cat = se($product, "category", "", false);
        $stock = se($product, "stock", 0, false);
        $ppu = se($product, "unit_price", 0.00, false);
        $image = se($product, "image", "https://upload.wikimedia.org/wikipedia/commons/d/d1/Image_not_available.png", false);
        $vis = se($product, "visibility", 0 , false);
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
}

?>
<div class="container-fluid">
    <h1>Edit Item</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" value="<?php echo $name;?>" name="name" id="name" maxlength="255" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control" name="description" id="description" maxlength="255" ><?php echo $desc;?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="category">Category</label>
            <input class="form-control" value="<?php echo $cat;?>" name="category" id="category" maxlength="255" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="stock">Stock</label>
            <input type="number" value="<?php echo $stock;?>" placeholder="0" class="form-control" name="stock" id="stock" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="unit_price">Price Per Unit</label>
            <input type="number" value="<?php echo $ppu;?>" placeholder="0.00" class="form-control" name="unit_price" id="unit_price" step="0.01" min="0" max="99999999.99" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">Image URL</label>
            <input type="url" value="<?php echo $image;?>" placeholder="https://example.com" class="form-control" name="image" id="image" maxlength="255"/>
        </div>
        <div class="mb-3">
            <?php if ($vis == 1): ?>
                <input type="checkbox" class="checkbox" name="visibility" id="visibility" checked >
                <label class="form-label" for="visibility">Check for Visibility</label>
            <?php else: ?>
                <input type="checkbox" class="checkbox" name="visibility" id="visibility" >
                <label class="form-label" for="visibility">Check for Visibility</label>
            <?php endif; ?>
        </div>
        <input type="submit" class="btn btn-primary" value="Edit Product" name="submit" />
    </form>
</div>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");