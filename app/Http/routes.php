<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/insert', function() {

    $user = User::findOrFail(1);

    $address = new Address(['name' => '1216 s euclid ave ontario ca 91762']);

    $user->address()->save($address);


});


Route::get('update', function() {

    $address = Address::whereUserId(1)->first();

    $address->name = "Updated new address 1216 s euclid ave appt G Ontario Ca. 91762";

    $address->save();

});

Route::get('/read', function() {

    $user = User::find(1);

    return $user->address->name;

});


Route::get('/delete', function() {

    $user = User::findOrFail(1);

    $user->address()->delete();

    return "done";

});
