<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AttendanceImport;

class AttendanceSeeder extends Seeder
{
    public function run()
    {
        Excel::import(new AttendanceImport, storage_path('app/kehadiran.xlsx'));
    }

    public function importPresensi()
    {
    Excel::import(new AttendanceImport, storage_path('app/kehadiran.xlsx'));
    return 'Import berhasil';
    }

}
