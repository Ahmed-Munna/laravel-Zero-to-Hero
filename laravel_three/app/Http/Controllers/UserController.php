<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request, string $id): RedirectResponse {

        $name = $request->input('name');

        //dd($id);
        // if ($request->is('store/*')) {
        //     dd($request->path());
        // }

        //$url = $request->url(); // $request->fullUrl();

        //$host = $request->host();

        //$host = $request->schemeAndHttpHost();

        // $host = $request->httpHost();

        $ip = $request->ip();

        dd($ip);
        

        return redirect()->back();
    }

    public function create() {

        return response('Hello World', 200)
                  ->cookie('name', 'MunnaVau');
    }
}
