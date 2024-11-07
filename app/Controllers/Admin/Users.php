<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Users extends BaseController
{
    public function users()
    {
        $usersModel = new UsersModel();
        $data['users'] = $usersModel->getUsers();

        return view('admin/users', $data);
    }

    public function updateUser()
    {
        $usersModel = new UsersModel();
        $userId = $this->request->getPost('user_id');
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
            'status' => $this->request->getPost('status')
        ];

        if ($usersModel->updateUser($userId, $data)) {
            return redirect()->to('/admin/users')->with('status', 'User updated successfully.');
        } else {
            return redirect()->to('/admin/users')->with('status', 'Failed to update user.');
        }
    }

    public function deleteUser($id)
    {
        $usersModel = new UsersModel();
        if ($usersModel->deleteUser($id)) {
            return redirect()->to('/admin/users')->with('status', 'User deleted successfully.');
        } else {
            return redirect()->to('/admin/users')->with('status', 'Failed to delete user.');
        }
    }
}
