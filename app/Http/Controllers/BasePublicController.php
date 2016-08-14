<?php

namespace fooCart\Http\Controllers;

use fooCart\Core\User\User;
use Illuminate\Http\Request;

/**
 * Class BasePublicController
 * @package fooCart\Http\Controllers
 */
class BasePublicController extends Controller
{
    /**
     * @var
     */
    protected $user;

    /**
     * BasePublicController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->user = null;
        if ($userId = session()->get('userId', false)) {
            $this->user = User::find($userId);
        }
    }
}
