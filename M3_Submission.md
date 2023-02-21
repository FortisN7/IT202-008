<table><tr><td> <em>Assignment: </em> IT202 JavaScript and CSS Challenge</td></tr>
<tr><td> <em>Student: </em> Nicholas Fortis (nff4)</td></tr>
<tr><td> <em>Generated: </em> 2/20/2023 8:47:25 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S23/it202-javascript-and-css-challenge/grade/nff4" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ul><li>Reminder: Make sure you start in dev and it's up to date<ol><li><code>git checkout dev</code></li><li><code>git pull origin dev</code></li><li><code>git checkout -b M3-Challenge-HW</code></li></ol></li></ul><ol><li>Create a copy of the template given here:&nbsp;<a href="https://gist.github.com/MattToegel/77e4b66e3c73c074ea215562ebce717c">https://gist.github.com/MattToegel/77e4b66e3c73c074ea215562ebce717c</a></li><li>Implement the changes defined in the body of the code</li><li><strong>Do not</strong>&nbsp;edit anything where the comments tell you not to edit, you will lose points for not following directions</li><li>Make changes where the comments tell you (via TODO's or just above the lines that tell you not to edit below)<ol><li><strong>Hint</strong>: Just change things in the designated&nbsp;<code>&lt;style&gt;</code>&nbsp;and&nbsp;<code>&lt;script&gt;</code>&nbsp;tags</li><li><strong>Important</strong>: The function that drives one of the challenges is&nbsp;<code>updateCurrentPage(str)</code>&nbsp;which takes 1 parameter, a string of the word to display as the current page. This function is not included in the code of the page, along with a few other things, are linked via an external js file. Make sure you do not delete this line.</li></ol></li><li>Create a branch called M3-Challenge-HW if you haven't yet</li><li>Add this template to that branch (git add/git commit)</li><li>Make a pull request for this branch once you push it</li><li>You may manually deploy the HW branch to dev to get the evidence for the below prompts</li><li>Create a new file&nbsp;<strong>m3_submission.md</strong>&nbsp;file in the hw branch and fill it with the output generated from this page (be careful not to paste more than once)</li><li>Add, commit, and push the submission file</li><li>Close the pull request by merging it to dev (double-check all looks good on dev)</li><li>Manually create a new pull request from dev to prod (i.e., base: prod &lt;- compare: dev)</li><li>Complete the merge to deploy to production</li><li>Submit the direct link of the m3_submission.md from the prod branch to Canvas for this submission</li></ol><style>` and `<script>` tags
    2. **Important**: The function that drives one of the challenges is `updateCurrentPage(str)` which takes 1 parameter, a string of the word to display as the current page. This function is not included in the code of the page, along with a few other things, are linked via an external js file. Make sure you do not delete this line.  
5. Create a branch called M3-Challenge-HW if you haven't yet
6. Add this template to that branch (git add/git commit)
7. Make a pull request for this branch once you push it
8. You may manually deploy the HW branch to dev to get the evidence for the below prompts
9. Create a new file **m3_submission.md** file in the hw branch and fill it with the output generated from this page (be careful not to paste more than once)
10. Add, commit, and push the submission file
11. Close the pull request by merging it to dev (double-check all looks good on dev)
12. Manually create a new pull request from dev to prod (i.e., base: prod <- compare: dev)
13. Complete the merge to deploy to production
14. Submit the direct link of the m3_submission.md from the prod branch to Canvas for this submission
</style></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Completed Challenge Screenshots </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> 5 Screenshots based on the checklist items for this task</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/220223284-16df9ffb-2671-4658-b5ca-4607361ee19f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>A screenshot showing the Primary page with the checklist items completed<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/220223410-9d9d6b57-1b2d-4b98-bd0a-51e7c7f73a86.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>A screenshot showing the page after the login link is clicked with URL<br>shown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/220223425-b25630b7-d4ee-43a8-a751-050a31796867.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>A screenshot showing the page after the register link is clicked with URL<br>shown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/220223453-347910d9-4d05-44d4-aa8f-b26895fcdf40.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>A screenshot showing the page after the profile link is clicked with URL<br>shown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/220223480-656ff76e-e137-4970-b37b-40c88f199da7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>A screenshot showing the page after the logout link is clicked with URL<br>shown<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Explain Solutions (Grader use this section to determine completion of each challenge) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Briefly explain how you made the navigation horizontal</td></tr>
<tr><td> <em>Response:</em> <p>I made the navigation horizontal by targeting li in nav and making the<br>display: inline-block. This works because list items default to vertical so making the<br>display inline makes them horizontal.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how you remove the navigation list item markers</td></tr>
<tr><td> <em>Response:</em> <p>I removed the navigation list item markers by targeting ul in nav and<br>making list-style: none. I actually didn&#39;t need to do this because when display<br>was set to inline-block, it removed the bullet points anyways, but I did<br>this just to make sure that they wouldn&#39;t be added.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you gave the navigation a background</td></tr>
<tr><td> <em>Response:</em> <p>I gave the navigation a background by targeting nav and setting background-color: yellow.<br>The default is whatever the background-color of the webpage is so if you<br>change an element&#39;s background-color it goes over top of that.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how you made the links (or their surrounding area) change color on mouseover/hover</td></tr>
<tr><td> <em>Response:</em> <p>I made the links change color on hover by targeting nav ul a:hover<br>which targets the anchor tags in unordered lists in navs and setting color:<br>purple. This works because when the links are hovered by the mouse it<br>changes the color to purple.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you changed the challenge list bullet points to checkmarks (✓)</td></tr>
<tr><td> <em>Response:</em> <p>I changed the challenge list bullet points to checkmarks by targeting h3~ul li::marker<br>which is all ul after the h3 tag and then all li in<br>the ul&#39;s and the marker pseudo-element lets you change those bullet points with<br>content: &quot;(symbol)&quot; in this case the symbol was the checkmark given.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain how you made the first character of the h1 tags and anchor tags uppercased</td></tr>
<tr><td> <em>Response:</em> <p>I made the first character of the h1 tags and anchor tags uppercased<br>by targeting them in CSS with nav li and h1 and using the<br>pseudo-element, ::first-letter, to select the first letter of those things. I then used<br>text-transform: uppercase to make the targeted first letter uppercased.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain/describe your custom styling of your choice</td></tr>
<tr><td> <em>Response:</em> <p>The custom styling of my choice was that I changed the background of<br>the body of the HTML. I&#39;ve worked on websites before and I like<br>using&nbsp;<a href="https://www.magicpattern.design/tools/css-backgrounds">https://www.magicpattern.design/tools/css-backgrounds</a> to make cool geometric backgrounds. So I went to that website and<br>made one and copy-pasted the CSS.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Briefly explain how the styling for the challenge list doesn't impact the navigation list</td></tr>
<tr><td> <em>Response:</em> <p>The styling for the challenge list doesn&#39;t impact the navigation list because I<br>always have nav in front of li or ul so that only li<br>or ul in nav are affected.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 9: </em> Briefly explain how you updated the content of the h1 tag with the link text</td></tr>
<tr><td> <em>Response:</em> <p>I updated the content of the h1 tag by getting the URL of<br>the page with window.location.href and then looking for # in that and then<br>passing the substring of the URL after the # to the updateCurrentPage function.<br>I also made it run the getCurrentSelection function once when the site loaded<br>for the first time and then every time the user clicks in case<br>they press a button and trigger the change in the URL.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 10: </em> Briefly explain how you updated the content of the title tag with the link text</td></tr>
<tr><td> <em>Response:</em> <p>I updated the content of the title tag by getting the URL of<br>the page with window.location.href and then looking for # in that and then<br>passing the substring of the URL after the # to the updateCurrentPage function.<br>I also made it run the getCurrentSelection function once when the site loaded<br>for the first time and then every time the user clicks in case<br>they press a button and trigger the change in the URL.&nbsp;<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Comment briefly talking about what you learned and/or any difficulties you encountered and how you resolved them (or attempted to)</td></tr>
<tr><td> <em>Response:</em> <p>I learned a bunch while doing this homework. I especially learned a lot<br>using CSS to edit the li and ul elements. When I&#39;ve used CSS<br>in the past I didn&#39;t really edit specific things (I did more general<br>element changes) like this assignment required. I also just had to google a<br>lot of the changes needed which is annoying but that&#39;s how you learn<br>in CS. I had trouble figuring out what the JavaScript wanted me to<br>do exactly since I thought the instructions were a little unclear, but I<br>figured it out eventually.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a link to your pull request (hw branch to dev only)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/5">https://github.com/FortisN7/IT202-008/pull/5</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to your solution html file from prod (again you can assume the url at this point)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="//nff4-prod-it202.herokuapp.com/M3/challenge.html">nff4-prod-it202.herokuapp.com/M3/challenge.html</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S23/it202-javascript-and-css-challenge/grade/nff4" target="_blank">Grading</a></td></tr></table>