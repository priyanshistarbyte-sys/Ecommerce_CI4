<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use App\Models\CommonModel;

class Settings extends BaseController
{
    protected $model;

    public function __construct()
    {
        helper(['common']);

        if (!is_logged()) {
            redirect()->to(site_url('administrator/login'))->send();
            exit;
        }

        $this->model = new CommonModel();
    }

    public function index()
    {
        $website = base_url();

        // Get settings for this website
        $settings_data = $this->model->get_all_records(
            'settings',
            ['website_url' => $website],
            true
        );

        /* =======================
         * Save Settings
         * ======================= */
        if ($this->request->getPost()) {

            $payment_method = $this->request->getPost('payment_method');
            $payment_method = is_array($payment_method)
                ? implode(',', $payment_method)
                : '';

            if (!empty($settings_data)) {

                if ($this->request->getPost('submit')) {
                    $update_array = [
                        'pixel_code'     => $this->request->getPost('pixel_code'),
                        'upi_id'         => $this->request->getPost('upi_id'),
                        'payment_method' => $payment_method,
                        'netbanking'     => $this->request->getPost('netbanking') ? 1 : 0,
                        'merchant_key'   => $this->request->getPost('merchant_key'),
                        'salt_key'       => $this->request->getPost('salt_key'),
                    ];

                    $this->model->update_data(
                        'settings',
                        ['website_url' => $website],
                        $update_array
                    );

                    return redirect()->to(site_url('administrator/settings'));
                }

            } else {
                $insert_array = [
                    'pixel_code'     => $this->request->getPost('pixel_code'),
                    'upi_id'         => $this->request->getPost('upi_id'),
                    'payment_method' => $payment_method,
                    'netbanking'     => $this->request->getPost('netbanking') ? 1 : 0,
                    'merchant_key'   => $this->request->getPost('merchant_key'),
                    'salt_key'       => $this->request->getPost('salt_key'),
                    'website_url'    => $website,
                ];

                $this->model->insert_data('settings', $insert_array);

                return redirect()->to(site_url('administrator/settings'));
            }
        }

        /* =======================
         * Load View
         * ======================= */
        $data = [
            'settings_data'   => $settings_data,
            'update'          => true,
            'header'          => 'settings',
            'loadPage'        => 'settings',
            'curTemplateName' => 'administrator/manage_settings/add_edit_settings',
        ];

        return view('administrator/commonTemplates/templateLayout', $data);
    }
}
