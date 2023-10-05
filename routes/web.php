<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogcontroller;
use App\Http\Controllers\tagcontroller;
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

// blogs routes 
Route::get("/blogs",[blogcontroller::class,'index']);
Route::get("/blogs/create",[blogcontroller::class,'create']);
Route::post("/blogs",[blogcontroller::class,'store']);
Route::get("/blogs/{id}",[blogcontroller::class,'show']);
Route::get("/blogs/{id}/edit",[blogcontroller::class,'edit']);
Route::put("/blogs/{id}",[blogcontroller::class,'update']);

Route::delete("/blogs/{id}",[blogcontroller::class,'destroy']);

//tags routes 
Route::get("/tags",[tagcontroller::class,'index']);
Route::get("/tags/create",[tagcontroller::class,'create']);
Route::post("/tags",[tagcontroller::class,'store']);
Route::get("/tags/{id}",[tagcontroller::class,'show']);
Route::get("/tags/{id}/edit",[tagcontroller::class,'edit']);
Route::put("/tags/{id}",[tagcontroller::class,'update']);

Route::delete("/tags/{id}",[tagcontroller::class,'destroy']);
