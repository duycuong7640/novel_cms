<?php

if (!class_exists('dataUser')) {
    final class dataUser
    {
        public const USER = [
            'USER_TYPE' => [
                'CLIENT' => 'CLIENT',
                'ADMIN' => 'ADMIN'
            ],
            'STATUS' => [
                'ACTIVE' => 1,
                'N-ACTIVE' => 0
            ],
            'GENDER' => [
                'UDF' => 0,
                'MALE' => 1,
                'FE-MALE' => 2,
            ],
        ];
    }
}
