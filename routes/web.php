<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\app\auth\LoginController;
use App\Http\Controllers\app\AdminController;
use App\Http\Controllers\app\HomeController;
use App\Http\Controllers\app\ServiceController;
use App\Http\Controllers\app\BlogController;
use App\Http\Controllers\app\BannerController;
use App\Http\Controllers\web\HomeController as WebHome;
use App\Http\Controllers\app\SiteController;
use App\Http\Controllers\app\AboutController;
use App\Http\Controllers\app\TagController;
use App\Http\Controllers\app\ContactController;
use App\Http\Controllers\app\PortfolioController;
use App\Http\Controllers\app\CategoryController;
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

Route::get('/', [WebHome::class,'home']);
Route::get('/home', [WebHome::class,'home']);
Route::get('/about-us', [WebHome::class,'about_us']);
Route::get('/service', [WebHome::class, 'services']);
Route::get('/service/{parent_short_url}/{short_url?}', [WebHome::class, 'service']);
Route::get('/portfolio', [WebHome::class,'portfolio']);
Route::get('/project/{short_url}', [WebHome::class,'portfolio_detail']);
Route::get('/blogs', [WebHome::class,'blogs']);
Route::get('/blog/{short_url}', [WebHome::class,'blog_detail']);
Route::get('/contact-us', [WebHome::class,'contact_us']);
Route::post('contact-form-submit', [WebHome::class,'contact_store']);
Route::post('/quote-form-submit', [WebHome::class,'getAQuoteStore']);
Route::get('/form-captcha-refresh', [WebHome::class,'refreshMathCaptcha']);
Route::post('loadMore', [WebHome::class,'loadMore']);
Route::get('/privacy-policy',[WebHome::class,'policy']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [LoginController::class,'showLoginForm'])->middleware('guest');
    Route::post('/', [LoginController::class,'login']);
    Route::post('forgot-password', [LoginController::class,'forgot_password']);
    Route::get('reset-password/{token}', [LoginController::class,'reset_password']);
    Route::post('reset-password', [LoginController::class,'reset_password_store']);
    Route::post('reset-password-store', [LoginController::class,'reset_password_store']);
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('dashboard', [HomeController::class,'dashboard']);

    /************************** Admin starts *****************************/

    Route::group(['prefix' => 'administration'], function () {
        Route::get('/', [AdminController::class,'list']);
        Route::get('create', [AdminController::class,'create']);
        Route::post('create', [AdminController::class,'store']);
        Route::get('edit/{id}', [AdminController::class,'edit']);
        Route::get('view/{id}', [AdminController::class,'view']);
        Route::post('edit/{id}', [AdminController::class,'update']);
        Route::post('delete/', [AdminController::class,'delete_admin']);
        Route::group(['prefix' => 'reset-password'], function () {
            Route::get('/{id}', [AdminController::class,'reset_password']);
            Route::post('/{id}', [AdminController::class,'reset_password_store']);
        }); 
    }); 

    /************************** Admin ends ********************************/

    Route::prefix('banner')->group(function () {
        Route::get('/{type}', [BannerController::class, 'banner']);   
        Route::post('{type}', [BannerController::class, 'banner_store']);     
    });

    /***************************** Site Information ***********************/

    Route::group(['prefix' => 'contact'], function () {
        Route::get('list/', [ContactController::class, 'contact_list']);
        Route::get('view/{id}', [ContactController::class, 'contact_view']);
        Route::post('replay_to_contact/',[ContactController::class, 'replay_to_contact']);
        Route::post('delete_contact/',[ContactController::class, 'delete_contact']);
        Route::post('delete_multi_contact/',[ContactController::class, 'delete_multi_contact']);
        
        Route::get('quote_list/', [ContactController::class, 'quote_list']);
        Route::post('replay_to_quote/',[ContactController::class, 'replay_to_quote']);
        Route::post('delete_quote/',[ContactController::class, 'delete_quote']);
        Route::post('delete_multi_quote/',[ContactController::class, 'delete_multi_quote']);
        
        Route::get('page', [ContactController::class, 'contact_page']);
        Route::post('page', [ContactController::class, 'contact_page_store']);

        Route::group(['prefix' => 'office-address'], function () {
            Route::get('/', [ContactController::class,'office_address']);
            Route::get('create', [ContactController::class,'office_address_create']);
            Route::post('create', [ContactController::class,'office_address_store']);
            Route::get('edit/{id}', [ContactController::class,'office_address_edit']);
            Route::post('edit/{id}', [ContactController::class,'office_address_update']);
            Route::post('delete', [ContactController::class,'delete_office_address']);
        });
    });

    Route::group(['prefix' => 'site-information'], function () {
        Route::get('/', [ContactController::class, 'site_information']);
        Route::post('/', [ContactController::class, 'site_information_store']);
    });

    /************************** Home starts *******************************/
 
    Route::group(['prefix' => 'home'], function () {
        Route::post('sort_order/', [HomeController::class,'sort_order']);

        Route::group(['prefix' => 'hero'], function () {
            Route::get('/', [HomeController::class,'hero_settings']);
            Route::post('content', [HomeController::class,'hero_content_update']);
            Route::post('video', [HomeController::class,'hero_video_update']);
            Route::post('working-hours', [HomeController::class,'working_hours_update']);
            Route::post('cta-icons', [HomeController::class,'cta_icons_update']);
        });

        Route::group(['prefix' => 'key-feature'], function () {
            Route::get('/', [HomeController::class,'key_feature']);
            Route::get('create', [HomeController::class,'key_feature_create']);
            Route::post('create', [HomeController::class,'key_feature_store']);
            Route::get('edit/{id}', [HomeController::class,'key_feature_edit']);
            Route::post('edit/{id}', [HomeController::class,'key_feature_update']);
            Route::post('delete', [HomeController::class,'delete_key_feature']);
        });  

        Route::group(['prefix' => 'what-we-do'], function () {
            Route::get('/', [HomeController::class,'what_we_do']);
            Route::post('/', [HomeController::class,'what_we_do_store']);
        });

        Route::group(['prefix' => 'why-choose-us'], function () {
            Route::get('/', [HomeController::class,'why_choose_us']);
            Route::post('/', [HomeController::class,'why_choose_us_store']);
            Route::group(['prefix' => 'list'], function () {
                Route::get('/', [HomeController::class,'list']);
                Route::get('create', [HomeController::class,'list_create']);
                Route::post('create', [HomeController::class,'list_store']);
                Route::get('edit/{id}', [HomeController::class,'list_edit']);
                Route::post('edit/{id}', [HomeController::class,'list_update']);
                Route::post('delete', [HomeController::class,'delete_list']);
            });
        });

        Route::group(['prefix' => 'who-we-are'], function () {
            Route::get('/', [HomeController::class,'who_we_are']);
            Route::post('/', [HomeController::class,'who_we_are_store']);
        });

        Route::group(['prefix' => 'testimonial'], function () {
            Route::get('/', [HomeController::class,'testimonial']);
            Route::get('create', [HomeController::class,'testimonial_create']);
            Route::post('create', [HomeController::class,'testimonial_store']);
            Route::get('edit/{id}', [HomeController::class,'testimonial_edit']);
            Route::post('edit/{id}', [HomeController::class,'testimonial_update']);
            Route::post('delete', [HomeController::class,'delete_testimonial']);
        });

        Route::group(['prefix' => 'our-client'], function () {
            Route::get('/', [HomeController::class,'our_client']);
            Route::post('/', [HomeController::class,'our_client_store']);
            Route::group(['prefix' => 'list'], function () {
                Route::get('/', [HomeController::class,'client']);
                Route::get('create/', [HomeController::class,'client_create']);
                Route::post('create/', [HomeController::class,'client_store']);
                Route::get('edit/{id}', [HomeController::class,'client_edit']);
                Route::post('edit/{id}', [HomeController::class,'client_update']);
                Route::get('view/{id}', [HomeController::class,'client_view']);
                Route::post('delete/', [HomeController::class,'delete_client']);
            });
        });

        Route::group(['prefix' => 'faq'], function () {
            Route::get('/', [HomeController::class,'faq']);
            Route::post('/', [HomeController::class,'faq_store']);
            Route::group(['prefix' => 'list'], function () {
                Route::get('/', [HomeController::class,'faq_list']);
                Route::get('create', [HomeController::class,'faq_create']);
                Route::post('create', [HomeController::class,'faq_item_store']);
                Route::get('edit/{id}', [HomeController::class,'faq_edit']);
                Route::post('edit/{id}', [HomeController::class,'faq_item_update']);
                Route::post('delete', [HomeController::class,'delete_faq']);
            });
        });
    });

    Route::post('status-change', [HomeController::class,'status_change']);

    /******************* Home ends **********************/

    /****************** About starts *********************/

    Route::group(['prefix' => 'about-us'], function () {        
        Route::get('/', [AboutController::class,'about_us']);
        Route::post('/', [AboutController::class,'about_us_store']);

        Route::group(['prefix' => 'our-team'], function () {
            Route::get('/', [AboutController::class,'our_team']);
            Route::post('/', [AboutController::class,'our_team_store']);
            Route::group(['prefix' => 'list'], function () {
                Route::get('/', [AboutController::class,'list']);
                Route::get('create', [AboutController::class,'list_create']);
                Route::post('create', [AboutController::class,'list_store']);
                Route::get('edit/{id}', [AboutController::class,'list_edit']);
                Route::post('edit/{id}', [AboutController::class,'list_update']);
                Route::post('delete', [AboutController::class,'delete_list']);
            });
        });
    });

    /***************** About ends *************************/

    /**************** Blog starts *************************/

    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [BlogController::class,'list']);
        Route::get('create', [BlogController::class,'create']);
        Route::post('create', [BlogController::class,'store']);
        Route::get('edit/{id}', [BlogController::class,'edit']);
        Route::post('edit/{id}', [BlogController::class,'update']);
        Route::post('delete', [BlogController::class,'delete']);
    });

    /***************** Blog ends ***************************/

    /****************** service ends *************************/

    Route::group(['prefix' => 'service'], function () {

        Route::get('/', [ServiceController::class,'service']);
        Route::post('/display-to-home', [ServiceController::class,'display_to_home']);
        Route::get('create/', [ServiceController::class,'service_create']);
        Route::post('create/', [ServiceController::class,'service_store']);
        Route::get('edit/{id}', [ServiceController::class,'service_edit']);
        Route::post('edit/{id}', [ServiceController::class,'service_update']);
        Route::get('view/{id}', [ServiceController::class,'service_view']);
        Route::post('delete/', [ServiceController::class,'service_delete']);

        Route::group(['prefix' => 'faq'], function () {
            Route::get('{serviceId}', [ServiceController::class, 'service_faq_list']);
            Route::get('{serviceId}/create', [ServiceController::class, 'service_faq_create']);
            Route::post('{serviceId}/create', [ServiceController::class, 'service_faq_store']);
            Route::get('{serviceId}/edit/{id}', [ServiceController::class, 'service_faq_edit']);
            Route::post('{serviceId}/edit/{id}', [ServiceController::class, 'service_faq_update']);
            Route::post('{serviceId}/delete', [ServiceController::class, 'delete_service_faq']);
        });

        Route::group(['prefix' => 'sub'], function () {
            Route::get('/', [ServiceController::class,'sub_service']);
            Route::get('create/', [ServiceController::class,'sub_service_create']);
            Route::post('create/', [ServiceController::class,'sub_service_store']);
            Route::get('edit/{id}', [ServiceController::class,'sub_service_edit']);
            Route::post('edit/{id}', [ServiceController::class,'sub_service_update']);
            Route::post('delete/', [ServiceController::class,'delete_sub_service']);
        });
    });

    /******************* service ends ****************************/

    /******************* portfolio starts ************************/

    Route::group(['prefix' => 'portfolio'], function () {

        Route::group(['prefix' => 'category'], function () {
            Route::get('/', [CategoryController::class, 'category']);
            Route::get('create/', [CategoryController::class, 'category_create']);
            Route::post('create/', [CategoryController::class, 'category_store']);
            Route::get('edit/{id}', [CategoryController::class, 'category_edit']);
            Route::post('edit/{id}', [CategoryController::class, 'category_update']);
            Route::get('view/{id}', [CategoryController::class, 'category_view']);
            Route::post('delete/', [CategoryController::class, 'delete_category']);
        });

        Route::group(['prefix' => 'item'], function () {
            Route::get('/', [portfolioController::class, 'portfolio']);
            Route::post('display-to-home/', [portfolioController::class, 'display_to_home']);
            Route::get('create/', [portfolioController::class, 'portfolio_create']);
            Route::post('create/', [portfolioController::class, 'portfolio_store']);
            Route::get('edit/{id}', [portfolioController::class, 'portfolio_edit']);
            Route::post('edit/{id}', [portfolioController::class, 'portfolio_update']);
            Route::post('delete/', [portfolioController::class, 'delete_portfolio']);

            Route::prefix('gallery')->group(function () {
                Route::get('/{portfolio_id}', [portfolioController::class, 'gallery']);
                Route::get('create/{portfolio_id}', [portfolioController::class, 'gallery_create']);
                Route::post('create/{portfolio_id}', [portfolioController::class, 'gallery_store']);
                Route::get('edit/{id}', [portfolioController::class, 'gallery_edit']);
                Route::post('edit/{id}', [portfolioController::class, 'gallery_update']);
                Route::post('delete/', [portfolioController::class, 'gallery_delete']);
            });

        });

    });

    /****************** portfolio ends ***************************/

    /****************** Meta Tags Starts *************************/
    
    Route::group(['prefix' => 'tag'], function () {
        Route::get('/{type}/', [TagController::class,'tag']);
        Route::post('/{type}/', [TagController::class,'tag_store']);
    });
    Route::group(['prefix' => 'other-meta-tag'], function () {
        Route::get('/', [TagController::class,'other_meta_tag']);
        Route::post('/', [TagController::class,'other_meta_tag_store']);
    });

    /****************** Meta Tags Ends ****************************/

    Route::get('logout', [LoginController::class,'logout']);
});
