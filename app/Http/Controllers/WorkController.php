<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    public function add(Request $request)
    {
        $validatedFields = $request->validate([
            'name' => 'required',
        ]);

        $file = $request->file('image');
        if(!$file || !$file->isValid())
            return redirect(route('profile'))->withErrors(__('site_names.file'));

        $validatedFields['image'] = $file->store('works');
        $validatedFields['user_id'] = Auth::id();
        $validatedFields['description'] = $request->input('description');

        Work::create($validatedFields);
        return redirect(route('profile'));
    }
}
