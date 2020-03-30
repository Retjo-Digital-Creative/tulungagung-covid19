<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends MainController
{
	/**
	 * Display admin dashboard
	 * 
	 * @return View
	 */
    public function __invoke()
    {
    	return view('admin.home.index');
    }
}
