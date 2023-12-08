<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\USerController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\GenderController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\FeatureController;
use App\Http\Controllers\Api\PostTagController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\EmailController;
use App\Http\Controllers\Api\StatisticsController;
use App\Http\Controllers\Api\ProjectTeamController;
use App\Http\Controllers\Api\PostCategoryController;
use App\Http\Controllers\Api\ProjectImageController;
use App\Http\Controllers\Api\ProjectCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(LoginController::class)->group(function(){
    Route::post('login','login')->name('login');
    Route::post('logout','logout')->name('logout')->middleware('auth:sanctum');
});

Route::middleware(['auth:sanctum','ApiLoged'])->group(function(){

    Route::middleware('ApiAdmin')->group(function(){

        Route::controller(GenderController::class)->prefix('gender')->as('gender.')->group(function(){
            Route::get('/','index');
            Route::post('store','store');
            Route::post('{gender}/update','update');
            Route::post('{gender}/delete','destroy');
        });

        Route::controller(CountryController::class)->prefix('country')->as('country.')->group(function(){
            Route::get('/','index');
            Route::post('/store','store');
            Route::post('{country}/update','update');
            Route::post('{country}/delete','destroy');
        });

        Route::controller(DepartmentController::class)->prefix('department')->as('department.')->group(function(){
            Route::get('/','index');
            Route::post('store','store');
            Route::post('{department}/update','update');
            Route::post('{department}/delete','destroy');
        });

        Route::controller(UserController::class)->prefix('user')->as('user.')->group(function(){
            Route::get('/{search?}','index');
            Route::post('store','store');
            Route::post('{user}/update','update');
            Route::post('{user}/delete','destroy');
        });

        Route::controller(ClientController::class)->prefix('client')->as('client.')->group(function(){
            Route::get('/','index');
            Route::post('store','store');
            Route::post('{client}/update','update');
            Route::post('{client}/delete','destroy');
        });

        Route::controller(FeatureController::class)->prefix('feature')->as('feature.')->group(function(){
            Route::get('/','index');
            Route::post('store','store');
            Route::post('{feature}/update','update');
            Route::post('{feature}/delete','destroy');
        });

        Route::controller(ContactController::class)->prefix('contact')->as('contact.')->group(function(){
            Route::get('/','index');
            Route::post('store','store');
            Route::post('{contact}/update','update');
            Route::post('{contact}/delete','destroy');
        });

        Route::controller(PlanController::class)->prefix('plan')->as('plan.')->group(function(){
            Route::get('/','index');
            Route::post('store','store');
            Route::post('{plan}/update','update');
            Route::post('{plan}/delete','destroy');
        });

        Route::controller(QuestionController::class)->prefix('question')->as('question.')->group(function(){
            Route::get('/','index');
            Route::post('store','store');
            Route::post('{question}/update','update');
            Route::post('{question}/delete','destroy');
        });

        Route::controller(ServiceController::class)->prefix('service')->as('service.')->group(function(){
            Route::get('/','index');
            Route::post('store','store');
            Route::post('{service}/update','update');
            Route::post('{service}/delete','destroy');
        });

        Route::controller(SettingController::class)->prefix('setting')->as('setting.')->group(function(){
            Route::get('/','index');
            Route::post('store','store');
            Route::post('{setting}/update','update');
            Route::post('{setting}/delete','destroy');
        });

        Route::controller(FeedbackController::class)->prefix('feedback')->as('feedback.')->group(function(){
            Route::get('/','index');
            Route::post('store','store');
            Route::post('{feedback}/update','update');
            Route::post('{feedback}/delete','destroy');
        });

        Route::controller(StatisticsController::class)->prefix('statistics')->as('statistics.')->group(function(){
            Route::get('{time_start?}/{time_ends?}','index');
        });
    });

    Route::controller(PostCategoryController::class)->prefix('postCategory')->as('postCategory.')->group(function(){
        Route::get('/','index');
        Route::post('store','store');
        Route::post('{postCategory}/update','update');
        Route::post('{postCategory}/delete','destroy');
    });

    Route::controller(TagController::class)->prefix('tag')->as('tag.')->group(function(){
        Route::get('/','index');
        Route::post('store','store');
        Route::post('{tag}/update','update');
        Route::post('{tag}/delete','destroy');
    });

    Route::controller(PostController::class)->prefix('post')->as('post.')->group(function(){
        Route::get('/','index')->middleware('ApiAdmin');
        Route::get('myPosts','myPosts');
        Route::post('store','store');
        Route::post('{post}/update','update');
        Route::post('{post}/delete','destroy');
        Route::controller(PostTagController::class)->as('postTag.')->group(function(){
            Route::get('{post}/postTag','index');
            Route::post('{post}/postTag/store','store');
            Route::post('{post}/postTags/store','storeTags');
            Route::post('postTag/{postTag}/delete','destroy');
        });
    });

    Route::controller(ProjectCategoryController::class)->prefix('projectCategory')->as('projectCategory.')->group(function(){
        Route::get('/','index');
        Route::post('store','store');
        Route::post('{projectCategory}/update','update');
        Route::post('{projectCategory}/delete','destroy');
    });

    Route::controller(ProjectController::class)->prefix('project')->as('project.')->group(function(){
        Route::get('/','index')->middleware('ApiAdmin');
        Route::get('myProjects','myProjects');
        Route::post('store','store')->middleware('ApiAdmin');
        Route::post('{project}/update','update')->middleware('ApiAdmin');
        Route::post('{project}/delete','destroy')->middleware('ApiAdmin');

        Route::middleware('ApiAdmin')->controller(ProjectImageController::class)->as('image.')->group(function(){
            Route::get('{project}/image','index');
            Route::post('{project}/image/store','store');
            Route::post('image/{projectImage}/delete','destroy');
        });

        Route::middleware('ApiAdmin')->controller(ProjectTeamController::class)->as('team.')->group(function(){
            Route::get('{project}/team','index');
            Route::post('{project}/team/store','store');
            Route::post('team/{projectTeam}/delete','destroy');
        });
    });

    Route::controller(ProfileController::class)->prefix('profile')->as('profile.')->group(function(){
        Route::get('/','index');
        Route::post('update','update');
    });
});

Route::prefix('EndUser')->group(function () {
    Route::controller(GenderController::class)->prefix('gender')->as('gender.')->group(function(){
        Route::get('/','index');
    });

    Route::controller(CountryController::class)->prefix('country')->as('country.')->group(function(){
        Route::get('/','index');
    });

    Route::controller(UserController::class)->prefix('user')->as('user.')->group(function(){
        Route::post('store','store');
        Route::post('{user}/update','update');
        Route::post('{user}/delete','destroy');
    });

    Route::controller(ClientController::class)->prefix('client')->as('client.')->group(function(){
        Route::get('/','index');
    });

    Route::controller(FeatureController::class)->prefix('feature')->as('feature.')->group(function(){
        Route::get('/','index');
    });

    Route::controller(ContactController::class)->prefix('contact')->as('contact.')->group(function(){
        Route::post('store','store');
        Route::post('{contact}/update','update');
        Route::post('{contact}/delete','destroy');
    });

    Route::controller(PlanController::class)->prefix('plan')->as('plan.')->group(function(){
        Route::get('/','index');
    });

    Route::controller(QuestionController::class)->prefix('question')->as('question.')->group(function(){
        Route::get('/','index');
    });

    Route::controller(ServiceController::class)->prefix('service')->as('service.')->group(function(){
        Route::get('/','index');
    });


    Route::controller(FeedbackController::class)->prefix('feedback')->as('feedback.')->group(function(){
        Route::get('','index');
        Route::post('store','store');
        Route::post('{feedback}/update','update');
        Route::post('{feedback}/delete','destroy');
    });

    Route::controller(ProjectController::class)->prefix('project')->as('project.')->group(function(){
        Route::get('/','index');

        Route::controller(ProjectImageController::class)->as('image.')->group(function(){
            Route::get('{project}/image','index');
        });
    });

    Route::controller(PostController::class)->prefix('post')->as('post.')->group(function(){
        Route::get('/','index');
    });

    Route::controller(ProfileController::class)->prefix('profile')->as('profile.')->group(function(){
        Route::get('/','index');
        Route::post('update','update');
    });

});

Route::get('send-email',[EmailController::class,'send'])->middleware(['auth:sanctum','ApiLoged']);



