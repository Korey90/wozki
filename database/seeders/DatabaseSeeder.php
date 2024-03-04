<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(ProductDescriptionsTableSeeder::class);
        $this->call(ProductDetailsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
        $this->call(StockRotationsTableSeeder::class);
        $this->call(StocksTableSeeder::class);
        $this->call(SupplierAddressesTableSeeder::class);
        $this->call(SupplierCompaniesTableSeeder::class);
        $this->call(SupplierContactsTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(UserAddressesTableSeeder::class);
        $this->call(UserDetailsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WebCarouselTableSeeder::class);
    }
}
