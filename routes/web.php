<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Queue\Listener;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnSelf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Associative Array

//All Listing Data
Route::get('/', [ListingController::class, "index"]);

//Show Edit Form
Route::get('/listings/create', [ListingController::class, 'create'])->name('create');

//Store Listing Data
Route::post('/listings/store', [ListingController::class, 'store'])->name('store');

//Show Edit From
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//Deleting Listing
Route::delete('/listings/{listing}', [ListingController::class, 'delete']);









//single listed data  //do it under bcs may be hit the route first so that time id will set the fucking doing
Route::get('/listings/{id}', [ListingController::class, "show"])->name('show');






























































// -----******_______********______**********____

// This is learning purpos only
//single listing data with id
// Route::get('/listing/{id}', function ($id) {
//     return view('listing', [
//         'listing' => Listing::find($id)
//     ]);
// });


// This is learning purpos only
// Route::get('/hello', function () {

//     return response('<h1>hello world</h1>', 200)
//         ->header('Content-type', "Json")
//         ->header('foo', 'bar');
// });

// Route::get('/new_number/{id}', function ($id) {

//     return response($id);
// })->where('id', '[0-9]+');


// Route::get('/search', function (HttpRequest $request) {
//     return response($request->name . ' ' . $request->city);
// });
