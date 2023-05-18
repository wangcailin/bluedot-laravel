<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravel\Passport\ClientRepository;
use Composer\Support\Auth\Models\User;
use App\Application\Demo\Models\Form;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Form::create([]);
        User::createAdminUser('bluedot', 'Bluedot@2023');

        $client = new ClientRepository();
        $client->createPasswordGrantClient(null, 'Default Tenant Client', '');
        $client->createPersonalAccessClient(null, 'Default Tenant Personal Client', '');
    }
}
