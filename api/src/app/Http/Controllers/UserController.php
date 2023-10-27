<?php

namespace app\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getAll() {
        return $this->userService->getAll();
    }

    public function get(Request $request)
    {
        return $this->userService->get($request->id);
    }

    public function store(Request $request)
    {
        return $this->userService->store($request);
    }

    public function update(Request $request)
    {
        return $this->userService->update($request->id, $request);
    }

    public function destroy(Request $request)
    {
        return $this->userService->destroy($request->id);
    }

    public function getMenus(Request $request)
    {
        return $this->userService->getMenus();
    }
}
