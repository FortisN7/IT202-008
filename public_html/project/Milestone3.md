<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Shop Project</td></tr>
<tr><td> <em>Student: </em> Nicholas Fortis (nff4)</td></tr>
<tr><td> <em>Generated: </em> 5/7/2023 9:47:07 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S23/it202-milestone-3-shop-project/grade/nff4" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone3 branch</li><li>Create a new markdown file called milestone3.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone3.md</li><li>Add/commit/push the changes to Milestone3</li><li>PR Milestone3 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 4</li><li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on GitHub and everywhere else. Images are only accepted from dev or prod, not localhost. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Orders will be able to be recorded </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Orders table with valid data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236659521-03a05629-bf7f-49ad-b3c8-31a4860f11ab.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the Orders table with valid data in it <img src="https://user-images.githubusercontent.com/75493065/236659521-03a05629-bf7f-49ad-b3c8-31a4860f11ab.png" alt="Image"><br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of OrderItems table with validate data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236659635-151428d3-d6ab-408f-9a5e-3be46bf93db9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of OrderItems table with validate data in it<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the purchase form UI from Heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236659743-5685ad0f-0b11-4408-a109-45aae0b21bdb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the purchase form UI from Heroku (form UI and pending items<br>are on the same page, checkout.php)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot showing the items pending purchase from Heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236659885-b7269960-a0a9-4e8a-a1ba-f89d6a9630a5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing the items pending purchase from Heroku (form UI and pending items<br>are on the same page, checkout.php) (edited the toe socks product to cost<br>to $1.99 per unit)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot showing the Order Process validations from the code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236705166-f35985a5-1158-4455-9134-e1a01fa10042.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing php verification code<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236705193-65fead8d-27ed-4163-9860-f6790b137f09.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing php verification code 2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236705255-5cf4f976-6fdc-4026-9744-d3ace371b10b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing percent diff and stock error code<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a screenshot showing the Order Process validations from the UI (Heroku)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236661714-ca01dfee-ca15-4f76-b3cb-5f828ec23a97.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing unavailable stock<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236661766-57387f35-66ca-46ae-ad54-3d9424aefbf2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing invalid money received<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly describe the code flow/process of the purchase process</td></tr>
<tr><td> <em>Response:</em> <p>On page load, all the information needed is retrieved through SQL queries and<br>if there are price differences or stock errors, those are addressed immediately. This<br>stuff is double-checked through form submission, but the user should rarely get past<br>the original protections. When the form is submitted, I do client-side and server-side<br>validation to make sure that the required data is sent and valid. If<br>it makes it past testing, I concatenate the address parts into 1 string,<br>insert into Orders, insert into OrderItems, update Products&#39; stock, and then finally clear<br>the user&#39;s cart.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/93">https://github.com/FortisN7/IT202-008/pull/93</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/94">https://github.com/FortisN7/IT202-008/pull/94</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/checkout.php">https://nff4-prod-it202.herokuapp.com/project/checkout.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Order Confirmation Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot showing the order details from the purchase form and the related items that were purchased with a thank you message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236705313-840e7492-02d6-41f4-b6d2-06b50325d490.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing order confirmation page <img src="https://user-images.githubusercontent.com/75493065/236705313-840e7492-02d6-41f4-b6d2-06b50325d490.png" alt="Image"><br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how this information is retrieved and displayed from a code logic perspective</td></tr>
<tr><td> <em>Response:</em> <p>The information is retrieved by simply finding the most recent id from Orders<br>by using the query&nbsp;&quot;SELECT id, user_id FROM Orders ORDER BY created DESC LIMIT<br>1&quot;. I get the user_id as well so that I can verify it<br>is the correct user viewing the order confirmation information. I then run a<br>query that gets the data from the Orders and OrderItems table using the<br>order id just obtained. There was also probably a better way to do<br>this next step, but what I did worked although used a bunch of<br>queries. I set up a foreach for the results of the previous query<br>where orderItems was obtained and manually added each product name to the orderItems<br>since that only had product_id stored. Finally, the display was simple and very<br>similar to my cart display so I repurposed most of that code and<br>added the Orders information like total_price, money_received, address, etc..<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/95">https://github.com/FortisN7/IT202-008/pull/95</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/order_confirmation.php">https://nff4-prod-it202.herokuapp.com/project/order_confirmation.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User will be able to see their Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history for a user</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236705442-adf05079-f52b-44ab-9a8b-1a82ef830857.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing purchase history for a user<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236705470-1f515f28-a93c-4e3a-a9e5-b688430cc4a9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing full details of a purchase (Order Details Page)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details</td></tr>
<tr><td> <em>Response:</em> <div><div>My orders.php page queries the database to retrieve the 10 most recent orders<br>made by the logged-in user and displays them with a for loop instead<br>of the foreach loop used on other pages. It queries the database using<br>a SQL statement to retrieve the order details and product information associated with<br>each order. The product information is retrieved separately from the Products table using<br>another SQL statement and is added to the order details as a new<br>field. The order details are then displayed in a table, with each order<br>appearing in a separate section. The order ID is displayed as a header<br>for each section, and the product information, price, quantity, subtotal, and a "View<br>Item" button are displayed for each product in the order. The user's purchase<br>information is under that with the total price, payment method, amount paid, first<br>name, last name, address, time ordered, and a "View Order" button which takes<br>you to the order_details page.</div></div><br>For order_details, I copied my order_confirmation page, but made<br>it able to view a GET request in the URL and hid sensitive<br>information like address and last name.<br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/96">https://github.com/FortisN7/IT202-008/pull/96</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/orders.php">https://nff4-prod-it202.herokuapp.com/project/orders.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/order_details.php?order_id=13">https://nff4-prod-it202.herokuapp.com/project/order_details.php?order_id=13</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history from multiple users</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236706314-8ba79e8f-4e69-4271-9cd4-59dca1611971.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing purchase history from multiple users<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236706370-c9fffe5e-f774-4142-8369-2c3668f35e05.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing full details of a purchase (Order Details Page)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details (mostly how it differs from the user's purchase history feature)</td></tr>
<tr><td> <em>Response:</em> <p>The logic for displaying the admin&#39;s order list is basically the same as<br>the way the user&#39;s order list is displayed except for instead of using<br>the WHERE clause in the query to search for the user&#39;s id, it<br>doesn&#39;t do that so it displays info for all users. It also now<br>needs to show the user who ordered&#39;s username so I created another query<br>in a similar manner to the way I fetched the product&#39;s names from<br>the product id&#39;s in orders but with user id&#39;s. This worked successfully, and<br>the order details page is the same as the order details page for<br>the user&#39;s orders.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/96">https://github.com/FortisN7/IT202-008/pull/96</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/admin/list_orders.php">https://nff4-prod-it202.herokuapp.com/project/admin/list_orders.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/order_details.php?order_id=11">https://nff4-prod-it202.herokuapp.com/project/order_details.php?order_id=11</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart page showing the button to place an order</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236706465-98fdc1f3-2edd-4d74-a695-1d96ebf0155a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the Cart page showing the checkout button<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236706489-b017a2ed-1319-4edb-9238-80382aaba2ef.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshots showing which issues are done/closed (project board) Incomplete Issues should not be<br>closed (Milestone3 issues)<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S23/it202-milestone-3-shop-project/grade/nff4" target="_blank">Grading</a></td></tr></table>