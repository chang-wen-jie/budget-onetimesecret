<?php

namespace App\Http\Controllers;

use App\Models\Secret;
use Illuminate\Http\Request;

class SecretController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $secret_link = str_random(32);
        $secret_message = $request->input('data');

        Secret::create([
            'link' => $secret_link,
            'data' => $secret_message,
        ]);

        return redirect()->back()->with('success', 'Jouw sleutelnummer: ' . $secret_link);
    }

    public function show($link)
    {
        $secret = Secret::where('link', $link)->firstOrFail();
        $secret->update(['expired' => true]);
//        $secret->delete();

        return view('secret', ['secret' => $secret->data]);
//        Route::get('/user/{id}', function (Request $request, $id) {
//            return 'User '.$id;
//        });
    }

    public function navigate(Request $request)
    {
        $path = $request->input('path');
        return redirect('secrets/'.$path);
    }
}
