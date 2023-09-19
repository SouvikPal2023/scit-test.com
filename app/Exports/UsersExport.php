<?php

namespace App\Exports;

use App\User;
use App\Result;
use App\{Country, State, City};
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromQuery, WithHeadings
{   
    use Exportable;

    protected $categories;
    protected $examid;
    protected $exam;
    protected $question_ids;
    protected $excel;

    public function __construct($categories, $examid, $exam,$excel=true)
    {
        $this->categories = $categories;
        $this->examid = $examid;
        $this->exam = $exam;
        $this->question_ids = $exam->questions->pluck('id');
        $this->excel = $excel;
    }

    public function query()
    {
        return Result::query()->with('exam','user')->where('exam_id',$this->examid);
    }

    public function headings(): array
    {   
        $static_heading = [
            'User',
            'Sex',
            'Age',
            'Country',
            'Province/State',
            'Race',
        ];

        $dynamic_heading = array();

        if ($this->excel == true) {
            $i = 1;
            foreach($this->question_ids as $question_id){
                //$dynamic_heading['q-'.$question_id] = 'Q'.$i.' (ID - '.$question_id.')';
                $dynamic_heading['q-'.$question_id] = 'Q'.$i;
                $i++;
            }

        }
        

        foreach($this->categories as $category){
            $dynamic_heading[] = $category['label'];
        }

        $heading =  array_merge($static_heading,$dynamic_heading);

        $heading[] = 'Total Marks';

        if ($this->excel == true) {
            $heading[] = 'Average';
            $heading[] = 'Standard deviation';
            $heading[] = 'Z Score';
            $heading[] = 'T Score';
            $heading[] = 'Percentile';
        }

        return $heading;
    }

    public function collection()
    {   
        return Result::all();
    }

    public function prepareRows($rows)
    {   
        return $rows->transform(function ($result) {
            

            $country = Country::where('id',$result->user->address->country)->first();
            $state = State::where('id',$result->user->address->state)->first();
            $modified = array();

            $dob = $result->user->date_of_birth;
            $diff = (date('Y') - date('Y',strtotime($dob)));

            $modified['name'] = $result->user->firstname.' '.$result->user->lastname;
            $modified['sex'] = $result->user->gender;
            $modified['age'] = $diff;
            $modified['country'] = $country->name;
            $modified['state'] =  $state->name;
            $modified['race'] = $result->user->race;

            if (!empty($result->result)) {
                
                $result_d = json_decode($result->result,true);

                if ($this->excel == true) {
                    foreach($this->question_ids as $question_id){
                        $score = array_filter($result_d['questions_score'], function ($key) use ($question_id)  {
                            return ($question_id == $key);
                        },ARRAY_FILTER_USE_KEY);
                        $modified['q-'.$question_id] = $score[$question_id];
                    }
                }
                

                $i = 1;

                foreach($this->categories as $category){
                    $categorylabel = $category['label'];
                    $score = array_filter($result_d['categories_score'], function ($var) use ($categorylabel)  {
                        return ($var['label'] == $categorylabel);
                    });
                    if (!empty($score)) {
                        $score = array_values($score);
                        $modified['label'.$i] = ($score) ? $score[0]['score'] : 0;
                    }else{
                        $modified['label'.$i] = 0;
                    }
                    $i++;
                }

                $modified['resultMark'] = $result_d['resultMark'];

                if ($this->excel == true) {
                    $modified['overall_avarage'] = round($result_d['overall_avarage'],2);
                    $modified['overall_standard_deviation'] = round($result_d['overall_standard_deviation'],2);
                    $modified['overall_z_score'] = round($result_d['overall_z_score'],2);
                    $modified['overall_t_score'] = round($result_d['overall_t_score'],2);
                    $modified['overall_percentile'] = round($result_d['overall_percentile'],2);
                }

            }else{
                $i = 1;
                foreach($this->categories as $category){
                    $modified['label'.$i] = 0;
                    $i++;
                }
                
                $modified['resultMark'] = 0;
            }
           
            $modified = (object) $modified;

            return $modified;
        });
    }
    
}