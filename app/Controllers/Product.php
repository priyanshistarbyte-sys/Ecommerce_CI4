<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Product extends BaseController
{
    protected $db;

    public function __construct()
    {
        helper(['common']);
        $this->db = db_connect();
    }

    /* Product Details Page */
    public function index($productId = null)
    {
        if (!$productId) {
            return redirect()->to('/');
        }

        $productDetails = $this->getProductById($productId);

        if (!empty($productDetails)) {

            $data = [
                'product_details'        => $productDetails,
                'page_title'             => $productDetails['name'] ?? '',
                'load_page'              => 'product_details',
                'save_product_details'   => true,
                'show_nav'               => false,
                'hide_footer'            => true,
                'back_btn'               => true,
            ];

            return view('common_template/common', $data);
        }

        return redirect()->to('/');
    }

    /* Fetch Product Details */
    public function getProductById($id)
    {
        // Main product query
        $builder = $this->db->table('tbl_product p');
        $builder->select(
            'p.*,
             GROUP_CONCAT(DISTINCT pv.size) AS sizes,
             GROUP_CONCAT(DISTINCT pv.storage) AS storages,
             cat.cat_name AS category_name'
        );
        $builder->join('tbl_product_verient pv', 'pv.product_id = p.id', 'inner');
        $builder->join('category cat', 'cat.id = p.category', 'left');
        $builder->where('MD5(p.id)', $id);
        $builder->groupBy('p.id');

        $result = $builder->get()->getRowArray();

        if (!$result) {
            return [];
        }

        $product_id = $result['id'];

        /* Fetch distinct colors */
        $result['colors'] = $this->db->table('tbl_product_verient')
            ->select('color AS color_name, color_code, img1, img2, img3, img4, img5, selling_price, mrp')
            ->where('product_id', $product_id)
            ->groupBy('color')
            ->get()
            ->getResultArray();

        /* Fetch distinct storage options */
        $result['storage'] = $this->db->table('tbl_product_verient')
            ->select('storage, selling_price, mrp')
            ->where('product_id', $product_id)
            ->groupBy('storage')
            ->get()
            ->getResultArray();

        return $result;
    }
}
