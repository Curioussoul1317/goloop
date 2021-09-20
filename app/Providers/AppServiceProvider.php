<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\faq;
use App\Models\follow;
use App\Models\event_category;
use App\Models\admin_notifications;
use App\Models\user_notifications;

use View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // composeing all the views....
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                if (Auth::user()->account_type == "user") {
                    $user = User::Where('id', Auth::user()->id)->first();
                    $follow = follow::Where('follower_id', Auth::user()->id)->orWhere('following_id', Auth::user()->id)->get();
                    $following = $follow->Where('follower_id', Auth::user()->id)->count();
                    $followers = $follow->Where('following_id', Auth::user()->id)->count();
                    if ($user->account_of == "") {
                        $profiles = User::Where('account_of', Auth::user()->id)->get();
                    } else {
                        $mainuser = User::Where('id', Auth::user()->account_of)->first();
                        $profiles = User::Where('account_of', $mainuser->id)->get();
                    }
                    $events = event_category::all();
                    $suggestions = User::Where('id', '!=', Auth::user()->id)->get();
                    $notifications = user_notifications::where('status', 1)->get();
                    View::share([
                        'user' => $user, 'following' => $following, 'followers' => $followers, 'profiles' => $profiles,
                        'events' => $events, 'suggestions' => $suggestions, 'notifications' => $notifications,
                    ]);
                } else {
                    $user = User::Where('id', Auth::user()->id)->first();
                    $notifications = admin_notifications::where('status', 1)->get();
                    $faqnotfications = faq::where('status', 0)->get();
                    View::share([
                        'user' => $user, 'notifications' => $notifications, 'faqnotfications' => $faqnotfications,
                    ]);
                }
            } else {
            }
        });
    }
}
