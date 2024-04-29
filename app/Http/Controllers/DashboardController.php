<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use App\Models\Hallway;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $citizen;
    public function __construct(Citizen $citizen)
    {
        $this->citizen = $citizen;
    }

    public function index()
    {
        $chartData = [
            'labels' => ['Anak', 'Orang Tua', 'Lansia'],
            'data' => [65, 59, 80],
        ];

        $citizen_m = $this->citizen->where('gender', 'L')->count();
        $citizen_f = $this->citizen->where('gender', 'P')->count();
        $total_citizen = $this->citizen->count();
        $citizen_hallways = $this->getCitizenHallways();

        return view('dashboard', compact('chartData', 'citizen_m', 'citizen_f', 'total_citizen', 'citizen_hallways'));
    }

    private function getCitizenHallways()
    {
        $hallways = Hallway::get();
        $data = [];
        foreach ($hallways as $key => $hallway) {
            $data[] = ['h_name' => $hallway->name, 'total' => $this->citizen->where('hallway_id', $hallway->id)->count()];
        }

        return $data;
    }
}
