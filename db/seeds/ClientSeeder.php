<?php

use Phinx\Seed\AbstractSeed;

class ClientSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $clients = $this->table('clients');

        $clientData = [
            'name' => $faker->name(),
            'email' => $faker->email(),
            'password' => password_hash($faker->password(), PASSWORD_DEFAULT),
        ];

        $clients->insert($clientData)
            ->saveData();
    }
}
