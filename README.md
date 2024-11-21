<<<<<<< HEAD
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
<h2>🔥 Testronix Reserve Backend Using Laravel 🔥 </h2>
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




>>>>>>> 7fccb17c0e9ea78601f2a0ccb4c83eb1309322f8
