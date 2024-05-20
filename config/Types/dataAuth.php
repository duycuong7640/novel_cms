<?php

if (!class_exists('dataAuth')) {
    final class dataAuth
    {
        public const AUTH = [
            'GUARD' => [
                'ADMIN' => 'admins',
                'USER' => 'users'
            ],
        ];
    }
}
