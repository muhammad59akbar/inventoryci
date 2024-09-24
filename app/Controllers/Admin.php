<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'tester',
        ];
        return view('Dashboard', $data);
    }
    public function Product(): string
    {
        $data = [
            'title' => 'List Product',
        ];
        return view('ListProduct', $data);
    }
}
