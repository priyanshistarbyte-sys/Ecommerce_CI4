<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Models\CommonModel;

class Products extends BaseController
{
    protected $db;
    protected $model;

    public function __construct()
    {
        helper(['common']);

        if (!is_logged()) {
            redirect()->to(site_url('administrator/login'))->send();
            exit;
        }

        $this->db    = db_connect();
        $this->model = new CommonModel();
    }

    /* =======================
     * Product List
     * ======================= */
    public function index()
    {
        $data['products_list'] = $this->model->get_all_records(
            'tbl_product',
            [],
            false,
            '*',
            ['index' => 'ASC']
        );

        $data['header']          = 'Products List';
        $data['loadPage']        = 'products';
        $data['curTemplateName'] = 'administrator/manage_products/view_products';

        return view('administrator/commonTemplates/templateLayout', $data);
    }

    /* =======================
     * CREATE PRODUCTS (CSV)
     * ======================= */
    public function create()
    {
        $data = [];

        if ($this->request->getPost('submit')) {

            $outputjson = ['success' => 0];

            $file = $this->request->getFile('file');

            if (!$file || !$file->isValid()) {
                $outputjson['message'] = 'File not found';
            } elseif ($file->getExtension() !== 'csv') {
                $outputjson['message'] = 'Only CSV files are allowed';
            } else {

                $targetPath = WRITEPATH . 'uploads/';
                $fileName   = date('Y_m_d_h_i_s_') . $file->getName();
                $file->move($targetPath, $fileName);

                $handle = fopen($targetPath . $fileName, 'r');

                if ($handle !== false) {

                    $is_header = true;
                    $last_item = [];

                    while (($row = fgetcsv($handle, 40000, ',')) !== false) {

                        if ($is_header) {
                            $is_header = false;
                            continue;
                        }

                        $unique_name    = $row[0] ?? '';
                        $name           = $row[1] ?? '';
                        $fetaures       = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $row[2] ?? '');
                        $color          = $row[9] ?? '';
                        $selling_price  = $row[20] ?? '';
                        $mrp            = $row[21] ?? '';
                        $img1           = $row[25] ?? '';

                        if (!$unique_name && !$name && !$color) {
                            continue;
                        }

                        $unique_name = ($unique_name === '-' || $unique_name === '')
                            ? ($last_item['unique_name'] ?? '')
                            : $unique_name;

                        $product = $this->model->get_all_records(
                            'tbl_product',
                            ['unique_name' => $unique_name],
                            true
                        );

                        if ($product) {
                            $product_id = $product['id'];
                        } else {
                            $last_item = [
                                'unique_name'   => $unique_name,
                                'name'          => $name,
                                'selling_price' => $selling_price,
                                'mrp'           => $mrp,
                                'fetaures'      => $fetaures,
                                'img1'          => $img1,
                                'from_csv'      => 1,
                            ];

                            $product_id = $this->model->insert_data('tbl_product', $last_item);
                        }

                        $exists = $this->model->counts(
                            'tbl_product_verient',
                            ['product_id' => $product_id, 'color' => $color]
                        );

                        if (!$exists && $color) {
                            $this->model->insert_data('tbl_product_verient', [
                                'product_id'    => $product_id,
                                'name'          => $name,
                                'color'         => $color,
                                'selling_price' => $selling_price,
                                'mrp'           => $mrp,
                                'fetaures'      => $fetaures,
                                'img1'          => $img1,
                                'from_csv'      => 1,
                            ]);
                        }
                    }

                    fclose($handle);
                    unlink($targetPath . $fileName);

                    $outputjson['success'] = 1;
                    $outputjson['message'] = 'Data inserted Successfully';
                }
            }

            if ($outputjson['success']) {
                $data['suc_msg'] = $outputjson['message'];
            } else {
                $data['error_msg'] = $outputjson['message'];
            }
        }

        $data['header']          = 'Add Products';
        $data['loadPage']        = 'products';
        $data['curTemplateName'] = 'administrator/manage_products/add_edit_products';

        return view('administrator/commonTemplates/templateLayout', $data);
    }

    /* =======================
     * DELETE PRODUCT
     * ======================= */
    public function delete()
    {
        $delete_id = $this->request->getPost('delete_id');

        if (!$delete_id) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $this->db->table('tbl_product')->where('id', $delete_id)->delete();
        $this->db->table('tbl_product_verient')->where('product_id', $delete_id)->delete();

        return $this->response->setBody('1');
    }

    /* =======================
     * UPDATE INDEX
     * ======================= */
    public function update_index()
    {
        $index = $this->request->getPost('product_index') ?? 1000;
        $id    = $this->request->getPost('product_id');

        if ($id) {
            $this->model->update_data('tbl_product', ['id' => $id], ['index' => $index]);
        }
    }

    public function update_category()
    {
        $cat = $this->request->getPost('product_category');
        $id  = $this->request->getPost('product_id');

        if ($id && $cat) {
            $this->model->update_data('tbl_product', ['id' => $id], ['category' => $cat]);
        }
    }

    public function update_hide_show()
    {
        $id = $this->request->getPost('product_id');

        if ($id !== null) {
            $this->model->update_data(
                'tbl_product',
                ['id' => $id],
                ['is_show' => $this->request->getPost('is_show')]
            );
        }
    }

    public function all_hide_product()
    {
        $this->model->update_data('tbl_product', [], ['is_show' => 0]);
        return redirect()->to(site_url('administrator/products'));
    }

    public function all_show_product()
    {
        $this->model->update_data('tbl_product', [], ['is_show' => 1]);
        return redirect()->to(site_url('administrator/products'));
    }

    public function remove_all_product()
    {
        $this->db->table('tbl_product')->truncate();
        $this->db->table('tbl_product_verient')->truncate();

        return redirect()->to(site_url('administrator/products'));
    }

    public function update_verient_price()
    {
        $verient_id = $this->request->getPost('verient_id');
        $product_id = $this->request->getPost('product_id');
        $price      = $this->request->getPost('price');

        if ($verient_id && $price) {

            $this->model->update_data(
                'tbl_product_verient',
                ['id' => $verient_id],
                ['selling_price' => $price]
            );

            if ($this->request->getPost('is_first')) {
                $this->model->update_data(
                    'tbl_product',
                    ['id' => $product_id],
                    ['selling_price' => $price]
                );
            }
        }
    }
}
