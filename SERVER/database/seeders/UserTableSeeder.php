<?php


use App\Http\Model\User;
use Phinx\Seed\AbstractSeed;

class UserTableSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $users = factory(User::class, 10)->create([
            'first_name' => 'johnny jim dan joe'
        ]);

        return $users;
    }
}
