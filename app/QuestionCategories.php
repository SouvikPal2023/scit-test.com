<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;
use App\Question as Questionlist;

class QuestionCategories extends Model
{
    protected $guarded = [];
    protected $table = 'question_categories';

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function questions(){
        return $this->hasOne(Questionlist::class,'id','question_id');
    }
}