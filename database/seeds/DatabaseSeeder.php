<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('Author')->insert(
                array(
                    array('auth_id' => 'US1', 'FullName' => 'Nguyen Tran Trung'),
                    array('auth_id' => 'US2', 'FullName' => 'Nguyen Van A'),
                    array('auth_id' => 'US3', 'FullName' => 'Nguyen Van B')
                )
            );


            DB::table('BlogCategory')->insert(
                array(
                      array('name' => 'Cong nghe'),
                      array('name' => 'agile')
                )
            );

            DB::table('BlogArticle')->insert(
                array(
                    array('title' => 'Double my productivity to get a wife, triple it to explore the world – Nice talk, you said!', 'content' => 'First day of July, first day of the last half of the year, nice day to talk bullshit, I guess.', 'id_auth' => 'US2'),
                    array('title' => 'do? Are we programmers, software engineers, or computer scientists? All of the above, some combination, or none?', 'content' => 'My thesis is that it depends. All three are real things. All three are very different. ', 'id_auth' => 'US3'),
                    array('title' => 'Is it extremely hard to be a really good programmer?', 'content' => 'I am a CS student who is just about to end his Bachelor.', 'id_auth' => 'US1')
                )
            );
    }
}
