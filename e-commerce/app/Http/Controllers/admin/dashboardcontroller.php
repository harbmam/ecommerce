<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    public function dashboard()
    {
        $data ['header_tittle'] = 'Dashboard';
        return view('admin.dashboard',$data);
    }
}
