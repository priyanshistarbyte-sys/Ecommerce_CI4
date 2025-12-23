<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Category extends BaseController
{
    protected $db;
    protected $model;

    public function __construct()
    {
        helper(['common']);

        $this->db = db_connect();

        // your custom model (same logic as CI3)
        $this->model = new \App\Models\CommonModel();
    }

    public function index($catId = "")
    {
        if ($catId) {

            $CategoryDetails = $this->model->get_all_records(
                'category',
                ['unique_id' => $catId],
                true,
                'id,cat_name'
            );

            if (!empty($CategoryDetails)) {

                $products = $this->db->table('tbl_product')
                    ->where('category', $CategoryDetails['id'])
                    ->orderBy('index', 'ASC')
                    ->get()
                    ->getResultArray();

                $data = [
                    'products'              => $products,
                    'CategoryDetails'       => $CategoryDetails,
                    'load_page'             => 'category_details',
                    'page_title'            => 'Buy ' . $CategoryDetails['cat_name'],
                    'header_title'          => $CategoryDetails['cat_name'],
                    'save_product_details' => true,
                    'show_nav'              => false,
                    'hide_footer'           => false,
                    'back_btn'              => true,
                ];

                return view('common_template/common', $data);

            } else {
                return redirect()->to('/');
            }

        } else {

            $data = [
                'load_page'             => 'categories',
                'page_title'            => 'boAt Wearables Categories',
                'save_product_details'  => true,
                'show_nav'              => true,
                'hide_footer'           => false,
                'back_btn'              => true,
            ];

            return view('common_template/common', $data);
        }
    }
}
