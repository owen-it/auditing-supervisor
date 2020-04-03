<?php

return [
  /*
  |--------------------------------------------------------------------------
  | Auditing Supervisor Path
  |--------------------------------------------------------------------------
  |
  | This is the URI path where Supervisor will be accessible from. Feel free
  | to change this path to anything you like. Note that the URI will not
  | affect the paths of its internal API that aren't exposed to users.
  |
  */

  'path' => env('AUDIGINT_SUPERVISOR_PATH', 'auditing-supervisor'),
];