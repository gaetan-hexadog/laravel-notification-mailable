<?php

use App\Notifications\InvoiceMailable;
use App\Notifications\InvoiceMailMessage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mailable', function () {
    Notification::route('mail', 'test@laravel.com')->notify(new InvoiceMailable);
    
    echo 'Notification sent using Mailable (check your inbox)';
});

Route::get('/mailmessage', function () {
    Notification::route('mail', 'test@laravel.com')->notify(new InvoiceMailMessage);
    
    echo 'Notification sent using MailMessage (check your inbox)';
});