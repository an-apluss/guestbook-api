<?php
/*  Here we are telling the api guard to use the jwt driver, 
*   and we are setting the api guard as the default
*/

return [
  'defaults' => [
    'guard' => 'api',
    'passwords' => 'users'
  ],

  'guards' => [
    'api' => [
      'driver' => 'jwt',
      'provider' => 'users'
    ]
  ],

  'providers' => [
    'users' => [
      'driver' => 'eloquent',
      'model' => \App\User::class
    ]
  ]
];