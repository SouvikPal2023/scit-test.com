<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;
class Questions extends Model
{
    protected $guarded = [];
    
    // protected $rules = [
    // 'unique_id' => 'unique:Questions'
    // ];

    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }
    public function questionimages(){
        return $this->hasMany(QuestionImages::class,'question_id','id');
    }

    public function questioncategories(){
        return $this->hasMany(QuestionCategories::class,'question_id','id');
    }

    public function options()
    {
        return $this->hasMany(Options::class,'question_id','id');
    }
    
}