<table><tr><td> <em>Assignment: </em> HW HTML5 Canvas Game</td></tr>
<tr><td> <em>Student: </em> Nicholas Fortis (nff4)</td></tr>
<tr><td> <em>Generated: </em> 5/4/2023 1:23:26 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S23/hw-html5-canvas-game/grade/nff4" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Create a branch for this assignment called&nbsp;<em>M6-HTML5-Canvas</em></li><li>Pick a base HTML5 game from&nbsp;<a href="https://bencentra.com/2017-07-11-basic-html5-canvas-games.html">https://bencentra.com/2017-07-11-basic-html5-canvas-games.html</a></li><li>Create a folder inside public_html called&nbsp;<em>M6</em></li><li>Create an html5.html file in your M6 folder (do not put it in Project even if you're doing arcade)</li><li>Copy one of the base games (from the above link)</li><li>Add/Commit the baseline of the game you'll mod for this assignment&nbsp;<em>(Do this before you start any mods/changes)</em></li><li>Make two significant changes<ol><li>Static changes like hard-coded colors/values will not count at all (i.e., changing shapes/colors/values that are globally defined and set only once.</li><li>Direct copies of my class example changes will not be accepted (i.e., just having an AI player for pong, rotating canvas, or multi-ball unless you make a significant tweak to it)</li><li>Significant changes are things that change with game logic or modify how the game works. Static changes like hard-coded colors/values will not count at all (i.e., changing shapes/colors/values that are globally defined and set only once). You may however change such values through game logic during runtime. (i.e., when points are scored, boundaries are hit, some action occurs, etc)</li></ol></li><li>Evidence/Screenshots<ol><li>As best as you can, gather evidence for your first significant change and fill in the deliverable items below.</li><li>As best as you can, gather evidence for your significant change and fill in the deliverable items below.</li><li>Remember to include your ucid/date as comments in any screenshots that have code</li><li>Ensure your screenshots load and are visible from the md file in step 9</li></ol></li><li>In the M6 folder create a new file called m6_submission.md</li><li>Save your below responses, generate the markdown, and paste the output to this file</li><li>Add/commit/push all related files as necessary</li><li>Merge your pull request once you're satisfied with the .md file and the canvas game mods</li><li>Create a new pull request from dev to prod and merge it</li><li>Locally checkout dev and pull the merged changes from step 12</li></ol><p>Each missed or failed to follow instruction is eligible for -0.25 from the final grade</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Game Info </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> What game did you pick to edit/modify?</td></tr>
<tr><td> <em>Response:</em> <p>I chose Collect the Squares as the game that I wanted to modify.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the direct link to the html5.html file from Heroku Prod (i.e., https://mt85-prod.herokuapp.com/M6/html5.html)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://nff4-prod-it202.herokuapp.com/M6/html5.html">https://nff4-prod-it202.herokuapp.com/M6/html5.html</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the pull request link for this assignment from M6-HTML5-Canvas to dev</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/FortisN7/IT202-008/pull/89">https://github.com/FortisN7/IT202-008/pull/89</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Significant Change #1 </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe your change/modification</td></tr>
<tr><td> <em>Response:</em> <p>My first significant change was changing the condition for losing to lives instead<br>of a countdown. Since you have to be able to lose lives, I<br>also had to add enemies. Every time a player collects a target (the<br>green square), there is a 25% chance that an enemy triangle spawns. These<br>enemies will change positions every time a target is collected. An enemy will<br>disappear if hit, but all other enemies will remain.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot of the change while playing (try your best as some changes may be nearly impossible to capture)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236115025-7358a841-21f9-43fe-ab3d-26ca61c448b9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the enemies that can spawn<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236115124-c1ffb09d-eff8-46a1-97ca-12cf66c1164f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of enemies disappearing and player losing health after hitting 2 enemies that<br>were seen above<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot of the relevant lines of code that implement your change (make sure your ucid and the date are shown in comments) In the caption briefly describe/explain how the code snippet works.</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236115610-dbe373a9-01c4-4c3b-8a8e-e90e754c136a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of code that initializes the enemy triangle values<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236115678-5f0a38b5-0470-4f19-9083-e8ac10514128.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of code that initializes the lives<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236115751-7d7972e7-d403-4776-a222-d20da9427274.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of code that generates random locations for the number of enemies that<br>are alive. Resets the positions array and then pushes new values for X<br>and Y depending on how many enemies there are.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236115803-72bb9171-560e-4d0a-aa84-291a537bf50a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of code that checks for collisions with the enemies. Takes the square<br>collision code given, but modifies it to make it check for the location<br>of all of the enemies. It then removes the locations from their respective<br>array if hit.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236115847-aec1b402-4718-436f-9c68-a9130eaaf752.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of code that draws the enemy triangles. Draws every triangle with a<br>loop and lines for drawing a triangle that I found online and modified.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Significant Change #2 </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe your change/modification</td></tr>
<tr><td> <em>Response:</em> <p>My second significant change was adding a multiplier to the scoring system.&nbsp;The multiplier<br>counts how many targets a player has gotten in a row before losing<br>a life and adds that number to the player&#39;s score. If a player<br>has been hit by an enemy, the multiplier is set to 1. I<br>would say this is a significant change because it changes the strategy and<br>makes getting hit more impactful. My high score is a 450 which is<br>significantly different to my high score in the base game which is 50.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot of the change while playing (try your best as some changes may be nearly impossible to capture)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236116554-d5c6a5fa-ca6b-4752-aa8f-3fb0c6d70d0d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of a high score and high multiplier<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236116602-40a2134b-192f-4e4e-8212-79e2f0724e55.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of my final high score of that game<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot of the relevant lines of code that implement your change (make sure your ucid and the date are shown in comments) In the caption briefly describe/explain how the code snippet works.</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236117991-c5a63937-f932-49d8-be2a-896652fd00ab.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of code that initializes the score and multiplier<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236118101-45235ac8-58f5-4cdb-bc47-c04024c55da3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of code that updates score and multiplier. A previous screenshot showed multiplier<br>being set to 1 when collision with an enemy occurs. Score += multiplier.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/75493065/236118232-49854ddb-1a4c-4243-a301-2b745bbd8758.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of code that displays the score, multiplier, and lives. Simple context.fillText code.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Discuss </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Talk about what you learned during this assignment and the related HTML5 Canvas readings (at least a few sentences for full credit)</td></tr>
<tr><td> <em>Response:</em> <div>During this assignment and the related HTML5 Canvas readings, I learned about the<br>basics of creating games using the HTML5 Canvas element. I learned how to<br>draw various shapes, lines, and images on the canvas and how to manipulate<br>their properties to create animations and game mechanics. I also learned about the<br>game loop and how it can be used to control the flow of<br>the game by updating the canvas, checking for collisions, and rendering the game<br>objects at a consistent rate. This ensures that the game runs smoothly and<br>consistently across different devices and browsers. Additionally, I learned about the importance of<br>handling collisions in games and how it can be done using simple geometric<br>calculations, such as checking if two rectangles intersect. This will allow me to<br>create more interactive and engaging games with realistic physics and movement in the<br>future. Overall, I found this assignment and the related readings to be very<br>informative and helpful in gaining a better understanding of how to create games<br>using HTML5 Canvas.</div><br></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-008-S23/hw-html5-canvas-game/grade/nff4" target="_blank">Grading</a></td></tr></table>