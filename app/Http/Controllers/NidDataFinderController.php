<?php

namespace App\Http\Controllers;

use App\DTOs\UserInfoFinderData;
use App\Http\Requests\UserInfoFinderRequest;
use App\Services\NidDataFinderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NidDataFinderController extends Controller
{
    public function __construct(
        private NidDataFinderService $dataFinderService
    )
    {
    }

    public function findUserData(
        UserInfoFinderRequest $request
    )
    {
        $this->dataFinderService
            ->fetchUserData(
                UserInfoFinderData::fromForm($request)
            );

        return response()
            ->json([
                'message' => 'Fetching user data'
            ]);
    }
}
