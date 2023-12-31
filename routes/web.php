<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function(){
    // \Illuminate\Support\Facades\Artisan::call('route:cache');
    // \Illuminate\Support\Facades\Artisan::call('cache:clear');
    Artisan::call('cache:clear');
    // Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('config:cache');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
    // php artisan route:cache
    dd('Clear');
});

Route::get('migrate', function () {
    Artisan::call('migrate');
    dd("migrate");

});
Route::get('/controller',function(){
    Artisan::call('make:modal InviteEmail');
});
Route::get('/storage-link', function () {
	Artisan::call('storage:link');
    return 'Storage Linked';
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::namespace('Gateway')->prefix('ipn')->name('ipn.')->group(function () {
    Route::post('paypal', 'paypal\ProcessController@ipn')->name('paypal');
    Route::get('paypal_sdk', 'paypal_sdk\ProcessController@ipn')->name('paypal_sdk');
    Route::post('perfect_money', 'perfect_money\ProcessController@ipn')->name('perfect_money');
    Route::post('stripe', 'stripe\ProcessController@ipn')->name('stripe');
    Route::post('stripe_js', 'stripe_js\ProcessController@ipn')->name('stripe_js');
    Route::post('stripe_v3', 'stripe_v3\ProcessController@ipn')->name('stripe_v3');
    Route::post('skrill', 'skrill\ProcessController@ipn')->name('skrill');
    Route::post('paytm', 'paytm\ProcessController@ipn')->name('paytm');
    Route::post('payeer', 'payeer\ProcessController@ipn')->name('payeer');
    Route::post('paystack', 'paystack\ProcessController@ipn')->name('paystack');
    Route::post('voguepay', 'voguepay\ProcessController@ipn')->name('voguepay');
    Route::get('flutterwave/{trx}/{type}', 'flutterwave\ProcessController@ipn')->name('flutterwave');
    Route::post('razorpay', 'razorpay\ProcessController@ipn')->name('razorpay');
    Route::post('instamojo', 'instamojo\ProcessController@ipn')->name('instamojo');
    Route::get('blockchain', 'blockchain\ProcessController@ipn')->name('blockchain');
    Route::get('blockio', 'blockio\ProcessController@ipn')->name('blockio');
    Route::post('coinpayments', 'coinpayments\ProcessController@ipn')->name('coinpayments');
    Route::post('coinpayments_fiat', 'coinpayments_fiat\ProcessController@ipn')->name('coinpayments_fiat');
    Route::post('coingate', 'coingate\ProcessController@ipn')->name('coingate');
    Route::post('coinbase_commerce', 'coinbase_commerce\ProcessController@ipn')->name('coinbase_commerce');
    Route::get('mollie', 'mollie\ProcessController@ipn')->name('mollie');
    Route::post('cashmaal', 'cashmaal\ProcessController@ipn')->name('cashmaal');
});

// User Support Ticket
Route::prefix('ticket')->group(function () {
    Route::get('/', 'TicketController@supportTicket')->name('ticket');
    Route::get('/new', 'TicketController@openSupportTicket')->name('ticket.open');
    Route::post('/create', 'TicketController@storeSupportTicket')->name('ticket.store');
    Route::get('/view/{ticket}', 'TicketController@viewTicket')->name('ticket.view');
    Route::post('/reply/{ticket}', 'TicketController@replyTicket')->name('ticket.reply');
    Route::get('/download/{ticket}', 'TicketController@ticketDownload')->name('ticket.download');
});


/*
|--------------------------------------------------------------------------
| Start Admin Area
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware(['admin'])->group(function () {
        //new routes
        Route::resource('contact', ContactController::class);
        Route::resource('page', PageController::class);
        Route::patch('page-list/{page}','PageController@change')->name('page.change');
        Route::resource('testimonial', TestimonialController::class);
        Route::patch('testimonial-status/{testimonial}', 'TestimonialController@testimonialStatus')->name('testimonial.status');
        Route::resource('faq',FaqController::class);
        Route::patch('faq-status/{faq}', 'FaqController@faqStatus')->name('faq.status');

        Route::resource('banner',BannerImageController::class);
        Route::patch('banner-status/{banner}', 'BannerImageController@bannerStatus')->name('banner.status');
       // Route::put('update-testimonial-text', 'TestimonialController@textUpdate')->name('testimonialText.update');
        //end New Routes
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::post('profile', 'AdminController@profileUpdate')->name('profile.update');
        Route::get('password', 'AdminController@password')->name('password');
        Route::post('password', 'AdminController@passwordUpdate')->name('password.update');

        // Users Manager
        Route::get('users', 'ManageUsersController@allUsers')->name('users.all');
        Route::get('users/active', 'ManageUsersController@activeUsers')->name('users.active');
        Route::get('users/banned', 'ManageUsersController@bannedUsers')->name('users.banned');
        Route::get('users/email-verified', 'ManageUsersController@emailVerifiedUsers')->name('users.emailVerified');
        Route::get('users/email-unverified', 'ManageUsersController@emailUnverifiedUsers')->name('users.emailUnverified');
        Route::get('users/sms-unverified', 'ManageUsersController@smsUnverifiedUsers')->name('users.smsUnverified');
        Route::get('users/sms-verified', 'ManageUsersController@smsVerifiedUsers')->name('users.smsVerified');

        Route::get('users/{scope}/search', 'ManageUsersController@search')->name('users.search');
        Route::get('user/detail/{id}', 'ManageUsersController@detail')->name('users.detail');
        Route::get('user/delete/{id}','ManageUsersController@delete')->name('users.delete');
        Route::post('user/update/{id}', 'ManageUsersController@update')->name('users.update');
        Route::post('user/add-sub-balance/{id}', 'ManageUsersController@addSubBalance')->name('users.addSubBalance');
        Route::get('user/send-email/{id}', 'ManageUsersController@showEmailSingleForm')->name('users.email.single');
        Route::post('user/send-email/{id}', 'ManageUsersController@sendEmailSingle')->name('users.email.single');
        Route::get('user/transactions/{id}', 'ManageUsersController@transactions')->name('users.transactions');
        Route::get('user/deposits/{id}', 'ManageUsersController@deposits')->name('users.deposits');
        Route::get('user/deposits/via/{method}/{type?}/{userId}', 'ManageUsersController@depViaMethod')->name('users.deposits.method');
        Route::get('user/exams/mcq/{id}', 'ManageUsersController@userMcqExam')->name('users.mcq.exams');
        Route::get('user/exams/written/{id}', 'ManageUsersController@userWrittenExam')->name('users.written.exams');
        // Login History
        Route::get('users/login/history/{id}', 'ManageUsersController@userLoginHistory')->name('users.login.history.single');

        Route::get('users/send-email', 'ManageUsersController@showEmailAllForm')->name('users.email.all');
        Route::post('users/send-email', 'ManageUsersController@sendEmailAll')->name('users.email.send');

        // User Invite Email
        Route::get('userinviteemail/index','UserInviteEmailController@index')->name('users.invite.email.index');
        Route::post('userinvite/send','UserInviteEmailController@sendemail')->name('email.userinvite.send');

        //exam category manage
        Route::get('exam/categories', 'CategoryController@allCategories')->name('exam.categories');
        Route::post('exam/categories/store', 'CategoryController@store')->name('exam.categories.store');
        Route::post('exam/categories/update/{id}', 'CategoryController@update')->name('exam.categories.update');
        Route::get('exam/categories/delete/{id}', 'CategoryController@delete')->name('exam.categories.delete');
        Route::post('exam/categories/update-order/', 'CategoryController@update_order')->name('exam.categories.updateorder');

        //exam Group Factor manage
        Route::get('exam/group_factor', 'GroupfactorController@allgroupfactor')->name('exam.group_factor');
        Route::post('exam/group_factor/store', 'GroupfactorController@store')->name('exam.group_factor.store');
        Route::post('exam/group_factor/update/{id}', 'GroupfactorController@update')->name('exam.group_factor.update');
        Route::get('exam/group_factor/delete/{id}', 'GroupfactorController@delete')->name('exam.group_factor.delete');
        Route::post('exam/group_factor/update-order/', 'GroupfactorController@update_order')->name('exam.group_factor.updateorder');

        //exam subject manage
        Route::get('exam/subjects', 'SubjectController@allsubject')->name('exam.subjects');
        Route::post('exam/subject/store', 'SubjectController@store')->name('exam.subject.store');
        Route::post('exam/subject/update/{id}', 'SubjectController@update')->name('exam.subject.update');


        //exam genders manage
        Route::get('exam/genders', 'GenderController@allGender')->name('exam.genders');
        Route::post('exam/genders/store', 'GenderController@store')->name('exam.gender.store');
        Route::post('exam/genders/update/{id}', 'GenderController@update')->name('exam.gender.update');

        //exam certificate
        Route::get('exam/certificate', 'ExamController@certificate')->name('exam.certificate');
        Route::post('exam/certificate/update', 'ExamController@certificateUpdate')->name('exam.certificate.update');

        //exam manage
         Route::get('exam/getreport/{id}/{examid}', 'ExamController@getreport')->name('exam.getreport');
        Route::get('exam/all', 'ExamController@allExams')->name('exam.all');
        Route::get('exam/add', 'ExamController@addExam')->name('exam.add');
        Route::post('exam/store', 'ExamController@store')->name('exam.store');
        Route::get('exam/edit/{id}', 'ExamController@editExam')->name('exam.edit');
        Route::post('exam/update/{id}', 'ExamController@update')->name('exam.update');
        Route::post('exam/imgremove','ExamController@imageRemove')->name('exam.imgRemove');
        Route::get('exam/delete/{id}','ExamController@delete')->name('exam.delete');

        //score manage
        Route::get('score/all', 'ScoreController@allScore')->name('score.all');
        Route::get('score/add', 'ScoreController@addScore')->name('score.add');
        Route::post('score/store', 'ScoreController@store')->name('score.store');
        Route::get('score/edit/{id}', 'ScoreController@editScore')->name('score.edit');
        Route::post('score/update/{id}', 'ScoreController@update')->name('score.update');

        //Report
        Route::get('exam/report/{id}/{type}', 'ExamController@examReports')->name('exam.report');
        Route::get('exam/view-report/{id}', 'ExamController@examViewReports')->name('exam.viewreport');
        Route::get('exam/delete-result/{result_id}/{exam_id}', 'ExamController@delete_result')->name('exam.delete_result');
        
        // Question Logic 
        Route::get('exam/logic/{id}', 'ExamController@examLogics')->name('exam.logic');
        Route::post('exam/logics/store', 'ExamController@examLogicsstore')->name('exam.logics.store');
        Route::get('exam/warning',function(){
            $page_title = 'Exam logic page Warning....!';
            return view('admin.exam.logicWarning',compact('page_title'));
        })->name('exam.warning');

        Route::post('exam/examoldexam','ExamController@examoldexam')->name('exam.examoldexam');
        
        //questions
        Route::get('exam/questions/{id}', 'ExamController@examQuestions')->name('exam.questions');
        Route::get('exam/questions/add/mcq/{examid}', 'QuestionController@addMcq')->name('exam.add.mcq');
        Route::post('exam/question/store', 'QuestionController@store')->name('exam.question.store');
        Route::get('exam/questions/edit/mcq/{qtnid}', 'QuestionController@editMcq')->name('exam.edit.mcq');
        Route::post('exam/question/update/{qtnid}', 'QuestionController@update')->name('exam.question.update');
        Route::post('exam/question/remove/{qtnid}', 'QuestionController@remove')->name('question.remove');
        Route::post('exam/question/imgremove/', 'QuestionController@imageRemove')->name('question.imgremove');
        Route::post('exam/question/optionimgremove/', 'QuestionController@optionimageRemove')->name('question.optionimgremove');

        Route::post('exam/question/update-order/', 'QuestionController@update_order')->name('exam.question.updateorder');

        Route::get('exam/question/written/{id}', 'QuestionController@written')->name('exam.question.written');
        Route::post('exam/question/written/{examid}', 'QuestionController@writtenStore')->name('exam.written.store');
        Route::get('exam/question/written/edit/{id}', 'QuestionController@writtenEdit')->name('exam.written.edit');
        Route::post('exam/question/written/update/{id}', 'QuestionController@writtenUpdate')->name('exam.written.update');
        Route::post('exam/question/index/update/', 'QuestionController@indexUpdate')->name('exam.index.update');

        //Manage Coupon
        Route::get('coupon/all', 'CouponController@allCoupons')->name('coupon.all');
        Route::get('coupon/add', 'CouponController@addCoupons')->name('coupon.add');
        Route::post('coupon/store', 'CouponController@store')->name('coupon.store');
        Route::get('coupon/edit/{id}', 'CouponController@edit')->name('coupon.edit');
        Route::post('coupon/update/{id}', 'CouponController@update')->name('coupon.update');

        Route::get('written/pending/all','WrittenReviewController@allPending')->name('written.pending.all');
        Route::get('written/pending/exams','WrittenReviewController@pendingExam')->name('written.pending.exam');
        Route::get('written/pending/exam/details/{id}','WrittenReviewController@pendingExamDetails')->name('written.pending.exam.details');


        Route::get('written/reviewed/exams','WrittenReviewController@reviewedExam')->name('written.reviewed.exam');
        Route::get('written/reviewed/exam/details/{id}','WrittenReviewController@reviewedExamDetails')->name('written.reviewed.exam.details');

        Route::get('written/details/{userid}/{qtnid}','WrittenReviewController@writtenDetails')->name('written.details');
        Route::get('written/details/user/{userid}/{examid}','WrittenReviewController@writtenDetailsUser')->name('written.details.user');

        Route::post('written/give/mark/{id}','WrittenReviewController@giveMark')->name('written.give.mark');
        Route::post('written/give/correcr-ans/{id}','WrittenReviewController@giveCorrectAns')->name('written.give.correctans');


        // Subscriber
        Route::get('subscriber', 'SubscriberController@index')->name('subscriber.index');
        Route::get('subscriber/send-email', 'SubscriberController@sendEmailForm')->name('subscriber.sendEmail');
        Route::post('subscriber/remove', 'SubscriberController@remove')->name('subscriber.remove');
        Route::post('subscriber/send-email', 'SubscriberController@sendEmail')->name('subscriber.sendEmail');


        // Deposit Gateway
        Route::name('gateway.')->prefix('gateway')->group(function(){
            // Automatic Gateway
            Route::get('automatic', 'GatewayController@index')->name('automatic.index');
            Route::get('automatic/edit/{alias}', 'GatewayController@edit')->name('automatic.edit');
            Route::post('automatic/update/{code}', 'GatewayController@update')->name('automatic.update');
            Route::post('automatic/remove/{code}', 'GatewayController@remove')->name('automatic.remove');
            Route::post('automatic/activate', 'GatewayController@activate')->name('automatic.activate');
            Route::post('automatic/deactivate', 'GatewayController@deactivate')->name('automatic.deactivate');



            // Manual Methods
            Route::get('manual', 'ManualGatewayController@index')->name('manual.index');
            Route::get('manual/new', 'ManualGatewayController@create')->name('manual.create');
            Route::post('manual/new', 'ManualGatewayController@store')->name('manual.store');
            Route::get('manual/edit/{alias}', 'ManualGatewayController@edit')->name('manual.edit');
            Route::post('manual/update/{id}', 'ManualGatewayController@update')->name('manual.update');
            Route::post('manual/activate', 'ManualGatewayController@activate')->name('manual.activate');
            Route::post('manual/deactivate', 'ManualGatewayController@deactivate')->name('manual.deactivate');
        });


        // DEPOSIT SYSTEM
        Route::name('deposit.')->prefix('deposit')->group(function(){
            Route::get('/', 'DepositController@deposit')->name('list');
            Route::get('pending', 'DepositController@pending')->name('pending');
            Route::get('rejected', 'DepositController@rejected')->name('rejected');
            Route::get('approved', 'DepositController@approved')->name('approved');
            Route::get('successful', 'DepositController@successful')->name('successful');
            Route::get('details/{id}', 'DepositController@details')->name('details');

            Route::post('reject', 'DepositController@reject')->name('reject');
            Route::post('approve', 'DepositController@approve')->name('approve');
            Route::get('via/{method}/{type?}', 'DepositController@depViaMethod')->name('method');
            Route::get('/{scope}/search', 'DepositController@search')->name('search');
            Route::get('date-search/{scope}', 'DepositController@dateSearch')->name('dateSearch');

        });


        // Report
        Route::get('report/transaction', 'ReportController@transaction')->name('report.transaction');
        Route::get('report/transaction/search', 'ReportController@transactionSearch')->name('report.transaction.search');
        Route::get('report/login/history', 'ReportController@loginHistory')->name('report.login.history');
        Route::get('report/login/ipHistory/{ip}', 'ReportController@loginIpHistory')->name('report.login.ipHistory');


        // Admin Support
        Route::get('tickets', 'SupportTicketController@tickets')->name('ticket');
        Route::get('tickets/pending', 'SupportTicketController@pendingTicket')->name('ticket.pending');
        Route::get('tickets/closed', 'SupportTicketController@closedTicket')->name('ticket.closed');
        Route::get('tickets/answered', 'SupportTicketController@answeredTicket')->name('ticket.answered');
        Route::get('tickets/view/{id}', 'SupportTicketController@ticketReply')->name('ticket.view');
        Route::post('ticket/reply/{id}', 'SupportTicketController@ticketReplySend')->name('ticket.reply');
        Route::get('ticket/download/{ticket}', 'SupportTicketController@ticketDownload')->name('ticket.download');
        Route::post('ticket/delete', 'SupportTicketController@ticketDelete')->name('ticket.delete');


        // Language Manager
        Route::get('/language', 'LanguageController@langManage')->name('language.manage');
        Route::post('/language', 'LanguageController@langStore')->name('language.manage.store');
        Route::post('/language/delete/{id}', 'LanguageController@langDel')->name('language.manage.del');
        Route::post('/language/update/{id}', 'LanguageController@langUpdatepp')->name('language.manage.update');
        Route::get('/language/edit/{id}', 'LanguageController@langEdit')->name('language.key');
        Route::post('/language/import', 'LanguageController@langImport')->name('language.import_lang');



        Route::post('language/store/key/{id}', 'LanguageController@storeLanguageJson')->name('language.store.key');
        Route::post('language/delete/key/{id}', 'LanguageController@deleteLanguageJson')->name('language.delete.key');
        Route::post('language/update/key/{id}', 'LanguageController@updateLanguageJson')->name('language.update.key');

        //Download Result
        Route::get('downloadResult', 'ExamController@downloadResult')->name('result.download');

        //Discussion
        Route::get('/discussion', 'AdminController@discussion')->name('discussion');

        // General Setting
        Route::get('general-setting', 'GeneralSettingController@index')->name('setting.index');
        Route::post('general-setting', 'GeneralSettingController@update')->name('setting.update');

        // Logo-Icon
        Route::get('setting/logo-icon', 'GeneralSettingController@logoIcon')->name('setting.logo_icon');
        Route::post('setting/logo-icon', 'GeneralSettingController@logoIconUpdate')->name('setting.logo_icon');

        // Plugin
        Route::get('extensions', 'ExtensionController@index')->name('extensions.index');
        Route::post('extensions/update/{id}', 'ExtensionController@update')->name('extensions.update');
        Route::post('extensions/activate', 'ExtensionController@activate')->name('extensions.activate');
        Route::post('extensions/deactivate', 'ExtensionController@deactivate')->name('extensions.deactivate');


        // Email Setting
        Route::get('email-template/global', 'EmailTemplateController@emailTemplate')->name('email.template.global');
        Route::post('email-template/global', 'EmailTemplateController@emailTemplateUpdate')->name('email.template.global');
        Route::get('email-template/setting', 'EmailTemplateController@emailSetting')->name('email.template.setting');
        Route::post('email-template/setting', 'EmailTemplateController@emailSettingUpdate')->name('email.template.setting');
        Route::get('email-template/index', 'EmailTemplateController@index')->name('email.template.index');
        Route::get('email-template/{id}/edit', 'EmailTemplateController@edit')->name('email.template.edit');
        Route::post('email-template/{id}/update', 'EmailTemplateController@update')->name('email.template.update');
        Route::post('email-template/send-test-mail', 'EmailTemplateController@sendTestMail')->name('email.template.sendTestMail');

        // SMS Setting
        Route::get('sms-template/global', 'SmsTemplateController@smsSetting')->name('sms.template.global');
        Route::post('sms-template/global', 'SmsTemplateController@smsSettingUpdate')->name('sms.template.global');
        Route::get('sms-template/index', 'SmsTemplateController@index')->name('sms.template.index');
        Route::get('sms-template/edit/{id}', 'SmsTemplateController@edit')->name('sms.template.edit');
        Route::post('sms-template/update/{id}', 'SmsTemplateController@update')->name('sms.template.update');
        Route::post('email-template/send-test-sms', 'SmsTemplateController@sendTestSMS')->name('sms.template.sendTestSMS');

        // SEO
        Route::get('seo', 'FrontendController@seoEdit')->name('seo');


        // Frontend
        Route::name('frontend.')->prefix('frontend')->group(function () {


            Route::get('templates', 'FrontendController@templates')->name('templates');
            Route::post('templates', 'FrontendController@templatesActive')->name('templates.active');

            Route::get('frontend-sections/{key}', 'FrontendController@frontendSections')->name('sections');
            Route::post('frontend-content/{key}', 'FrontendController@frontendContent')->name('sections.content');
            Route::get('frontend-element/{key}/{id?}', 'FrontendController@frontendElement')->name('sections.element');
            Route::post('remove', 'FrontendController@remove')->name('remove');
            // Page Builder
            Route::get('manage-pages', 'PageBuilderController@managePages')->name('manage.pages');
            Route::post('manage-pages', 'PageBuilderController@managePagesSave')->name('manage.pages.save');
            Route::post('manage-pages/update', 'PageBuilderController@managePagesUpdate')->name('manage.pages.update');
            Route::post('manage-pages/delete', 'PageBuilderController@managePagesDelete')->name('manage.pages.delete');
            Route::get('manage-section/{id}', 'PageBuilderController@manageSection')->name('manage.section');
            Route::post('manage-section/{id}', 'PageBuilderController@manageSectionUpdate')->name('manage.section.update');
        });
      
        // DEPOSIT SYSTEM
        Route::name('resources.')->prefix('resources')->group(function(){
            Route::get('/news_letter', 'ResourcesController@news_letter')->name('news_letter');
            Route::post('/save_news_letter', 'ResourcesController@save_news_letter')->name('save_news_letter');
            Route::post('/delete_news_letter', 'ResourcesController@delete_news_letter')->name('delete_news_letter');
            Route::get('/announcement', 'ResourcesController@announcement')->name('announcement');
            Route::post('/save_announcement', 'ResourcesController@save_announcement')->name('save_announcement');
            Route::post('/delete_announcement', 'ResourcesController@delete_announcement')->name('delete_announcement');
            Route::get('/about_the_app', 'ResourcesController@about_the_app')->name('about_the_app');
            Route::post('/save_about_the_app', 'ResourcesController@save_about_the_app')->name('save_about_the_app');
            Route::get('/upcoming_event', 'ResourcesController@upcoming_event')->name('upcoming_event');
            Route::post('/save_upcoming_event', 'ResourcesController@save_upcoming_event')->name('save_upcoming_event');
            Route::get('/thank_you_sponser', 'ResourcesController@thank_you_sponser')->name('thank_you_sponser');
            Route::post('/save_thank_you_sponser', 'ResourcesController@save_thank_you_sponser')->name('save_thank_you_sponser');
            Route::get('/health_recommendation', 'ResourcesController@health_recommendation')->name('health_recommendation');
            Route::post('/save_health_recommendation', 'ResourcesController@save_health_recommendation')->name('save_health_recommendation');
            Route::get('/guideline_of_who', 'ResourcesController@guideline_of_who')->name('guideline_of_who');
            Route::post('/save_guideline_of_who', 'ResourcesController@save_guideline_of_who')->name('save_guideline_of_who');
        });
    });  
});

/*
|--------------------------------------------------------------------------
| Start User Area
|--------------------------------------------------------------------------
*/

Route::name('user.')->group(function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logoutGet')->name('logout');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register')->middleware('regStatus');

    /*Get COuntry state city*/
    Route::get('dependent-dropdown', 'Auth\RegisterController@index');
    Route::post('fetch-country', 'Auth\RegisterController@fetchCountry');
    Route::post('fetch-states', 'Auth\RegisterController@fetchState');
    Route::post('fetch-cities', 'Auth\RegisterController@fetchCity');

    /*Get COuntry state city*/
    Route::get('dependent-dropdown', 'UserController@index');
    Route::post('fetch-country-profile', 'UserController@fetchCountry');
    Route::post('fetch-states-profile', 'UserController@fetchState');
    Route::post('fetch-cities-profile', 'UserController@fetchCity');

    Route::group(['middleware' => ['guest']], function () {
        Route::get('register/{reference}', 'Auth\RegisterController@referralRegister')->name('refer.register');
    });
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/code-verify', 'Auth\ForgotPasswordController@codeVerify')->name('password.code_verify');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/verify-code', 'Auth\ForgotPasswordController@verifyCode')->name('password.verify-code');
});

Route::name('user.')->prefix('user')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('authorization', 'AuthorizationController@authorizeForm')->name('authorization');
        Route::get('resend-verify', 'AuthorizationController@sendVerifyCode')->name('send_verify_code');
        Route::post('verify-email', 'AuthorizationController@emailVerification')->name('verify_email');
        Route::post('verify-sms', 'AuthorizationController@smsVerification')->name('verify_sms');
        Route::post('verify-g2fa', 'AuthorizationController@g2faVerification')->name('go2fa.verify');

        Route::post('apply-coupon','UserController@applyCoupon')->name('apply.coupon');

        Route::middleware(['checkStatus'])->group(function () {
            Route::get('dashboard', 'UserController@home')->name('home');

            Route::get('profile-setting', 'UserController@profile')->name('profile-setting');
            Route::post('profile-setting', 'UserController@submitProfile');
            Route::get('change-password', 'UserController@changePassword')->name('change-password');
            Route::post('change-password', 'UserController@submitPassword');

            //2FA
            Route::get('twofactor', 'UserController@show2faForm')->name('twofactor');
            Route::post('twofactor/enable', 'UserController@create2fa')->name('twofactor.enable');
            Route::post('twofactor/disable', 'UserController@disable2fa')->name('twofactor.disable');

            Route::get('/exam/list', 'UserExamController@examList')->name('exam.list');
            Route::get('/participate/exam/{id}', 'UserExamController@perticipateExam')->name('exam.perticipate');
            Route::get('/participate/exam/retest/{id}/{return}', 'UserExamController@perticipateExam')->name('exam.perticipate.retest');

            Route::get('/participate', 'UserExamController@perticipate')->name('perticipate');

            Route::get('/attend/exam/{id}', 'UserExamController@takeExam')->name('take.exam');
            Route::post('/submission/script/', 'UserExamController@scriptSubmission')->name('exam.submission.script');
            Route::get('/show/result/{id}', 'UserExamController@result')->name('exam.result');

            Route::get('/exam/certificate/mcq/{id}', 'UserExamController@mcqCertificate')->name('exam.mcq.certificate');
            Route::get('/exam/certificate/written/{examid}', 'UserExamController@writtenCertificate')->name('exam.written.certificate');
            Route::get('/exam/mcq/history', 'UserExamController@mcqExamHistory')->name('exam.mcq.history');
            Route::get('/exam/written/history', 'UserExamController@writtenExamHistory')->name('exam.written.history');
            Route::get('/exam/written/details/{examid}', 'UserExamController@writtenExamDetails')->name('exam.written.details');
            Route::get('/exam/mcq/history/getreport/{id}/{examid}', 'UserExamController@getreport')->name('exam.mcq.getreport');

            Route::get('/transaction/history', 'UserController@trxHistory')->name('trx.history');
            Route::get('/introduction', 'UserController@introduction')->name('introduction');
            Route::get('/test/history', 'UserExamController@testHistory')->name('test.history');
            Route::get('/facilitators', 'UserController@facilitators')->name('facilitators');
            Route::get('/discussion', 'UserController@discussion')->name('discussion');
            Route::get('/resources', 'UserController@resources')->name('resources');

            // Deposit
            Route::any('/deposit', 'Gateway\PaymentController@deposit')->name('deposit');
            Route::post('deposit/insert', 'Gateway\PaymentController@depositInsert')->name('deposit.insert');
            Route::get('deposit/preview', 'Gateway\PaymentController@depositPreview')->name('deposit.preview');
            Route::get('deposit/confirm', 'Gateway\PaymentController@depositConfirm')->name('deposit.confirm');
            Route::get('deposit/manual', 'Gateway\PaymentController@manualDepositConfirm')->name('deposit.manual.confirm');
            Route::post('deposit/manual', 'Gateway\PaymentController@manualDepositUpdate')->name('deposit.manual.update');
            Route::get('deposit/history', 'UserController@depositHistory')->name('deposit.history');

            Route::any('payment/{id?}', 'Gateway\PaymentController@deposit')->name('payment');
            Route::get('preview/payment', 'Gateway\PaymentController@depositPreview')->name('payment.preview');
            Route::get('payment/manual', 'Gateway\PaymentController@manualDepositConfirm')->name('payment.manual.confirm');
            Route::post('payment/manual', 'Gateway\PaymentController@manualDepositUpdate')->name('payment.manual.update');

            // page builder get pages
            Route::get('/{slug}', 'UserController@pages')->name('pages');

            // User Invite Email
            Route::get('userinviteemail/index','UserController@userinvitemail')->name('invite.email.index');
            Route::post('userinviteemail/send','UserController@sendemail')->name('email.userinvite.send');

            Route::name('resources.')->prefix('resources')->group(function(){
                Route::get('/news_letter', 'UserController@news_letter')->name('news_letter');
                Route::get('/announcement', 'UserController@announcement')->name('announcement');
                Route::get('/about_the_app', 'UserController@about_the_app')->name('about_the_app');
                Route::get('/upcoming_event', 'UserController@upcoming_event')->name('upcoming_event');
                Route::get('/thank_you_sponser', 'UserController@thank_you_sponser')->name('thank_you_sponser');
                Route::get('/health_recommendation', 'UserController@health_recommendation')->name('health_recommendation');
                Route::get('/guideline_of_who', 'UserController@guideline_of_who')->name('guideline_of_who');
            });
        });
    });
});


Route::get('/contact', 'SiteController@contact')->name('contact');
Route::post('/contactUs', 'SiteController@saveContactDetail')->name('contactUs');
Route::get('/frequently-asked-question', 'SiteController@faq')->name('faq');
Route::get('/howsitswork', 'SiteController@howsitsworks')->name('howsitsworks');
Route::post('/contact', 'SiteController@contactSubmit')->name('contact.send');
Route::get('/change/{lang?}', 'SiteController@changeLanguage')->name('lang');

Route::get('blog', 'SiteController@blog')->name('blog');
Route::get('blog/{id}/{slug}', 'SiteController@blogDetails')->name('blog.details');
Route::get('links/{slug}/{id}', 'SiteController@policyAndTerms')->name('links');

Route::get('exams', 'SiteController@exams')->name('exams');
Route::get('/exams/{slug}', 'SiteController@subjectExams')->name('subject.exams');
Route::get('/subjects', 'SiteController@subjects')->name('subjects');
Route::get('exam/details/{id}', 'SiteController@examDetails')->name('exam.details');
Route::get('category/{slug}', 'SiteController@categorySubject')->name('category.subjects');

Route::post('/subscribe', 'SiteController@subscribe')->name('subscribe');

Route::get('placeholder-image/{size}', 'SiteController@placeholderImage')->name('placeholderImage');

Route::post('/payment', 'Admin\PaypalController@pay')->name('paypal_payment');
Route::get('/success', 'Admin\PaypalController@success')->name('paypal_payment_success');
Route::get('/error', 'Admin\PaypalController@error')->name('paypal_payment_error');

Route::get('/{slug}', 'SiteController@pages')->name('pages');
Route::get('/', 'SiteController@index')->name('home');
Route::get('/clear/route', 'UserController@clearRoute');