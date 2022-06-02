<?php

use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

class MakeUsersTableMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('users');

        $table->addColumn('first_name', 'string', ['limit' => 128])
            ->addColumn('last_name', 'string', ['limit' => 128])
            ->addColumn('username', 'string', ['limit' => 128])
            ->addColumn('email', 'string', ['limit' => 128])
            ->addColumn('password', 'string', ['limit' => 128])
            ->addColumn('confirmed', 'boolean', ['default' => false])
            ->addColumn('completed', 'boolean', ['default' => false])
            ->addColumn('gender', 'enum', ['null' => true, 'values' => ['male', 'female']])
            ->addColumn('orientation', 'enum', ['null' => true, 'values' => ['heterosexual', 'homosexual', 'bisexual']])
            ->addColumn('bio', 'string', ['null' => true, 'limit' => 1000])
            ->addColumn('interests', 'json', ['null' => true])
            ->addColumn('picture', 'blob', ['null' => true, 'limit' => MysqlAdapter::BLOB_LONG])
            ->addColumn('localisation', 'string', ['null' => true, 'limit' => 128])
            ->addColumn('matchs', 'json', ['null' => true])
            ->addColumn('score', 'integer', ['null' => true])
            ->addColumn('notifications', 'json', ['null' => true])
            ->addColumn('birthdate', 'date')
            ->addTimestamps()
            ->create();
    }
}
