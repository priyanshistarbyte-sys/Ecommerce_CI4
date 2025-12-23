<?php

use CodeIgniter\Database\BaseConnection;

if (!function_exists('is_logged')) {
    function is_logged()
    {
        try {
            return session()->get('admin_logged_in') === true;
        } catch (Exception $e) {
            return false;
        }
    }
}

if (!function_exists('admin_id')) {
    function admin_id()
    {
        return session()->get('admin_id');
    }
}

if (!function_exists('db')) {
    function db(): BaseConnection
    {
        return db_connect();
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key)
    {
        $db = db_connect();
        $row = $db->table('settings')
                  ->where('setting_key', $key)
                  ->get()
                  ->getRow();

        return $row ? $row->setting_value : null;
    }
}

if (!function_exists('site_setting')) {
    function site_setting()
    {
        $db = db_connect();
        return $db->table('settings')->get()->getResult();
    }
}
