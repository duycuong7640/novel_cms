<?php

namespace App\Services\Clients;

use App\Repositories\Photos\PhotoRepositoryInterface;

class ClientPhotoService
{
    private $photoRepository;

    public function __construct(PhotoRepositoryInterface $photoRepository)
    {
        $this->photoRepository = $photoRepository;
    }

    public function findByLogo($type)
    {
        $detail = $this->photoRepository->findByColumn('type', $type);
        if (isset($detail->status) && !$detail->status) return [];
        return $detail;
    }

}
