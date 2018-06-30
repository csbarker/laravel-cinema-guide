# laravel-cinema-guide
A RESTful API for mobile application and web services to access cinema guide listings using [Laravel](https://laravel.com/)

# Requirements
* [Nodejs & npm](https://nodejs.org/en/download/)
* [Composer](https://getcomposer.org/)
* [PHP7](http://php.net/downloads.php)
  
# Installation
* Make sure you have the requirements
* Clone the repo
* [Create and Configure your .env file](https://laravel.com/docs/5.6/configuration#environment-configuration). (This app requires a database. Tested using MySQL)
* Install the dependencies `composer install`
* Run the database migrations `php artisan migrate`
* Seed the database `php artisan db:seed`
* Start the server `php artisan serve`
* Proceed to http://localhost:8000/ and click on one of the endpoints

# Available Endpoints
| Endpoint | Description
| -------- | -------- |
| /cinemas | List of all cinemas
| /cinemas/{cinema_name}  | Individual cinema information
| /movies | List of all movies
| /movies/{movie_name} | Individual movie information
| /sessions | All sessions
| /sessions/{cinema_id} | All sessions for cinema
| /sessions/{cinema_id}/{movie_id} | All sessions for cinema and movie 
| /sessions/any/{movie_id} | All sessions for a movie

* To filter results by date please supply the date in json format.
  * Accepted date formats: `YYYY`, `YYYY-MM` and `YYYY-MM-DD`

Example:
```
POST /movies/aut%20deserunt%20tenetur
content-type: application/json
cache-control: no-cache
user-agent: PostmanRuntime/7.1.5
accept: */*
host: 127.0.0.1:8000
accept-encoding: gzip, deflate
content-length: 28
{
"date" : "2018-09-01"
}
```

# Notes
* To send/test a JSON request I recommend the use of [Postman](https://www.getpostman.com/)
