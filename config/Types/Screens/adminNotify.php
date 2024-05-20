<?php

if (!class_exists('adminNotify')) {
    final class adminNotify
    {
        public const SUCCESS = "Thành công";
        public const FAIL = "Thất bại";
        public const ERROR = "Có lỗi xẩy ra";
        public const CANNOT_DELETE = "Mục này không thể xoá";
        public const CONFIRM_DELETE = "Bạn có chắc chắn muốn xóa mục đã chọn không?";
        public const LOGIN_FAIL = "Tài khoản không tồn tại";
    }
}
