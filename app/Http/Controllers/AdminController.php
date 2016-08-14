<?php

namespace fooCart\Http\Controllers;

use Illuminate\Http\Request;

use fooCart\Http\Requests;

class AdminController extends BaseAdminController
{
    /**
     * Display the administrative screen.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('auth.admin.login');
    }

    public function authenticate()
    {
        //Handle admin user authentication POST
    }
}
