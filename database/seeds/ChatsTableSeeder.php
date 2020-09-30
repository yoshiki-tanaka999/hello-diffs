<?php

use Illuminate\Database\Seeder;
use App\Model\Post\post;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 10 ; $i++) {

            \App\Chat::create([
                'content' => $i .'番目のテキスト'
            ]);
    
        }
    }
}
