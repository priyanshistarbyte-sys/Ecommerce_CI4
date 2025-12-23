<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Address extends BaseController
{
    public function index()
    {
        $data = [
            'show_nav'     => false,
            'hide_footer'  => true,
            'back_btn'     => true,
            'load_page'    => 'address',
            'page_title'   => 'Shipping Address',
            'header_title' => 'Add delivery address',
        ];

        return view('common_template/common', $data);
    }
}