<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Nicholas Fortis (nff4)</td></tr>
<tr><td> <em>Generated: </em> 4/10/2023 11:45:13 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S23/it202-milestone1-deliverable/grade/nff4" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone1 branch</li><li>Create a milestone1.md file in your Project folder</li><li>Git add/commit/push this empty file to Milestone1 (you'll need the link later)</li><li>Fill in the deliverable items<ol><li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e,&nbsp;<a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li></ol></li><li>Ensure your images display correctly in the sample markdown at the bottom</li><ol><li>NOTE: You may want to try to capture as much checklist evidence in your screenshots as possible, you do not need individual screenshots and are recommended to combine things when possible. Also, some screenshots may be reused if applicable.</li></ol><li>Save the submission items</li><li>Copy/paste the markdown from the "Copy markdown to clipboard link" or via the download button</li><li>Paste the code into the milestone1.md file or overwrite the file</li><li>Git add/commit/push the md file to Milestone1</li><li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li><li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku dev</li></ol></li><li>Make a pull request from dev to prod (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku prod</li></ol></li><li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li></ol></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231026763-f64e1800-5c9b-4e06-a564-2fe8f0421340.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>JS Email Validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231026831-1f57b25b-e3ae-454f-8887-568d058721bd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>JS Password Validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231027016-7daf0197-a87a-4263-b99f-2c1fdf8c6f82.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>JS Passwords Must Match<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231027084-2faf2f06-6443-4553-8361-cd99eb798a38.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>JS Email Already In Use<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231027147-91c9b320-71cd-4d63-a7e9-3355e6077d87.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>JS Username Already In Use<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231027442-91fc8b3c-7ac7-4852-9fd2-3b9b175a9ef4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form With Valid Data Before Submit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231027471-1af62cf5-afbf-4f6d-ae8d-e2e00b495a1e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form With Valid Data After Submit<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231028055-1bdc9035-035d-40d9-88ea-201c1d34bc1e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users Table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/10">https://github.com/FortisN7/IT202-008/pull/10</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/18">https://github.com/FortisN7/IT202-008/pull/18</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/20">https://github.com/FortisN7/IT202-008/pull/20</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Screenshots are from heroku-prod, I&#39;m sorry, I didn&#39;t see the requirement and don&#39;t<br>want to retake them. When registering, the data in the form must first<br>pass javascript (client-side) validation, and then if it makes it past that it<br>must pass PHP (server-side) validation in order for the data to be stored<br>in the database. The validation logic uses keywords in the HTML form like<br>required, maxlength, and minlength so sometimes the HTML validation does the work before<br>the javascript can but when HTML doesn&#39;t do the work like in situations<br>where the password and confirm password aren&#39;t the same then it provides a<br>warning message to the user. Once the data makes it past validation the<br>password is then encrypted using the BCRYPT algorithm and stored in the database.<br>The database is also used to make sure that there are no duplicate<br>usernames or emails. Once a user registered we can then pull the data<br>to make sure the user exists when they try to login.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231033384-a5e1eab9-9b8c-457f-8e5f-4522dab74245.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid Password<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231033578-52c48339-f3b0-4ff9-bfa1-98b9a62b28d8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Non-existent User<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231034914-ccea792e-0332-43aa-9b90-31ad32ad9772.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Login Success<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/18">https://github.com/FortisN7/IT202-008/pull/18</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/33">https://github.com/FortisN7/IT202-008/pull/33</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/34">https://github.com/FortisN7/IT202-008/pull/34</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/36">https://github.com/FortisN7/IT202-008/pull/36</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The form takes the user input of username/email and password and validates it<br>on the client-side first to save SQL queries. It then checks the database<br>for valid username/email and matching unencrypted password on the server-side if the input<br>is good on the client-side.&nbsp;<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231039101-4075a446-b834-4a45-b7f5-91b87f9c691a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful Logout<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231040265-2a87920f-a2b1-4bb4-b271-fd1b5d5d4729.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Must Be Logged In<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/15">https://github.com/FortisN7/IT202-008/pull/15</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/18">https://github.com/FortisN7/IT202-008/pull/18</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/38">https://github.com/FortisN7/IT202-008/pull/38</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>We use the is_logged_in() function to make sure that a page that was<br>being accessed was being accessed by someone that is logged in. This uses<br>cookies so if the cookies weren&#39;t working I had to change the localWorks<br>variable to false for local development but had to change it back to<br>true when deploying to Heroku.&nbsp;<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231042073-7b6897f5-c3d0-4909-a546-1f613114a427.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Not logged in Admin<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231042770-ad49866b-da35-487d-b658-972996d0a5d2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Not Admin Trying to Access Admin Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231043095-8a0364e3-e839-4834-b123-fc8202ac1958.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Roles Table from list_roles.php<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231043185-b22c39ba-6406-4d79-b6f5-92e3609486d3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Roles Table in VSC<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231043587-74203786-7738-498e-a858-98a2d6b43a90.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users with Roles from assign_roles.php<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231043696-e0c877ce-14e6-4f30-9c80-da84e5a7a2a4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>UsersRoles Table in VSC with Admin <a href="mailto:&#110;&#x66;&#x66;&#x34;&#64;&#x6e;&#106;&#x69;&#116;&#x2e;&#101;&#x64;&#x75;">&#110;&#x66;&#x66;&#x34;&#64;&#x6e;&#106;&#x69;&#116;&#x2e;&#101;&#x64;&#x75;</a><br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/17">https://github.com/FortisN7/IT202-008/pull/17</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/40">https://github.com/FortisN7/IT202-008/pull/40</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>The session is used through cookies and the helper function is_logged_in() is used<br>to make sure that the user is logged in.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>The session is used through cookies and the helper function has_role() with the<br>parameter &quot;Admin&quot; makes sure that the user is an admin.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231046332-6df01d73-2186-437c-bb95-9ccdd8ee2993.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Login<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231046354-dfbbc188-6629-4047-9a5a-245056d70648.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Register<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231046450-1bb0cdf3-ae32-4479-9f5c-f02fd7a5e9e5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p> Profile<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231046423-0581cb0f-2070-4a46-a156-81cc20fa050a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Home<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/20">https://github.com/FortisN7/IT202-008/pull/20</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>I had already merged the bootstrap branch to dev before this was done<br>so I commented out where it inserts it. The website thus looks really<br>ugly with a broken-looking link to /home.php at the top due to the<br>bootstrap not being included. Other than that I tried to keep the styling<br>as simple as possible and didn&#39;t do anything overboard since we are just<br>going to use Bootstrap anyways. However, I did get rid of the professor&#39;s<br>ugly CSS and added a lightgray background.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231042073-7b6897f5-c3d0-4909-a546-1f613114a427.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Not logged in Admin<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231042770-ad49866b-da35-487d-b658-972996d0a5d2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Not Admin Trying to Access Admin Page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231047157-c316c452-bbdd-4ed6-ab80-e143a20fa1c2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username/Email Not Found<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/17">https://github.com/FortisN7/IT202-008/pull/17</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/40">https://github.com/FortisN7/IT202-008/pull/40</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/10">https://github.com/FortisN7/IT202-008/pull/10</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>We&#39;ve been responding to error in user input with output from our flash()<br>functions which display at the top of the screen and change color depending<br>on the situation. I personally changed the color of the flash messages in<br>style.css because I wanted warning to be yellow and danger to be red<br>because I feel like that makes more sense.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231047762-9f2f9fd1-b51c-4c83-a492-f85fb8e3344c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Can see profile<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/15">https://github.com/FortisN7/IT202-008/pull/15</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>When the profile.php page is loaded, we assigned $email and $username to their<br>respective values by using the get_email() and get_user_name() functions, respectively. Then, in the<br>respective form, we use the keyword value which is set to &quot;&lt;?php se($email);<br>?&gt;&quot;.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231048696-69090347-ad5b-48e0-9e5d-05ce6d85b638.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>New Username Saved<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231048761-48e5af98-869d-4f1a-b5f0-5ed7f26717a6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p> New Email Saved<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231048974-9793be8c-52c5-4e3d-aa85-9c16ff71ff46.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>New Password Saved<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231049073-6a1b2e5a-5a2c-4ae6-880b-9931de551c41.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Password Mismatch<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231049160-dfbf0148-bf00-4426-a0e2-42a8db1d5eca.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username Taken<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231049208-acf6803f-87a2-43a9-bb65-140a6cb7870b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email Already In Use<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231049858-8c17b0c7-335b-443e-a405-eacd695de3e7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p> DB Before User Edits Profile<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231049944-0743e460-9d1c-4ecb-a769-90940ce218da.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>DB After User Edits Profile<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/15">https://github.com/FortisN7/IT202-008/pull/15</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>The profile.php code that updates the email, username, and password works in a<br>similar way to when you register because it has to make sure that<br>passwords match, the email is valid, the email/username isn&#39;t taken, etc. But once<br>it validates all this stuff, it prepares it to prevent SQL injection and<br>simply UPDATES the value in the database with the new value.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Issues and Project Board </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231050710-29951417-a31b-452a-9a89-b2b6ed9757ae.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project Board Screenshot 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/231050609-01f5e8eb-2ddf-4554-a207-a66d8b10dcd2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project Board Screenshot 2<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Include a direct link to your Project Board</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/users/FortisN7/projects/1/views/1">https://github.com/users/FortisN7/projects/1/views/1</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Prod Application Link to Login Page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/project/login.php">https://nff4-prod-it202.herokuapp.com/project/login.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S23/it202-milestone1-deliverable/grade/nff4" target="_blank">Grading</a></td></tr></table>