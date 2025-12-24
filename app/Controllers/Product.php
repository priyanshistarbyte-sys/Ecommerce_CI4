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
        $builder = $this->db->table('tbl_product p');
        $builder->select('
            p.*,
            GROUP_CONCAT(DISTINCT pv.size) AS sizes,
            GROUP_CONCAT(DISTINCT pv.storage) AS storages,
            cat.cat_name AS category_name
        ');
        $builder->join('tbl_product_verient pv', 'pv.product_id = p.id', 'inner');
        $builder->join('category cat', 'cat.id = p.category', 'left');
        $builder->where('MD5(p.id)', $id);
        $builder->groupBy('p.id');

        $result = $builder->get()->getRowArray();

        if (!$result) {
            return [];
        }

        $product_id = $result['id'];

        // Colors
        $result['colors'] = $this->db->table('tbl_product_verient')
            ->select('
                color AS color_name,
                MIN(color_code) AS color_code,
                MIN(img1) AS img1,
                MIN(img2) AS img2,
                MIN(img3) AS img3,
                MIN(img4) AS img4,
                MIN(img5) AS img5,
                MIN(selling_price) AS selling_price,
                MIN(mrp) AS mrp
            ')
            ->where('product_id', $product_id)
            ->groupBy('color')
            ->get()
            ->getResultArray();

        // Storage
        $result['storage'] = $this->db->table('tbl_product_verient')
            ->select('
                storage,
                MIN(selling_price) AS selling_price,
                MIN(mrp) AS mrp
            ')
            ->where('product_id', $product_id)
            ->groupBy('storage')
            ->get()
            ->getResultArray();

        return $result;
    }
}
