<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RolePermissionSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(LandingPageSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(ProgramLayananSeeder::class);
        $this->call(RegulationCategorySeeder::class);
        $this->call(RegulationSeeder::class);
        $this->call(VideoCategorySeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(FaqCategorySeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(ProgramBatchSeeder::class);
    }
}
