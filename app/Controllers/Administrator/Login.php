<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;

class Login extends BaseController
{
    // public function index()
    // {
    //     // If already logged in, go to dashboard
    //     if (session()->get('admin_logged_in') === true) {
    //         return redirect()->to(base_url('administrator'));
    //     }

    //     return view('administrator/auth/admin_login');
    // }

    // public function authenticate()
    // {
    //     $userName = $this->request->getPost('userName');
    //     $password = $this->request->getPost('password');

    //     if (!$userName || !$password) {
    //         return redirect()->back()->with('error', 'Please enter username and password');
    //     }

    //     $db = db_connect();

    //     $admin = $db->table('admin_master')
    //         ->where('userName', $userName)
    //         ->where('password', md5($password)) // (same as CI3)
    //         ->get()
    //         ->getRowArray();

    //     if ($admin) {
    //         session()->set([
    //             'adminId'         => $admin['adminId'],
    //             'adminType'       => $admin['type'],
    //             'admin_logged_in' => true,
    //         ]);

    //         return redirect()->to(base_url('administrator'));
    //     }

    //     return redirect()->back()->with('error', 'Invalid username or password');
    // }
    public function index()
    {
        // If already logged in, redirect to admin home
        if (is_logged()) {
            return redirect()->to(base_url('administrator'));
        }

        $data = [];

        // Check form submit
        if ($this->request->getPost('submit')) {

            $userName = $data['userName'] = $this->request->getPost('userName');
            $password = $this->request->getPost('password');

            if (trim($userName) && trim($password)) {

                $db = db_connect();

                $check = $db->table('admin_master')
                    ->where([
                        'userName' => $userName,
                        'password' => md5($password)
                    ])
                    ->get()
                    ->getRowArray();

                if (!empty($check)) {

                    // Set session (CI4 way)
                    session()->set([
                        'adminId'         => $check['adminId'],
                        'adminType'       => $check['type'],
                        'admin_logged_in' => true
                    ]);

                    return redirect()->to(base_url('administrator'));

                } else {
                    unset($data['userName']);
                    $data['error'] = 'Please Check UserName And Password!!';
                }

            } else {
                $data['error'] = 'Please Enter Input';
            }
        }

        return view('administrator/auth/admin_login', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('administrator/login'));
    }
}
