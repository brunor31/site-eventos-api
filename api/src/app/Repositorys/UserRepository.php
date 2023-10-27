<?php

namespace App\Repositorys;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function get(int $id)
    {
        return $this->user->find($id);
    }

    public function store(Request $request)
    {
        return $this->user->create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password)
        ]);
    }

    public function update(int $id, Request $request)
    {
        return $this->user->find($id)
            ->update([
                'name' => $request->name,
                'email'=> $request->email,
                'password' => Hash::make($request->password)
            ]);
    }

    public function destroy($id)
    {
        return $this->user->destroy($id);
    }
}
