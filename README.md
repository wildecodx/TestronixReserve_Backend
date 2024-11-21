<h2>🔥 Testronix Reserve Backend Using Laravel 🔥 </h2>
  <img src="/public/visual-work.jpg" alt="visual work">
<p>How to use?</p>
<ul>
  <li>You just need to download the zip and extract it. After that download composer and install it for the dependencies.</p>
</li>
  <li>Next, download xampp apache server so that the server will run</li>
  <li>The route here is in API file and on laravel 11 there's no api file. To see the file just open terminal and run "<strong>php artisan install:api</strong>"</li>
  <li>And for the middleware i used JWT no need to setup the JWT, its already setup.</li>
  <li>Let's move now on setting up the database. On your xampp just open the phpmyadmin and create table.</li>
  <li>Once you have the table just check the .env file in the code and look for the database name. Make sure the table you created is the same on .env</li>
 <li>We are in final stage just run on the terminal <strong>php artisan migrate:fresh --seed</strong> this command will migrate the table you created. You have now the database.</li>
  <li>I suggest to use postman for API testing but before you test the backend you just need to run the server. Run the apache and in terminal just type <strong>php artisan serve</strong> </li>
    <li>After running that get the url something like http://127.0.0.1:8000 this url is the API. just paste this url in postman and test it.</li>
</ul>

<h2>API Features</h2>
<h2>Methods</h2>
<h4>This API is for frontend dev only admin side.</h4>
<p>GET - http://127.0.0.1:8000/api/dashboard | Return List of Customers including the info.</p>
<p>POST - http://127.0.0.1:8000/api/dashboard  | Reserve a room.</p>
<p>GET - http://127.0.0.1:8000/api/dashboard/{id} | Return Customer thru id.</p>
<p>PUT - http://127.0.0.1:8000/api/dashboard/{id}  | Update Customer info.</p>
<p>DELETE - http://127.0.0.1:8000/api/dashboard/{id}  | Delete specified customer.</p>

<p>This API is for frontend dev only admin side (ADD ROOMS).</p>
<p>POST - http://127.0.0.1:8000/api/addRoom | Add Rooms</p>
<p>PUT - http://127.0.0.1:8000/api/updateRoom/{id}  | Edit Rooms</p>
<p>DELETE - http://127.0.0.1:8000/api/deleteRoom/{id}  | Delete Rooms.</p>

<h4>This API is for flutter/mobile dev only.</h4>
<p>POST - http://127.0.0.1:8000/api/reservation | Store Customer</p>
<p>GET - http://127.0.0.1:8000/api/room | Fetching the rooms from frontend dev to flutter dev.</p>

<h2>Methods Authentication Middleware Used JWT</h2>
<p>POST - http://127.0.0.1:8000/api/auth/login  | Login User.</p>
<p>POST - http://127.0.0.1:8000/api/auth/register  | Register User.</p>
<p>POST - http://127.0.0.1:8000/api/auth/logout  | Logout User.</p>
<p>GET - http://127.0.0.1:8000/api/auth/me  | Profile User.</p>

<p>👏 Thanks for all the collaborators who made this project and get this things done. This project will not be finished without your help</p>

> > > > > > > 7fccb17c0e9ea78601f2a0ccb4c83eb1309322f8
