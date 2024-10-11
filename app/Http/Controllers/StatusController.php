<?php

namespace App\Http\Controllers;

use App\Services\StatusService;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct(
        private StatusService $statusService
    )
    {}

    public function index(Request $request)
    {
        return view('search')
            ->with([
               'nid' => $request->filled('nid') ? $request->get('nid') : ''
            ]);
    }

    public function show(Request $request)
    {
        $nid = $request->filled('nid') ? $request->get('nid') : '';

        return response()->json([
           'status' => $this->statusService->getStatus($nid)
        ]);
    }
}
