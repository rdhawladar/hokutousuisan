<?php

Route::get('/', function(){
    return redirect('/home');
});

Route::get('/home', function(){
    return redirect('/home');
});


Route::get('/login', function(){
    return redirect('/user/login');
});

Route::get('/user', function(){
    return redirect('/user/login');
});

Route::get('/admin-login', function(){
    return redirect('/admin/login');
});

Route::get('/admin', function(){
    return redirect('/admin/login');
});

// ECM
	Route::get('/home',    			'Ecm\HomeController@index');
	Route::get('/downloadFax',    			'Ecm\HomeController@downloadFax');
	Route::get('/catagory/{id}',	'Ecm\HomeController@catagory');
	Route::get('/catagory',			'Ecm\HomeController@catagory_mid');
	Route::get('/concept',    		'Ecm\HomeController@concept');
	Route::get('/about-us',  		 'Ecm\HomeController@about_us');

	//bottom footer link
	Route::get('/site-policy', 	 		 'Ecm\HomeController@site_policy');
	Route::get('/site-map', 	 		 'Ecm\HomeController@site_map');
	Route::get('/privacy-protection',	 'Ecm\HomeController@privacy_protection');
	Route::get('/com-transaction',  	 'Ecm\HomeController@com_transaction');
	Route::get('/about-delivery-fee',  	 'Ecm\HomeController@about_delivery_fee');
	Route::get('/news/{id}',  			 'Ecm\HomeController@news');

	//contact form submission
	Route::get('/contact',    		'Ecm\HomeController@contact');
	Route::post('/contact-submit',   'Ecm\HomeController@contact_submit');
	
	Route::get('/agreement',    	'Ecm\HomeController@agreement');
	Route::get('/footer',   		'Ecm\HomeController@footer');
	Route::get('/header',  			'Ecm\HomeController@header');
	Route::get('/demo',  			'Ecm\HomeController@demo');
	Route::get('/catagory_test',	'Ecm\HomeController@catagory_test');
	Route::get('/pro-details/{id}',	'Ecm\HomeController@pro_details');
	Route::get('/product-description/{id}',	'Ecm\HomeController@product_description');

	//Member Control
	Route::get('/login',  			'Ecm\MemberController@login');
	Route::get('/forget-pass',  	'Ecm\MemberController@forget_pass');
	Route::post('/forget-pass',  	'Ecm\MemberController@pass_resend');
	Route::get('/registration',		'Ecm\MemberController@registration');
	Route::post('/registration',	'Ecm\MemberController@member_entry');

	//cart and checkout 
	Route::get('/my-cart',      	'Ecm\ShopManagerController@mycart');
  	Route::post('/update-cart', 	'Ecm\ShopManagerController@update_cart');
  	Route::get('/remove-cart/{id}', 	'Ecm\ShopManagerController@remove_cart');
  	Route::post('/checkout/{step}',     	'Ecm\ShopManagerController@checkout');
  	Route::get('/checkout/{step}',     	'Ecm\ShopManagerController@checkout');
  	Route::post('/checkout6',     	'Ecm\ShopManagerController@checkout6');
  	Route::post('/address-change',     	'Ecm\ShopManagerController@address_change');
/*  	Route::get('/checkout2',     	'Ecm\ShopManagerController@checkout2');
  	Route::get('/checkout3',     	'Ecm\ShopManagerController@checkout3');
  	Route::get('/checkout4',     	'Ecm\ShopManagerController@checkout4');
  	Route::get('/checkout5',     	'Ecm\ShopManagerController@checkout5');
  	Route::get('/checkout6',     	'Ecm\ShopManagerController@checkout6');*/
  	Route::get('/order-entry',     'Ecm\ShopManagerController@user_order_entry');
	Route::get('/add-to-cart/{product_id}/{cat_id}',    'Ecm\ShopManagerController@addToCart');
	Route::post('/add-to-cart/{product_id}/{cat_id}',   'Ecm\ShopManagerController@addToCart');
	Route::get('/test-query',   'Ecm\ShopManagerController@test');

	//PAYMENT GATEWAY 
	Route::get('/payment',   'Ecm\ShopManagerController@payment_index');
	Route::post('/payment-process-card',   'Ecm\ShopManagerController@payment_process_card');
  	
	Route::get('/gateway-auth',   'Ecm\ShopManagerController@gateway_auth');
	Route::get('/hokto-webhook',   'Ecm\ShopManagerController@hokto_webhook');


	//row grouping for order list

	
// ecm end

Route::group(['prefix' => 'user'], function () {

	Route::get('/login',    'Ecm\AuthController@login');
    Route::post('/login/{id}',   'Ecm\AuthController@loginAction');

	Route::group(['middleware' => 'user-auth'], function () {              
		Route::get('/panel' ,          'Ecm\MemberController@panel');  
		Route::post('/profile-update',	'Ecm\MemberController@profile_update');
		Route::get('/logout/',			'Ecm\AuthController@logout');	  
			});    	
		
	});	


Route::group(['prefix' => 'usr'], function () {

	Route::get('/login',    'User\AuthController@login');
    Route::post('/login',   'User\AuthController@loginAction');

	Route::get('/forget-password',    'User\AuthController@forgot_password');
	Route::post('/forgot-password',    'User\AuthController@forgot_password_action');


		
	Route::group(['middleware' => 'user-auth'], function () {              
		Route::get('/home' ,                                        'User\CalendarController@index');
		Route::get('/calendar-event-detail/{date}' ,                'User\CalendarController@event_details');
		Route::get('/calendar-detail/{id}' ,                        'User\CalendarController@calendar_event_details');

		Route::get('/calendar-json' ,                               'User\CalendarController@calendar_events_json');
		Route::get('/news-event-list-json' ,                        'User\NewsController@news_event_json');
		Route::get('/news-detail/{id}' ,                            'User\NewsController@news_detail');
	
		Route::post('/event-make-poll' ,                            'User\CalendarController@make_poll');
		Route::get('/event-polls/{id}' ,                            'User\CalendarController@poll_result');
		Route::post('/make-poll-request-form' ,                     'User\CalendarController@poll_request_form');
	
		
    	Route::get('/membership-power' ,                           'User\MembershipPowerController@index');
		Route::get('/membership-power-feedback-list-json' ,        'User\MembershipPowerController@membersip_power_feedback_list_json');	
	    Route::post('/membership-power-make-poll',                 'User\MembershipPowerController@membership_power_make_poll');
	    Route::post('/membership-power-feedback-request-form',     'User\MembershipPowerController@membership_power_feedback_request_form');

		Route::get('/ithopia-request-form' ,                        'User\IthopiaRequestController@index');
		Route::get('/give-business-idea' ,                          'User\BusinessIdeaController@index');        
    
		Route::get('/question-answer' ,                             'User\QuestionAnswerController@index');
        Route::post('/question-answer-request-form' ,               'User\QuestionAnswerController@user_request');
        
        Route::get('/mobile-application' ,                            'User\MobileApplicationController@index');
        Route::post('/mobile-application-comment-post' ,              'User\MobileApplicationController@user_comment_post');
        Route::get('/mobile-application-recent-comment/{video_id}' ,  'User\MobileApplicationController@recent_single_comment');
        Route::get('/mobile-application-recent-comments/{video_id}' , 'User\MobileApplicationController@recent_comments');        
		
        Route::get('/business-member-audition' ,                    'User\BusinessMemberAuditionController@index');
		Route::post('/business-member-audition-request' ,           'User\BusinessMemberAuditionController@audition_request');                
        
		Route::get('/majime-terrorist' ,                            'User\MajimeTerroristController@index');
        Route::post('/majime-terrorist-request' ,                   'User\MajimeTerroristController@user_request');        
        
		Route::get('/blockchain-related-lecture' ,                  'User\BlockChainRelatedLectureController@index');
		Route::post('/blockchain-related-lecture-comment-post' ,    'User\BlockChainRelatedLectureController@user_comment_post');		
		
		Route::get('/bitcoin-related-lecture' ,                     'User\BitcoinRelatedLectureController@index');
		Route::post('/bitcoin-related-lecture-comment-post' ,       'User\BitcoinRelatedLectureController@user_comment_post');	
		
		Route::get('/crazy-mindset' ,                               'User\CrazyMindsetController@index');
		Route::get('/crazy-mindset/{month}' ,                       'User\CrazyMindsetController@audio_search');
		Route::get('/know-realtime-earning'           ,             'User\KnowRealtimeEarningController@index');
		Route::get('/world-secret-talk'           ,                 'User\WorldSecretTalkController@index');

		Route::get('/self-introduce' ,                              'User\ProfileController@index');
		Route::post('/self-introduce-basic-info' ,                  'User\ProfileController@update_basic_info');
		Route::post('/self-introduce-additional-info'        ,      'User\ProfileController@update_additional_info');
		Route::post('/self-introduce-change-profile-picture' ,      'User\ProfileController@change_profile_picture');
		Route::post('/self-introduce-change-password' ,             'User\ProfileController@change_password');
		
		Route::get('/other-members-profile' ,                       'User\ProfileController@other_members_profile');
		Route::get('/online-members' ,                              'User\ProfileController@whois_online_members');
		
		Route::get('/logout',                                       'User\AuthController@logout');
		Route::get('/circle-on-image' ,                             'User\TestController@index');
		
		Route::get('/your-video-newtwork-json',                     'User\TestController@test_json');
		Route::get('/test',                                         'User\TestController@test');
		
		Route::get('/premium/login',                           'User\PremiumUserLoginController@index');
		Route::post('/premium/login',                           'User\PremiumUserLoginController@login_action');
		
		Route::group(['middleware' => 'premium-auth'], function () {
		    Route::get('/premium/home',                           'User\PremiumUserLoginController@home');
		});    	
		
	});	
}); 



Route::group(['prefix' => 'admin'], function(){

	Route::get('/login',           'Backend\LoginController@index');
    Route::get('/logout',          'Backend\LoginController@logout');
    Route::post('/authenticate',   'Backend\LoginController@authenticate');
    	
	Route::group(['middleware' => 'admin-auth'], function () {	    
		Route::get('/dashboard' ,                            'Backend\DashboardController@index');
		
		//Members
		Route::get('/members-registration',                  'Backend\MembersController@index');
		Route::post('/members-registration',                 'Backend\MembersController@registration');		
		Route::get('/all-members-list',                      'Backend\MembersController@members_list');				 
		Route::get('/members-list-data-table',               'Backend\MembersController@members_list_data_table');
		Route::get('/user-deactive/{id}/{status}',          'Backend\MembersController@user_deactive');		
		
		//Premium members
		Route::get('/custom-members-registration',           'Backend\MembersController@customer_member_registration');
		Route::post('/custom-members-registration',          'Backend\MembersController@custom_member_registration_action');			
				
		//Calendar , News and Events
	    Route::get('/calendar-event-entry',                  'Backend\CalendarController@index');				 
		Route::get('/calendar-set-event/{date}',             'Backend\CalendarController@set_shcedule');	
		Route::post('/calendar-set-event' ,                  'Backend\CalendarController@set_shcedule_action');	
		Route::get('/calendar-event-list',                   'Backend\CalendarController@events_list');		
		Route::get('/events-list-data-table',                'Backend\CalendarController@events_list_data_table');		
	    Route::get('/calendar-event-edit/{date}/{id}',       'Backend\CalendarController@calendar_event_edit');		
	    Route::post('/calendar-event-edit-action' ,          'Backend\CalendarController@calendar_event_edit_action');
	    Route::get('/calendar-event-delete/{id}',            'Backend\CalendarController@calendar_event_delete');	
		
		Route::get('/event-feedback-list' ,                 'Backend\CalendarController@calendar_event_feedback_list');
		Route::get('/event-feedback-list-data-table' ,      'Backend\CalendarController@calendar_event_feedback_list_data_table');
     	Route::get('/news-entry',                           'Backend\NewsController@index');	
		Route::post('/news-entry',                          'Backend\NewsController@news_entry');	
		Route::get('/news-list',                            'Backend\NewsController@news_list');	
		Route::get('/news-list-data-table',                 'Backend\NewsController@news_list_data_table');	
		Route::get('/news-edit/{id}',                       'Backend\NewsController@news_edit');
		Route::post('/news-edit-action',                    'Backend\NewsController@news_edit_action');
		Route::get('/news-delete/{id}',                     'Backend\NewsController@news_delete');
        
        //Membersip Power 
        Route::get('/membership-power-feedback-entry'  ,             'Backend\MembershipPowerController@feedback_entry');
        Route::post('/membership-power-feedback-entry'  ,            'Backend\MembershipPowerController@feedback_entry_action');
        Route::get('/membership-power-feedback-edit/{id}'  ,         'Backend\MembershipPowerController@membership_power_feedback_edit');
        Route::post('/membership-power-feedback-edit'  ,             'Backend\MembershipPowerController@membership_power_feedback_edit_action');
        Route::get('/membership-power-feedback-list'  ,              'Backend\MembershipPowerController@membership_power_feedback_list');
        Route::get('/membership-power-feedback-list-data-table'  ,   'Backend\MembershipPowerController@membership_power_feedback_list_data_table');
        Route::get('/membership-power-user-feedbacks'  ,             'Backend\MembershipPowerController@index');
        Route::get('/membership-power-user-feedbacks-data-table'  ,  'Backend\MembershipPowerController@membership_power_feedback_data_table');
        Route::get('/membership-power-feedback-delete/{id}'  ,       'Backend\MembershipPowerController@feedback_delete');
                
        Route::get('/membership-power-agree-count/{id}'  ,             'Backend\MembershipPowerController@membership_power_agree_feedback_list');
        Route::get('/membership-power-agree-count-data-table/{id}'  ,  'Backend\MembershipPowerController@membership_power_agree_feedback_list_data_table');
    
    
    	Route::get('/membership-power-disagree-count/{id}'  ,             'Backend\MembershipPowerController@membership_power_disagree_feedback_list');
        Route::get('/membership-power-disagree-count-data-table/{id}'  ,  'Backend\MembershipPowerController@membership_power_disagree_feedback_list_data_table');
    
    	Route::get('/membership-power-none-count/{id}'  ,             'Backend\MembershipPowerController@membership_power_none_feedback_list');
        Route::get('/membership-power-none-count-data-table/{id}'  ,  'Backend\MembershipPowerController@membership_power_none_feedback_list_data_table');
    
        Route::get('/membership-power-feedback-entry-edit/{id}'  ,  'Backend\MembershipPowerController@membership_power_feedback_list_edit');
        Route::post('/membership-power-feedback-entry-edit'  ,  'Backend\MembershipPowerController@membership_power_feedback_list_edit_action');
    
        Route::get('/membership-power-feedback-entry-delete/{id}'  ,  'Backend\MembershipPowerController@membership_power_agree_feedback_entry_delete');    

		//Explanations
		Route::get('/explanation-entry',                'Backend\ExplanationController@index');
		Route::post('/explanation-entry',               'Backend\ExplanationController@explanation_entry');
		Route::get('/explanation-list',                 'Backend\ExplanationController@explanations_list');
		Route::get('/explanation-data-table',           'Backend\ExplanationController@explanations_data_table');
		Route::get('/explanation-edit/{id}',            'Backend\ExplanationController@explanation_edit');
		Route::post('/explanation-edit',                'Backend\ExplanationController@explanation_edit_action');	  

	  
	   //Videos 
        Route::get('/videos-entry',                     'Backend\VideosController@index');
        Route::post('/video-entry',                     'Backend\VideosController@video_entry');       
        Route::get('/video-edit/{id}',                  'Backend\VideosController@video_edit');
        Route::post('/video-edit',                      'Backend\VideosController@video_edit_action'); 
        Route::post('/video-owners-list' ,              'Backend\VideosController@videos_owners_list');
        Route::get('/video-list',                       'Backend\VideosController@videos_list');
        Route::get('/video-list-data-table',            'Backend\VideosController@videos_list_data_table');
        Route::get('/video-delete/{id}',                'Backend\VideosController@videos_delete_action');
        Route::get('/mobile-application-video-entry' ,  'Backend\VideosController@mobile_app_videos_entry');
        Route::post('/mobile-application-video-entry' , 'Backend\VideosController@mobile_app_videos_entry_action');        
        
        //Audios 
        Route::get('/audios-entry',                    'Backend\AudiosController@index');
        Route::post('/audios-entry',                   'Backend\AudiosController@audios_entry');
        Route::get('/audio-edit/{id}',                 'Backend\AudiosController@audio_edit');
        Route::post('/audio-edit',                     'Backend\AudiosController@audio_edit_action');
        Route::get('/audios-list',                     'Backend\AudiosController@audios_list');
        Route::get('/audio-list-data-table',           'Backend\AudiosController@audios_list_data_table');
        Route::get('/audio-delete/{id}',               'Backend\AudiosController@delete_audio');
        
        //Crazy Mindset
        Route::get('/crazy-mindset-audio-entry',             'Backend\CrazyMindsetController@index');
        Route::post('/crazy-mindset-audio-entry',            'Backend\CrazyMindsetController@crazy_audio_entry');
        Route::get('/crazy-mindset-audio-list',              'Backend\CrazyMindsetController@audio_list');
        Route::get('/crazy-mindset-audio-list-data-table',   'Backend\CrazyMindsetController@audio_list_data_table');
        Route::get('/crazy-mindset-audio-edit/{id}',         'Backend\CrazyMindsetController@audio_edit');
        Route::post('/crazy-mindset-audio-edit',             'Backend\CrazyMindsetController@audio_edit_action');
        Route::get('/crazy-mindset-audio-delete/{id}',       'Backend\CrazyMindsetController@audio_delete');


		//menu controller
		Route::get('/menu-list',                 		'Ecm\MenuController@menu_list');
		Route::get('/menu-data-table',          		'Ecm\MenuController@menu_data_table');
		Route::get('/menu-edit/{id}',					'Ecm\MenuController@menu_edit');
		Route::post('/menu-edit',        		        'Ecm\MenuController@menu_edit_action');	

		//Slider image setup
        Route::get('/slider-image-entry',			  'Ecm\SliderImageController@index');
        Route::post('/slider-image-entry',            'Ecm\SliderImageController@slider_entry');
        Route::get('/slider-image-list',              'Ecm\SliderImageController@slider_list');
        Route::get('/slider-image-list-data-table',   'Ecm\SliderImageController@slider_list_data_table');
        Route::get('/slider-image-edit/{id}',         'Ecm\SliderImageController@slider_edit');
        Route::post('/slider-image-edit',             'Ecm\SliderImageController@slider_edit_action');
        Route::get('/slider-image-delete/{id}',       'Ecm\SliderImageController@slider_delete');

        //Logo Chnage
        Route::get('/logo-edit/{id}',      		 'Ecm\LogoController@logo_edit');
        Route::post('/logo-edit-action',           'Ecm\LogoController@logo_edit_action');

/*        //Address and thumbnail image
        Route::get('/address', 		       		 	'Ecm\AddressController@address_edit');
        Route::post('/address-edit-action',           'Ecm\LogoController@address_edit_action');*/

		//Catagory setup
        Route::get('/message-entry',			  'Ecm\MessageController@index');
        Route::post('/message-entry',             'Ecm\MessageController@message_entry');
        Route::get('/message-list',               'Ecm\MessageController@message_list');
        Route::get('/message-list-data-table',    'Ecm\MessageController@message_list_data_table');
        Route::get('/message-edit/{id}',          'Ecm\MessageController@message_edit');
        Route::post('/message-edit',              'Ecm\MessageController@message_edit_action');
        Route::get('/message-delete/{id}',        'Ecm\MessageController@message_delete');


		//Catagory setup
        Route::get('/catagory-entry',			  'Ecm\CatagoryController@index');
        Route::post('/catagory-entry',            'Ecm\CatagoryController@catagory_entry');
        Route::get('/catagory-list',              'Ecm\CatagoryController@catagory_list');
        Route::get('/catagory-list-data-table',   'Ecm\CatagoryController@catagory_list_data_table');
        Route::get('/catagory-edit/{id}',         'Ecm\CatagoryController@catagory_edit');
        Route::post('/catagory-edit',             'Ecm\CatagoryController@catagory_edit_action');
        Route::post('/catagory-delete',       'Ecm\CatagoryController@catagory_delete');

		//News Feed Setup
        Route::get('/newsfeed-entry',			  'Ecm\NewsfeedController@index');
        Route::post('/newsfeed-entry',            'Ecm\NewsfeedController@newsfeed_entry');
        Route::get('/newsfeed-list',              'Ecm\NewsfeedController@newsfeed_list');
        Route::get('/newsfeed-list-data-table',   'Ecm\NewsfeedController@newsfeed_list_data_table');
        Route::get('/newsfeed-edit/{id}',         'Ecm\NewsfeedController@newsfeed_edit');
        Route::post('/newsfeed-edit',             'Ecm\NewsfeedController@newsfeed_edit_action');
        Route::get('/newsfeed-delete/{id}',       'Ecm\NewsfeedController@newsfeed_delete');


       //product setup
        Route::get('/product-entry',				  'Ecm\ProductController@index');
        Route::post('/product-entry',           	  'Ecm\ProductController@product_entry');
        Route::get('/product-list',             	  'Ecm\ProductController@product_list');
        Route::get('/product-list-data-table',  	  'Ecm\ProductController@product_list_data_table');
        Route::get('/product-edit/{id}',        	  'Ecm\ProductController@product_edit');
        Route::post('/product-edit',            	  'Ecm\ProductController@product_edit_action');
        Route::get('/product-delete/{id}',      	  'Ecm\ProductController@product_delete');


        //product order
        Route::get('/order-list/{id}',      'Ecm\ShopManagerController@order_list');
        Route::get('/order-list-data-table/{id}',      'Ecm\ShopManagerController@order_list_data_table');
        Route::get('/order-delete-all/{id}',      'Ecm\ShopManagerController@order_delete_all');
        Route::get('/order-deliver-all/{id}',      'Ecm\ShopManagerController@order_delivered_all');
        Route::get('/order-delete/{id}',      'Ecm\ShopManagerController@order_delete');
        Route::get('/order-deliver/{id}',      'Ecm\ShopManagerController@order_delivered');

                // row groupoing data
		Route::get('/master-data/{id}',   'Ecm\ShopManagerController@getMasterData');
		Route::get('/details-data/{id}',   'Ecm\ShopManagerController@getDetailsData');   

        //Member Management
        Route::get('/member-list',      'Ecm\MemberController@member_list');
        Route::get('/member-list-data-table',    'Ecm\MemberController@member_list_data_table');
        Route::get('/member-delete/{id}',      'Ecm\MemberController@member_delete');
        Route::get('/member-deactive/{id}',      'Ecm\MemberController@member_deactive');


        // other pages
		Route::get('/otherpage-entry',                'Ecm\OtherpageController@index');
		Route::post('/otherpage-entry',               'Ecm\OtherpageController@otherpage_entry');
		Route::get('/otherpage-list',                 'Ecm\OtherpageController@otherpage_list');
		Route::get('/otherpage-list-data-table',           'Ecm\OtherpageController@otherpage_list_data_table');
		Route::get('/otherpage-edit/{id}',            'Ecm\OtherpageController@otherpage_edit');
		Route::post('/otherpage-edit',                'Ecm\OtherpageController@otherpage_edit_action');	 
		Route::get('/otherpage-delete/{id}',                'Ecm\OtherpageController@otherpage_delete');

        //foooter setting
        
        //Footer Change Chnage
        Route::get('/footer-edit/{id}',      		 'Ecm\FooterController@footer_edit');
        Route::post('/footer-edit-action',           'Ecm\FooterController@footer_edit_action');	

        //Business Member Audition
        Route::get('/business-member-audition-request',                 'Backend\BusinessMemberAuditionController@index');
        Route::get('/business-member-audition-request-data-table',      'Backend\BusinessMemberAuditionController@member_request_list_data_table');
                
        //Question and Answer
        Route::get('/question-answer-request',                          'Backend\QuestionAnswerController@index');
        Route::get('/question-answer-request-data-table',               'Backend\QuestionAnswerController@question_answer_request_list_data_table');              
        
        //Majime Terrorist 
         Route::get('/majime-terrorist-requests',                       'Backend\MajimeTerroristController@index');
         Route::get('/majime-terrorist-requests-data-table',            'Backend\MajimeTerroristController@majime_terrorist_request_list_data_table');
        	     
	     //Mobile Application
         Route::get('/mobile-application-user-comments'  ,              'Backend\MobileApplicationController@index');
         Route::get('/mobile-application-user-comments-data-table'  ,   'Backend\MobileApplicationController@user_comments_data_table');         
	 
		 //Blockchain Related Lecture
		 Route::get('/blockchain-related-lecture-user-comments'             , 'Backend\BlockchainRelatedLectureController@index');
         Route::get('/blockchain-related-lecture-user-comments-data-table'  , 'Backend\BlockchainRelatedLectureController@user_comments_data_table');         
         
         //Bitcoin Related Lecture            
		 Route::get('/bitcoin-related-lecture-user-comments'             ,   'Backend\BitcoinRelatedLectureController@index');
         Route::get('/bitcoin-related-lecture-user-comments-data-table'  ,   'Backend\BitcoinRelatedLectureController@user_comments_data_table');                 
         
         //User Point Distribution
          Route::get('/user-activity-point-distribution',                   'Backend\UserPointDistributionController@index');
          Route::post('/user-activity-point-entry',                         'Backend\UserPointDistributionController@point_entry');
          Route::get('/user-activity-point-distribution-list',              'Backend\UserPointDistributionController@point_list');
          Route::get('/user-point-distribution-list-data-table',            'Backend\UserPointDistributionController@point_list_data_table');
          
    	 // Route::get('/build-query' , 'Backend\MembershipPowerController@buildQ');	

          // test ..................................................data / image upload testing
        Route::get('/test_data_up',             'Backend\TestUploadController@index');
        Route::post('/test_data_up',            'Backend\TestUploadController@test_upload');
        Route::get('/test_data_show',           'Backend\TestUploadController@test_list');
        Route::get('/test-list-data-table',     'Backend\TestUploadController@test_list_data_table');
        Route::get('/test-list-delete/{id}',    'Backend\TestUploadController@test_delete');
        Route::get('/test-list-edit/{id}',     	'Backend\TestUploadController@test_edit');
        Route::post('/test-list-edit',   	  	'Backend\TestUploadController@test_edit_action');




    
    });

});




//=========================Start Audio Files =======================================
Route::get('/1191943727/01',        'YourCustomAudioController@index');
Route::get('/1191943727/embed/01',  'YourCustomAudioController@embed');

Route::get('/665414882/02',        'YourCustomAudioController@index');
Route::get('/665414882/embed/02',  'YourCustomAudioController@embed');

Route::get('/154811160/03',        'YourCustomAudioController@index');
Route::get('/154811160/embed/03',  'YourCustomAudioController@embed');

Route::get('/1153644103/04',        'YourCustomAudioController@index');
Route::get('/1153644103/embed/04',  'YourCustomAudioController@embed');

Route::get('/153241602/05',        'YourCustomAudioController@index');
Route::get('/153241602/embed/05',  'YourCustomAudioController@embed');

Route::get('/657064407/06',        'YourCustomAudioController@index');
Route::get('/657064407/embed/06',  'YourCustomAudioController@embed');

Route::get('/1040951274/07',        'YourCustomAudioController@index');
Route::get('/1040951274/embed/07',  'YourCustomAudioController@embed');

Route::get('/238002124/08',        'YourCustomAudioController@index');
Route::get('/238002124/embed/08',  'YourCustomAudioController@embed');

Route::get('/323101237/09',        'YourCustomAudioController@index');
Route::get('/323101237/embed/09',  'YourCustomAudioController@embed');

Route::get('/844341157/10',        'YourCustomAudioController@index');
Route::get('/844341157/embed/10',  'YourCustomAudioController@embed');

Route::get('/745504363/11',        'YourCustomAudioController@index');
Route::get('/745504363/embed/11',  'YourCustomAudioController@embed');

Route::get('/215215942/12',        'YourCustomAudioController@index');
Route::get('/215215942/embed/12',  'YourCustomAudioController@embed');

Route::get('/1106332716/13',        'YourCustomAudioController@index');
Route::get('/1106332716/embed/13',  'YourCustomAudioController@embed');

Route::get('/315922300/14',        'YourCustomAudioController@index');
Route::get('/315922300/embed/14',  'YourCustomAudioController@embed');
 
Route::get('/1064841046/15',        'YourCustomAudioController@index');
Route::get('/1064841046/embed/15',  'YourCustomAudioController@embed');

Route::get('/1138870147/16',        'YourCustomAudioController@index');
Route::get('/1138870147/embed/16',  'YourCustomAudioController@embed');

Route::get('/133543927/17',         'YourCustomAudioController@index');
Route::get('/133543927/embed/17',  'YourCustomAudioController@embed');

Route::get('/833960629/18',        'YourCustomAudioController@index');
Route::get('/833960629/embed/18',  'YourCustomAudioController@embed');

Route::get('/920809611/19',        'YourCustomAudioController@index');
Route::get('/920809611/embed/19',  'YourCustomAudioController@embed');

Route::get('/714424827/20',        'YourCustomAudioController@index');
Route::get('/714424827/embed/20',  'YourCustomAudioController@embed');

Route::get('/1154692520/21',        'YourCustomAudioController@index');
Route::get('/1154692520/embed/21',  'YourCustomAudioController@embed');

Route::get('/456769281/22',        'YourCustomAudioController@index');
Route::get('/456769281/embed/22',  'YourCustomAudioController@embed');

Route::get('/1086299978/23',        'YourCustomAudioController@index');
Route::get('/1086299978/embed/23',  'YourCustomAudioController@embed');

Route::get('/946570914/24',        'YourCustomAudioController@index');
Route::get('/946570914/embed/24',  'YourCustomAudioController@embed');

Route::get('/845723863/25',        'YourCustomAudioController@index');
Route::get('/845723863/embed/25',  'YourCustomAudioController@embed');

Route::get('/713905132/26',        'YourCustomAudioController@index');
Route::get('/713905132/embed/26',  'YourCustomAudioController@embed');

Route::get('/696505045/27',        'YourCustomAudioController@index');
Route::get('/696505045/embed/27',  'YourCustomAudioController@embed');

Route::get('/996611389/28',        'YourCustomAudioController@index');
Route::get('/996611389/embed/28',  'YourCustomAudioController@embed');

Route::get('/321482121/29',        'YourCustomAudioController@index');
Route::get('/321482121/embed/29',  'YourCustomAudioController@embed');

Route::get('/910463001/30',        'YourCustomAudioController@index');
Route::get('/910463001/embed/30',  'YourCustomAudioController@embed');

//======================End Audio Files ================================================ 