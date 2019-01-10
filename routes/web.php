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



    // Route::get('/showfaculty/{eid}','idDetailsController@showfaculty');
    
    /*Routes for ID printing procedure*/
    Route::get('/addIdDetails','idCardController@index');
    Route::get('/webcamImage','idCardController@webcamImage');
    Route::post('/addIdDetails/submit','idCardController@store');
    Route::get('/idView/{application_id}','idCardController@show');
    
    
    Route::get('/takeApplicationId','idCardController@takeApplicationId');
    Route::post('/takeApplicationId/submit','idCardController@verifyApplicationId');

    Route::get('/editIdDetails/{application_id}','idCardController@edit');
    Route::post('/editIdDetails/submit','idCardController@update');

    Route::get('/verifyIdDetails','idCardController@verifyIdDetails');

    Route::get('/revertForIdEdit/{application_id}','idCardController@reverted');
    Route::get('/forwardForIdPrint/{application_id}','idCardController@forwarded');
    Route::get('/idsToPrint/{orientation}','idCardController@idsToPrint');


    

    /*Routes for ID printing end here*/

    

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
