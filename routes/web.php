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

    // Routes for Profile Page
    Route::get('/profile','FacultyController@profile');
    Route::get('/addpaperpublications','FacultyController@addinvitations');
    Route::get('/addcourses','FacultyController@addinvitations');
    Route::get('/addpatents','FacultyController@addinvitations');
    Route::get('/addactivities','FacultyController@addinvitations');
    Route::get('/addresearchgrants','FacultyController@addresearchgrants');
    Route::get('/addindustryinteractions','FacultyController@addinvitations');
    Route::get('/addinvitations','FacultyController@addinvitations');
    Route::post('/addpaperpublications','FacultyController@addinvitations');
    Route::post('/addcourses','FacultyController@addinvitations');
    Route::post('/addpatents','FacultyController@addinvitations');
    Route::post('/addactivities','FacultyController@addinvitations');
    Route::post('/addresearchgrants','FacultyController@addresearchgrants');
    Route::post('/addindustryinteractions','FacultyController@addinvitations');
    Route::post('/addinvitations','FacultyController@addinvitations');
    


    Route::get('/displayindustryinteraction','FacultyController@displayindustryinteraction');
    Route::get('/displayactivities','FacultyController@displayactivities');
    Route::post('/addinvitations','FacultyController@addinvitations');
    Route::post('/addresearchgrants','FacultyController@addresearchgrants');
    Route::post('/addindustryinteraction','FacultyController@addindustryinteraction');
    Route::post('/addactivities','FacultyController@addactivities');
    Route::get('/paper',function(){
        return view('faculty.pages.paper_publication');
    });
    Route::post('/paper/added','FacultyController@paperpublication');
    Route::get('/course',function(){
        return view('faculty.pages.course');
    });
    Route::post('/course/added','FacultyController@faculty_courses');
    Route::get('/patent',function(){
        return view('faculty.pages.patent');
    });
    Route::post('/patent/added','FacultyController@faculty_patents');
    //END
    
    Route::get('/attendance/faculty', 'FacultyController@facultyattendance');
    Route::get('search/', 'FacultyController@searchStudent');

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


