<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SalesModel;

class Sales extends BaseController
{
    public function sales()
    {
        $salesModel = new SalesModel();
        $sales = $salesModel->getSalesWithDetails();
        return view('admin/sales', ['sales' => $sales]);
    }
}
