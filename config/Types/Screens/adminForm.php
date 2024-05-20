<?php

if (!class_exists('adminForm')) {
    final class adminForm
    {
        public const FORM_HEAD = [
            'INDEX' => "Danh sách",
            'CREATE' => "Thêm mới",
            'UPDATE' => "Cập nhật",
            'SHOW' => "Chi tiết",
            'DELETE' => "Xoá",
            'SEARCH' => "Tìm kiếm",
            'SAVE' => "Lưu",
            'CANCEL' => "Huỷ",
            "SEARCH_CATEGORY" => 'Danh mục',
            "LOGIN" => 'Admin Login',
        ];

        public const FIELD = [
            'ACTIVE' => "Đã Active",
            'NON_ACTIVE' => "Chưa Active",
        ];
    }
}
