<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\OrderModel;
use App\Models\SettingsModel;
use App\Models\UsersModel;

class Admin extends BaseController
{
    public function index()
    {
        $orderModel = new OrderModel();
        $userModel = new UsersModel();

        // sales amount
        $total_sales_row = $orderModel->query("SELECT sum(`total_amount`) FROM `orders`");
        $total_sales = $total_sales_row->getResultArray()[0]['sum(`total_amount`)'];

        // order count
        $total_count_row = $orderModel->query("SELECT COUNT(*) FROM `orders`");
        $total_count = $total_count_row->getResultArray()[0]['COUNT(*)'];

        // user count
        $total_user_count_row = $userModel->query("SELECT COUNT(*) FROM `users`");
        $total_user_count = $total_user_count_row->getResultArray()[0]['COUNT(*)'];

        $data = [
            'total_sales' => $total_sales,
            'total_orders' => $total_count,
            'total_users' => $total_user_count,
        ];

        return view('admin/dashboard', $data);
    }

    public function login()
    {
        return view('admin/login');
    }

    public function auth()
    {
        $userModel = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // if ($user && $user['password']) {
            session()->set([
                'user_id' => $user['id'],
                'isLoggedin' => true,
            ]);

            return redirect()->to('admin/');
        } else {
            echo "<script>";
            echo "ask = window.alert('Enter the correct credentials.'); window.location.replace('login')";
            echo "</script>";
        }
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('admin/login');
    }

    public function settings()
    {
        $settingsModel = new SettingsModel();
        $adminModel = new AdminModel();

        $settings = $settingsModel->find(1);
        $admin = ['sites' => 'tulippstudio'];
        $admin = $adminModel->find(1);

        return view('admin/settings', [
            'settings' => $settings,
            'admin' => $admin,
        ]);
    }

    // Update account information (username, email, password)
    public function update_account()
    {
        $adminModel = new AdminModel();

        // Get form data
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Update the admin account
        $adminData = [
            'username' => $username,
            'email' => $email,
        ];

        // Only update password if it's not empty
        if (!empty($password)) {
            $adminData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $adminModel->update(1, $adminData); // Assuming admin ID is 1

        return redirect()->to('/admin/settings')->with('success', 'Account updated successfully');
    }

    // Update site settings (site title, logo)
    public function update_site_settings()
    {
        $settingsModel = new SettingsModel();

        $siteTitle = $this->request->getPost('site_title');
        $logo = $this->request->getFile('logo');

        $settingsData = [
            'site_title' => $siteTitle,
        ];

        if ($logo && $logo->isValid()) {
            $logoName = $logo->getRandomName();
            $logo->move(WRITEPATH . 'uploads/', $logoName);
            $settingsData['logo'] = $logoName;
        }

        $settingsModel->update(1, $settingsData);

        return redirect()->to('/admin/settings')->with('success', 'Site settings updated successfully');
    }

    // Update other settings (notifications, theme)
    public function update_other_settings()
    {
        $settingsModel = new SettingsModel();

        // Get form data
        $notifications = $this->request->getPost('notifications');
        $theme = $this->request->getPost('theme');

        $settingsData = [
            'notifications' => $notifications,
            'theme' => $theme,
        ];

        $settingsModel->update(1, $settingsData);

        return redirect()->to('/admin/settings')->with('success', 'Other settings updated successfully');
    }
}
