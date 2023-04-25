<?php
require_once(__DIR__ . "/../../partials/nav.php");

$products = [];
$db = getDB();
$query = "SELECT id, name, description, category, stock, unit_price, image, visibility from Products WHERE stock > 0 AND visibility = 1";
$params = null;

if (isset($_GET["product"]) && isset($_GET["sort"])) {
    $search = se($_GET, "product", "", false);
    if ($search != "") {
        $query .= " AND (name LIKE :product OR category LIKE :product) ";
        $params[":product"] = "%$search%";
    }

    if ( se($_GET, "sort", "", false) != "") {
        $sort = se($_GET, "sort", "", false);
        $query .= " ORDER BY $sort ASC";
    }
}
else if (isset($_GET["sort"])) {
    if ( se($_GET, "sort", "", false) != "") {
        $sort = se($_GET, "sort", "", false);
        $query .= " ORDER BY $sort ASC";
    }
}
else if (isset($_GET["product"])) {
    $search = se($_GET, "product", "", false);
    if ($search != "") {
        $query .= " AND (name LIKE :product OR category LIKE :product) ";
        $params[":product"] = "%$search%";
    }
}

$query .= " LIMIT 10";

//echo("Query: ");
//var_dump($query);
//echo("Params: ");
//var_dump($params);


$stmt = $db->prepare($query);
try {
    if ($params == null) {
        $stmt->execute();
    }
    else {
        $stmt->execute($params);
    }

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $products = $results;
        //var_dump($products);
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}

?>

<div class="container-fluid">
    <h1 class="title">Shop</h1>
    <div style="margin-top:20px">
        <form id="search-form" method="GET" class="row row-cols-lg-auto g-3 align-items-center" >
            <div class="input-group mb-3" >
                <?php if (se($_GET, "product", "", false)) : ?>
                    <input class="form-control" type="search" name="product" placeholder="Product Filter" value=<?php echo($search)?> />
                    <input class="btn btn-primary" type="submit" value="Search"/>
                <?php else : ?>
                    <input class="form-control" type="search" name="product" placeholder="Product Filter" style="margin-right:1px" />
                    <input class="btn btn-primary" type="submit" value="Search"/>
                <?php endif; ?>
                <select name="sort" id="sort" style="margin-left:12px">   
                    <!-- None, Name, Category, Stock, Price -->
                    <!-- could've added the php inline with the select statement but too lazy to fix that now -->
                    <?php if ($sort == "name") : ?>
                        <option type="submit" class="form-control" style="font-weight: bold;" value=""><strong>Sort By: </strong></option>
                        <option type="submit" class="form-control" value="name" selected>Name</option>
                        <option type="submit" class="form-control" value="category">Category</option>
                        <option type="submit" class="form-control" value="stock">Stock</option>
                        <option type="submit" class="form-control" value="unit_price">Price</option>
                    <?php elseif ($sort == "category") : ?>
                        <option type="submit" class="form-control" style="font-weight: bold;" value=""><strong>Sort By: </strong></option>
                        <option type="submit" class="form-control" value="name">Name</option>
                        <option type="submit" class="form-control" value="category" selected>Category</option>
                        <option type="submit" class="form-control" value="stock">Stock</option>
                        <option type="submit" class="form-control" value="unit_price">Price</option>
                    <?php elseif ($sort == "stock") : ?>
                        <option type="submit" class="form-control" style="font-weight: bold;" value=""><strong>Sort By: </strong></option>
                        <option type="submit" class="form-control" value="name">Name</option>
                        <option type="submit" class="form-control" value="category">Category</option>
                        <option type="submit" class="form-control" value="stock" selected>Stock</option>
                        <option type="submit" class="form-control" value="unit_price">Price</option>
                    <?php elseif ($sort == "unit_price") : ?>
                        <option type="submit" class="form-control" style="font-weight: bold;" value=""><strong>Sort By: </strong></option>
                        <option type="submit" class="form-control" value="name">Name</option>
                        <option type="submit" class="form-control" value="category">Category</option>
                        <option type="submit" class="form-control" value="stock">Stock</option>
                        <option type="submit" class="form-control" value="unit_price" selected>Price</option>
                    <?php else : ?>
                        <option type="submit" class="form-control" style="font-weight: bold;" value="" selected><strong>Sort By: </strong></option>
                        <option type="submit" class="form-control" value="name">Name</option>
                        <option type="submit" class="form-control" value="category">Category</option>
                        <option type="submit" class="form-control" value="stock">Stock</option>
                        <option type="submit" class="form-control" value="unit_price">Price</option>
                    <?php endif; ?>
                </select>
            </div>
        </form>                     
    </div>
    <div>
        <?php if (empty($products)) : ?>
                <h1>Sorry, there are no products available right now... come back and check later!</h1>
        <?php else : ?>
            <div class="row row-cols-sm-2 row-cols-xs-1 row-cols-md-3 row-cols-lg-6 g-4" >
                <?php foreach ($products as $product) : ?>
                    <div class="col">
                        <div class="card bg-light">
                            <div class="card-header">
                                <h3 style="text-align: center;"><?php se($product, "name"); ?></h3>
                            </div>
                            <?php if (se($product, "image", "", false)) : ?>
                                <img src="<?php se($product, "image"); ?>" class="card-img-top" alt="<?php se($product, "name");?><?php echo("-Image");?>" >
                            <?php endif; ?>

                            <div class="card-body">
                                <h5 class="card-title">Category: <?php se($product, "category"); ?></h5>
                                <!-- <h5 class="card-title">Description: <?php //se($product, "description"); ?></h5> -->
                                <h5 class="card-title">Stock: <?php se($product, "stock"); ?></h5>
                            </div>
                            <div class="card-footer">
                                <h5 style="display:inline;">
                                    Price: <?php se($product, "unit_price"); ?>
                                </h5>
                                <div style="text-align: right; display:inline;">
                                    <button onclick="addToCart('<?php se($product, 'id'); ?>')" class="btn btn-primary">Add</button>
                                    <a class="btn btn-primary" href="<?php echo('view_product.php?id='); ?><?php se($product, "id"); ?>">View</a>
                                    <?php if (has_role("Admin")): ?>
                                        <a class="btn btn-primary" href="<?php echo('admin/edit_product.php?id='); ?><?php se($product, "id"); ?>">Edit</a>
                                    <?php endif; ?>
                                </div>  
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>

<script>
    // Get the select element
    const selectElement = document.getElementById("sort");

    // Add an event listener to the select element
    selectElement.addEventListener("change", function() {
    // Get the form element
    const formElement = document.getElementById("search-form");

    // Submit the form
    formElement.submit();
});
</script>

<script>
    function addToCart(product) {
        console.log("TODO purchase product", product);
        alert("It's almost like you purchased an product, but not really");
        //TODO create JS helper to update all show-balance elements
    }
</script>