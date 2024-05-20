<?php

if (!class_exists('adminSidebar')) {
    final class adminSidebar
    {
        public const SIDEBAR = [
            'CLIENT' => "DASHBOARD",
            'HOME' => "Trang chủ",
            'ADMIN' => "ADMIN",
            'MANAGER_CONTENT' => "Quản lý bài viết",
            'CATEGORY' => [
                'INDEX' => 'Danh mục'
            ],
            'POST' => [
                'INDEX' => 'Bài viết'
            ],
            'PRODUCT' => [
                'INDEX' => 'Gacha'
            ],
        ];
    }
}
