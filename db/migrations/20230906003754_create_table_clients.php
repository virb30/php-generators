<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableClients extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $clients = $this->table('clients');
        $clients->addColumn('name', 'string', ['null' => false, 'limit' => 255])
            ->addColumn('email', 'string', ['null' => false, 'limit' => 255])
            ->addColumn('cpf', 'string', ['null' => true, 'limit' => 14])
            ->addColumn('password', 'string', ['null' => false, 'limit' => 255])
            ->addColumn('created_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('deleted_at', 'datetime', ['null' => true, 'default' => null])
            ->create();
    }
}
