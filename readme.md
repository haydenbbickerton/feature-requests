# Feature Requests API (WIP)

Feature Requests is a API/SPA combo demonstrating some ways to piece together various pieces of the [Laravel](https://laravel.com/) and [Vue.js](http://vuejs.org/) ecosystems. A fictional app for helping a company create/view clients, creating feature requests from those clients, and prioritizing those feature requests.

This is the backend, the API. You can find the frontend repo - [feature-requests-app](https://github.com/haydenbbickerton/feature-requests-app)
#### [DEMO](https://feature-requests.haydenbickerton.com) - (The data is wiped every 24 hours)

### Backend Tools
* [Laravel](https://github.com/laravel/laravel) - PHP Framework
* [Dingo API](https://github.com/dingo/api) - RESTful API for storing/retrieving data.
* [Fractal](https://github.com/thephpleague/fractal) - Transformation layer for API output
* [l5-repository](https://github.com/andersao/l5-repository) - Repository pattern to abstract the database layer
* [jwt-auth](https://github.com/tymondesigns/jwt-auth) - JSON Web Token Authentication
* [Socialite](https://github.com/laravel/socialite) - OAuth authentication with Google
* [AdminLTE](https://github.com/almasaeed2010/AdminLTE) - Login page (all other UI is in the SPA)
* More

### Installation

```sh
$ git clone [git-repo-url] feature-requests-api
$ cd feature-requests-api
$ composer install
$ php artisan migrate
```

#### Configuration
Duplicate `.env.example` to `.env` and fill it out with the right info. You can get your Google Client ID/Secret from the [Google Developer Console](https://console.developers.google.com). You'll need them for the oAuth signin.

Your webserver needs to allow the `authorization` header.

License
----
[MIT](opensource.org/licenses/MIT)

###Contributing
Pull requests are welcome :)