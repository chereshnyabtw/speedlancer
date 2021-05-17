<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{
    public function edit(Request $request)
    {
        $formFields = $request->only(['username']);

        $file = $request->file('avatar');

        if($file)
        {
            $path = $file->store('avatars');
            $formFields['avatar'] = $path;
        }


        User::where('id', Auth::id())->first()->update($formFields);

        return redirect(route('profile'));
    }
}
