<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert(
            [
                'nama' => 'VA BCA', 
                'gambar' => '-', 
                'deskripsi' => '-',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'nama' => 'VA Mandiri', 
                'gambar' => '-', 
                'deskripsi' => '-',
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'nama' => 'VA BNI', 
                'gambar' => '-', 
                'deskripsi' => '-',
                'created_at' => now(),
                'updated_at' => null,
            ],
        );
    }
}
