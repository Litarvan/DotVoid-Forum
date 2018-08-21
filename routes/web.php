<?php

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

/*
 * When not from Ajax request, accept any path to the main view (Vue.JS view)
 */

if (!request()->ajax()) {
    Route::get('/{vue?}', function () {
        return view('main');
    })->where('vue', '[\/\w\.-]*');
}
