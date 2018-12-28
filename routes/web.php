<?php



/*

|--------------------------------------------------------------------------

| Application Routes

|--------------------------------------------------------------------------

|

| Here is where you can register all of the routes for an application.

| It's a breeze. Simply tell Laravel the URIs it should respond to

| and give it the Closure to execute when that URI is requested.

|

*/


/**
 * Group Route to redirect all the routes with prefix faculty
 */


Route::group(['prefix'=>'staff', 'middleware' => 'admin'], function() {

    Route::get('/home', 'FacultyController@index');

    Route::get('/profile','FacultyController@profile');
    
    Route::get('/attendance/faculty', 'FacultyController@facultyattendance');
    Route::get('search/', 'FacultyController@searchStudent');

    /*Routes for clerk enrolling students in different semesters*/
    Route::get('/examdept/updatestudents','ExamDeptController@index');
    Route::post('/verifyterm','ExamDeptController@verifyTerm');
    Route::get('/submit_UIDs','ExamDeptController@addByUid');
    Route::get('/fetch_students','ExamDeptController@fetchStudents');
    Route::get('/add_to_db','ExamDeptController@addToDB');
    Route::get('/remove_from_db','ExamDeptController@removeFromDB');
    /*Our routes complete here*/

    
    Route::get('/update/add','StudentDetailController@create');
    // Route::get('/update/add','StudentDetailController@addStudent');
    Route::get('/update/edit','StudentDetailController@takeuid');
    Route::post('/passid', 'StudentDetailController@passid');
    Route::get('/edit/{name}', 'StudentDetailController@edit');
    Route::post('/update/{name?}', 'StudentDetailController@update');
    Route::post('/store', 'StudentDetailController@store');


});



Route::group(['prefix' => 'theme'], function(){
    Route::get('/red', 'ThemeController@red');
    Route::get('/blue', 'ThemeController@blue');
});

Route::get('login', 'OauthController@login');
//Route::get('social/redirect/google', 'OauthController@redirectToProvider');
//Route::get('social/handle/google', 'OauthController@handleProviderCallback');
Route::resource('remarks', 'CommentController');
Route::get('/logout', 'SessionController@logout');
Route::get('/', 'SessionController@home');

?>
