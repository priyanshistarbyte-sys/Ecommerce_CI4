<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommonModel;

class Payment extends BaseController
{
    protected $db;
    protected $model;

    public function __construct()
    {
        helper(['common']);
        $this->db    = db_connect();
        $this->model = new CommonModel();
    }

    /* Checkout & PayU submit */
    public function index()
    {
        $website = base_url();

        $settings_data = $this->model->get_all_records(
            'settings',
            ['website_url' => $website],
            true
        );

        $data['payment_method'] = !empty($settings_data['payment_method'])
            ? explode(',', $settings_data['payment_method'])
            : [];

        $data['upi_address'] = $settings_data['upi_id'] ?? '';

        $merchant_key = $settings_data['merchant_key'] ?? '';
        $salt_key     = $settings_data['salt_key'] ?? '';

        if (
            ($settings_data['netbanking'] ?? 0) == 1 &&
            trim($merchant_key) &&
            trim($salt_key)
        ) {
            $data['netbanking'] = 1;
        }

        /* ---------- COD ORDER CONFIRMATION ---------- */
        if ($this->request->getPost('confirm_order')) {
            $orderData = [
                'customer_name' => $this->request->getPost('customerName'),
                'customer_mobile' => $this->request->getPost('customerMobile'),
                'total_amount' => $this->request->getPost('price'),
                'payment_method' => 'COD',
                'order_date' => date('Y-m-d H:i:s'),
                'status' => 'confirmed'
            ];
            
            return view('common_template/common', [
                'page_title'  => 'Order Confirmed',
                'show_nav'    => false,
                'hide_footer' => true,
                'back_btn'    => true,
                'load_page'   => 'order_summary',
                'order_data'  => $orderData
            ]);
        }

        /* ---------- PAYU FORM SUBMIT ---------- */
        if ($this->request->getPost('submit') && $merchant_key && $salt_key) {

            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

            $PAYU_BASE_URL = 'https://secure.payu.in';

            $posted = [
                'key'             => $merchant_key,
                'txnid'           => $txnid,
                'amount'          => trim($this->request->getPost('price')),
                'firstname'       => trim($this->request->getPost('customerName')),
                'email'           => '',
                'phone'           => trim($this->request->getPost('customerMobile')),
                'productinfo'     => $this->request->getPost('product_name'),
                'surl'            => base_url('payment/success'),
                'furl'            => base_url('payment/failure'),
                'service_provider'=> 'payu_paisa',
            ];

            if ($this->request->getPost()) {
                $posted = array_merge($posted, $this->request->getPost());
            }

            $txnid = empty($posted['txnid'])
                ? substr(hash('sha256', mt_rand() . microtime()), 0, 20)
                : $posted['txnid'];

            $hashSequence = 'key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10';

            if (empty($posted['hash']) && count($posted) > 0) {
                $hashVarsSeq = explode('|', $hashSequence);
                $hash_string = '';

                foreach ($hashVarsSeq as $hash_var) {
                    $hash_string .= $posted[$hash_var] ?? '';
                    $hash_string .= '|';
                }

                $hash_string .= $salt_key;
                $hash   = strtolower(hash('sha512', $hash_string));
                $action = $PAYU_BASE_URL . '/_payment';

            } else {
                $hash   = $posted['hash'];
                $action = $PAYU_BASE_URL . '/_payment';
            }

            $data['posted']       = $posted;
            $data['hash']         = $hash;
            $data['MERCHANT_KEY'] = $merchant_key;
            $data['SALT']         = $salt_key;
            $data['txnid']        = $txnid;
            $data['action']       = $action;

            return view('payment', $data);
        }

        /* ---------- CHECKOUT PAGE ---------- */
        $data['page_title']   = 'Checkout your Product';
        $data['show_nav']     = false;
        $data['hide_footer']  = true;
        $data['back_btn']     = true;
        $data['load_page']    = 'payment';
        $data['header_title'] = 'Payment';

        return view('common_template/common', $data);
    }

    /* Purchase counter */
    public function purchase()
    {
        if ($this->request->getPost('payType')) {

            $date = date('Y-m-d');

            $is_already = $this->model->counts('purchase', ['date' => $date]);

            if ($is_already) {
                $this->db->table('purchase')
                    ->where('date', $date)
                    ->set('count', 'count+1', false)
                    ->set('last_update_time', date('Y-m-d H:i:s'))
                    ->update();
            } else {
                $this->model->insert_data('purchase', [
                    'date' => $date,
                    'count' => 1,
                    'last_update_time' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }

    public function success()
    {
        return view('common_template/common', [
            'page_title'  => 'Success Payment',
            'show_nav'    => false,
            'hide_footer' => true,
            'back_btn'    => true,
            'load_page'   => 'success',
        ]);
    }

    public function failure()
    {
        return view('common_template/common', [
            'page_title'  => 'Failure Payment',
            'show_nav'    => false,
            'hide_footer' => true,
            'back_btn'    => true,
            'load_page'   => 'failure',
        ]);
    }
}
