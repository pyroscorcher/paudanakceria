<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ShowInfo()
    {
        return view('user.info', [
            'navbar' => 'My Menu'
        ]);
    }

    public function ShowDaftar()
    {
        return view('user.daftar', [
            'navbar' => 'My Menu'
        ]);
    }

    public function ShowLogin()
    {
        return view('user.login');
    }

    public function ShowPengumuman()
    {
        return view('user.pengumuman', [
            'navbar' => 'My Menu'
        ]);
    }

    public function ShowKontak()
    {
        return view('user.kontak', [
            'navbar' => 'My Menu'
        ]);
    }

    public function ShowBeranda()
    {
        return view('user.home', [
        'navbar' => 'My Menu'
]);
    }
}
