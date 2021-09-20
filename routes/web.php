<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index')->name('index');

Route::get('/otp', function () {
    return view('auth.verifyotp');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify', 'Auth\RegisterController@verifyEmail')->name('verify.email');
Route::post('/verifycode', 'Auth\RegisterController@verifyCode')->name('verifycode.code');
Route::post('/resendcode', 'Auth\RegisterController@resendcode')->name('resendcode.code');

// Route::get('/testmail', 'AboutController@sendmail')->name('testmail');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\AboutController::class, ''])->name('testmail');
Route::group(['prefix' => 'UserAccount'], function () {
    Route::get('/', 'UserAccountSettingController@index')->name('UserAccount.index');
    Route::post('store', 'UserAccountSettingController@store')->name('UserAccount.store');
    Route::post('update', 'UserAccountSettingController@update')->name('UserAccount.update');
    Route::post('password', 'UserAccountSettingController@password')->name('UserAccount.password');
});

Route::group(['prefix' => 'KidsAccount'], function () {
    Route::post('store', 'KidsAccountController@store')->name('KidsAccount.store');
});

Route::group(['prefix' => 'AccountSwitch'], function () {
    Route::get('/{id}', 'AccountSwitchController@index')->name('AccountSwitch.index');
});

Route::group(['prefix' => 'Achievements'], function () {
    Route::get('/{id}', 'AchievementController@index')->name('Achievements.index');
});

Route::group(['prefix' => 'UserPost'], function () {
    Route::get('/', 'PostController@index')->name('UserPost.index');
    Route::post('store', 'PostController@store')->name('UserPost.store');
    Route::post('destroy', 'PostController@destroy')->name('UserPost.destroy');
});

Route::group(['prefix' => 'UserComment'], function () {
    Route::get('/', 'CommentController@index')->name('UserComment.index');
    Route::post('store', 'CommentController@store')->name('UserComment.store');
    Route::post('destroy', 'CommentController@destroy')->name('UserComment.destroy');
});

Route::group(['prefix' => 'UserLikes'], function () {
    Route::get('/', 'LikeController@index')->name('UserLikes.index');
    Route::post('store', 'LikeController@store')->name('UserLikes.store');
});

Route::post('message-request', 'ContactUsController@store');
Route::post('subscribe-request', 'SubscriptionController@store');
Route::post('Faq-request', 'FaqController@store');

Route::group(['prefix' => 'Product'], function () {
    Route::get('/', 'ProductController@index')->name('Product.index');
    Route::post('store', 'ProductController@store')->name('Product.store');
    Route::post('destroy', 'ProductController@destroy')->name('Product.destroy');
    Route::get('/{id}', 'ProductController@show')->name('Product.show');
});

Route::group(['prefix' => 'GoloopEvents'], function () {
    Route::get('/', 'GoloopEventsController@index')->name('GoloopEvents.index');
    Route::post('store', 'GoloopEventsController@store')->name('GoloopEvents.store');
    Route::post('destroy', 'GoloopEventsController@destroy')->name('GoloopEvents.destroy');
    Route::get('/{id}', 'GoloopEventsController@show')->name('GoloopEvents.show');
});

Route::group(['prefix' => 'MyEvents'], function () {
    Route::get('/', 'MyEventsController@index')->name('MyEvents.index');
    Route::post('store', 'MyEventsController@store')->name('MyEvents.store');
    Route::post('destroy', 'MyEventsController@destroy')->name('MyEvents.destroy');
    Route::get('/{id}', 'MyEventsController@show')->name('MyEvents.show');
});

Route::group(['prefix' => 'Cart'], function () {
    Route::get('/', 'CartController@index')->name('Cart.index');
    Route::get('/{id}', 'CartController@show')->name('Cart.show');
    Route::post('store', 'CartController@store')->name('Cart.store');
    Route::post('update', 'CartController@update')->name('Cart.update');
    Route::post('destroy', 'CartController@destroy')->name('Cart.destroy');
});


Route::group(['prefix' => 'AdminEvents'], function () {
    Route::get('/', 'EventController@index')->name('AdminEvents.index');
    Route::post('store', 'EventController@store')->name('AdminEvents.store');
    Route::post('update', 'EventController@update')->name('AdminEvents.update');
    Route::post('destroy', 'EventController@destroy')->name('AdminEvents.destroy');
});



Route::group(['prefix' => 'AdminEventCategory'], function () {
    Route::get('/', 'EventCategoryController@index')->name('AdminEventCategory.index');
    Route::post('store', 'EventCategoryController@store')->name('AdminEventCategory.store');
    Route::post('update', 'EventCategoryController@update')->name('AdminEventCategory.update');
    Route::get('/{id}', 'EventCategoryController@show')->name('AdminEventCategory.show');
    Route::post('destroy', 'EventCategoryController@destroy')->name('AdminEventCategory.destroy');
});

Route::group(['prefix' => 'AdminProduct'], function () {
    Route::get('/', 'AdminProductController@index')->name('AdminProduct.index');
    Route::post('store', 'AdminProductController@store')->name('AdminProduct.store');
    Route::get('/{id}', 'AdminProductController@show')->name('AdminProduct.show');
    Route::post('update', 'AdminProductController@update')->name('AdminProduct.update');
    Route::post('destroy', 'AdminProductController@destroy')->name('AdminProduct.destroy');
});
Route::group(['prefix' => 'AdminProductSize'], function () {
    Route::get('/', 'ProductsizeController@index')->name('AdminProductSize.index');
    Route::post('store', 'ProductsizeController@store')->name('AdminProductSize.store');
    Route::post('update', 'ProductsizeController@update')->name('AdminProductSize.update');
    Route::get('/{id}', 'ProductsizeController@show')->name('AdminProductSize.show');
    Route::post('destroy', 'ProductsizeController@destroy')->name('AdminProductSize.destroy');
});


Route::group(['prefix' => 'AdminPurchase'], function () {
    Route::get('/', 'DeliveryController@index')->name('AdminPurchase.index');
    Route::post('store', 'DeliveryController@store')->name('AdminPurchase.store');
    Route::get('/{id}', 'DeliveryController@show')->name('AdminPurchase.show');
    Route::get('/{id}/{update}', 'DeliveryController@update')->name('AdminPurchase.update');
    Route::post('destroy', 'DeliveryController@destroy')->name('AdminPurchase.destroy');
});

Route::group(['prefix' => 'AdminParticipants'], function () {
    Route::get('/', 'ParticipantsController@index')->name('AdminParticipants.index');
    Route::post('store', 'ParticipantsController@store')->name('AdminParticipants.store');
    Route::get('/{id}', 'ParticipantsController@show')->name('AdminParticipants.show');
    Route::get('/{id}/{update}', 'ParticipantsController@update')->name('AdminParticipants.update');
    Route::post('destroy', 'ParticipantsController@destroy')->name('AdminParticipants.destroy');
});

Route::group(['prefix' => 'TeamDetail'], function () {
    Route::get('/', 'TeamDetailController@index')->name('TeamDetail.index');
    Route::post('store', 'TeamDetailController@store')->name('TeamDetail.store');
    Route::get('/{id}/{catid}', 'TeamDetailController@show')->name('TeamDetail.show');
    Route::get('/{id}/{update}', 'TeamDetailController@update')->name('TeamDetail.update');
});

Route::group(['prefix' => 'ParticipentsDetail'], function () {
    Route::get('/', 'ParticipentsDetailController@index')->name('ParticipentsDetail.index');
    Route::post('store', 'ParticipentsDetailController@store')->name('ParticipentsDetail.store');
    Route::get('/{id}/{catid}', 'ParticipentsDetailController@show')->name('ParticipentsDetail.show');
    Route::get('/{id}/{update}', 'ParticipentsDetailController@update')->name('ParticipentsDetail.update');
});


Route::group(['prefix' => 'Adminprogress'], function () {
    Route::get('/', 'AdminProgressController@index')->name('Adminprogress.index');
    Route::post('store', 'AdminProgressController@store')->name('Adminprogress.store');
    Route::get('/{id}', 'AdminProgressController@show')->name('Adminprogress.show');
    Route::get('/{id}/{update}', 'AdminProgressController@update')->name('Adminprogress.update');
});

Route::group(['prefix' => 'AdminTeamprogress'], function () {
    Route::get('/', 'AdminTeamProgressController@index')->name('AdminTeamprogress.index');
    Route::post('store', 'AdminTeamProgressController@store')->name('AdminTeamprogress.store');
    Route::get('/{id}/{catid}', 'AdminTeamProgressController@show')->name('AdminTeamprogress.show');
});


Route::group(['prefix' => 'Adminteamanduser'], function () {
    Route::get('/{type}', 'AdminUserandTeamController@index')->name('Adminteamanduser.index');
    Route::post('store', 'AdminUserandTeamController@store')->name('Adminteamanduser.store');
    Route::get('/{id}/{type}', 'AdminUserandTeamController@show')->name('Adminteamanduser.show');
    Route::get('/{id}/{update}', 'AdminUserandTeamController@update')->name('Adminteamanduser.update');
});

Route::group(['prefix' => 'Slider'], function () {
    Route::get('/', 'SliderController@index')->name('Slider.index');
    Route::post('store', 'SliderController@store')->name('Slider.store');
    Route::get('/{id}', 'SliderController@show')->name('Slider.show');
});

Route::group(['prefix' => 'About'], function () {
    Route::get('/', 'AboutController@index')->name('About.index');
    Route::post('update', 'AboutController@update')->name('About.update');
});

Route::group(['prefix' => 'PrivatePolicy'], function () {
    Route::get('/', 'PrivatePolicyController@index')->name('PrivatePolicy.index');
    Route::post('update', 'PrivatePolicyController@update')->name('PrivatePolicy.update');
});

Route::group(['prefix' => 'TermsandCondition'], function () {
    Route::get('/', 'TermsAndConditionsController@index')->name('TermsandCondition.index');
    Route::post('update', 'TermsAndConditionsController@update')->name('TermsandCondition.update');
});

Route::group(['prefix' => 'Partner'], function () {
    Route::get('/', 'PartnersController@index')->name('Partner.index');
    Route::post('store', 'PartnersController@store')->name('Partner.store');
    Route::post('update', 'PartnersController@update')->name('Partner.update');
    Route::get('/{id}', 'PartnersController@show')->name('Partner.show');
    Route::post('destroy', 'PartnersController@destroy')->name('Partner.destroy');
});


Route::group(['prefix' => 'AdminFaq'], function () {
    Route::get('/', 'FaqController@index')->name('AdminFaq.index');
    Route::post('update', 'FaqController@update')->name('AdminFaq.update');
    Route::get('/{id}', 'FaqController@show')->name('AdminFaq.show');
});

Route::group(['prefix' => 'Admins'], function () {
    Route::get('/', 'AdminsController@index')->name('Admins.index');
    Route::post('store', 'AdminsController@store')->name('Admins.store');
    Route::post('update', 'AdminsController@update')->name('Admins.update');
    Route::get('/{id}', 'AdminsController@show')->name('Admins.show');
    Route::post('destroy', 'AdminsController@destroy')->name('Admins.destroy');
});

Route::group(['prefix' => 'TeamController'], function () {
    Route::get('/', 'TeamController@index')->name('TeamController.index');
    Route::post('store', 'TeamController@store')->name('TeamController.store');
    Route::post('update', 'TeamController@update')->name('TeamController.update');
    Route::get('/{id}', 'TeamController@show')->name('TeamController.show');
    Route::post('destroy', 'TeamController@destroy')->name('TeamController.destroy');
});


Route::group(['prefix' => 'Progress'], function () {
    Route::get('/', 'ProgressController@index')->name('Progress.index');
    Route::post('store', 'ProgressController@store')->name('Progress.store');
    Route::post('update', 'ProgressController@update')->name('Progress.update');
    Route::get('/{id}', 'ProgressController@show')->name('Progress.show');
    Route::post('destroy', 'ProgressController@destroy')->name('Team.destroy');
});


Route::group(['prefix' => 'AdminPurchaseHistory'], function () {
    Route::get('/', 'PurchaseHistoryController@index')->name('AdminPurchaseHistory.index');
});


Route::get('/OwnSearch/action', 'OwnSearchController@action')->name('OwnSearch.action');

Route::group(['prefix' => 'AddTeamMembers'], function () {
    Route::post('store', 'TeamMembersController@store')->name('AddTeamMembers.store');
});

Route::group(['prefix' => 'Userwall'], function () {
    Route::get('/{id}', 'UserWallController@index')->name('Userwall.index');
});
Route::group(['prefix' => 'Follow'], function () {
    Route::get('/{id}', 'FollowController@index')->name('Follow.index');
    Route::post('update', 'FollowController@update')->name('Follow.update');
});
Route::group(['prefix' => 'WallPicture'], function () {
    Route::post('update', 'WallPictureController@update')->name('WallPicture.update');
});

Route::group(['prefix' => 'Medals'], function () {
    Route::get('/', 'UserMedalController@index')->name('Medals.index');
    Route::post('store', 'UserMedalController@store')->name('Medals.store');
    Route::post('destroy', 'UserMedalController@destroy')->name('Medals.destroy');
    Route::get('/{id}', 'UserMedalController@show')->name('Medals.show');
});

Route::get('/test', function () {
    return view('');
});
