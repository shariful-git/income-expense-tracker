<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if ($user) {
            $incomeCategories = ['Salary', 'Freelance', 'Investment', 'Other Income'];
            $expenseCategories = ['Rent', 'Food', 'Transport', 'Entertainment', 'Utilities', 'Other Expense'];

            foreach ($incomeCategories as $name) {
                Category::create([
                    'user_id' => $user->id,
                    'name' => $name,
                    'type' => 'income',
                ]);
            }

            foreach ($expenseCategories as $name) {
                Category::create([
                    'user_id' => $user->id,
                    'name' => $name,
                    'type' => 'expense',
                ]);
            }
        }
    }
}
