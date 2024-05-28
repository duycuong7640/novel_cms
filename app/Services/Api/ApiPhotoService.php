<?php

namespace App\Services\Api;

use App\Repositories\Photos\PhotoRepositoryInterface;

class ApiPhotoService
{
    private $photoRepository;

    public function __construct(PhotoRepositoryInterface $photoRepository)
    {
        $this->photoRepository = $photoRepository;
    }

    public function findByType($type): object
    {
        $detail = $this->photoRepository->findByColumn('type', $type);
        if (isset($detail->status) && !$detail->status) return [];
        return $detail;
    }

}
