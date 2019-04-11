<?php

return [
    'product/([0-9]+)' => 'product/view/$1',    
    'catalog/letter-([a-z]+)/page-([0-9]+)' => 'catalog/index/$2/$1',
    'catalog/page-([0-9]+)' => 'catalog/index/$1',
    'catalog' => 'catalog/index',
    'catalog/([0-9]+)/letter-([a-z]+)/page-([0-9]+)' => 'catalog/category/$1/$3/$2',
    'catalog/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'catalog/([0-9]+)' => 'catalog/category/$1',
    '' => 'site/index'
];

//catalog/letter-a/page-1
//'catalog/([0-9])+/page-([0-9]+)' => 'catalog/category/$1/$2',
