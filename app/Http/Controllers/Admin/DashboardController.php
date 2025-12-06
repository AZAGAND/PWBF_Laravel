<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Role_user;
use App\Models\Pemilik;
use App\Models\Pet;
use App\Models\Temu_dokter;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    public function Dashboard()
    {
        $totalUsers = User::count();
        $totalRoles = Role::count();
        $totalDokter = Role_user::where('idrole', 2)->count();
        $totalPemilik = Pemilik::count();
        $totalHewan = Pet::count();

        // Chart 1: User Distribution by Role
        $userRoles = Role_user::join('role', 'role_user.idrole', '=', 'role.idrole')
            ->select('role.nama_role', DB::raw('count(*) as total'))
            ->groupBy('role.nama_role')
            ->get();

        // Chart 2: Pet Distribution by Type (Jenis Hewan)
        $petTypes = Pet::join('ras_hewan', 'pet.idras_hewan', '=', 'ras_hewan.idras_hewan')
            ->join('jenis_hewan', 'ras_hewan.idjenis_hewan', '=', 'jenis_hewan.idjenis_hewan')
            ->select('jenis_hewan.nama_jenis_hewan', DB::raw('count(*) as total'))
            ->groupBy('jenis_hewan.nama_jenis_hewan')
            ->get();

        // Chart 3: Appointments Trend (Temu Dokter per Date)
        $appointments = Temu_dokter::select(DB::raw('DATE(tanggal) as date'), DB::raw('count(*) as total'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->limit(7)
            ->get();

        return view('Roles.Admin.dashboard', compact(
            'totalUsers', 'totalRoles', 'totalDokter', 'totalPemilik', 'totalHewan',
            'userRoles', 'petTypes', 'appointments'
        ));
    }

    public function DataMaster()
    {
        return view('Roles.Admin.data_master');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('Roles.Admin.Views.Profile', compact('user'));
    }
}
