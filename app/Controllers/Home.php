<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommonModel;

class Home extends BaseController
{
    protected $db;
    protected $model;

    public function __construct()
    {
        helper(['common']);

        $this->db = db_connect();
        $this->model = new CommonModel();

        // same as CI3
        if (function_exists('isMobileDevice')) {
            isMobileDevice();
        }
    }

    /* Home Page */
    public function index()
    {
        // Get settings data for header
        $website = base_url();
        $settings_data = $this->model->get_all_records("settings", ["website_url" => $website], true);
        
        // Get categories for offer page
        $categories = $this->db->table('category')
            ->orderBy('index', 'ASC')
            ->get()
            ->getResultArray();

        $data = [
            'load_page'      => 'offer',
            'page_title'     => 'Sale Sale Sale - Home',
            'show_nav'       => true,
            'hide_footer'    => false,
            'back_btn'       => false,
            'settings_data'  => $settings_data,
            'categories'     => $categories,
        ];

        return view('common_template/common', $data);
    }

    /* Product AJAX Load */
    public function product()
    {
        $page  = $this->request->getGet('page');
        $limit = 30;
        $start = 0;

        if (is_numeric($page) && $page != 1) {
            $start = ($page * $limit) - $limit;
        }

        // products
        $products = $this->db->table('tbl_product')
            ->where('is_show', 1)
            ->orderBy('index', 'ASC')
            ->orderBy('id', 'ASC')
            ->limit($limit, $start)
            ->get()
            ->getResultArray();

        // total count
        $total_products = $this->model->counts('tbl_product', ['is_show' => 1]);
        $total_page = ceil($total_products / $limit);

        $html = '';

        foreach ($products as $product_details) {

            $mrp = (intval($product_details['mrp'] ?? 0) > 0)
                ? $product_details['mrp']
                : 9999;

            $remain_percentage = ($product_details['selling_price'] * 100) / $mrp;
            $offer_percentage  = round(100 - $remain_percentage);

            $html .= '<div class="product-card" data-url="' . base_url('product/' . md5($product_details['id'])) . '" 
                data-id="' . $product_details['id'] . '" onclick="showRewardedAdForProduct(this.dataset.url)" style="cursor: pointer;">
                <div class="product-img">
                    <img src="' . $product_details['img1'] . '" alt="">
                </div>
                <div class="product-details">
                    <h3 class="product-name">' . $product_details['name'] . '</h3>
                    <div class="product-price">
                        <span class="sell-price">$' . $product_details['selling_price'] . '</span>
                        <span class="mrp-price line-through">$' . $mrp . '</span>
                        <span class="off-percentage">' . $offer_percentage . '% off</span>
                    </div>
                    <p class="free-delivery">Free Delivery</p>
                </div>
            </div>';
        }

        // Return JSON response
        return $this->response->setJSON([
            'html'       => $html,
            'total_page' => $total_page,
            'start'      => $start,
        ]);
    }

    /* Sale Page */
    public function sale()
    {
        return view('sale');
    }
}
