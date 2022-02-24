<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\App;

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
Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});
//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
// Route::any('{query}', function() { return redirect('/'); })->where('query', '.*');

Route::get('lang/change', [LanguageController::class,'change'])->name('changeLang');
Route::get('language/عربي',[LanguageController::class,'arbi'])->name('arbi.language');
Route::get('language/english',[LanguageController::class,'english'])->name('english.language');

Route::get('/mail-send', [App\Http\Controllers\WelcomeController::class, 'mailSend']);
//frontend
Route::get('/', 'App\Http\Controllers\Frontend\PagesController@index')->name('home.page');

//provacy policy
Route::get('/privacy-policy', 'App\Http\Controllers\Frontend\PagesController@privacypolicy')->name('home.privacy');

//about us
Route::get('/about-us', 'App\Http\Controllers\Frontend\PagesController@aboutus')->name('home.about.us');


//membership
Route::get('/membership-plan', 'App\Http\Controllers\Frontend\PagesController@membership')->name('membership.plan');


//how page 
Route::get('/how', 'App\Http\Controllers\Frontend\PagesController@how')->name('home.how');

//contact us page 
Route::get('/contact', 'App\Http\Controllers\Frontend\PagesController@contact')->name('home.contact');

Route::post('/contact', 'App\Http\Controllers\Frontend\ContactController@store')->name('contact.store');

Route::post('/subscribe', 'App\Http\Controllers\Frontend\SubscriptionController@store')->name('subscribe.store');

//why jamtalent page 
Route::get('/why-JamTalent', 'App\Http\Controllers\Frontend\PagesController@whyJamtalent')->name('home.whyJamtalent');

//Knowledge Hub
Route::get('/knowledge-hub', 'App\Http\Controllers\Frontend\PagesController@knowledgeHub')->name('home.knowledge.hub');

//Happilancing 
Route::get('/happilancing', 'App\Http\Controllers\Frontend\PagesController@Happilancing')->name('happilancing');

//Search blog controller
Route::get('/knowledge-hub-search/{name}', 'App\Http\Controllers\Frontend\BlogController@searchKnowledgeHub')->name('home.knowledge.hub.search');
// single blog page
Route::get('/knowledge-hub{id}/{slug}', 'App\Http\Controllers\Frontend\BlogController@singleKnowledgeHub')->name('single.knowledge.hub');

// sub category
Route::get('/sub-category/{id}', 'App\Http\Controllers\Frontend\CategoryController@subCategory')->name('home.sub.category');
//apply new
Route::get('/grow-with-JamTalent', 'App\Http\Controllers\Frontend\JobController@applyIndex')->name('apply.index');
Route::post('/apply', 'App\Http\Controllers\Frontend\JobController@applyStore')->name('apply.store');
// All job
Route::get('/all-jobs', 'App\Http\Controllers\Frontend\JobController@allJob')->name('all.job');
// search job
Route::post('/search-job/', 'App\Http\Controllers\Frontend\JobController@searchJob')->name('search.job');
// All Task
Route::get('/all-Tasks', 'App\Http\Controllers\Frontend\TaskController@allTask')->name('all.Task');

// subcategory job
Route::get('/sub-category/{name}', 'App\Http\Controllers\Frontend\JobController@subCategortyJob')->name('job.sub.category');
//search subcategory job
Route::post('/sub-category/{name}', 'App\Http\Controllers\Frontend\JobController@subCategortyJobSearch')->name('job.sub.category.search');
// show single job
Route::get('/job/{id}', 'App\Http\Controllers\Backend\JobController@show')->name('job.show');
// show single Task
Route::get('/task/{id}', 'App\Http\Controllers\Frontend\TaskController@show')->name('task.show');

//all freelancer
	Route::get('all-freelancers', 'App\Http\Controllers\Frontend\FreelancerController@allFreelancer')->name('all.freelancer');
// home page freelancer
Route::group( ['prefix' => 'freelancers'], function(){
	Route::get('/{id}', 'App\Http\Controllers\Frontend\FreelancerController@show')->name('single.freelancer.profile');
	//Cover letter download
	Route::get('cover-letter-download/{id}', 'App\Http\Controllers\Frontend\FreelancerController@coverLitterDownload')->name('freelancer.coverlLitter.download');
	//cv download 
	Route::get('cv-download/{id}', 'App\Http\Controllers\Frontend\FreelancerController@cVDownload')->name('freelancer.cv.download');
	//qualification certificate download
	Route::get('qualification-Certificate/{id}', 'App\Http\Controllers\Frontend\FreelancerController@qualificationDownload')->name('freelancer.qualification.download');
	// portfolio download
	Route::get('portfolio-download/{id}', 'App\Http\Controllers\Frontend\FreelancerController@portfolioDownload')->name('freelancer.portfolio.download');
	// recomedation letter
	Route::get('recommendation-letter-download/{id}', 'App\Http\Controllers\Frontend\FreelancerController@recommendationDownload')->name('freelancer.recommendation.download');


	
});
// home page employer
Route::group( ['prefix' => 'employer'], function(){
	Route::get('profile/{id}', 'App\Http\Controllers\Backend\EmployerController@show')->name('single.employer.profile');
});

// registation
Route::get('/Register', 'App\Http\Controllers\Backend\UserController@create')->name('register.create');

// registation
Route::get('/admin/register', 'App\Http\Controllers\Backend\UserController@adminRegister')->name('admin.register');

//forget password


Route::post('/store', 'App\Http\Controllers\Backend\UserController@store')->name('register.store');
Route::post('/admin/store', 'App\Http\Controllers\Backend\UserController@adminRegisterStore')->name('admin.register.store');

Route::middleware(['auth:sanctum', 'verified:verification.notice'])->group( function () {
		// change password
		// Route::get('/change-change', 'App\Http\Controllers\Backend\UserController@changePassword')->name('change.password');
		//dashbord
		Route::get('/dashbord', 'App\Http\Controllers\Backend\PagesController@index')->name('user.dashbord');
		//membership plan
		//add membership plan
		Route::get('/add-membership', 'App\Http\Controllers\Backend\MembershipPlanController@create')->name('membership.create');
		//add membership plan store
		Route::post('/add-membership-store', 'App\Http\Controllers\Backend\MembershipPlanController@store')->name('membership.store');

		//delete membership plan
		Route::post('/membership-delete/{id}', 'App\Http\Controllers\Backend\MembershipPlanController@destroy')->name('membership.delete');

		//manage membership plan
		Route::get('/manage-membership', 'App\Http\Controllers\Backend\MembershipPlanController@manage')->name('membership.manage');

		//checkout all
		Route::get('/all-checkout', 'App\Http\Controllers\Frontend\CheckoutController@all')->name('checkout.all');
		//add blog type
		Route::get('/add-blog-category', 'App\Http\Controllers\Backend\BlogController@addBlogType')->name('blog.type.create');

		//store blog type
		Route::post('/store-blog-category', 'App\Http\Controllers\Backend\BlogController@storeBlogType')->name('blog.type.store');
		//store blog type
		Route::post('/update-blog-category/{id}', 'App\Http\Controllers\Backend\BlogController@updateBlogType')->name('blog.type.update');

		//delete blog type
		Route::post('/delete-blog-category/{id}', 'App\Http\Controllers\Backend\BlogController@deleteBlogType')->name('delete.blog.type');

		//manage BlogType
		Route::get('/manage-blog-category', 'App\Http\Controllers\Backend\BlogController@manageBlogType')->name('blog.type.manage');

		//blog post
		Route::get('/post-blog', 'App\Http\Controllers\Backend\BlogController@create')->name('blog.create');

		//post Blog
		Route::post('/post-blog', 'App\Http\Controllers\Backend\BlogController@store')->name('blog.store');

		//manage Blog
		Route::get('/manage-blog', 'App\Http\Controllers\Backend\BlogController@manage')->name('blog.manage');

		//Blog edit
		Route::get('/edit-blog/{id}', 'App\Http\Controllers\Backend\BlogController@edit')->name('blog.edit');

		Route::post('/update-blog/{id}', 'App\Http\Controllers\Backend\BlogController@update')->name('blog.update');

		//delete Blog
		Route::post('/delete-blog/{id}', 'App\Http\Controllers\Backend\BlogController@delete')->name('blog.delete');

		// add note
		Route::post('/note', 'App\Http\Controllers\Backend\UserController@storeNote')->name('note.add');

		//delete note
		Route::post('/note/{id}', 'App\Http\Controllers\Backend\UserController@deleteNote')->name('note.delete');

		//password Change
		Route::get('/password-change', 'App\Http\Controllers\Backend\UserController@chnagePasswoed')->name('change.password');

		//password Change store
		Route::post('/password-change-store', 'App\Http\Controllers\Backend\UserController@chnagePasswoedStore')->name('change.password.store');




		//super admin route start 
		Route::group( ['prefix' => 'super-admin'], function(){
			Route::get('/grow-jamtalnet', 'App\Http\Controllers\Frontend\JobController@allApply')->name('all.apply');
			Route::get('/grow-jamtalnet-download/{id}', 'App\Http\Controllers\Frontend\JobController@downloadCv')->name('download.apply');
			//bank info
			Route::get('freelancer-bank-information/{id}', 'App\Http\Controllers\Backend\FreelancerController@bankInfo')->name('freelancer.bankinfo');

			//download national id
			Route::get('/download/national-id/{id}', 'App\Http\Controllers\Backend\FreelancerController@downloadNationalId')->name('download.national.id');

			//super admin socical media
			//super admin social media
			Route::get('/social-media', 'App\Http\Controllers\Backend\FreelancerController@socialMedia')->name('super.admin.social.media');
			//add admin
			Route::get('/admin-add', 'App\Http\Controllers\Backend\AdminController@add')->name('admin.add');

			//add admin store
			Route::post('/admin-store', 'App\Http\Controllers\Backend\AdminController@store')->name('admin.store');



			//add employer
			Route::get('/employer-add', 'App\Http\Controllers\Backend\EmployerController@add')->name('employer.add');

			//add employer store
			Route::post('/employer-store', 'App\Http\Controllers\Backend\EmployerController@store')->name('employer.store');

			//add freelancer
			Route::get('/freelancer-add', 'App\Http\Controllers\Backend\FreelancerController@add')->name('freelancer.add');
			//add freelancer store
			Route::post('/freelancer-store', 'App\Http\Controllers\Backend\FreelancerController@store')->name('freelancer.store');
			//show all job each week
			Route::get('/show-job-each-week', 'App\Http\Controllers\Backend\JobController@allPostJobWeek')->name('show.job.each.week');
			//show all job each day
			Route::get('/show-job-each-day', 'App\Http\Controllers\Backend\JobController@allPostJobWeek')->name('show.job.each.day');

			//show all task each week
			Route::get('/show-task-each-week', 'App\Http\Controllers\Backend\TaskController@allPostWeek')->name('show.task.each.week');

			//show all task each week
			Route::get('/show-task-each-day', 'App\Http\Controllers\Backend\TaskController@allPostDay')->name('show.task.each.day');

			//ALL Active Order last week
				Route::get('/all-active-order-last-week', 'App\Http\Controllers\Backend\OrderController@allActiveOrderLaslWeeek')->name('all.active.order.last.week');

			// manage bid by super admin
			Route::get('/manage-bid/{id}', 'App\Http\Controllers\Backend\TaskController@manageTaskBidSuperAdmin')->name('task.bid.superAdmin');

			//ALL Active Order
				Route::get('/all-active-order', 'App\Http\Controllers\Backend\OrderController@allActiveOrder')->name('all.active.order.superAdmin');

			//ALL Active Order
			Route::get('/all-complete-order', 'App\Http\Controllers\Backend\OrderController@allCompleteOrder')->name('all.complete.order.superAdmin');

			//active Blog
		Route::post('/actvie-blog/{id}', 'App\Http\Controllers\Backend\BlogController@active')->name('blog.active');
		//en-active Blog
		Route::post('/en-actvie-blog/{id}', 'App\Http\Controllers\Backend\BlogController@enActive')->name('blog.enActive');

		// check payment
		//custom offer
		Route::get('/custom-offer/payment', 'App\Http\Controllers\Backend\CheckoutController@customOfferPaymentAll')->name('all.custom.offer.payment');
		Route::get('/task/payment', 'App\Http\Controllers\Backend\CheckoutController@taskPaymentAll')->name('task.payment.all');
		Route::get('/job/payment', 'App\Http\Controllers\Backend\CheckoutController@jobPaymentAll')->name('job.payment.all');
			
		});


		//super admin route end
		// admin route start
		Route::group( ['prefix' => 'admin'], function(){
		//update admin
			Route::get('/admin-settings', 'App\Http\Controllers\Backend\AdminController@edit')->name('admin.edit');

			Route::post('/admin-settings', 'App\Http\Controllers\Backend\AdminController@update')->name('admin.update');

			//category 
			Route::group( ['prefix' => 'category'], function(){

				//manage cateoy
				Route::get('/manage', 'App\Http\Controllers\Backend\CategoryController@index')->name('category.manage');

				//create category
				Route::get('/create', 'App\Http\Controllers\Backend\CategoryController@create')->name('category.create');
				Route::post('/create', 'App\Http\Controllers\Backend\CategoryController@store')->name('category.store');

				//update category
				Route::get('/update/{id}', 'App\Http\Controllers\Backend\CategoryController@edit')->name('category.edit');

				Route::post('/edit/{id}','App\Http\Controllers\Backend\CategoryController@update')->name('category.update');

				//delete category
				Route::post('/delete', 'App\Http\Controllers\Backend\CategoryController@destroy')->name('category.destroy');
			});

			//user management start

			// all freelancer
			Route::get('/freelancers', 'App\Http\Controllers\Backend\FreelancerController@all')->name('freelancer.all');

			// valid freelancer
			Route::post('/valid-user/{id}', 'App\Http\Controllers\Backend\FreelancerController@activeFreelancer')->name('freelancer.active');

			//en-valid freelancer
			Route::post('/en-valid-user/{id}', 'App\Http\Controllers\Backend\FreelancerController@enActive')->name('freelancer.enActive');

			// all employer
			Route::get('/employers', 'App\Http\Controllers\Backend\EmployerController@all')->name('employer.all');
			// valid employer
			Route::post('/valid-employer/{id}', 'App\Http\Controllers\Backend\EmployerController@activeEmployer')->name('employer.active');

			//user management End
			Route::get('/messages', 'App\Http\Controllers\Backend\PagesController@message')->name('admin.message');
			Route::get('/reviews', 'App\Http\Controllers\Backend\PagesController@review')->name('admin.review');
			
			Route::get('/setting', 'App\Http\Controllers\Backend\PagesController@setting')->name('admin.setting');
			//candel request from freelancer
			Route::get('/cancel-request-freelancer', 'App\Http\Controllers\Backend\OrderCancelController@allCancelRequestFreelancer')->name('all.cancel.request.freelancer');

			//confirm request from freelancer
			Route::post('/confirmed-request-freelancer/{orderId}', 'App\Http\Controllers\Backend\OrderCancelController@confirmCancelRequestFreelancer')->name('confirm.cancel.request.freelancer');

			//candel request from employer
			Route::get('/cancel-request-employer', 'App\Http\Controllers\Backend\OrderCancelController@allCancelRequestEmployer')->name('all.cancel.request.employer');

			//confirm request from freelancer
			Route::post('/confirmed-request-employer', 'App\Http\Controllers\Backend\OrderCancelController@confirmCancelRequestEmployer')->name('confirm.cancel.request.employer');
			Route::group( ['prefix' => 'job'], function(){

				//ALL POST JOB
				Route::get('/all-post-jobs', 'App\Http\Controllers\Backend\JobController@allPostJob')->name('all.post.job');

				//manage Cadidate admin
				Route::get('/manage/candidates/{id}/{userId}', 'App\Http\Controllers\Backend\JobController@manageCandidatesAdmin')->name('candidate.manage.admin');

				//ALL POST Task
				Route::get('/all-post-tasks', 'App\Http\Controllers\Backend\TaskController@allPostTask')->name('all.post.task');

				//ALL Active Order
				Route::get('/all-active-orders', 'App\Http\Controllers\Backend\OrderController@allActiveOrder')->name('all.active.order');

				//ALL Active Order
				Route::get('/all-cancel-orders', 'App\Http\Controllers\Backend\OrderController@allCancelOrder')->name('all.cancel.order');
			});

			// all admin
			Route::get('/admins', 'App\Http\Controllers\Backend\AdminController@all')->name('admin.all');

			// valid admin
			Route::post('/active-admin/{id}', 'App\Http\Controllers\Backend\AdminController@activeAdmin')->name('admin.active');

			//en-valid freelancer
			Route::post('/en-active-admin/{id}', 'App\Http\Controllers\Backend\AdminController@enActiveAdmin')->name('admin.enActive');

		// admin route end
	});
	//Freelancer route start
	Route::group( ['prefix' => 'freelancer'], function(){ 

		//freelancer setting
		Route::get('/setting', 'App\Http\Controllers\Backend\FreelancerController@edit')->name('freelancer.edit');

		//freelancer social media
		Route::get('/social-media', 'App\Http\Controllers\Backend\FreelancerController@socialMedia')->name('freelancer.social.media');
		//freelancer social media edit
		Route::post('/social-media-edit', 'App\Http\Controllers\Backend\FreelancerController@socialMediaUpdate')->name('freelancer.social.media.update');

		//freelancer social media create
		Route::post('/social-media-create', 'App\Http\Controllers\Backend\FreelancerController@socialMediaCreate')->name('freelancer.social.media.create');

		//freelancer skill
		Route::get('/skill', 'App\Http\Controllers\Backend\FreelancerController@skill')->name('freelancer.skill');

		//freelancer skill create
		Route::post('/skill-create', 'App\Http\Controllers\Backend\FreelancerController@skillCreate')->name('freelancer.skill.create');

		//freelancer skill update
		Route::post('/skill-update', 'App\Http\Controllers\Backend\FreelancerController@skillUpdate')->name('freelancer.skill.update');

		//freelancer setting
		Route::post('/setting', 'App\Http\Controllers\Backend\FreelancerController@update')->name('freelancer.update');
		//Add skill
		Route::post('/sklill', 'App\Http\Controllers\Backend\FreelancerController@addSkill')->name('freelancer.add.skill');
		//apply job
		Route::post('/apply/{id}', 'App\Http\Controllers\Backend\JobController@applyJob')->name('job.apply');
		//update cv
		Route::post('/update-cv/{id}', 'App\Http\Controllers\Backend\JobController@updateCvFreelancer')->name('update.cv.freelancer');
		
		//apply Task
		Route::post('/task-apply/{id}', 'App\Http\Controllers\Backend\TaskController@applyTask')->name('task.apply');

		// manage requested task
		Route::get('/task-manage', 'App\Http\Controllers\Backend\TaskOfferController@requestTaskManage')->name('request.task.manage');

		// confirm custom offer
		Route::post('/task-apply-confirm/{id}', 'App\Http\Controllers\Backend\TaskOfferController@confirmAppliedTask')->name('task.apply.confirm');

		//download document
		Route::get('/download-document/{id}', 'App\Http\Controllers\Backend\TaskOfferController@downloadDocumentFreelancer')->name('download.document.freelancer');

		//show my active bid
		Route::get('/active-bid', 'App\Http\Controllers\Backend\TaskController@freelancerActiveBid')->name('freelancer.active.bid');
		//update bid
		Route::post('/update-bid/{id}', 'App\Http\Controllers\Backend\TaskController@updateBidFreelancer')->name('update.bid.freelancer');
		//update bid
		Route::post('/delete-bid/{id}', 'App\Http\Controllers\Backend\TaskController@deleteBidFreelancer')->name('delete.bid.freelancer');
		//download document task order
		Route::get('/download-document-task/{id}', 'App\Http\Controllers\Backend\TaskController@downloadDocumentTaskFreelancer')->name('download.documentt.task.freelancer');

		//manage active order
		Route::get('/active-order', 'App\Http\Controllers\Backend\OrderController@freelancerActiveOrder')->name('freelancer.active.order');
		
		//place order
		Route::post('/place-order/{id}', 'App\Http\Controllers\Backend\OrderController@placeOrderFreelancer')->name('place.order.freelancer');

		//manage delivered order
		Route::get('/delivered-order', 'App\Http\Controllers\Backend\OrderController@freelancerDeliveredOrder')->name('freelancer.delivered.order');
		//manage completed order
		Route::get('/completed-order', 'App\Http\Controllers\Backend\OrderController@freelancerCompletedOrder')->name('freelancer.completed.order');
		
		//give review
		Route::post('/review-/{id}/{employerActivityId}', 'App\Http\Controllers\Backend\ReviewController@reviewOrderFreelancer')->name('review.order.freelancer');

		//manage review
		Route::get('/manage-review/', 'App\Http\Controllers\Backend\ReviewController@reviewManageFreelancer')->name('manage.review.freelancer');

		//applied job
		Route::get('/applied-job', 'App\Http\Controllers\Backend\JobController@appliedJob')->name('applied.job.manage');

		//my job list
		Route::get('/my-active-job', 'App\Http\Controllers\Backend\JobController@freelancerActiveJob')->name('freelancer.active.job');
		//manage book mark
		Route::get('/manage-bookmark/', 'App\Http\Controllers\Backend\BookmarkController@manageBookMarFreelancer')->name('manage.bookmark.freelancer');
		//bookMark Job
		Route::post('/bookmark-job/{id}', 'App\Http\Controllers\Backend\BookmarkController@bookMarkJob')->name('bookmark.job');
		//bookMark Job remove
		Route::post('/bookmark-job-remove/{id}', 'App\Http\Controllers\Backend\BookmarkController@bookMarkJobRemove')->name('bookmark.job.remove');

		//bookMark task
		Route::post('/bookmark-task/{id}', 'App\Http\Controllers\Backend\BookmarkController@bookMarkTask')->name('bookmark.task');
		//bookMark task remove
		Route::post('/bookmark-task-remove/{id}', 'App\Http\Controllers\Backend\BookmarkController@bookMarkTaskRemove')->name('bookmark.task.remove');

		//Request cancel order
		Route::post('/cancel-order/{id}', 'App\Http\Controllers\Backend\OrderCancelController@requestCancelOrderFreelancer')->name('cancel.order.freelancer');

		//Cancel requested
		Route::get('/order-cancel-requested/', 'App\Http\Controllers\Backend\OrderController@manageCancelRequectFreelancer')->name('manage.cancel.request.freelancer');

		//Cancel Order
		Route::get('/order-canceled/', 'App\Http\Controllers\Backend\OrderController@manageCancelOrderFreelancer')->name('manage.cancel.order.freelancer');

		// Add employment histroy
		Route::get('/add-history/', 'App\Http\Controllers\Backend\EmploymentHistoryController@create')->name('add.employment.history');
		// Add employment History store
		Route::post('/history-store/', 'App\Http\Controllers\Backend\EmploymentHistoryController@store')->name('employment.history.store');

		// employment manage
		Route::get('/manage-history/', 'App\Http\Controllers\Backend\EmploymentHistoryController@mange')->name('manage.employment.history');
		Route::post('/update-history/{id}', 'App\Http\Controllers\Backend\EmploymentHistoryController@update')->name('update.employment.history');
		// delete employment History
		Route::post('/delete-store/{id}', 'App\Http\Controllers\Backend\EmploymentHistoryController@delete')->name('employment.history.delete');

		//freelancer message
		Route::get('/messages/', 'App\Http\Controllers\Backend\ChatContoller@freelancerMessages')->name('freelancer.messages');
		//send message
		Route::post('send-message/{id}', 'App\Http\Controllers\Backend\ChatContoller@sendMessageFreelancer')->name('send.message.freelancer');

		//send message chat room
		Route::post('send-message-room/{id}', 'App\Http\Controllers\Backend\ChatContoller@sendMessageFreelancerChatRoom')->name('send.message.freelancer.room');

		//chat room
		Route::get('/messages-room/{id}', 'App\Http\Controllers\Backend\ChatContoller@freelancerMessagesChat')->name('freelancer.messages.room');
		//chat room
		Route::get('/freelancer-earning/', 'App\Http\Controllers\Backend\FreelancerController@earnig')->name('freelancer.earning');

	});
	//Freelancer route End
	//employer route start
	Route::group( ['prefix' => 'employer'], function(){

		//freelancer social media
		Route::get('/social-media', 'App\Http\Controllers\Backend\EmployerController@socialMedia')->name('employer.social.media');

		//freelancer social media edit
		Route::post('/social-media-edit', 'App\Http\Controllers\Backend\EmployerController@socialMediaUpdate')->name('employer.social.media.update');

		//update employer
		Route::get('/settings', 'App\Http\Controllers\Backend\EmployerController@edit')->name('employer.edit');

		Route::post('/settings', 'App\Http\Controllers\Backend\EmployerController@update')->name('employer.update');

		//Job post
		Route::get('/post-job', 'App\Http\Controllers\Backend\JobController@create')->name('job.post');
		Route::post('/post/job', 'App\Http\Controllers\Backend\JobController@store')->name('job.store');

		// manage job
		Route::get('/manage-job', 'App\Http\Controllers\Backend\JobController@manageJob')->name('job.manage');

		//delete job
		Route::post('/delete-job/{id}', 'App\Http\Controllers\Backend\JobController@deleteJobEmployer')->name('delete.job.employer');

		//update document
		Route::post('/update-document/{id}', 'App\Http\Controllers\Backend\JobController@updateDocumentJobEmoloyer')->name('update.document.job.employer');
		//manage Cadidate
		Route::get('/manage-candidate/{id}', 'App\Http\Controllers\Backend\JobController@manageCandidates')->name('candidate.manage');

		//remove cadidate
		Route::post('/manage-candidates/{id}', 'App\Http\Controllers\Backend\JobController@removeCandidate')->name('candidate.remove');

		//approve cadidate
		Route::post('/manage-candidate/approve/{id}/{jobId}', 'App\Http\Controllers\Backend\JobController@approveCandidate')->name('candidate.approve');

		// job paymement
		Route::post('/job-pay', 'App\Http\Controllers\Backend\CheckoutController@jobPaymentrCheckout')->name('job.payment');

		//download cadidate cv
		Route::get('/download-candidate/cv/{id}', 'App\Http\Controllers\Backend\JobController@downloadCandidateCv')->name('candidate.cv.download');


		//offer task 
		Route::post('/{id}', 'App\Http\Controllers\Backend\TaskOfferController@offerTask')->name('task.offer');
		//Custom offer checkout
		Route::get('/custom-offer-check-out', 'App\Http\Controllers\Backend\TaskOfferController@customOfferCheckout')->name('custom.offer.checkout');

		//post payment
		Route::post('/custom/offer/pay', 'App\Http\Controllers\Backend\CheckoutController@customOrderCheckout')->name('custom.order.payment');

		//download custom offer document
		
		
		//manage Custom offer
		Route::get('/manage/custom/offer', 'App\Http\Controllers\Backend\TaskOfferController@manageCustomOffer')->name('mangage.custom.offer');

		//update custom offer document
		Route::post('update/{id}', 'App\Http\Controllers\Backend\TaskOfferController@updateCustomOffer')->name('update.custom.offer.document');

		//delete custom offer document
		Route::post('delete/{id}', 'App\Http\Controllers\Backend\TaskOfferController@deleteCustomOffer')->name('delete.custom.offer.document');

		//Task Post
		Route::get('/post-task', 'App\Http\Controllers\Backend\TaskController@create')->name('task.post');

		//task post
		Route::post('/post/task', 'App\Http\Controllers\Backend\TaskController@store')->name('task.store');

		// task manage
		Route::get('/manage-task', 'App\Http\Controllers\Backend\TaskController@manageTaskEmp')->name('task.manage.emp');

		// manage bid
		Route::get('/manage-bid/{id}', 'App\Http\Controllers\Backend\TaskController@manageTaskBidEmp')->name('task.bid.emp');

		//approve bid
		Route::post('/approve-bid/{id}', 'App\Http\Controllers\Backend\TaskController@manageTaskBidEmpApprove')->name('task.bid.emp.approve');

		//post payment
		Route::post('/task/payment', 'App\Http\Controllers\Backend\CheckoutController@taskOrderCheckout')->name('task.order.payment');
		// reject Bid
		Route::post('/reject-bid/{id}', 'App\Http\Controllers\Backend\TaskController@manageTaskBidEmpReject')->name('task.bid.emp.reject');

		// delete Bid offer
		Route::post('/delete-bid/{id}', 'App\Http\Controllers\Backend\TaskController@manageTaskBidEmpDelete')->name('task.bid.emp.delete');

		//manage order
		Route::get('/manage-order', 'App\Http\Controllers\Backend\OrderController@manageOrderEmp')->name('order.manage.emp');

		//manage deliverd order
		Route::get('/manage-delivered-order', 'App\Http\Controllers\Backend\OrderController@manageDeliveredOrderEmp')->name('order.delivered.emp');

		//manage Confirmed order
		Route::get('/manage-Confirmed-order', 'App\Http\Controllers\Backend\OrderController@manageConfirmedOrderEmp')->name('order.confirmed.emp');

		//download order file
		Route::get('/download-order/{id}', 'App\Http\Controllers\Backend\TaskController@downloadOrderFile')->name('dowload.order.file.employer');

		//revision
		Route::post('/revision-order/{id}/{orderId}', 'App\Http\Controllers\Backend\OrderController@revisionOrderEmployer')->name('revision.order.emp');

		//Confirm Order
		Route::post('/confirm-order/{id}/{orderId}', 'App\Http\Controllers\Backend\OrderController@confirmOrderEmployer')->name('confirm.order.emp');

		//give review
		Route::post('/review/{id}/{freelancerActivityId}', 'App\Http\Controllers\Backend\ReviewController@reviewOrderEmployer')->name('review.order.emp');

		//manage review
		Route::get('/manage-review/', 'App\Http\Controllers\Backend\ReviewController@reviewManageEmployer')->name('manage.review.employer');

		//manage book mark
		Route::get('/manage-book-mark/', 'App\Http\Controllers\Backend\BookmarkController@manageBookMarkEmployer')->name('manage.bookmark.employer');

		//bookMark Freelancer
		Route::post('/bookmark/{id}', 'App\Http\Controllers\Backend\BookmarkController@bookMarkFreelancer')->name('bookmark.freelancer');

		//bookMark Freelancer remove
		Route::post('/bookmark/remove/{id}', 'App\Http\Controllers\Backend\BookmarkController@bookMarkFreelancerRemove')->name('bookmark.freelancer.remove');

		//Request cancel order
		Route::post('/cancel-order/{id}', 'App\Http\Controllers\Backend\OrderCancelController@requestCancelOrderemployer')->name('cancel.order.employer');

		//Cancel requested
		Route::get('/order-cancel-requested/', 'App\Http\Controllers\Backend\OrderController@manageCancelRequectEmployer')->name('manage.cancel.request.employer');

		//Cancel Order
		Route::get('/order-canceled/', 'App\Http\Controllers\Backend\OrderController@manageCancelOrderEmployer')->name('manage.cancel.order.employer');

		//emp message
		Route::get('/messages/', 'App\Http\Controllers\Backend\ChatContoller@employerMessages')->name('employer.messages');
		//send message when approve bid order
		Route::post('send-message-bid-order/{id}', 'App\Http\Controllers\Backend\ChatContoller@sendMessageEmp')->name('send.message.emp');
		//send message
		//send message
		Route::post('send-message/{id}', 'App\Http\Controllers\Backend\ChatContoller@sendMessageEmployer')->name('send.message');
		// all messages
		Route::get('/all-messages/', 'App\Http\Controllers\Backend\ChatContoller@getAllMessages');

		//send message chat room
		Route::post('/message-room/{id}', 'App\Http\Controllers\Backend\ChatContoller@sendMessageFreelancerChatRoom')->name('send.message.employer.room');

		Route::get('/messages-room/{id}', 'App\Http\Controllers\Backend\ChatContoller@employerMessagesChat')->name('employer.messages.room');

		//my membership plan

		Route::get('/my-membership-plan', 'App\Http\Controllers\Backend\MembershipPlanController@employerMembershipPlan')->name('employer.membership.plan');

	}); 
	//employer route End

//download message file
Route::get('download-message-file/{id}', 'App\Http\Controllers\Backend\ChatContoller@messageFilerDownload')->name('message.file.download');


});

//without log in
Route::get('message-not-send', 'App\Http\Controllers\Backend\ChatContoller@messageNotSend')->name('message.not.send');
//
Route::get('/Checkout/{id}', 'App\Http\Controllers\Frontend\CheckoutController@index')->name('checkout');
//store
Route::post('/Checkout-store', 'App\Http\Controllers\Frontend\CheckoutController@checkoutStore')->name('checkout.store');
//edit
Route::get('/Checkout-edit/{id}', 'App\Http\Controllers\Frontend\CheckoutController@edit')->name('checkout.edit');
//
Route::post('/Checkout-update/{id}', 'App\Http\Controllers\Frontend\CheckoutController@checkoutUpdate')->name('checkout.update');
//get notification
Route::get('/allready-checkout', 'App\Http\Controllers\Frontend\CheckoutController@alreadtAlert')->name('checkout.already');
// post a job notification
Route::get('/buy-membership-plan', 'App\Http\Controllers\Frontend\CheckoutController@buyAlert')->name('buy.alert');
//update memebreship plan
Route::get('/update-membership-plan', 'App\Http\Controllers\Frontend\CheckoutController@updateAlert')->name('update.alert');
//get notification
Route::get('/login-as-emp', 'App\Http\Controllers\Frontend\CheckoutController@alert')->name('checkout.alert');
//confirm checkout
Route::get('/confirm-checkout', 'App\Http\Controllers\Frontend\CheckoutController@confirm')->name('checkout.confirm');



Route::get('/checkout-confirm', 'App\Http\Controllers\Backend\CheckoutController@confirm')->name('confirm.checkout');



//invoice
Route::get('/Invoice', 'App\Http\Controllers\Frontend\CheckoutController@invoice')->name('invoice');
//invoice 
Route::get('/Invoice/{id}', 'App\Http\Controllers\Backend\CheckoutController@invoice')->name('invoice.confirm');

Route::get('/t', function () {
    return view('welcome');
});
 Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
     return view('dashboard');
 })->name('dashboard');
 
Route::get('test', function () {
    event(new App\Events\StatusLiked('Guest'));
    return "Event has been sent!";
});
