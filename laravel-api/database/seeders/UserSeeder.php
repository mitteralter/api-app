<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user1 =
        User::create(
            [
                'name' => 'Johni',
                'email' => 'jojoy@gmail.com',
                'state_id' => '1',
                'password' => '$2y$10$IbsCT3chvn0ycXMpwMMMNepiCSBlpLzsOougQ3yPsvXIbC9cjvZA.',  
            ]);
        //  $user2 =
        //     User::create(
        //         [
        //             'name' => 'juanito2',
        //             'email' => 'juanito2@gmail.com',
        //             'password' => '1',             
        //         ]);
        // $user3 =
        //     User::create(
        //         [
        //             'name' => 'juanito3',
        //             'email' => 'juanito3@gmail.com',
        //             'password' => '1',                
        //             ]);

        $user1->fac()->createMany([
            ['rfc' => '741852a'],
            // ['rfc' => '741852b', 'user_id'=> '1'],
            // ['rfc' => '741852c', 'user_id'=> '1']
        ]);
      
        // $user2->fac()->createMany([
        //     ['rfc' => '741852a'],
        //     ['rfc' => '741852b'],
        //     ['rfc' => '741852c']
        // ]);
        // $user2->estado()->createMany([
        //     ['id' => '1'],
        // ]);
        // $user3->facs()->createMany([
        //     ['rfc' => '741852a'],
        //     ['rfc' => '741852b'],
        //     ['rfc' => '741852c']
        // ]);
        // $user3->estados()->createMany([
        //     ['id' => '1'],
        // ]);
    }
}
