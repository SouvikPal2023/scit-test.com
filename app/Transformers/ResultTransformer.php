<?php
/**
 * File name: CategoryTransformer.php
 * Last modified: 01/02/21, 5:16 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Transformers;

use App\Result;
use App\{Country, State, City};
use League\Fractal\TransformerAbstract;
use App\Exam;

class ResultTransformer extends TransformerAbstract
{   
    protected $categories;
    protected $examid;

    public function __construct($categories, $examid)
    {
        $this->categories = $categories;
        $this->examid = $examid;

    }

    /**
     * A Fractal transformer.
     *
     * @param Result $result
     * @return array
     */

    public function transform($result)
    {   
        $modified = array();
        if($result->user){
            $dob = $result->user->date_of_birth;
            $userid = $result->user->id;
            $examid = $result->exam_id;
            $resultid = $result->id;
            $country = Country::where('id',$result->user->address->country)->first();
            $state = State::where('id',$result->user->address->state)->first();
            $diff = (date('Y') - date('Y',strtotime($dob)));

            $exam_title = Exam::where('id', $examid)->value('title');

            
            if(!$result->test_id){
                $test_id = $this->create_test_id($result->id, $exam_title);
                Result::where('id',$result->id)->update([
                    'test_id' => $test_id
                ]);
            }else{
                $test_id = $result->test_id;
            }

            $modified['test_id'] = $test_id;
            $modified['name'] = $result->user->firstname.' '.$result->user->lastname;
            $modified['sex'] = $result->user->gender;
            $modified['age'] = $diff;
            $modified['country'] = $country->name;
            $modified['state'] =  $state->name;
            $modified['race'] = $result->user->race;
            $modified['userid'] = $userid;
            $modified['examid'] = $examid;
            $modified['id'] = $resultid;

            if (!empty($result->result)) {
                
                $result_d = json_decode($result->result,true);
                
                $modified['avarage'] = (isset($result_d['avarage'])) ? $result_d['avarage'] : 0;
                $modified['overall_standard_deviation'] = (isset($result_d['avarage'])) ? $result_d['avarage'] : 0;
                $modified['overall_z_score'] = (isset($result_d['overall_z_score'])) ? $result_d['overall_z_score'] : 0;
                $modified['overall_t_score'] = (isset($result_d['overall_t_score'])) ? $result_d['overall_t_score'] : 0;
                $modified['overall_percentile'] = (isset($result_d['overall_percentile'])) ? $result_d['overall_percentile'] : 0;

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
                $modified['total_categoery'] = $i;
            }else{
                $i = 1;
                foreach($this->categories as $category){
                    $modified['label'.$i] = 0;
                    $i++;
                }
                
                $modified['avarage'] = 0;
                $modified['overall_standard_deviation'] = 0;
                $modified['overall_z_score'] = 0;
                $modified['overall_t_score'] = 0;
                $modified['overall_percentile'] = 0;

                $modified['resultMark'] = 0;
                $modified['total_categoery'] = $i;
            }
            $modified['user_exist'] = true;
            return $modified;
        }
        else{
            $modified['name'] = 'Now user does not exist';
            $modified['sex'] = '-';
            $modified['age'] = '-';
            $modified['country'] = '-';
            $modified['state'] =  '-';
            $modified['race'] = '-';
            $modified['userid'] = '-';
            $modified['examid'] = '-';
            $modified['id'] = '-';
            
            $i = 1;
            foreach($this->categories as $category){
                $modified['label'.$i] = 0;
                $i++;
            }
            
            $modified['avarage'] = 0;
            $modified['overall_standard_deviation'] = 0;
            $modified['overall_z_score'] = 0;
            $modified['overall_t_score'] = 0;
            $modified['overall_percentile'] = 0;

            $modified['resultMark'] = 0;
            $modified['total_categoery'] = $i;

            $modified['user_exist'] = false;
            return $modified;
        }
    }

    public function initials($str) {
        $ret = '';
        foreach (explode(' ', $str) as $word)
            $ret .= strtoupper($word[0]);
        return $ret;
    }

    public function create_test_id($result_id, $exam_title) {

        $total_letters = 6;
        $exam_title = $this->initials($exam_title);
        $exam_title_letters = strlen($exam_title);
        $total_letters = $total_letters - strlen($exam_title);
        $result_id = sprintf("%0".$total_letters."d", $result_id);
        
        $test_id = $exam_title.$result_id;

        return $test_id;

    }
}
