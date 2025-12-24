<?php

if (@$load_page) {
    echo view("common_template/header");
    echo view($load_page);
    echo view("common_template/ads");
    echo view("common_template/footer");
} else {
    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
}
