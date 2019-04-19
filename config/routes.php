<?php

return [
    'about' => 'blog/about',
    'contacts' => 'blog/contacts',
    'product/add' => 'product/add',
    'product/edit' => 'product/update',
    'product/remove' => 'product/remove',
    'admin/products/search/page-([0-9]+)' => 'adminProduct/index/$1/true',
    'admin/products/page-([0-9]+)' => 'adminProduct/index/$1',
    'admin/products/create' => 'adminProduct/create',
    'admin/products/edit/([0-9]+)' => 'adminProduct/edit/$1',
    'admin/products/view/([0-9]+)' => 'adminProduct/view/$1',
    'admin/products' => 'adminProduct/index',
    'admin/categories/create' => 'adminCategory/create',
    'admin/categories/edit' => 'adminCategory/edit',
    'admin/categories/page-([0-9]+)' => 'adminCategory/index/$1',
    'admin/categories/create' => 'adminCategory/create',
    'admin/categories/edit' => 'adminCategory/edit',
    'admin/categories' => 'adminCategory/index',
    'admin/orders/page-([0-9]+)' => 'adminOrder/index/$1',
    'admin/orders/view/([0-9]+)' => 'adminOrder/view/$1',
    'admin/orders/update/([0-9]+)' => 'adminOrder/update/$1',
    'admin/orders' => 'adminOrder/index',
    'admin' => 'admin/index',
    'product/([0-9]+)' => 'product/view/$1',    
    'catalog/letter-([a-z]+)/page-([0-9]+)' => 'catalog/index/$2/$1',
    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog/([0-9]+)/letter-([a-z]+)/page-([0-9]+)' => 'catalog/category/$1/$3/$2',
    'catalog/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'catalog/([0-9]+)' => 'catalog/category/$1',
    'catalog' => 'catalog/index',
    'cart/add/([0-9]+)' => 'cart/addProduct/$1',
    'cart/remove/([0-9]+)' => 'cart/removeProduct/$1',
    'cart/update/([0-9]+)/([0-9]+)' => 'cart/updateProductCount/$1/$2',
    'cart/checkout' => 'cart/checkout',
    'cart/saveorder' => 'cart/saveOrder',
    'cart' => 'cart/index',
    'user/showRegisterForm' => 'user/showRegisterForm',
    'user/showLoginForm' => 'user/showLoginForm',
    'user/update' => 'user/update',
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/history/page-([0-9]+)' => 'cabinet/history/$1',
    'cabinet/history' => 'cabinet/history',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',
    'category/add' => 'category/add',
    'category/edit/([0-9]+)' => 'category/update/$1',
    'category/remove/([0-9]+)' => 'category/remove/$1',
    'category/update/([0-9]+)' => 'order/update/$1',
    'order/update/([0-9]+)' => 'order/update/$1',    
    'home' => 'site/index',
    '' => 'site/index'
];
