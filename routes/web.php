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

// Route::get('/', function () {
// });
Route::get('testchart','HomeController@testchart')->name('testchart');
Route::post('checkuser-active','ContactUsController@checkUserActive')->name('checkuseractive');
Route::get('/','HomeController@index')->name('home');
Route::get('terms','HomeController@terms')->name('terms');
Route::get('policy','HomeController@policy')->name('policy');
Route::get('consulting','HomeController@consulting')->name('consulting');

Route::get('/unauthorized', function () {
    return view('unauthorized')->name('unauthorized');
});
Route::post('submit-contact-form',				'ContactUsController@saveContactUs')->name('saveContactUs');

Route::post('check-master-password','ContactUsController@checkMpassword')->name('checkmpassword');
Route::get('/dashboard', 						'HomeController@dashboard')->name('dashboard');

Auth::routes();
//Profile Management
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', 						['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', 						['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', 				['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::post('upload-profile-image', 		'ProfileController@updateProfileImage')->name('updateProfileImage');
	Route::get('profile_info/{id?}' 				,'ProfileController@profile_info')->name('profile_info');



	// 8 Step process Planning tool Modules
	Route::get('/objectives/your_delete/{id?}','ObjectivesController@your_delete')->name('your_delete');
	Route::get('/objectives/their_delete/{id?}','ObjectivesController@their_delete')->name('their_delete');
	Route::get('/objectives/{id?}','ObjectivesController@objectives')->name('objectives');
	Route::get('/allplans/{id?}','ObjectivesController@allplans')->name('allplans');
	Route::post('saveobjectives','ObjectivesController@SaveObjectives')->name('saveobjectives');
	Route::post('delete-objective','ObjectivesController@deleteObjectives')->name('deleteobjectives');
	Route::post('pdf_download','ObjectivesController@pdf_download');
	Route::get('/power','PowersController@power')->name('power');
	Route::post('/savepower','PowersController@SavePower')->name('savepower');
	Route::post('/personality','CommunicationsController@personalityData')->name('personality');
	Route::post('/get-profile','CommunicationsController@profileimg')->name('profileimg');
	Route::post('/saverisk','RisksController@saverisk')->name('saverisk');
	Route::post('/delete-risk','RisksController@deleterisk')->name('deleterisk');
	Route::post('/savenegotiations','NegotiationsController@savenegotiations')->name('savenegotiations');
	Route::post('/delete-negotiate','NegotiationsController@deletenegotiations')->name('deletenegotiations');
	Route::post('store-communication','CommunicationsController@storeCommunication')->name('store-communication');
	Route::post('store-workflow',    'WorkflowController@storeWorkflow')->name('storeworkflow');
	Route::get('accept-workflow/{id?}/{user?}',    'WorkflowController@acceptWorkflow')->name('acceptworkflow');
	Route::get('edit-workflow',    'WorkflowController@editWorkflow')->name('editworkflow');
	Route::post('delete-workflow',    'WorkflowController@deleteWorkflow')->name('deleteworkflow');
	Route::post('delete-workflow-user',    'WorkflowController@deleteWorkflowUser')->name('deleteworkflowuser');
	
	Route::post('get-workflow',    'WorkflowController@getWorkflow')->name('getworkflow');
	Route::post('get-workflow-user',    'WorkflowController@getWorkflowUser')->name('getworkflowuser');
	Route::post('edit-workflow-name',    'WorkflowController@editworkflowname')->name('editworkflowname');
	Route::post('edit-workflow-user',    'WorkflowController@editworkflowuser')->name('editworkflowuser');
	Route::post('check-user',    'WorkflowController@checkworkflowuser')->name('checkworkflowuser');
});

Route::get('get-pdf', 'ChartController@getPDF');


Route::group(['middleware' => 'auth'], function () {
	
	// Admin Management 
	Route::get('add-admin',						'UserController@addAdmin')->name('addAdmin');
	Route::post('save-admin',					'UserController@saveAdmin')->name('saveAdmin');
Route::get('masterpassword','UserController@masterpassword')->name('masterpassword');
Route::post('save-mpassword','UserController@saveMpassword')->name('saveMasterPassword');
// Route::post('checkmpassword','UserController@checkMpassword')->name('checkmpassword');
Route::get('new-accounts' 				,'PageController@newaccounts')->name('newaccounts');
Route::get('active-user/{id?}' 				,'PageController@activeuser')->name('activeuser');
Route::get('preworkshop-access/{id?}' 				,'PageController@preworkshopAccess')->name('preworkshopaccess');
Route::get('feedback-access/{id?}' 				,'PageController@feedbackAccess')->name('feedbackaccess');
Route::get('planningtools-access/{id?}' 				,'PageController@planningtoolsAccess')->name('planningtoolsaccess');
	// Chart section
	Route::post('get-chart', 'ChartController@getChart');


	// pdf

	/**
     * @Created By Gaurav Bisht
     * @Created Date 06 January 2020
     * to show add variable page. 
     */
	Route::get('add-variable',   'VariableController@addVariable')->name('addVariable');

	/**
     * @Created By Gaurav Bisht
     * @Created Date 06 January 2020
     * to post variables data. 
     */
	Route::post('store-variable',    'VariableController@storeVariable')->name('storeVariable');
/**
     * @Created By Nishant Kumar
     * @Created Date 22 January 2020
     * to delete variables data. 
     */
	Route::post('delete-variable',    'VariableController@deleteVariable')->name('deleteVariable');
	/**
     * @Created By Nishant Kumar
     * @Created Date 22 January 2020
     * to delete communication data. 
     */
	Route::post('delete-communication',    'CommunicationsController@deleteCommunication')->name('deleteCommunication');
	Route::post('delete-ext-msg',    'CommunicationsController@deleteExtMsg')->name('deleteextmsg');
	Route::post('delete-int-msg',    'CommunicationsController@deleteIntMsg')->name('deleteintmsg');
	Route::post('delete-ques',    'CommunicationsController@deleteQues')->name('deleteQues');
	/**
     * @Created By Gaurav Bisht
     * @Created Date 08 January 2020
     * to show add event page. 
     */
	Route::get('add-time',   'VariableController@addTime')->name('addTime');

	/**
     * @Created By Gaurav Bisht
     * @Created Date 08 January 2020
     * to post new events data. 
     */
	Route::post('store-event',    'VariableController@storeEvent')->name('storeEvent');
	Route::post('delete-event',    'VariableController@deleteEvent')->name('deleteEvent');
	Route::post('create-graph',    'VariableController@createGraph')->name('createGraph');
/**
     * @Created By Gaurav Bisht
     * @Created Date 17 January 2020
     * to show execute page. 
     */
	Route::get('execute-offer',   'VariableController@moreOffer')->name('moreoffer');
	Route::post('delete-removeStepsRow',    'VariableController@deleteExecute')->name('deleteExecute');

	/**
     * @Created By Gaurav Bisht
     * @Created Date 21 January 2020
     * to store execute page data. 
     */
	Route::any('store-offer',    'VariableController@storeOffer')->name('storeOffer');
	//pre-workshop-survey
	
	Route::post('submit-profile-survey'			,'SurveyController@submitProfileSurvey')->name('submitProfileSurvey');
	Route::post('save-profile-survey'			,'SurveyController@saveProfileSurvey')->name('saveProfileSurvey');
	Route::get('load-questions'					,'SurveyController@loadQuestions')->name('loadQuestions');
	Route::get('pre-workshop-survey'			,'SurveyController@getPreWorkshopSurvey')->name('getPreWorkshopSurvey');

	// Feedback Survey
	
	Route::post('toggle-feedback-section'		,'SurveyController@togglefeedbackSection')->name('togglefeedbackSection');
	Route::post('submit_feedback_form'			,'SurveyController@savefeedbackForm')->name('savefeedbackForm');
	Route::get('feedback-dashboard'				,'SurveyController@feedbackDashboard')->name('feedbackDashboard');
	Route::get('feedback-survey/{id?}'			,'SurveyController@getFeedBackSurvey')->name('getFeedBackSurvey');
	Route::post('update_feedback_form/{id?}'	,'SurveyController@updatefeedbackForm')->name('updatefeedbackForm');


	//bidding game section
	
	Route::post('get-display-data' 				,'GameController@getDisplayData')->name('getDisplayData');
	Route::post('get-game-data' 				,'GameController@getGameData')->name('getGameData');
	Route::get('playback-game' 					,'GameController@playbackGamePage')->name('playbackGamePage');
	Route::post('save-bid-data' 				,'GameController@saveBidData')->name('saveBidData');
	Route::post('get-opponents' 				,'GameController@getOpponents')->name('getOpponents');
	Route::post('get-teams' 					,'GameController@getTeams')->name('getTeams');
	Route::get('bidding-game' 					,'GameController@getGamePage')->name('getGamePage');
	Route::post('feedback-report'	       		,'ReportController@feedbackChartDetails');
Route::prefix('admin')->group(function () {
	Route::middleware(['middleware' => 'admin'])->group(function () {


	// Report Section
	Route::get('download-report/{id?}'			,'ReportController@downloadReport')->name('downloadReport');
	Route::get('send-report/{id?}'				,'ReportController@sendReport')->name('sendReport');
	Route::get('detail-report/{id?}'			,'ReportController@detailReport')->name('detailReport');	
	Route::post('get-reports'					,'ReportController@getUserListForReports')->name('getReports');
	Route::get('report-list'					,'ReportController@getReportPage')->name('getReportPage');
	Route::post('feedback-report'	       		,'ReportController@feedbackChartDetails');
	Route::post('feedback_show'	        		,'ReportController@feedback_show');

	// Batch Management
	Route::get('delete-batch/{id?}'			,'BatchController@deleteBatch')->name('deleteBatch');
	Route::post('update-batch'			,'BatchController@updateBatch')->name('updateBatch');
	Route::get('edit-batch/{id?}'				,'BatchController@editBatch')->name('editBatch');
	Route::get('batch-details/{id?}'			,'BatchController@showBatchDetails')->name('showBatchDetails');
	Route::get('add-batch'						,'BatchController@getBatchForm')->name('getBatchForm');
	Route::get('batch-list'						,'BatchController@showBatch')->name('showBatch');
	Route::post('save-batch'					,'BatchController@saveBatch')->name('saveBatch');
	Route::post('batch-details'					,'BatchController@batchDetails')->name('batchDetails');

	// Team Management
	Route::post('update-team'					,'TeamController@updateTeams')->name('updateTeams');
	Route::get('edit-team/{id?}'				,'TeamController@editTeam')->name('editTeam');
	Route::get('team-details/{id?}'				,'TeamController@teamDetails')->name('teamDetails');
	Route::get('list-teams'						,'TeamController@listTeams')->name('listTeams');
	Route::post('save-teams'					,'TeamController@saveTeams')->name('saveTeams');
	Route::get('add-team'						,'TeamController@addTeamForm')->name('addTeamForm');
	Route::post('get-batch-users'				,'TeamController@getBatchUsers')->name('getBatchUsers');

	//Question Management
	Route::get('/add-questions'					,'QuestionController@getAddQuestionForm')->name('getAddQuestionForm');
	Route::get('/questions-list'				,'QuestionController@showQuestions')->name('showQuestions');
	Route::get('question-form'					,'QuestionController@questionForm')->name('questionForm');
	Route::post('save-question'					,'QuestionController@saveQuestions')->name('saveQuestions');
	Route::get('edit-question/{id?}' 			,'QuestionController@editQuestion')->name('editQuestion');
	Route::post('update-question/{id?}'			,'QuestionController@updateQuestions')->name('updateQuestions');
	Route::get('delete-question/{id?}'			,'QuestionController@deleteQuestion')->name('deleteQuestion');

	//Page Management
	Route::get('delete-detail-page/{id?}'		,'PageController@deleteDetailPage')->name('deleteDetailPage');
	Route::post('/update-detail-page/{id?}' 	,'PageController@updateDetailsPage')->name('updateDetailsPage');
	Route::get('/edit-detail-page/{id?}' 		,'PageController@editDetailPage')->name('editDetailPage');
	Route::post('/save-detail-page' 			,'PageController@saveDetailsPage')->name('saveDetailsPage');
	Route::get('/add-detail-page' 				,'PageController@addDetailPage')->name('addDetailPage');
	Route::get('details-page-list' 				,'PageController@detailPageList')->name('detailPageList');
	Route::get('/home-page-content' 			,'PageController@showPages')->name('showPages');
	Route::post('save-page/{id?}' 				,'PageController@savePage')->name('savePage');
	Route::get('edit-page/{id?}' 				,'PageController@editPage')->name('editPage');
		});
	});
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);

});


// Detail Page Management

	Route::get('/negotiation/{slug}' ,'HomeController@getDetailPage')->name('negotiation');

// Contact Form
	
	Route::get('get-queries','ContactUsController@getContactUs')->name('getContactUs');


