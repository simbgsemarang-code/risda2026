<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $inactive = 'nav-item nav-link';
        $active = 'btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0';

        return view('layouts/main', [
            'c' => [$active, $inactive, $inactive, $inactive, $inactive, $inactive, $inactive, $inactive, $inactive],
            'visitorTotal' => model(\App\Models\VisitorModel::class)->recordAndCount(),
            'content' => view('home', ['Judul' => '']),
        ]);
    }
}
