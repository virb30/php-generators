<?php


use Phinx\Seed\AbstractSeed;

class BulkClientSeeder extends AbstractSeed
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

        $clients->truncate();
        $this->withGenerator($clients, $faker);
    }

    public function withoutGenerator($table, $faker)
    {
        // Exausted memory
        $clientsData = [];
        for ($i = 0; $i < 100000; $i++) {
            $clientsData[] = [
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => $faker->password(),
            ];
        }
        $table->insert($clientsData)
            ->saveData();
    }

    private function withGenerator($table, $faker)
    {
        $totalInserted = 0;

        foreach ($this->generate($totalInserted, 9000000, 10000, $faker) as $data) {
            $table->insert($data)
                ->saveData();
        }
    }

    private function generate(&$totalInserted, $limit, $perChunk, $faker)
    {

        while (true) {

            $clientsData = [];
            for ($i = 0; $i < $perChunk; $i++) {
                $clientsData[] = [
                    'name' => $faker->name(),
                    'email' => $faker->email(),
                    'password' => $faker->password(),
                ];
            }

            if ($totalInserted === $limit) {
                return;
            }

            yield $clientsData;

            $totalInserted += count($clientsData);
        }
    }
}
