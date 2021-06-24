<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
use App\QrDetail;
Route::get('/', function () {
    $user=auth()->user();
    $qr_detail=QrDetail::where('user_id',$user->id)->where('status',1)
    ->orderBy('id', 'DESC')->get();
    return view('codes.active',compact('qr_detail'));
})->middleware('auth');




// Route::get('/', 'HomeController@index');

// Route::get('/home', function () {
//     return view('welcome');
// })->middleware('auth');

Route::get('/{status}','QrcodeController@active')->middleware('auth');
Route::get('delete/{id}','QrcodeController@destroy')->middleware('auth');
Route::get('pause/{id}','QrcodeController@pause')->middleware('auth');
Route::get('start/{id}','QrcodeController@start')->middleware('auth');
Route::get('download/{filename}','QrcodeController@download')->middleware('auth');
// Route::get('/navbar', function () {
//     include(public_path() . '\qrcdr\index.php');
//     // return view('/public/qrcdr.index');
// })->middleware('auth');


