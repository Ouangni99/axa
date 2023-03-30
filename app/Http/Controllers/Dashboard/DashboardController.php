<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
     /**
     * Display the dashboard view.
     */
    public function create(): View
    {
        // set breadcrumb trail
        $breadcrumb = [
            'menu-title' => 'Accueil',
            'menu-item' => [
                'Tableau de bord'
            ]
        ];

        // return
        return view('pages.dashboards.dashboard',[
            'breadcrumbTrail' => $breadcrumb,
        ]);
    }
}
