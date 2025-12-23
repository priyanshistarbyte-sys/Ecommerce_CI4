<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommonModel;

class Cart extends BaseController
{
    protected $db;
    protected $model;

    public function __construct()
    {
        $this->db = db_connect();
        $this->model = new CommonModel();
    }
    
    /* Dashbaord */

    public function index()
    {
        // Get settings data for header
        $website = base_url();
        $settings_data = $this->model->get_all_records("settings", ["website_url" => $website], true);

        $data['show_nav']       = false;
        $data['hide_footer']    = true;
        $data['back_btn']       = true;
        $data['is_cart_page']   = true;
        $data['load_page']      = "cart";
        $data['page_title']     = "Add to Cart";
        $data['header_title']   = "CART";
        $data['settings_data']  = $settings_data;

        return view("common_template/common", $data);
    }
}
