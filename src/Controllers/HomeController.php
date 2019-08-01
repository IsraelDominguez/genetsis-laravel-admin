<?php namespace Genetsis\Admin\Controllers;

class HomeController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
        \View::share('section', 'home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (view()->exists('pages.admin-home')) {
            return view('pages.admin-home');
        }
        return view('genetsis-admin::pages.home');
    }
}
