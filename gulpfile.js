var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Since the laravel install is just doing a login view, we'll pull the
 | stock dist files from adminLTE.
 |
 */

var paths = {
  'adminlte': './vendor/almasaeed2010/adminlte/'
}

elixir(function (mix) {
  mix
    .styles([
      paths.adminlte + 'dist/css/AdminLTE.min.css',
      paths.adminlte + 'dist/css/skins/skin-blue.css'
    ], 'public/css/adminlte.css');
});
