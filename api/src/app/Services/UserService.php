<?php

namespace App\Services;
use App\Helpers\UserValidate;
use App\Repositorys\UserRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return response()->json($this->userRepository->getAll(),
            Response::HTTP_OK);
    }

    public function get(int $id)
    {
        $user = $this->userRepository->get($id);
        if (empty($user)) {
            return response()->json(null, Response::HTTP_NOT_FOUND);
        }
        return response()->json($user, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validator = UserValidate::validation($request);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],
                Response::HTTP_BAD_REQUEST);
        }
        $store = $this->userRepository->store($request);
        return response()->json($store,Response::HTTP_CREATED);
    }

    public function update($id, Request $request)
    {
        $user = $this->userRepository->get($id);
        if (empty($user)) {
            return response()->json(null, Response::HTTP_NOT_FOUND);
        }
        $validator = UserValidate::validation($request);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()],
                Response::HTTP_BAD_REQUEST);
        }
        $this->userRepository->update($id, $request);
        return response()->json(Response::HTTP_OK);
    }

    public function destroy(int $id)
    {
        $user = $this->userRepository->get($id);
        if (empty($user)) {
            return response()->json(null, Response::HTTP_NOT_FOUND);
        }
        $this->userRepository->destroy($id);
        return response()->json(null,Response::HTTP_OK);
    }

    public function getMenus()
    {
        return $this->userRepository->getMenus();
    }
}
