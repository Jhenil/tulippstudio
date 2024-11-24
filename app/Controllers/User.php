<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class User extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function store()
    {
        $session = session();
        $userModel = new UsersModel();

        $firstName = $this->request->getVar('user_fname');
        $lastName = $this->request->getVar('user_lname');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $confirmPassword = $this->request->getVar('confirm_password');

        if ($password !== $confirmPassword) {
            $session->setFlashdata('error', 'Passwords do not match');
            return redirect()->back()->withInput();
        }

        $existingUser = $userModel->where('email', $email)->first();
        if ($existingUser) {
            $session->setFlashdata('error', 'Email already registered');
            return redirect()->back()->withInput();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $userModel->save([
            'user_fname' => $firstName,
            'user_lname' => $lastName,
            'email' => $email,
            'password' => $hashedPassword,
            'status' => 'active',
        ]);

        $session->setFlashdata('success', 'Registration successful! Please login.');
        return redirect()->to('/login');
    }

    public function update($id)
    {
        $session = session();
        $userModel = new UsersModel();
        // $userid = $session->get($user_id);
        $user = $userModel->find($id);

        $firstName = $this->request->getVar('user_fname') ? $this->request->getVar('user_fname') : $user['user_fname'];
        $lastName = $this->request->getVar('user_lname') ? $this->request->getVar('user_lname') : $user['user_lname'];
        $email = $this->request->getVar('email') ? $this->request->getVar('email') : $user['email'];
        $password = $this->request->getVar('password') ? $this->request->getVar('password') : $user['password'];
        $confirmPassword = $this->request->getVar('password') ? $this->request->getVar('password') : $user['password'];

        if ($password !== $confirmPassword) {
            $session->setFlashdata('error', 'Passwords do not match');
            return redirect()->back()->withInput();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $userModel->update($id, [
            'user_fname' => $firstName,
            'user_lname' => $lastName,
            'email' => $email,
            'password' => $hashedPassword,
            'status' => 'active',
        ]);

        $session->setFlashdata('success', 'Registration successful! Please login.');
        return redirect()->to('/login');
    }

    public function login()
    {
        $session = session();
        $UsersModel = new UsersModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');


        $user = $UsersModel->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'user_id' => $user['user_id'],
                    'email' => $user['email'],
                    'logged_in' => true,
                ]);

                $UsersModel->query("UPDATE users SET `last_login` = current_timestamp() WHERE `user_id` = user_id");
                return redirect()->to('/cart');
            } else {
                $session->setFlashdata('error', 'Invalid password');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('error', 'User not found');
            return redirect()->back();
        }
    }

    public function viewProfile()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login');
        }

        $userDB = new UsersModel();
        $user = $userDB->find($session->get('user_id'));
        return view('profile', ['user' => $user]);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}


// $image = $this->request->getFile('profile_pictures');
// $imageName = $image->isValid() && !$image->hasMoved() ? $image->getRandomName() : '';
// if ($imageName) {
//     $image->move(ROOTPATH . 'assets/images/profile_pictures/', $imageName);
// }


// update 👇
// $image = $this->request->getFile('profile_pictures');
// if ($image && $image->isValid() && !$image->hasMoved()) {
//     $uploadPath = ROOTPATH . 'assets/images/profile_pictures';
//     $image_new_name = random_int(0, 9999) . '.' . $image->getExtension();
//     if (!$image->move($uploadPath, $image_new_name)) {
//         return $this->respond([
//             'status' => false,
//             'message' => "Failed to move uploaded image.",
//         ]);
//     } else {
//         $model->update($id, [
//             'profile_picture' => $image_new_name
//         ]);
//     }
// }
