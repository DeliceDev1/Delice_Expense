<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $branches = [
            ['name' => 'dhaka'],
            ['name' => 'delhi'],
            ['name' => 'lucknow'],
            ['name' => 'nepal'],

        ];

        foreach ($branches as $branchData) {
            Branch::create($branchData);
        }
    }
}
