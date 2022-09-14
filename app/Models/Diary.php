<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;

class Diary extends Model
{
    use HasFactory;

    //date型の表示形式変換
    protected $dates = [
        'date',
    ];

    protected $fillable = [
        'user_id', 'title', 'body', 'image', 'audio', 'year', 'month', 'day',
    ];

    // 日付順ソート
    // 未来->過去
    public function getByDate()
    {
        return $this->orderBy("year","ASC")->orderBy("month","ASC")->orderBy("day","ASC")->get();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getBodyArray($width)
    {
        $result = [];
        $oneline = "";
        $cnt = 0;
        $new_line = [PHP_EOL, "\n", "\r"];
        $prev_char = "";
        foreach($this->mb_wordwrap($this->body, 1) as $char) {
            if (in_array($char, $new_line) || ($cnt >= $width && !($char == "、" || $char == "。"))) {
                if ($char == "\n" && $prev_char == "\r") {
                    $prev_char = $char;
                    continue;
                }
                $result[] = $oneline;
                $oneline = "";
                $cnt = 0;
                $prev_char = $char;
                if (in_array($char, $new_line)) {
                    continue;
                }
            }
            $oneline = $oneline . $char;
            $cnt += 1;
        }
        if ($cnt != 0) $result[] = $oneline;
        return $result;
    }

    public function mb_wordwrap( $str, $width=35, $encode="UTF-8")
    {
        $c = mb_strlen($str, $encode);
        $arr = [];
        for ($i=0; $i<=$c; $i+=$width) {
            $arr[] = mb_substr($str, $i, $width, $encode);
        }
        return $arr;
    }

    public function storeImage()
    {
        $template_path = public_path('images/diary.jpg');
        $img = Image::make($template_path);
        $fonts = ['font/mogihaPen.ttf', 'font/beautiful_font.ttf', 'font/shokakisarari.ttf', 'font/acgyosyo.ttf'];
        $font_path = public_path($fonts[array_rand($fonts, 1)]);
        $colors = ['#000000', '#281a14', '#0d0015', '#16160e', '#333631', '#250d00'];
        $color = $colors[array_rand($colors,1)];

        // タイトル
        $word = $this->title;
        $x = 260 - strlen($word) / 2 * 8;
        $y = 220;

        $img->text($word, $x, $y, function($font) use ($font_path, $color){
            $font->file($font_path); // 日本語フォントファイル
            $font->size(25); // 文字サイズ
            $font->color($color); // 文字色
        });

        // 日付
        //$word = $this->year . "年 " . $this->date->format('m月 d日');
        $word = $this->year . "年 " . $this->month . "月 " . $this->day . "日";
        $x = 300;
        $y = 137;

        $img->text($word, $x, $y, function($font) use ($font_path, $color){
            $font->file($font_path); // 日本語フォントファイル
            $font->size(17); // 文字サイズ
            $font->color($color); // 文字色
        });

        // 名前
        $word = $this->user->name;
        $x = 330;
        $y = 167;

        $img->text($word, $x, $y, function($font) use ($font_path, $color){
            $font->file($font_path); // 日本語フォントファイル
            $font->size(17); // 文字サイズ
            $font->color($color); // 文字色
        });

        // 本文
        $body = $this->getBodyArray(15);
        $x = 90;
        for($i = 0; $i < count($body); $i++) {
            $y = 280 + $i * 33;
            $word = $body[$i];
            $img->text($word, $x, $y, function($font) use ($font_path, $color){
                $font->file($font_path); // 日本語フォントファイル
                $font->size(22); // 文字サイズ
                $font->color($color); // 文字色
            });
        }
        // 保存
        $file_name = Uuid::uuid4()->toString();
        $img->save(public_path('/images/diaries/' . $file_name . '.jpg'));
        $this->image_path = '/images/diaries/' . $file_name . '.jpg';
        return $this;
    }
}
