<h1>Task Manager</h1>
<p>By Amran Ali (U1357440)<br>
Site URL: <a href="https://selene.hud.ac.uk/u1357440/task-manager/">https://selene.hud.ac.uk/u1357440/task-manager/</a></p>
<p>This is a task manager website made in CodeIgniter. Below are some of the basic features included in this website:</p>
<ul>
    <li>Login / Register</li>
    <li>Create, Edit and Delete Projects</li>
    <li>Create, Edit and Delete Tasks</li>
</ul>

<h2>Task Model</h2>

<p>Below is a model to show how the Task Manager's features work</p>

<p>In this example there are 2 users, User A and User B</p>

<p>User A creates a project called 'Test Project One'. Only User A is able to access 'Test Project One' and any tasks within that project. If User A can add tasks in to 'Test Project One', edit them and/or delete them. If User A wishes to grant User B access to 'Test Project One', he can do so by going to the project settings page and inviting User B by incerting User B's email in to the input. User B will then have an invite ready on his home page. After accepting the invite, User B will have full access to 'Test Project One'</p>

<h2>CodeIgniter - MVC Framework</h2>

<p>One really great thing about CodeIgniter is that it is really easy to get your head around the idea of Models, Views, and Controllers. It allows you to create websites without much hastle but requires some foresight to know what code the websites next feature may require. For example, in this website, there are several instances where form inputs are hidden to pass through values to the controller. It requires some thought in the long run to know what could be required for some of the functions.</p>
