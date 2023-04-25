<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}

# (id, name, description, category, stock, unit_price, image, visibility, created, modified)
$query = "SELECT id, name, description, category, stock, unit_price, image, visibility, created, modified from Products";
$params = null;
if (isset($_POST["product"])) {
    $search = se($_POST, "product", "", false);
    $query .= " WHERE name LIKE :product";
    $params =  [":product" => "%$search%"];
}
$query .= " ORDER BY modified desc ";
$db = getDB();
$stmt = $db->prepare($query);
$products = [];
try {
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $products = $results;
    } else {
        flash("No matches found", "warning");
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

?>
<div class="container-fluid">
    <h1>List Products</h1>
    <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="input-group mb-3">
            <input class="form-control" type="search" name="product" placeholder="Product Filter" />
            <input class="btn btn-primary" type="submit" value="Search" />
        </div>
    </form>
    <table class="table">
        <thead>
            <!-- (id, name, description, category, stock, unit_price, image, visibility, created, modified) -->
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Price Per Unit</th>
            <th>Image</th>
            <th>Visibility</th>
            <th>Created</th>
            <th>Modified</th>
            <th>View</th>
            <th>Edit</th>
        </thead>
        <tbody>
            <?php if (empty($products)) : ?>
                <tr>
                    <td colspan="100%">No products</td>
                    <td> <a class="btn btn-primary" href="<?php echo get_url('admin/create_product.php'); ?>">Create Product</a> </td>
                </tr>
            <?php else : ?>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php se($product, "id") ?></td>
                        <td><?php se($product, "name"); ?></td>
                        <td><?php se($product, "description"); ?></td>
                        <td><?php se($product, "category"); ?></td>
                        <td><?php se($product, "stock"); ?></td>
                        <td><?php se($product, "unit_price"); ?></td>
                        <td><?php se($product, "image"); ?></td>
                        <td><?php se($product, "visibility"); ?></td>
                        <td><?php se($product, "created"); ?></td>
                        <td><?php se($product, "modified"); ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo("/project/view_product.php") ?>/?id=<?php se($product, "id"); ?>">View</a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="edit_product.php?id=<?php se($product, "id"); ?>">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php
    //note we need to go up 1 more directory
    require_once(__DIR__ . "/../../../partials/flash.php");
    ?>