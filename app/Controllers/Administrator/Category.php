<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Models\CommonModel;

class Category extends BaseController
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
     * Category List
     * ======================= */
    public function index()
    {
        $this->db->table('category')
            ->orderBy('index', 'ASC');

        $data['all_category'] = $this->model->get_all_records('category');

        $data['header']            = 'Category List';
        $data['loadPage']          = 'tool_category';
        $data['curTemplateName']   = 'administrator/manage_category/view_category';

        return view('administrator/commonTemplates/templateLayout', $data);
    }

    /* =======================
     * Create Category
     * ======================= */
    public function create()
    {
        if ($this->request->getPost('submit')) {

            $catName = $this->request->getPost('cat_name');

            $category_unique_id = strtolower(
                str_replace(' ', '-', trim(strip_tags($catName)))
            );

            $is_already = $this->model->counts(
                'category',
                ['unique_id' => $category_unique_id]
            );

            if (!$is_already) {
                $insert_array = [
                    'unique_id' => $category_unique_id,
                    'cat_name'  => $catName,
                    'cat_img'   => $this->request->getPost('cat_img'),
                ];

                $this->model->insert_data('category', $insert_array);
                return redirect()->to(site_url('administrator/category'));
            }
        }

        $data['header']            = 'Add Category';
        $data['loadPage']          = 'tool_category';
        $data['curTemplateName']   = 'administrator/manage_category/add_edit_category';

        return view('administrator/commonTemplates/templateLayout', $data);
    }

    /* =======================
     * Update Category
     * ======================= */
    public function update($category_id = 0)
    {
        if (!$category_id) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $con = ['id' => $category_id];
        $category_data = $this->model->get_all_records('category', $con, true);

        if (empty($category_data)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if ($this->request->getPost('submit')) {

            $catName = $this->request->getPost('cat_name');

            $category_unique_id = strtolower(
                str_replace(' ', '-', trim(strip_tags($catName)))
            );

            $is_already = $this->model->counts(
                'category',
                [
                    'unique_id' => $category_unique_id,
                    'id !='     => $category_id
                ]
            );

            if (!$is_already) {
                $update_array = [
                    'unique_id' => $category_unique_id,
                    'cat_name'  => $catName,
                    'cat_img'   => $this->request->getPost('cat_img'),
                ];

                $this->model->update_data('category', $con, $update_array);
                return redirect()->to(site_url('administrator/category'));
            }
        }

        $data['category_data']     = $category_data;
        $data['update']            = true;
        $data['header']            = 'Update Category';
        $data['loadPage']          = 'tool_category';
        $data['curTemplateName']   = 'administrator/manage_category/add_edit_category';

        return view('administrator/commonTemplates/templateLayout', $data);
    }

    /* =======================
     * Delete Category (AJAX)
     * ======================= */
    public function delete()
    {
        $delete_id = $this->request->getPost('delete_id');

        if (!$delete_id) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $category_data = $this->model->get_all_records(
            'category',
            ['id' => $delete_id],
            true
        );

        if (!empty($category_data['image'])) {
            @unlink($category_data['image']);
        }

        $this->db->table('category')
            ->where('id', $delete_id)
            ->delete();

        return $this->response->setBody('1');
    }

    /* =======================
     * Update Category Index
     * ======================= */
    public function update_index()
    {
        $category_index = $this->request->getPost('category_index') ?? 1000;
        $category_id    = $this->request->getPost('category_id');

        if ($category_index && $category_id) {
            $this->model->update_data(
                'category',
                ['id' => $category_id],
                ['index' => $category_index]
            );
        }
    }
}
