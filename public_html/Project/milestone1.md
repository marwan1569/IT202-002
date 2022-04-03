<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Marwan Baroud(mb25)</td></tr>
<tr><td> <em>Generated: </em> 4/3/2022 3:04:29 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone1-deliverable/grade/mb25" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol>
<li>Checkout Milestone1 branch</li>
<li>Create a milestone1.md file in your Project folder</li>
<li>Git add/commit/push this empty file to Milestone1 (you&#39;ll need the link later) </li>
<li>Fill in the deliverable items<ol>
<li>For the proposal.md file use the direct link to milestone1.md from the Milestone1 branch for all of the features  </li>
<li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e, <a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li>
</ol>
</li>
<li>Ensure your images display correctly in the sample markdown at the bottom</li>
<li>Save the submission items</li>
<li>Copy/paste the markdown from the &quot;Copy markdown to clipboard link&quot;</li>
<li>Paste the code into the milestone1.md file</li>
<li>Git add/commit/push the md file to Milestone1</li>
<li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li>
<li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Make a pull request from dev to prod (resolve any conflicts) <ol>
<li>Make sure everything looks ok on heroku</li>
</ol>
</li>
<li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li>
</ol>
</td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161435808-5daca1d1-d6b1-4785-804b-3c43e69bb9f1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Inputting an incomplete email address <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161435896-b876277b-e2b2-4662-9440-291ec23fbfb7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Inputting a password with less than 8 characters <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161435979-59bb073c-0027-4042-817c-b5507fd2f745.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Passwords don&#39;t match <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161436023-491873d3-c014-41b8-adf6-a7b63fff5769.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>What happens when we leave a field empty <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161436527-a7140186-4be5-4b9f-bd75-c090a03fc396.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Trying to register with an existing email<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161436579-be53fd47-688d-4e69-9700-bc74e6a26b21.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Trying to register with an existing username<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161436096-aaff2828-c50b-43dc-87e6-abffe474fa65.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users table from database<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/marwan1569/IT202-002/pull/13">https://github.com/marwan1569/IT202-002/pull/13</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>After filling out the required (register) form on the website. Validation will take<br>place for every input, then if every field fit the requirements, the data<br>will be sent to the database storing each content where it belongs. The<br>password will be hashed. <br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161436360-513de006-0a68-4c11-8961-fe46632e3bbf.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Trying to log in with an invalid email<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161436417-470afbbd-a000-4a4b-aae8-7f19745cdf7a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Trying to log in with a valid email, but invalid password<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161436773-dd97da15-a4ba-42e6-8588-4dc110c83a58.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful login to the admin account <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161436819-d46f7331-29ec-4436-a114-7a561333f020.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful login to a non-admin account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/marwan1569/IT202-002/pull/33">https://github.com/marwan1569/IT202-002/pull/33</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>If the username/email is in the database and the password matches, login will<br>take place and the user will have access to their account.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161436955-7471c5e4-464a-4f81-be0c-859757822dea.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful logout, redirected to home page <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161437001-d7b04e92-f35c-457c-88d6-c2c3591a8381.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Pressing the back button does not take you back to the account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/marwan1569/IT202-002/pull/14">https://github.com/marwan1569/IT202-002/pull/14</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Logging out will unset the variable and destroy the session leading back to<br>the login page.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161437001-d7b04e92-f35c-457c-88d6-c2c3591a8381.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Pressing the back button does not take you back to the account<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page (a test/dummy page is fine)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161437278-a5ff82fe-2dba-4385-8519-62e5aa48749b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>non-admin user home page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161437305-863f44ec-1ed7-4937-a93e-944f75e9c408.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Roles table showing one person with Admin role<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161437390-889b3e13-94b6-411d-8370-f41a34095a96.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>UserRoles table <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/marwan1569/IT202-002/pull/5">https://github.com/marwan1569/IT202-002/pull/5</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/marwan1569/IT202-002/pull/32  ">https://github.com/marwan1569/IT202-002/pull/32  </a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>The function: password_verfiy() checks to see if the password that was entered matches<br>with the username/email and if everything checks out, the user will be logged<br>in to his/her account only. <br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>When logged in, we get the role of the logged in user with<br>the has_role function. If the assigned user has a specific role, they will<br>be able to log in with tha<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161443526-63ef45be-4bd0-40df-8887-bc88a2ad7888.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Login page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161443547-62b8b6f4-2dde-47a3-b7da-ed6dcb4f2ab2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Register page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161443578-3cd53d9c-0515-406a-b8ed-65185fa17029.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>List role page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/marwan1569/IT202-002/pull/30">https://github.com/marwan1569/IT202-002/pull/30</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>Set the background color to gray by tagging body{} and changed to the<br>font color to blue. <br>I capitalized the first letter and changed the font<br>by using the h1, a tag and by using text-transform<br>I made the headers<br>(login, logout, etc.) large and separated them with a margin of 4px<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161438746-423fbb8f-5c72-467b-9cd4-4db0fda675c0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid password message when logging in with the wrong password<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161438783-5615f4bc-6783-4a5e-89a6-ffba5ad859d6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error message when putting an invalid email when registering<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161438894-3d77c8a8-1753-4485-a859-8276c4f6bb4e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message when successfully changing password <br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/marwan1569/IT202-002/pull/16">https://github.com/marwan1569/IT202-002/pull/16</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>Whenever there is an error, we use the flash function to show a<br>message that is relevant to what the user has done. The flash function<br>calls on getmessages to show the current message. We use the flash function<br>in almost everyone of our files.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161439497-d9247e5a-ec05-4d00-8742-855c3d71f64b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User profile page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/marwan1569/IT202-002/pull/17">https://github.com/marwan1569/IT202-002/pull/17</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/marwan1569/IT202-002/pull/18">https://github.com/marwan1569/IT202-002/pull/18</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>In the profile page, there are forms for email, username, email, and password.<br><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161439540-0bf05f77-517b-4436-9dc5-001f36d185b0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Trying to change the username, but the username is taken<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161439573-bf31f878-d649-4b6d-86ca-84d1b2698d24.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Trying to change the email, but it&#39;s taken<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161439703-440a065a-ba69-48a9-8682-5ae2d08bb303.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Changing the email, but the email is incomplete<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161439753-4db152fa-d82b-4255-8665-86e82b63db07.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Changing the password after validating the current one<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161439788-dc9f87f3-7b84-4191-82fd-7976691de2bf.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users table before editing the profile <br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161439837-73ad25ea-783b-4a8b-92ca-9539dd07750c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users table after editing username for <a href="mailto:&#x61;&#108;&#101;&#120;&#49;&#50;&#x33;&#x40;&#x67;&#x6d;&#97;&#x69;&#108;&#46;&#99;&#x6f;&#109;">&#x61;&#108;&#101;&#120;&#49;&#50;&#x33;&#x40;&#x67;&#x6d;&#97;&#x69;&#108;&#46;&#99;&#x6f;&#109;</a><br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/marwan1569/IT202-002/pull/18">https://github.com/marwan1569/IT202-002/pull/18</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/marwan1569/IT202-002/pull/17">https://github.com/marwan1569/IT202-002/pull/17</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>The username and email will be filled, and modifications are allowed. If modifications<br>to the password happens, the submitted information will be validated and a verification<br>of the update will happen.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Proposal and Issues </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing your updated proposal.md file with checkmarks, dates, and link to milestone1.md accordingly and a direct link to the path on heroku prod (see instructions)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161441110-324fc06b-0049-4767-a9b0-87de022e3619.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Updated proposal.md<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161440877-b9a7f713-2452-4af0-be82-a5de581062db.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>project board 1/3<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161440911-c3ceb6c6-badd-4390-a39c-8d74041561d7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>project board 2/3<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/98278984/161440941-180b5dcd-1ad2-4f93-b424-0ea16ceab68f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>project board 3/3<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-002-S22/it202-milestone1-deliverable/grade/mb25" target="_blank">Grading</a></td></tr></table>