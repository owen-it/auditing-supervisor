<?php

use Illuminate\Support\Facades\Route;

Route::post('/supervisor-api/audits', 'MailController@index');