<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\WelcomeNotification;
use Illuminate\Support\Facades\Notification;
class HomeController extends Controller
{
    public function index()
    {
        $users = User::get();
        $post = ['title' => 'post title', 'slug' => 'post-slug'];

        foreach ($users as $user) {
            Notification::send($user, new WelcomeNotification($post));
        }
        dd('done');
    }
}
