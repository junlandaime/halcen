<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ParticipantsImport;

class ParticipantSeeder extends Seeder
{
    public function run()
    {
        Excel::import(new ParticipantsImport(1, null), storage_path('app/participants_cleaned.xlsx'));

        $this->command->info('Data participants cleaned berhasil diimport!');
    }
}
