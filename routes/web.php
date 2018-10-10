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

Auth::routes();
/*
	Home Controller is used to get the dashboard of both student member and coordinator
*/
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


/*
	Alumni Controller is used to get the list of alumni for both student member and coordinator
	Alumni Controller is used to get the profile of each alum
	Alumni Controller is used to edit notes related to alum
	Alumni Controller is used to add alum in database
	Alumni Controller is used to edit alum

*/
Route::get('/viewdata','AlumniController@get')->name('viewdata');
Route::get('/viewdata_s','AlumniController@get_s')->name('viewdata_s');
Route::get('/year/{year}','AlumniController@getyear');
Route::post('/notesedit/{id}','AlumniController@editnotes');
Route::get('/addalumni','AlumniController@open')->name('addalumni');
//this function opens the window for addition of data of a new alumnus
Route::post('/addalumni','AlumniController@index');//this route posts request for addition of a new alumnus
Route::post('/editalumnidata','AlumniController@editdata');//edits data of an existing alumnus

Route::get('/editalum/{id}','AlumniController@editt');//opens window to edit data
Route::get('/profile/{id}','AlumniController@profile');//allows us to open profile of a particular alumnus


/*
	Tagslist Controller is used to add and delete tag to tags list

*/

Route::get('/addtag','TagslistController@index');//opens page where wen can create/delete new tags
Route::post('/addtag','TagslistController@postdata');//sends a request to create new tag
Route::post('/deletetag','TagslistController@deletedata')->name('deletetag');//sends request to delete an existing tag

/*
	Acess Controller is used to give acess to students and view student member dashboard

*/

Route::post('/access','AccessController@post')->name('access');//gives a new access to student member
Route::get('/access','AccessController@index');//opens a window where we can manage access of student members by coordinator
Route::post('/accessdelete','AccessController@deleteAccess');//deletes an existing access to Student member

/*
	Assigntag controller is used to assign tag to the alum and delete it

*/

Route::post('/assigntag/{id}','AddtagController@index');//assigns a new tag to a alumnus
Route::post('/taggdelete/{id}','AddtagController@delete');//delets tag assigned to an alumnus

Route::post('/upload_pic','FileController@upload_pic');//uploads profile pic
