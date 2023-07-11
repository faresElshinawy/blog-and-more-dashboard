<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EndUserPostController;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\PlanController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\GenderController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\FeatureController;
use App\Http\Controllers\Dashboard\PostTagController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\FeedbackController;
use App\Http\Controllers\Dashboard\QuestionController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\StatisticsController;
use App\Http\Controllers\Dashboard\ProjectTeamController;
use App\Http\Controllers\Dashboard\PostCategoryController;
use App\Http\Controllers\Dashboard\ProjectImageController;
use App\Http\Controllers\Dashboard\ProjectCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware'=>'prevent-back-history'],function(){

    Route::controller(LoginController::class)->prefix('dashboard')->as('dashboard.')->group(function(){
        Route::get('login','index')->name('login');
        Route::post('login/store','store')->name('login.store');
        Route::post('logout','logout')->name('logout');
    });

    Route::middleware('IsLoged')->prefix('dashboard')->as('dashboard.')->group(function(){
        Route::middleware('IsAdmin')->group(function(){

            Route::controller(GenderController::class)->prefix('gender')->as('gender.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{gender}/edit','edit')->name('edit');
                Route::put('{gender}/update','update')->name('update');
                Route::delete('{gender}/delete','destroy')->name('delete');
            });

            Route::controller(CountryController::class)->prefix('country')->as('country.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{country}/edit','edit')->name('edit');
                Route::put('{country}/update','update')->name('update');
                Route::delete('{country}/delete','destroy')->name('delete');
            });

            Route::controller(DepartmentController::class)->prefix('department')->as('department.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{department}/edit','edit')->name('edit');
                Route::put('{department}/update','update')->name('update');
                Route::delete('{department}/delete','destroy')->name('delete');
            });

            Route::controller(UserController::class)->prefix('user')->as('user.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{user}/edit','edit')->name('edit');
                Route::put('{user}/update','update')->name('update');
                Route::delete('{user}/delete','destroy')->name('delete');
            });

            Route::controller(ClientController::class)->prefix('client')->as('client.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{client}/edit','edit')->name('edit');
                Route::put('{client}/update','update')->name('update');
                Route::delete('{client}/delete','destroy')->name('delete');
            });

            Route::controller(FeatureController::class)->prefix('feature')->as('feature.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{feature}/edit','edit')->name('edit');
                Route::put('{feature}/update','update')->name('update');
                Route::delete('{feature}/delete','destroy')->name('delete');
            });

            Route::controller(ContactController::class)->prefix('contact')->as('contact.')->group(function(){
                Route::get('/','index')->name('all');
                Route::delete('{contact}/delete','destroy')->name('delete');
            });

            Route::controller(PlanController::class)->prefix('plan')->as('plan.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{plan}/edit','edit')->name('edit');
                Route::put('{plan}/update','update')->name('update');
                Route::delete('{plan}/delete','destroy')->name('delete');
            });

            Route::controller(QuestionController::class)->prefix('question')->as('question.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{question}/edit','edit')->name('edit');
                Route::put('{question}/update','update')->name('update');
                Route::delete('{question}/delete','destroy')->name('delete');
            });

            Route::controller(ServiceController::class)->prefix('service')->as('service.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{service}/edit','edit')->name('edit');
                Route::put('{service}/update','update')->name('update');
                Route::delete('{service}/delete','destroy')->name('delete');
            });

            Route::controller(SettingController::class)->prefix('setting')->as('setting.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{setting}/edit','edit')->name('edit');
                Route::put('{setting}/update','update')->name('update');
                Route::delete('{setting}/delete','destroy')->name('delete');
            });

            Route::controller(FeedbackController::class)->prefix('feedback')->as('feedback.')->group(function(){
                Route::get('/','index')->name('all');
                Route::delete('{feedback}/delete','destroy')->name('delete');
            });

            Route::controller(StatisticsController::class)->prefix('statistics')->as('statistics.')->group(function(){
                Route::get('/','index')->name('show');
            });
        });
        Route::group([],function(){
            Route::controller(PostCategoryController::class)->prefix('postCategory')->as('postCategory.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{postCategory}/edit','edit')->name('edit');
                Route::put('{postCategory}/update','update')->name('update');
                Route::delete('{postCategory}/delete','destroy')->name('delete');
            });

            Route::controller(TagController::class)->prefix('tag')->as('tag.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{tag}/edit','edit')->name('edit');
                Route::put('{tag}/update','update')->name('update');
                Route::delete('{tag}/delete','destroy')->name('delete');
            });

            Route::controller(PostController::class)->prefix('post')->as('post.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('myPosts','index')->name('myPosts.all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{post}/edit','edit')->name('edit');
                Route::put('{post}/update','update')->name('update');
                Route::delete('{post}/delete','destroy')->name('delete');
                Route::controller(PostTagController::class)->as('postTag.')->group(function(){
                    Route::get('{post}/postTag','index')->name('all');
                    Route::delete('postTag/{postTag}/delete','destroy')->name('delete');
                });
            });

            Route::controller(ProjectCategoryController::class)->prefix('projectCategory')->as('projectCategory.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{projectCategory}/edit','edit')->name('edit');
                Route::put('{projectCategory}/update','update')->name('update');
                Route::delete('{projectCategory}/delete','destroy')->name('delete');
            });

            Route::controller(ProjectController::class)->prefix('project')->as('project.')->group(function(){
                Route::get('/','index')->name('all');
                Route::get('myProjects','myProjects')->name('myProjects.all');
                Route::get('create','create')->name('create');
                Route::post('store','store')->name('store');
                Route::get('{project}/edit','edit')->name('edit');
                Route::put('{project}/update','update')->name('update');
                Route::delete('{project}/delete','destroy')->name('delete');

                Route::controller(ProjectImageController::class)->as('image.')->group(function(){
                    Route::get('{project}/image','index')->name('all');
                    Route::post('{project}/image/store','store')->name('store');
                    Route::delete('image/{projectImage}/delete','destroy')->name('delete');
                });


                Route::controller(ProjectTeamController::class)->as('team.')->group(function(){
                    Route::get('{project}/team','index')->name('all');
                    Route::post('{project}/team/store','store')->name('store');
                    Route::delete('team/{projectTeam}/delete','destroy')->name('delete');
                });
            });

            Route::controller(ProfileController::class)->prefix('profile')->as('profile.')->group(function(){
                Route::get('/','index')->name('show');
                Route::put('update','update')->name('update');
            });
        });
    });

    // Route::as('site.')->group(function(){

    //     Route::controller(HomeController::class)->group(function(){
    //         Route::get('','index')->name('home');
    //     });

    // });
});

