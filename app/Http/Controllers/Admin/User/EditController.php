<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
}
