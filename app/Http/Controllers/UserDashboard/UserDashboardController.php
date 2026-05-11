<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    public function dataAnak(){
        $anakData = DB::table('data_anak')->get();
        return view('user.data_anak', [
            'side_navbar' => 'Slide Menu',
            'header_dashboard' => 'Header Dashboard',
            'anakData' => $anakData
        ]);
    }
}