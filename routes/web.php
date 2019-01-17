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

    Route::get('/exceldownload/{type}', 'MaatwebsiteController@downloadExcel');

    // Routes for Profile Page
    Route::get('/profile','FacultyController@profile');

    Route::get('/addpaperpublications','FacultyController@addpaperpublications');
    Route::post('/addpaperpublications','FacultyController@addpaperpublications');
    Route::get('/addcourses','FacultyController@addcourses');
    Route::post('/addcourses','FacultyController@addcourses');
    Route::get('/addpatents','FacultyController@addpatents');
    Route::post('/addpatents','FacultyController@addpatents');
    Route::get('/addactivities','FacultyController@addactivities');
    Route::post('/addactivities','FacultyController@addactivities');
    Route::get('/addresearchgrants','FacultyController@addresearchgrants');
    Route::post('/addresearchgrants','FacultyController@addresearchgrants');
    Route::get('/addindustryinteractions','FacultyController@addindustryinteractions');
    Route::post('/addindustryinteractions','FacultyController@addindustryinteractions');
    Route::get('/addinvitations','FacultyController@addinvitations');
    Route::post('/addinvitations','FacultyController@addinvitations');
    
    Route::get('/editpaperpublications/{id}','FacultyController@editpaperpublications');
    Route::post('/editpaperpublications','FacultyController@editpaperpublications');
    Route::get('/editcourses/{id}','FacultyController@editcourses');
    Route::post('/editcourses','FacultyController@editcourses');
    Route::get('/editpatents/{id}','FacultyController@editpatents');
    Route::post('/editpatents','FacultyController@editpatents');
    Route::get('/editactivities/{id}','FacultyController@editactivities');
    Route::post('/editactivities','FacultyController@editactivities');
    Route::get('/editresearchgrants/{id}','FacultyController@editresearchgrants');
    Route::post('/editresearchgrants','FacultyController@editresearchgrants');
    Route::get('/editindustryinteractions/{id}','FacultyController@editindustryinteractions');
    Route::post('/editindustryinteractions','FacultyController@editindustryinteractions');
    Route::get('/editinvitations/{id}','FacultyController@editinvitations');
    Route::post('/editinvitations','FacultyController@editinvitations');
    
    Route::get('/getyeardata','FacultyController@getyeardata');
    //END
    
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
