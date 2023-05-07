<?php
require_once(__DIR__ . "/../../partials/nav.php");

is_logged_in(true);

$query = "SELECT cart.id, product.id as pid, product.stock, product.name, product.unit_price as p_unit_price, cart.unit_price as c_unit_price, (product.unit_price * cart.desired_quantity) as subtotal, cart.desired_quantity
FROM Products as product JOIN Cart as cart on product.id = cart.product_id
WHERE cart.user_id = :uid";
$db = getDB();
$stmt = $db->prepare($query);
$cart = [];
try {
    $stmt->execute([":uid" => get_user_id()]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $cart = $results;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching cart", "danger");
}

if (count($cart) == 0 && !has_role("Admin")) {
    flash("You must have items in your cart to view this page", "danger");
    die(header("Location: shop.php"));
}

$stockError = false;

if (isset($_POST["payment_method"]) && isset($_POST["total_amount"]) && isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["country"]) && isset($_POST["zip_code"])) {
    //payment_method total_amount first_name last_name address ~apartment city state country zip_code
    $payment_method = se($_POST, "payment_method", "", false);
    $total_amount = se($_POST, "total_amount", "", false);
    $total = se($_POST, "total", "", false);
    $first_name = se($_POST, "first_name", "", false);
    $last_name = se($_POST, "last_name", "", false);
    $address = se($_POST, "address", "", false);
    $apartment = se($_POST, "apartment", "", false); //Make sure to check if not empty in address concatenation
    $city = se($_POST, "city", "", false);
    $state = se($_POST, "state", "", false);
    $country = se($_POST, "country", "", false);
    $zip_code = se($_POST, "zip_code", "", false);

    //var_dump($total);
    //var_dump($total_amount);

    if ($apartment != "") {
        $finalAddress = "$address, $apartment, $city, $state, $zip_code, $country";
    }
    else {
        $finalAddress = "$address, $city, $state, $zip_code, $country";
    }

    $hasError = false;
    // TODO: Add server side validation because users can change client side rules
    if (empty($payment_method)) {
        flash("Payment method must not be empty", "danger");
        $hasError = true;
    }

    if (empty($total_amount)) {
        flash("Total amount must not be empty", "danger");
        $hasError = true;
    }
    //nff4 5/7/23
    if ($total_amount != $total) {
        flash("Your amount paid is not equivalent to our calculated total required.", "danger");
        $hasError = true;
    }

    if (empty($first_name)) {
        flash("First name must not be empty", "danger");
        $hasError = true;
    }

    if (empty($last_name)) {
        flash("Last name must not be empty", "danger");
        $hasError = true;
    }

    if (empty($address)) {
        flash("Address must not be empty", "danger");
        $hasError = true;
    }

    if (empty($city)) {
        flash("City must not be empty", "danger");
        $hasError = true;
    }

    if (empty($state)) {
        flash("State must not be empty", "danger");
        $hasError = true;
    }

    if (empty($country)) {
        flash("Country must not be empty", "danger");
        $hasError = true;
    }

    if (empty($zip_code)) {
        flash("Zip code must not be empty", "danger");
        $hasError = true;
    }

    if ($_POST["stockError"] == false && $hasError == false) {
        $db = getDB();
        // --~id, user_id, created, total_price, address, payment_method, money_received, first_name, last_name (SELECT unit_price FROM Products WHERE id = :pid)
        $query = "INSERT INTO Orders (user_id, total_price, address, payment_method, money_received, first_name, last_name) VALUES (:uid, :tp, :addy, :pm, :mr, :fn, :ln)";
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":uid" => get_user_id(), ":tp" => $total, ":addy" => $finalAddress, ":pm" => $payment_method, ":mr" => $total_amount, ":fn" => $first_name, ":ln" => $last_name]);
            flash("Successfully purchased!");
        } catch (PDOException $e) {
            error_log(var_export($e, true));
            flash("Error purchasing.", "danger");
        }
    }
    else {
        //flash("There was an error with your purchase. Make sure you are submitting correct information. (Orders Table)", "warning");
        $hasError = true;
    }

    if ($_POST["stockError"] == false && $hasError == false) {
        $db = getDB();
        $OrderID = "";
        $query = "SELECT id FROM Orders ORDER BY created DESC LIMIT 1";
        $stmt = $db->prepare($query);
        try {
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $OrderID = $result["id"];
        } catch (PDOException $e) {
            error_log(var_export($e, true));
            flash("Error getting Order ID", "danger");
        }

        // --~id, order_id, product_id, quantity, unit_price
        $query = "INSERT INTO OrderItems (product_id, user_id, quantity, unit_price, order_id) SELECT product_id, user_id, Cart.desired_quantity, Products.unit_price, :oid FROM Cart JOIN Products on Cart.product_id = Products.id WHERE user_id = :uid";
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":oid" => $OrderID, ":uid" => get_user_id()]);
            //flash("Order History Saved");
        } catch (PDOException $e) {
            error_log(var_export($e, true));
            flash("Error fetching cart", "danger");
        }

        // Update product's stock
        $query = "UPDATE Products set stock = stock - (select IFNULL(desired_quantity, 0) FROM Cart WHERE product_id = Products.id and user_id = :uid) WHERE id in (SELECT product_id from Cart where user_id = :uid)";
        $stmt = $db->prepare($query);
        try {
            $stmt->execute([":uid" => get_user_id()]);
        } 
        catch (PDOException $e) {
            error_log("Update stock error: " . var_export($e, true));
        }

        // Clear user's cart
        $stmt =  $db->prepare("DELETE from Cart where user_id = :uid");
        try {
            $stmt->execute([":uid" => get_user_id()]);
        } catch (PDOException $e) {
            error_log("Error deleting cart: " . var_export($e, true));
        }

        die(header("Location: order_confirmation.php"));
    }
    else {
        //flash("There was an error with your purchase. Make sure you are submitting correct information. (OrderItems Table)", "warning");
        //die(header("Location: cart.php"));
    }
}



?>

<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        
        //like what is the point tho if i can just validate through html soooo redundant except for the things i can't do in html

        let noError = true;
        let payment_method = form.payment_method.value;
        let total_amount = form.total_amount.value;
        let first_name = form.first_name.value;
        let last_name = form.last_name.value;
        let address = form.address.value;
        let apartment = form.apartment.value;
        let city = form.city.value;
        let state = form.state.value;
        let country = form.country.value;
        let zip_code = form.zip_code.value

        // Uses flash() from helpers.js
        //if (total_amount != form.total.value) {
            //flash("Total amount must be equal to your total");
            //noError = false;
        //}
        if (total_amount == 0) {
            flash("Total must not be empty");
            noError = false;
        }

        if (first_name == "") {
            flash("First name must not be empty");
            noError = false;
        }

        if (last_name == "") {
            flash("Last name must not be empty");
            noError = false;
        }

        if (address == "") {
            flash("Address must not be empty");
            noError = false;
        }

        if (city == "") {
            flash("City must not be empty");
            noError = false;
        }

        if (state == "") {
            flash("State must not be empty");
            noError = false;
        }

        if (state == "0") {
            flash("You must select a country");
            noError = false;
        }

        return noError;
    }
</script>

<div class="container-fluid">
    <h1>Checkout</h1>
    <table class="table table-striped">
        <?php $total = 0.00; ?>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($cart as $c) : ?>
            <tr>
                <td><?php se($c, "name"); ?></td>
                <td>$<?php $c_unit_price = se($c, "c_unit_price", "", false); $p_unit_price = se($c, "p_unit_price", "", false); ?>
<?php $diff = (($p_unit_price - $c_unit_price)/($c_unit_price))*100?>
<?php if ($c_unit_price > $p_unit_price) : ?>
<?php se(number_format($p_unit_price, 2)) ?> <?php echo(" (" . number_format($diff, 2) . "%)") ?>
<?php elseif ($c_unit_price < $p_unit_price) : ?>
<?php se(number_format($p_unit_price, 2)) ?> <?php echo(" (+" . number_format($diff, 2) . "%)") ?>
<?php else : ?>
<?php se(number_format($p_unit_price, 2)) ?>
<?php endif; ?>
                </td>
                <td>
                    <!-- Making sure that desired_quantity is less than available stock in case stock changed after a user's cart was made -->
                    <?php $stock = se($c, "stock", "", false); $desired_quantity = se($c, "desired_quantity", "", false);?>
                    <?php if ($desired_quantity > $stock) : ?>  
                        <?php flash(se($c, "name", "", false) . "'s quantity of " . $desired_quantity . " is more than there is currently in stock, " . $stock . ". Go back to your cart to fix this.", "danger") ?>
                        <?php echo("$desired_quantity") ?> <br> <strong><?php echo("ERROR: Stock = $stock") ?></strong>
                        <?php $stockError = true; ?>
                    <?php else : ?>
                        <?php se($desired_quantity); ?>
                    <?php endif; ?>
                </td>
                <!-- Calculating the total by taking each subtotal of each item -->
                <?php $total += (float)(se($c, "subtotal", 0, false)); ?>
                <!-- There might be an adding error here, but I don't think it matters since it's insignificant and we're round at the penny for the final subtotal -->
                <td>$<?php $subtotal = se($c, "subtotal", "", false); ?><?php se(number_format($subtotal, 2)); ?>
                </td>
                <td>
                    <a style="display:inline-block" class="btn btn-primary" href="<?php echo('view_product.php?id='); ?><?php se($c, "pid"); ?>">View</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php if (count($cart) == 0) : ?>
            <tr>
                <td colspan="100%">Admins only... for debugging purposes</td>
            </tr>
        <?php endif; ?>
        <tr>
        <td colspan="100%" style="text-align:left;">
            <a style="display:inline-block; float:right" class="btn btn-primary" href="<?php echo('cart.php'); ?>">Back to Cart</a>
            Total: $<?php se(number_format($total, 2)); ?>
        </td>
        </tr>
        </tbody>
    </table>
</div>

<div id="checkout-form" class="container-fluid">
    <form onsubmit="return validate(this)" method="POST">
        <label for="payment_method">Payment Method:</label>
        <select id="payment_method" name="payment_method">
            <option value="cash">Cash</option>
            <option value="visa">Visa</option>
            <option value="mastercard">MasterCard</option>
            <option value="amex">Amex</option>
            <option value="discover">Discover</option>
            <option value="other">Other</option>
        </select>
        <br>
        <label for="total_amount">Amount Paid:</label>
        <input type="number" id="total_amount" name="total_amount" step="0.01" min="<?php se(number_format($total, 2, '.', "")) ?>" max="<?php se(number_format($total, 2, '.', "")) ?>" required>
        <br>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" maxlength="60" required>
        <br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" maxlength="60" required>
        <br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" maxlength="50" required>
        <br>
        <label for="apartment">Apartment (if applicable):</label>
        <input type="text" id="apartment" maxlength="50" name="apartment">
        <br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" maxlength="50" required>
        <br>
        <label for="state">State/Province/Region:</label>
        <input type="text" id="state" name="state" maxlength="50" required>
        <br>
        <label for="country">Country:</label>
        <select name="country" id="country">
        <option value="0" label="Select a country ... " selected="selected">Select a country ... </option>
        <optgroup id="country-optgroup-Africa" label="Africa">
            <option value="DZ" label="Algeria">Algeria</option>
            <option value="AO" label="Angola">Angola</option>
            <option value="BJ" label="Benin">Benin</option>
            <option value="BW" label="Botswana">Botswana</option>
            <option value="BF" label="Burkina Faso">Burkina Faso</option>
            <option value="BI" label="Burundi">Burundi</option>
            <option value="CM" label="Cameroon">Cameroon</option>
            <option value="CV" label="Cape Verde">Cape Verde</option>
            <option value="CF" label="Central African Republic">Central African Republic</option>
            <option value="TD" label="Chad">Chad</option>
            <option value="KM" label="Comoros">Comoros</option>
            <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
            <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
            <option value="CI" label="Côte d'Ivoire">Côte d'Ivoire</option>
            <option value="DJ" label="Djibouti">Djibouti</option>
            <option value="EG" label="Egypt">Egypt</option>
            <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
            <option value="ER" label="Eritrea">Eritrea</option>
            <option value="ET" label="Ethiopia">Ethiopia</option>
            <option value="GA" label="Gabon">Gabon</option>
            <option value="GM" label="Gambia">Gambia</option>
            <option value="GH" label="Ghana">Ghana</option>
            <option value="GN" label="Guinea">Guinea</option>
            <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
            <option value="KE" label="Kenya">Kenya</option>
            <option value="LS" label="Lesotho">Lesotho</option>
            <option value="LR" label="Liberia">Liberia</option>
            <option value="LY" label="Libya">Libya</option>
            <option value="MG" label="Madagascar">Madagascar</option>
            <option value="MW" label="Malawi">Malawi</option>
            <option value="ML" label="Mali">Mali</option>
            <option value="MR" label="Mauritania">Mauritania</option>
            <option value="MU" label="Mauritius">Mauritius</option>
            <option value="YT" label="Mayotte">Mayotte</option>
            <option value="MA" label="Morocco">Morocco</option>
            <option value="MZ" label="Mozambique">Mozambique</option>
            <option value="NA" label="Namibia">Namibia</option>
            <option value="NE" label="Niger">Niger</option>
            <option value="NG" label="Nigeria">Nigeria</option>
            <option value="RW" label="Rwanda">Rwanda</option>
            <option value="RE" label="Réunion">Réunion</option>
            <option value="SH" label="Saint Helena">Saint Helena</option>
            <option value="SN" label="Senegal">Senegal</option>
            <option value="SC" label="Seychelles">Seychelles</option>
            <option value="SL" label="Sierra Leone">Sierra Leone</option>
            <option value="SO" label="Somalia">Somalia</option>
            <option value="ZA" label="South Africa">South Africa</option>
            <option value="SD" label="Sudan">Sudan</option>
            <option value="SZ" label="Swaziland">Swaziland</option>
            <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
            <option value="TZ" label="Tanzania">Tanzania</option>
            <option value="TG" label="Togo">Togo</option>
            <option value="TN" label="Tunisia">Tunisia</option>
            <option value="UG" label="Uganda">Uganda</option>
            <option value="EH" label="Western Sahara">Western Sahara</option>
            <option value="ZM" label="Zambia">Zambia</option>
            <option value="ZW" label="Zimbabwe">Zimbabwe</option>
        </optgroup>
        <optgroup id="country-optgroup-Americas" label="Americas">
            <option value="AI" label="Anguilla">Anguilla</option>
            <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="AR" label="Argentina">Argentina</option>
            <option value="AW" label="Aruba">Aruba</option>
            <option value="BS" label="Bahamas">Bahamas</option>
            <option value="BB" label="Barbados">Barbados</option>
            <option value="BZ" label="Belize">Belize</option>
            <option value="BM" label="Bermuda">Bermuda</option>
            <option value="BO" label="Bolivia">Bolivia</option>
            <option value="BR" label="Brazil">Brazil</option>
            <option value="VG" label="British Virgin Islands">British Virgin Islands</option>
            <option value="CA" label="Canada">Canada</option>
            <option value="KY" label="Cayman Islands">Cayman Islands</option>
            <option value="CL" label="Chile">Chile</option>
            <option value="CO" label="Colombia">Colombia</option>
            <option value="CR" label="Costa Rica">Costa Rica</option>
            <option value="CU" label="Cuba">Cuba</option>
            <option value="DM" label="Dominica">Dominica</option>
            <option value="DO" label="Dominican Republic">Dominican Republic</option>
            <option value="EC" label="Ecuador">Ecuador</option>
            <option value="SV" label="El Salvador">El Salvador</option>
            <option value="FK" label="Falkland Islands">Falkland Islands</option>
            <option value="GF" label="French Guiana">French Guiana</option>
            <option value="GL" label="Greenland">Greenland</option>
            <option value="GD" label="Grenada">Grenada</option>
            <option value="GP" label="Guadeloupe">Guadeloupe</option>
            <option value="GT" label="Guatemala">Guatemala</option>
            <option value="GY" label="Guyana">Guyana</option>
            <option value="HT" label="Haiti">Haiti</option>
            <option value="HN" label="Honduras">Honduras</option>
            <option value="JM" label="Jamaica">Jamaica</option>
            <option value="MQ" label="Martinique">Martinique</option>
            <option value="MX" label="Mexico">Mexico</option>
            <option value="MS" label="Montserrat">Montserrat</option>
            <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
            <option value="NI" label="Nicaragua">Nicaragua</option>
            <option value="PA" label="Panama">Panama</option>
            <option value="PY" label="Paraguay">Paraguay</option>
            <option value="PE" label="Peru">Peru</option>
            <option value="PR" label="Puerto Rico">Puerto Rico</option>
            <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
            <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="LC" label="Saint Lucia">Saint Lucia</option>
            <option value="MF" label="Saint Martin">Saint Martin</option>
            <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
            <option value="SR" label="Suriname">Suriname</option>
            <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
            <option value="US" label="United States">United States</option>
            <option value="UY" label="Uruguay">Uruguay</option>
            <option value="VE" label="Venezuela">Venezuela</option>
        </optgroup>
        <optgroup id="country-optgroup-Asia" label="Asia">
            <option value="AF" label="Afghanistan">Afghanistan</option>
            <option value="AM" label="Armenia">Armenia</option>
            <option value="AZ" label="Azerbaijan">Azerbaijan</option>
            <option value="BH" label="Bahrain">Bahrain</option>
            <option value="BD" label="Bangladesh">Bangladesh</option>
            <option value="BT" label="Bhutan">Bhutan</option>
            <option value="BN" label="Brunei">Brunei</option>
            <option value="KH" label="Cambodia">Cambodia</option>
            <option value="CN" label="China">China</option>
            <option value="GE" label="Georgia">Georgia</option>
            <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
            <option value="IN" label="India">India</option>
            <option value="ID" label="Indonesia">Indonesia</option>
            <option value="IR" label="Iran">Iran</option>
            <option value="IQ" label="Iraq">Iraq</option>
            <option value="IL" label="Israel">Israel</option>
            <option value="JP" label="Japan">Japan</option>
            <option value="JO" label="Jordan">Jordan</option>
            <option value="KZ" label="Kazakhstan">Kazakhstan</option>
            <option value="KW" label="Kuwait">Kuwait</option>
            <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
            <option value="LA" label="Laos">Laos</option>
            <option value="LB" label="Lebanon">Lebanon</option>
            <option value="MO" label="Macau SAR China">Macau SAR China</option>
            <option value="MY" label="Malaysia">Malaysia</option>
            <option value="MV" label="Maldives">Maldives</option>
            <option value="MN" label="Mongolia">Mongolia</option>
            <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
            <option value="NP" label="Nepal">Nepal</option>
            <option value="NT" label="Neutral Zone">Neutral Zone</option>
            <option value="KP" label="North Korea">North Korea</option>
            <option value="OM" label="Oman">Oman</option>
            <option value="PK" label="Pakistan">Pakistan</option>
            <option value="PS" label="Palestinian Territories">Palestinian Territories</option>
            <option value="YD" label="People's Democratic Republic of Yemen">People's Democratic Republic of Yemen</option>
            <option value="PH" label="Philippines">Philippines</option>
            <option value="QA" label="Qatar">Qatar</option>
            <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
            <option value="SG" label="Singapore">Singapore</option>
            <option value="KR" label="South Korea">South Korea</option>
            <option value="LK" label="Sri Lanka">Sri Lanka</option>
            <option value="SY" label="Syria">Syria</option>
            <option value="TW" label="Taiwan">Taiwan</option>
            <option value="TJ" label="Tajikistan">Tajikistan</option>
            <option value="TH" label="Thailand">Thailand</option>
            <option value="TL" label="Timor-Leste">Timor-Leste</option>
            <option value="TR" label="Turkey">Turkey</option>
            <option value="TM" label="Turkmenistan">Turkmenistan</option>
            <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
            <option value="UZ" label="Uzbekistan">Uzbekistan</option>
            <option value="VN" label="Vietnam">Vietnam</option>
            <option value="YE" label="Yemen">Yemen</option>
        </optgroup>
        <optgroup id="country-optgroup-Europe" label="Europe">
            <option value="AL" label="Albania">Albania</option>
            <option value="AD" label="Andorra">Andorra</option>
            <option value="AT" label="Austria">Austria</option>
            <option value="BY" label="Belarus">Belarus</option>
            <option value="BE" label="Belgium">Belgium</option>
            <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="BG" label="Bulgaria">Bulgaria</option>
            <option value="HR" label="Croatia">Croatia</option>
            <option value="CY" label="Cyprus">Cyprus</option>
            <option value="CZ" label="Czech Republic">Czech Republic</option>
            <option value="DK" label="Denmark">Denmark</option>
            <option value="DD" label="East Germany">East Germany</option>
            <option value="EE" label="Estonia">Estonia</option>
            <option value="FO" label="Faroe Islands">Faroe Islands</option>
            <option value="FI" label="Finland">Finland</option>
            <option value="FR" label="France">France</option>
            <option value="DE" label="Germany">Germany</option>
            <option value="GI" label="Gibraltar">Gibraltar</option>
            <option value="GR" label="Greece">Greece</option>
            <option value="GG" label="Guernsey">Guernsey</option>
            <option value="HU" label="Hungary">Hungary</option>
            <option value="IS" label="Iceland">Iceland</option>
            <option value="IE" label="Ireland">Ireland</option>
            <option value="IM" label="Isle of Man">Isle of Man</option>
            <option value="IT" label="Italy">Italy</option>
            <option value="JE" label="Jersey">Jersey</option>
            <option value="LV" label="Latvia">Latvia</option>
            <option value="LI" label="Liechtenstein">Liechtenstein</option>
            <option value="LT" label="Lithuania">Lithuania</option>
            <option value="LU" label="Luxembourg">Luxembourg</option>
            <option value="MK" label="Macedonia">Macedonia</option>
            <option value="MT" label="Malta">Malta</option>
            <option value="FX" label="Metropolitan France">Metropolitan France</option>
            <option value="MD" label="Moldova">Moldova</option>
            <option value="MC" label="Monaco">Monaco</option>
            <option value="ME" label="Montenegro">Montenegro</option>
            <option value="NL" label="Netherlands">Netherlands</option>
            <option value="NO" label="Norway">Norway</option>
            <option value="PL" label="Poland">Poland</option>
            <option value="PT" label="Portugal">Portugal</option>
            <option value="RO" label="Romania">Romania</option>
            <option value="RU" label="Russia">Russia</option>
            <option value="SM" label="San Marino">San Marino</option>
            <option value="RS" label="Serbia">Serbia</option>
            <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro</option>
            <option value="SK" label="Slovakia">Slovakia</option>
            <option value="SI" label="Slovenia">Slovenia</option>
            <option value="ES" label="Spain">Spain</option>
            <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="SE" label="Sweden">Sweden</option>
            <option value="CH" label="Switzerland">Switzerland</option>
            <option value="UA" label="Ukraine">Ukraine</option>
            <option value="SU" label="Union of Soviet Socialist Republics">Union of Soviet Socialist Republics</option>
            <option value="GB" label="United Kingdom">United Kingdom</option>
            <option value="VA" label="Vatican City">Vatican City</option>
            <option value="AX" label="Åland Islands">Åland Islands</option>
        </optgroup>
        <optgroup id="country-optgroup-Oceania" label="Oceania">
            <option value="AS" label="American Samoa">American Samoa</option>
            <option value="AQ" label="Antarctica">Antarctica</option>
            <option value="AU" label="Australia">Australia</option>
            <option value="BV" label="Bouvet Island">Bouvet Island</option>
            <option value="IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="CX" label="Christmas Island">Christmas Island</option>
            <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
            <option value="CK" label="Cook Islands">Cook Islands</option>
            <option value="FJ" label="Fiji">Fiji</option>
            <option value="PF" label="French Polynesia">French Polynesia</option>
            <option value="TF" label="French Southern Territories">French Southern Territories</option>
            <option value="GU" label="Guam">Guam</option>
            <option value="HM" label="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
            <option value="KI" label="Kiribati">Kiribati</option>
            <option value="MH" label="Marshall Islands">Marshall Islands</option>
            <option value="FM" label="Micronesia">Micronesia</option>
            <option value="NR" label="Nauru">Nauru</option>
            <option value="NC" label="New Caledonia">New Caledonia</option>
            <option value="NZ" label="New Zealand">New Zealand</option>
            <option value="NU" label="Niue">Niue</option>
            <option value="NF" label="Norfolk Island">Norfolk Island</option>
            <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="PW" label="Palau">Palau</option>
            <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
            <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
            <option value="WS" label="Samoa">Samoa</option>
            <option value="SB" label="Solomon Islands">Solomon Islands</option>
            <option value="GS" label="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
            <option value="TK" label="Tokelau">Tokelau</option>
            <option value="TO" label="Tonga">Tonga</option>
            <option value="TV" label="Tuvalu">Tuvalu</option>
            <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
            <option value="VU" label="Vanuatu">Vanuatu</option>
            <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
        </optgroup>
        </select>
        <br>
        <label for="zip_code">Zip/Postal Code:</label>
        <input type="text" id="zip_code" name="zip_code" pattern="\d{5}" required>
        <br>
        <input name="stockError" type="hidden" value="<?php se($stockError) ?>" >
        <input type="hidden" name="total" value="<?php se(number_format($total, 2, ".", "")); ?>" />
        <input type="submit" <?php if ($stockError) : ?> disabled value="Stock not available" <?php else : ?> value="Submit Order" <?php endif; ?>>
    </form>
<div>

<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>