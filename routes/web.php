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

    Route::get('/facultyreports','FacultyController@facultyreports');
    Route::get('/facultysuggestion','FacultyController@facultyreports');
    Route::post('/facultyreports','FacultyController@facultyreports');



    
    Route::get('/hodprofile',function(){
        return view('faculty.pages.hodprofile');
    });
    Route::post('/search','FacultyController@hodprofile');

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
