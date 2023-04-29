<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Shop Project</td></tr>
<tr><td> <em>Student: </em> Nicholas Fortis (nff4)</td></tr>
<tr><td> <em>Generated: </em> 4/28/2023 9:38:43 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S23/it202-milestone-2-shop-project/grade/nff4" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone2 branch</li><li>Create a new markdown file called milestone2.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone2.md</li><li>Add/commit/push the changes to Milestone2</li><li>PR Milestone2 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 3</li><li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on github and everywhere else. Images are only accepted from dev or prod, not local host. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Users with admin or shop owner will be able to add products </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of admin create item page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235225506-79973e8f-2ae5-4275-9cd4-9b12700b08e2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of valid data filled in to create a shop item<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of populated Products table clearly showing the columns</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235225713-e4d2d3bb-b568-433e-9872-d902af510d03.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of database filled with new item data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly describe the code flow for creating a Product</td></tr>
<tr><td> <em>Response:</em> <p>So I used an HTML form with the attribute method=&quot;POST&quot; that sends the<br>data stored in the form on submit. The PHP code then checks if<br>the required attribute, &quot;name&quot;, isset and also if what the button sends, &quot;submit&quot;,<br>isset. If this condition is met, I get the database, I prepare the<br>database with my SQL query, and then execute it with the parameters associative<br>array filling in for the placeholders.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/69">https://github.com/FortisN7/IT202-008/pull/69</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/admin/create_product.php">https://nff4-prod-it202.herokuapp.com/project/admin/create_product.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Any user can see visible products on the Shop Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Shop page showing 10 items without filters/sorting applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235233809-dc0ab63c-6c67-4c87-94b2-0d39c4c454d1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the Shop page showing 10 items without filters/sorting applied<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Shop page showing both filters and a different sorting applied (should be more than 1 sample product)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235234091-4a300199-fb10-4c51-97aa-b45c750687c1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the Shop page showing both filters and a different sorting applied<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the filter/sort logic from the code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235234335-fae78b3d-0524-44a0-89b2-780a51ecdba5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot 1 of the filter/sort logic from the code<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235234555-8c0f3d6c-b159-47bf-a671-bc7b520f22cb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot 2 of the filter/sort logic from the code<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the results are shown and how the filters are applied</td></tr>
<tr><td> <em>Response:</em> <p>The results are shown by looping through the available products pulled from the<br>SQL Select query where available means visibility = 1 and stock &gt; 0.<br>This select query is modified based on what information the user wants to<br>see. I use the WHERE and LIKE clause to determine if name or<br>category have any matches to their respective columns. The values the user wants<br>to search for are obtained through a GET request when they click the<br>button associated with what they want to search for, and of course, these<br>searches are additive. Sorting uses the ORDER BY clause and I added a<br>bunch of things they can sort by to add to user experience.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/70">https://github.com/FortisN7/IT202-008/pull/70</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/71">https://github.com/FortisN7/IT202-008/pull/71</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/74">https://github.com/FortisN7/IT202-008/pull/74</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/shop.php">https://nff4-prod-it202.herokuapp.com/project/shop.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Show Admin/Shop Owner Product List (this is not the Shop page and should show visibility status) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Admin List page/results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235238182-e168ae07-2aa6-4efe-9484-97b5cd543c05.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the Admin List page/results<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the results are shown</td></tr>
<tr><td> <em>Response:</em> <p>This is very similar to the shop.php page, but a lot simpler. It<br>just does the Select query and grabs all available data about a product<br>and then fetches all results. These are then broken up into each individual<br>product using foreach where each product as their data displayed in tabular form.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/69">https://github.com/FortisN7/IT202-008/pull/69</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/admin/list_products.php">https://nff4-prod-it202.herokuapp.com/project/admin/list_products.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Admin/Shop Owner Edit button </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the edit button visible to the Admin on the Shop page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235240700-eddfac5f-8b44-4bb2-b6c0-26d3cbea3684.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing the edit button visible to the Admin on the Shop page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the edit button visible to the Admin on the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235240968-9a867904-6e7c-4479-9d76-1d87d1be96f7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing the edit button visible to the Admin on the Product Details<br>Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot showing the edit button visible to the Admin on the Admin Product List Page (The admin page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235241341-9357f3c0-2506-4b98-913c-f11f1ecf518c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing the edit button visible to the Admin on the Admin Product<br>List Page (The admin page)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a before and after screenshot of Editing a Product via the Admin Edit Product Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235241341-9357f3c0-2506-4b98-913c-f11f1ecf518c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the admin product list page before edit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235242169-3ae36282-9939-40c3-8d11-f6f34c447460.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot before edit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235242646-5ac0d790-21c5-445e-93ad-18ef5efd1336.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of admin product list page after edit<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>To edit products I chose to just use code that looks like this&nbsp;&lt;a<br>class=&quot;btn btn-primary&quot; href=&quot;edit_product.php?id=&lt;?php se($product, &quot;id&quot;); ?&gt;&quot;&gt;Edit&lt;/a&gt; which effectively acts like a GET request<br>by just appending the product id to the end of the URL and<br>handling it on the edit page where it autofills details. The autofilling is<br>pretty easy to understand. We just run a select request and store every<br>editable value as a variable and set the value of each respective thing<br>in the form to that value. When the submit button is pressed, the<br>logic is exactly the same as when you create a product, but instead<br>of INSERT we use UPDATE.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/69">https://github.com/FortisN7/IT202-008/pull/69</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/admin/list_products.php">https://nff4-prod-it202.herokuapp.com/project/admin/list_products.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/admin/edit_product.php?id=11">https://nff4-prod-it202.herokuapp.com/project/admin/edit_product.php?id=11</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Product Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the button (clickable item) that directs the user to the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235247999-bf1a29b5-15e5-46fc-9824-0b0d4cb7e2e3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing the button (clickable item) that directs the user to the Product<br>Details Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the result of the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235248194-9e471eb1-6f47-4c81-a92c-140049e8ba8f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing the result of the Product Details Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>The view button uses the same principle as the edit button from the<br>admin page. It uses the GET method so users can easily share product<br>details pages, but by appending the id manually to the view_product.php link instead<br>of submitting a form. The page then selects all of the data from<br>the database where the id matches and prints the information out. I went<br>pretty simplistic on the view page because I had already spent so much<br>time on this project.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/70">https://github.com/FortisN7/IT202-008/pull/70</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file (can be any specific item)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/view_product.php?id=4">https://nff4-prod-it202.herokuapp.com/project/view_product.php?id=4</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Add to Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the success message of adding to cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235262684-3c7dde92-9af2-4ed6-b8d4-fb352b0529bf.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the success message of adding to cart<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the error message of adding to cart (i.e., when not logged in)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235262835-5f05b5f4-b721-4dea-8cac-e2696d6d2e38.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of not logged in user adding Jeans to cart before<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235262923-585367eb-f8e4-402e-85c0-aed375353bc9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of not logged in user adding Jeans to cart after (it just<br>redirects)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Cart table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235263091-af1c6c8f-c0df-4da1-b802-ee459ac0fecf.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the Cart table with data in it (only has the jeans<br>that were just added)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Tell how your cart works (1 cart per user; multiple carts per user)</td></tr>
<tr><td> <em>Response:</em> <p>Users only get 1 cart. This makes coding the cart much easier since<br>we don&#39;t have to worry about a cart_id. When a user wants to<br>add something to their cart they must click the add button with a<br>quantity and it adds it to the cart. However, if they try to<br>add an item already in their cart, it adds it unless it&#39;s an<br>amount greater than what&#39;s in stock. If that&#39;s the case, it gets reverted<br>to the user&#39;s original desired quantity. Users can only view their carts since<br>I didn&#39;t add any GET method elements.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Explain the process of add to cart</td></tr>
<tr><td> <em>Response:</em> <p>Adding to cart is similar in a way to creating a product in<br>which we use INSERT, but there are a lot of conditions to this<br>INSERT. We are storing&nbsp;product_id, desired_quantity, unit_price, user_id, and we get the first two<br>submit form, the third one from the product table by searching with the<br>product_id, and the last one from the session. I use placeholders and the<br>bindValue() function this time around instead of a parameters associate array, but both<br>of those would get the job done. We check if the item already<br>exists in the user&#39;s cart by using ON DUPLICATE KEY so that the<br>SQL query doesn&#39;t break by trying to insert the same thing. I then<br>added some of my own logic preventing the user to get above the<br>stock with their desired quantity using an if statement inside of the query.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/72">https://github.com/FortisN7/IT202-008/pull/72</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/85">https://github.com/FortisN7/IT202-008/pull/85</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User will be able to see their Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart View</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235265432-df42eee6-e7b1-4055-9037-ba11cb0556ca.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the Cart View<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain how the cart is being shown from a code perspective along with the subtotal and total calculations</td></tr>
<tr><td> <em>Response:</em> <div>The PHP code retrieves the user's cart items from the database and displays<br>them in an HTML table format. The code first constructs a SQL query<br>that selects the cart item details including product ID, product name, price, desired<br>quantity, and subtotal. The query is executed using PDO to retrieve the results,<br>which are stored in an array named $cart. If an error occurs while<br>executing the query, the code logs the error and displays a flash message<br>to the user.</div><div><br></div><div>The retrieved cart items are then displayed in an HTML table,<br>where the user can view the product details, update the desired quantity, and<br>delete the item from the cart. The total price of all items in<br>the cart is also calculated and displayed. Subtotal is calculated inside of the<br>SQL query and total is all of the subtotals added together. If the<br>cart is empty, the table displays a message stating that there are no<br>items in the cart.</div><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/72">https://github.com/FortisN7/IT202-008/pull/72</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/cart.php">https://nff4-prod-it202.herokuapp.com/project/cart.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> User can update cart quantity </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a before and after screenshot of Cart Quantity update</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235265634-b7fcbcc5-b279-4a15-a945-c3372578d7ee.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before screenshot of Cart Quantity update (Toe Socks 500)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235265691-d6dba564-9bf2-49c6-9a64-76cb75e7a5f5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After screenshot of Cart Quantity update (Toe Socks 1000)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show a before and after screenshot of setting Cart Quantity to 0</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235265807-54238989-a4e6-4ec4-9ee4-18189fa6dca7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before screenshot of setting Cart Quantity of Jeans to 0<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235265819-d1dfa0e6-a5ac-4c73-a4bc-68e718799402.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After screenshot of setting Cart Quantity of Jeans to 0 <img src="https://user-images.githubusercontent.com/75493065/235265819-d1dfa0e6-a5ac-4c73-a4bc-68e718799402.png" alt="Image"><br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Show how a negative quantity is handled</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235265922-9b606eaa-91f7-498a-b0c9-19078c508054.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot show how a negative quantity is handled (html client-side validation prevents)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain the update process including how a value of 0 and negatives are handled</td></tr>
<tr><td> <em>Response:</em> <div>The code updates the quantity of a product in a user's cart. It<br>first prepares an SQL statement to update the desired quantity of a product<br>specified by the cart_id parameter, belonging to the user specified by user_id parameter.<br>It sets the desired quantity value using a sanitized version of the desired_quantity<br>parameter from the $_POST superglobal. If the update operation is successful, a success<br>message is displayed to the user. If there is an error during the<br>update operation, the code checks if the error code corresponds to a constraint<br>violation where the desired quantity is equal to 0. If that's the case,<br>it removes the product from the cart, and displays a success message to<br>the user. If there's another type of error, it logs the error and<br>displays a danger message to the user. The get_user_id() function is called to<br>retrieve the current user's ID, and se() function is used to sanitize the<br>inputs to avoid SQL injection.</div><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/72">https://github.com/FortisN7/IT202-008/pull/72</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/74">https://github.com/FortisN7/IT202-008/pull/74</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Cart Item Removal </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a before and after screenshot of deleting a single item from the Cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235266149-fd102814-bbc5-4353-ba66-21b2b144884f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot before deleting shirt<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235266171-513be44a-5206-4d1a-b7cc-215387a80644.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after deleting shirt<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a before and after screenshot of clearing the cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235266273-85391d5c-1d41-441a-849a-56ee516567ee.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot before emptying cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235266332-bf5f8941-dddf-4f7b-ba94-818c028c208d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot when clicking empty cart button because I added a js confirm() screen<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235266346-79ff5801-d298-4db4-bdc5-bb94eb3a6422.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after emptying cart<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how each delete process works</td></tr>
<tr><td> <em>Response:</em> <p>In the code, there are two cases, &quot;delete&quot; and &quot;delete-all&quot;. The case is<br>determined by the value of the button clicked that is sent in a<br>POST request. The &quot;delete&quot; case deletes a specific item from the user&#39;s cart<br>by setting a SQL DELETE statement. The values of user_id and cart_id are<br>bound using PDO&#39;s bindValue function, and then the query is executed. If the<br>execution is successful, a success message is displayed using the flash() function; otherwise,<br>an error message is shown. The &quot;delete-all&quot; case deletes all items from the<br>user&#39;s cart by setting a similar SQL DELETE statement, but this time, only<br>the user_id is used to delete all cart items. The code then proceeds<br>similarly to the &quot;delete&quot; case, displaying a success or error message based on<br>the query&#39;s result.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/72">https://github.com/FortisN7/IT202-008/pull/72</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/74">https://github.com/FortisN7/IT202-008/pull/74</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 10: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone2 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/235266569-aa334cfd-4ece-4289-9fa8-00f670f54538.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshots showing project board (Milestone 3&amp;4 items not on yet) (zoomed out for<br>1 image)<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S23/it202-milestone-2-shop-project/grade/nff4" target="_blank">Grading</a></td></tr></table>