<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;

class TopController extends Controller
{
    public function index()
    {
        // ユーザー情報を取得したつもり
        $user = new User([
            'name'  => 'Test User',
            'point' => 9613,
        ]);

        return view('top', ['user' => $user]);
    }
}
