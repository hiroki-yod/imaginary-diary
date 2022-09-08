<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Diary;

class DiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diaries')->insert([
            [
                'user_id' => 1,
                'title' => '明日からは',
                'body' => '葉が色づくこの季節は素晴らしい。今日は木の実をたくさん取ることができた。' . PHP_EOL . 'しばらくは食に困ることもないだろう。寒くなる前に明日からは土器づくりでも始めることにしよう。',
                'year' => '-8262',
                'date' => '1000-09-26',
            ],[
                'user_id' => 2,
                'title' => 'この世の地獄',
                'body' => '父に連れられてたたら場に来た。あまりに遠すぎる。峠を越えるだけで1日が終わってしまうではないか。' . PHP_EOL . 'しかも鉄づくりは熱くて熱くてしょうがない。まるで地獄のようだ。',
                'year' => '1791',
                'date' => '1000-02-08',
            ],[
                'user_id' => 1,
                'title' => '夕焼け小焼け',
                'body' => '山に18時を知らせるチャイムが反響する。一緒に山を駆け回ったあいつは東京に行ってしまった。' . PHP_EOL . '俺はいつまでここにいるのだろう。このチャイムはいつまでなり続けるのだろう。',
                'year' => '1983',
                'date' => '1000-04-02',
            ],[
                'user_id' => 2,
                'title' => '縄文ロマン',
                'body' => '縄文時代にはロマンがある。私も縄文時代に生きてみたい。' . PHP_EOL . 'そんな気持ちから縄文土器を自作してみた。不格好だが良い出来だ。',
                'year' => '2022',
                'date' => '1000-09-07',
            ],[
                'user_id' => 1,
                'title' => '変わりゆくもの、変わらぬもの',
                'body' => 'もう30歳だ。驚きだ。松本家展と言って展示をしていたのも10年前のことだ。' . PHP_EOL . '来年、葛尾村は合併される。そう聞いて、久しぶりにこの家を訪れた。' . PHP_EOL . '家は変わらずそこにあった。村がなくなってもそこにあり続けるのだろう。',
                'year' => '2032',
                'date' => '1000-05-05',
            ],[
                'user_id' => 2,
                'title' => '高放射線量地層に関する調査報告',
                'body' => '昨年より一部地域にて放射線量が優位に高い地層が発見された。' . PHP_EOL . '核分裂を用いた武器により戦闘活動の結果だと推測されている。' . PHP_EOL . '同地層からは土で作られた器が出土した。' . PHP_EOL . 'この地で生活していた人類の道具だと考えられる。',
                'year' => '6298',
                'date' => '1000-08-31',
            ]
        ]);

        for ($i=1; $i<=6; $i++) {
            Diary::find($i)->storeImage()->save();
        }
    }
}
