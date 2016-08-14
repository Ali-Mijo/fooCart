<?php

namespace fooCart\Http\Controllers\Auth;

use fooCart\Http\Controllers\BasePublicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 * @package fooCart\Http\Controllers\Auth
 */
class AuthController extends BasePublicController
{
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var mixed
     */
    protected $postLogout;

    /**
     * AuthController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->postLogout = env('POST_LOGOUT_URL');
        $this->request = $request;
        parent::__construct($request);
    }

    /**
     * Show the form for authenticating a user.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Log a user in.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => true])) {
            $user = Auth::user();

            session()->set([
                'userId' => $user->id,
                'userName' => $user->name
            ]);

            if ($this->request->ajax()) {
                return json_encode([
                    'status' => 'success'
                ]);
            }
            //Redirect to user account page if not AJAX
        }

        if ($this->request->ajax()) {
            return json_encode([
                'status' => 'error'
            ]);
        }

        return redirect('login.show');
    }

    /**
     * Log a user out.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function logout(Request $request)
    {
        session()->forget('userId');

        if ($this->request->ajax()) {
            return json_encode([
                'status' => 'success',
                'url' => $this->postLogout
            ]);
        }

        return redirect($this->postLogout);
    }
}
