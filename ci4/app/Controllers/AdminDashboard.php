<?php

namespace App\Controllers;

use App\Models\MapModel;

class AdminDashboard extends BaseController
{
    public function index(): string
    {
        $map = model(MapModel::class);
        $totals = [
            'Bendung' => $map->featureCount('bendung'),
            'Irigasi' => $map->featureCount('irigasi'),
            'Drainase' => $map->featureCount('drainase'),
            'Saluran Pembuang' => $map->featureCount('saluran_pembuang'),
        ];

        return view('admin_dashboard', [
            'user' => session()->get('user_id'),
            'totals' => $totals,
        ]);
    }
}
