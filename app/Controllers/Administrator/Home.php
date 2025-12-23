<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function __construct()
    {
        helper(['common']);

        if (!is_logged()) {
            redirect()->to(site_url('administrator/login'))->send();
            exit;
        }
    }

    /* Dashboard */
    public function index()
    {
        $data = [
            'header'           => 'Dashboard',
            'loadPage'         => 'dashboard',
            'curTemplateName'  => 'administrator/dashboard',
        ];

        return view('administrator/commonTemplates/templateLayout', $data);
    }
}
