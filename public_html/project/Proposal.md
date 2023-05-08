<!-- Output copied to clipboard! -->

<!-----

You have some errors, warnings, or alerts. If you are using reckless mode, turn it off to see inline alerts.
* ERRORs: 0
* WARNINGs: 0
* ALERTS: 1

Conversion time: 0.808 seconds.


Using this Markdown file:

1. Paste this output into your source file.
2. See the notes and action items below regarding this conversion run.
3. Check the rendered output (headings, lists, code blocks, tables) for proper
   formatting and use a linkchecker before you publish this page.

Conversion notes:

* Docs to Markdown version 1.0β34
* Tue Apr 25 2023 17:33:58 GMT-0700 (PDT)
* Source doc: Copy of Simple Shop IT 202 Project Proposal
* This document has images: check for >>>>>  gd2md-html alert:  inline image link in generated source and store images to your server. NOTE: Images in exported zip file from Google Docs may not appear in  the same order as they do in your doc. Please check the images!

----->


<p style="color: red; font-weight: bold">>>>>>  gd2md-html alert:  ERRORs: 0; WARNINGs: 0; ALERTS: 1.</p>
<ul style="color: red; font-weight: bold"><li>See top comment block for details on ERRORs and WARNINGs. <li>In the converted Markdown or HTML, search for inline alerts that start with >>>>>  gd2md-html alert:  for specific instances that need correction.</ul>

<p style="color: red; font-weight: bold">Links to alert messages:</p><a href="#gdcalert1">alert1</a>

<p style="color: red; font-weight: bold">>>>>> PLEASE check and correct alert issues and delete this message and the inline alerts.<hr></p>


IT 202 Project Proposal

**Project Name: Simple Shop**

**Project Summary: This project will create a simple e-commerce site for users. Administrators or store owners will be able to manage inventory and users will be able to manage their cart and place orders.**

**Github Link: [https://github.com/FortisN7/IT202-008](https://github.com/FortisN7/IT202-008)**

**Website Link: [https://nff4-prod-it202.herokuapp.com/project/home.php](https://nff4-prod-it202.herokuapp.com/project/home.php)**

**Milestone 1 Link: [https://github.com/FortisN7/IT202-008/blob/prod/public_html/project/Milestone1.md](https://github.com/FortisN7/IT202-008/blob/prod/public_html/project/Milestone1.md)**

**Milestone 2 Link: [https://github.com/FortisN7/IT202-008/blob/prod/public_html/project/Milestone2.md](https://github.com/FortisN7/IT202-008/blob/prod/public_html/project/Milestone2.md)**

**Milestone 3 Link: [https://github.com/FortisN7/IT202-008/blob/prod/public_html/project/Milestone3.md](https://github.com/FortisN7/IT202-008/blob/prod/public_html/project/Milestone3.md)**

**Youtube Video Link: []()**

**Your Name: Nicholas Fortis**

**Milestone Features:**

**	Milestone 1 (9):**



* User will be able to register a new account
    * Form Fields
        * Username, email, password, confirm password(other fields optional)
        * Email is required and must be validated
        * Username is required
        * Confirm password’s match
    * <span style="text-decoration:underline;">Users</span> Table
        * Id, username, email, password (60 characters), created, modified
    * Password must be hashed (plain text passwords will lose points)
    * Email should be unique
    * Username should be unique
    * System should let user know if username or email is taken and allow the user to correct the error without wiping/clearing the form
        * The only fields that may be cleared are the password fields
* User will be able to login to their account (given they enter the correct credentials)
    * Form
        * User can login with **email **or **username**
            * This can be done as a single field or as two separate fields
        * Password is required
    * User should see friendly error messages when an account either doesn’t exist or if passwords don’t match
    * Logging in should fetch the user’s details (and roles) and save them into the session.
    * User will be directed to a landing page upon login
        * This is a protected page (non-logged in users shouldn’t have access)
        * This can be home, profile, a dashboard, etc
* User will be able to logout
    * Logging out will redirect to login page
    * User should see a message that they’ve successfully logged out
    * Session should be destroyed (so the back button doesn’t allow them access back in)
* Basic security rules implemented
    * Authentication:
        * Function to check if user is logged in
        * Function should be called on appropriate pages that only allow logged in users
    * Roles/Authorization:
        * Have a roles table (see below)
* Basic Roles implemented
    * Have a <span style="text-decoration:underline;">Roles</span> table	(id, name, description, is_active, modified, created)
    * Have a <span style="text-decoration:underline;">User Roles</span> table (id, user_id, role_id, is_active, created, modified)
    * Include a function to check if a user has a specific role
* Site should have basic styles/theme applied; everything should be styled
    * I.e., forms/input, navigation bar, etc
* Any output messages/errors should be “user friendly”
    * Any technical errors or debug output displayed will result in a loss of points
* User will be able to see their profile
    * Email, username, etc
* User will be able to edit their profile
    * Changing username/email should properly check to see if it’s available before allowing the change
    * Any other fields should be properly validated
    * Allow password reset (only if the existing correct password is provided)
        * Hint: logic for the password check would be similar to login

	**Milestone 2 (12):**



* User with an admin role will be able to add products to inventory
    * Table should be called <span style="text-decoration:underline;">Products</span> (id, name, description, category, stock, created, modified, unit_price, image, visibility [true, false])
* Any user will be able to see products with visibility = true on the Shop page
    * Shop page will be public (i.e. doesn’t require login)
    * For now limit results to 10 most recent
    * User will be able to filter results by category
    * User will be able to filter results by partial matches on the name
    * User will be able to sort results by price
    * All filters are additive
    * **Note:** Filter and sort are two different concepts
* Admin/Shop owner will be able to see products with any visibility
    * This will be a separate page from Shop, but will be similar in displayed data
    * This page should only be accessible to the appropriate role(s)
* Admin/Shop owner will be able to edit any product
    * Edit button should be accessible for the appropriate role(s) anywhere a product is shown (Shop list, Product Details Page, Admin Product/Shop List, etc)
    * Edit name, description, category, stock, unit_price, image, visibility
* User will be able to click an item from a list and view a full page with more info about the item (Product Details Page)
    * Name, description, unit_price, stock, category
* User will be able to add items to Cart
    * User must be logged in for any Cart related activity
    * <span style="text-decoration:underline;">Cart</span> will be table-based (id, product_id, user_id, desired_quantity, unit_price, created, modified)
        * **Choose one and cross out which one you won’t support**
            * **Option 1: **If a user can have only 1 cart product_id and user_id should be a composite unique key
            * **~~Option 2: If a user can have more than 1 cart, add a field called cart_id and cart_id, user_id, and product_id will be a composite unique key~~**
    * Adding items to Cart will **not** affect the Product's quantity in the Products table
* User will be able to see their cart
    * List all the items
    * Show subtotal for each line item based on desired_quantity * unit_price (from the cart)
    * Show total cart value (sum of line item subtotals)
    * Will be able to click an item to see more details (Product Details Page)
* User will be able to change quantity of items in their cart
    * Quantity set to 0 should also remove from cart
    * A negative Quantity is not valid and should be rejected
* User will be able to remove a single item from their cart via button click
* User will be able to clear their entire cart via a button click
* Show user-friendly error messages for applicable actions
* Show user-friendly success message for applicable actions

	**Milestone 3 (6):**



* Cart page will have a button(link) to place order
* Orders will be able to be recorded
    * Create an <span style="text-decoration:underline;">Orders</span> table (id, user_id, created, total_price, address, payment_method, money_received, first_name, last_name)
        * Payment method will simply record (Cash, Visa, MasterCard, Amex, etc) We will **not** be recording CC numbers or anything of that nature, this is just a sample and in real world projects you’d commonly use a third party payment processor
        * **Hint**: This data must be inserted first before you can insert into the OrderItems table
        * **Note: **Money Received will be a user input field as part of the checkout form for sake of demo, first name and last name are used for shipping purposes
    * Create an <span style="text-decoration:underline;">OrderItems</span> table (id, order_id, product_id, quantity, unit_price)
        * Hint: This is basically a copy of the data from the Cart table, just persisted as a purchase
* Checkout Page
    * Show the items pending purchase
        * Item name, desired quantity, unit_cost, subtotal
            * If Cart.unit_cost differs from Products.unit_cost display a % change to the user
        * Show the total purchase price
        * **Hint: **This should be similar to Cart but without the interactions to adjust quantity or remove items
        * Include a link back to Cart
    * Checkout Form
        * Ask for payment method (Cash, Visa, MasterCard, Amex, etc)
        * **Do not** ask for credit card number, this is just a sample
        * Ask for a numerical value to be entered 
            * **Note: **this will be a fake payment check to compare against the cart total to determine if the payment succeeds
            * This will be recorded as money_received
        * Ask for Address/shipping information
            * You’ll need to concatenate this into a single string to insert into the DB
            * Address fields should validate correctly
            * Use this as a rough guide (likely you’ll want to prefill some of the data you already have about the user if applicable)
            * 

<p id="gdcalert1" ><span style="color: red; font-weight: bold">>>>>>  gd2md-html alert: inline image link here (to images/image1.png). Store image on your image server and adjust path/filename/extension if necessary. </span><br>(<a href="#">Back to top</a>)(<a href="#gdcalert2">Next alert</a>)<br><span style="color: red; font-weight: bold">>>>>> </span></p>


![alt_text](images/image1.png "image_tooltip")

    * Order process (comment your code for each part of the process):
        * Calculate Cart Items
            * Line item subtotal
            * Cart total
        * **Verify the current product’s unit_price against the Products table’s unit_price**
            * Since our Cart is table-based it can be long lived so if a user added a Product at a sale and they attempt to purchase afterwards, it should pull the true Product cost.
        * **Verify desired product and desired quantity are still available in the Products table**
            * Users can’t purchase more than what’s in stock
            * Show an error message and prevent order from going through if something isn’t available
            * Let the user update their cart and try again
            * Clearly show what the issue is (which product isn’t available, how much quantity is available if the cart exceeds it)
        * Make an entry into the Orders table
        * Get last Order ID from Orders table
        * Copy the cart details into the OrderItems tables with the Order ID from the previous step
        * **Update the Products table Stock for each item to deduct the Ordered Quantity**
        * Clear out the user’s cart after successful order
        * Redirect user to Order Confirmation Page
* Order Confirmation Page
        * Show the entire order details from the Order and OrderItems table (similar to cart)
            * Including a the cost of each line item and the total value
            * Show how many they purchased and how much they paid
            * Include shipping info from the Orders table
        * Display a Thank you message (customize it per your shop theme)
* User will be able to see their Purchase History
    * For now limit to 10 most recent Orders
    * Show a summary of relevant information
    * A list item can be clicked to view the full details in the Order Details Page (similar to Order Confirmation Page except no “Thank you” message)
* Store Owner will be able to see all Purchase History
    * For now limit to 10 most recent orders
    * A list item can be clicked to view the full details in the Order Details Page (similar to Order Confirmation Page except no “Thank you” message)
    * Results should show the username of the person who made the Order

	**Milestone 4 (7):**



* User can set their profile to be public or private (will need another column in Users table)
    * If profile is public, hide email address from **other** users (email address should not be publicly visible to others)
    * Profile page should list ratings/reviews they’ve given products with a link to the Product’s details page **(Depends on feature below)**
* User will be able to rate a product they purchased
    * Create table called <span style="text-decoration:underline;">Ratings</span> (id, product_id, user_id, rating, comment, created, modified)
    * 1-5 rating
    * Text Comment (use TEXT data type in sql)
    * Must be done on the Product Details Page
    * Ratings and Rating Comments will be visible on the Product Details page
        * Show the latest 10 reviews
        * Paginate anything beyond 10
    * Show the average rating on the Product Details Page
    * **Note: **A user can’t leave a rating if they haven’t purchased the product at least once
* User’s Purchase History Changes
    * Filter by date range
    * Filter by category
    * Sort by total, date purchased, etc
    * Add pagination
        * Any filter/sort applied must be followed during the pagination process
* Store Owner Purchase History Changes
    * Filter by Date Range
    * Filter by Category
    * Sort by total, date purchased, etc
    * Add pagination
        * Any filter/sort applied must be followed during the pagination process
    * The result page should show the accurate **total price** of the combined search results (i.e., if just 3 records show each of $25, it should show $75 total for this view)
* Add pagination to Shop Page
* Store Owner will be able to see all products out of stock
    * This will be added as a filter to their product list page from Milestone 2
    * Pagination should account for this new filter
    * Recommended to have the filter applied as a given value (i.e., where quantity is &lt;= value)
* User can sort products by average rating on the Shop Page
    * Hint: may want to add an “average rating” field to the Products table and update this value any time a new rating is given for the product using an aggregate function
