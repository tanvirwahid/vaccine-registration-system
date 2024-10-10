<?php

namespace App\Http\Controllers;

use App\DTOs\UserCreationData;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\UserService;
use App\Services\VaccineCenterService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function show(VaccineCenterService $vaccineCenterService)
    {
        return view('register')
            ->with([
                'uuid' => Str::uuid(),
                'vaccineCenters' => $vaccineCenterService->getAll()
            ]);
    }

    public function store(UserService $userService, UserRegistrationRequest $request)
    {
        return redirect(route('register'))
            ->with([
               'user' => $userService->create(UserCreationData::fromForm($request))
            ]);
    }
}
