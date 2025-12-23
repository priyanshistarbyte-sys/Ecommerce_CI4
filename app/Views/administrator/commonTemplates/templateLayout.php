<?php
$adminId = session()->get('adminId');
$getUserCondition = array(
    'adminId' => $adminId
);
$db = db_connect();
$admin_data = $db->table('admin_master')->where($getUserCondition)->get()->getRowArray();

$data['admin_name'] = $admin_data['Name'];
$data['admin_type'] = $admin_data['type'] ? "Super Admin" : "Sub Admin";

echo view("administrator/commonTemplates/templateHeader", $data);
echo view("administrator/commonTemplates/templateSidebar", $data);
echo view($curTemplateName, $data);
echo view("administrator/commonTemplates/templateFooter", $data);
