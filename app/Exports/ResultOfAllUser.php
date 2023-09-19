<?php

namespace App\Exports;

use App\User;
use App\Result;
use App\Questions;
use App\{Country, State, City};
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ResultOfAllUser implements FromQuery, WithHeadings, WithColumnWidths
{   
    use Exportable;

    protected $categories;
    protected $examid;
    protected $exam;
    protected $question_ids;
    protected $excel;

    public function __construct($categories)
    {
        $this->categories = $categories;
        // $this->examid = $examid;
        // $this->exam = $exam;
        // $this->question_ids = $exam->questions->pluck('id');
        // $this->excel = $excel;
    }

    public function query()
    {
        return User::query()->with('results');
    }

    public function headings(): array
    {   
        $static_heading = [
            'UserName',
            'Sex',
            'Last',
            'First',
            'Email',
            'Phone',
            'Country',
            'Province/State',
            'City',
            'Age',
            'Race',
            'Password',
            'Test ID'
        ];

        for ($i=1; $i < 120; $i++) { 
            $static_heading[] = 'Q'.$i;
        }

        $dynamic_heading = array();

        foreach ($this->categories as $key => $category) {

            $key_index = array_search($key+1,array_column($this->categories, 'order'));
            if($key_index){
                $static_heading[] = $this->categories[$key_index]['name'];
                $static_heading[] = $this->categories[$key_index]['name'].'_T';
                $static_heading[] = $this->categories[$key_index]['name'].'%';
            }
        }

        // $heading =  array_merge($static_heading,$dynamic_heading);
        $heading = $static_heading;
        
        return $heading;
    }

    public function collection()
    {   
        return Result::all();
    }

    public function prepareRows($rows)
    {   
        $modified_users = array();
        $index = 0;

        $categories = array();
        $categories_count = array();
        $categories_score_arr = array();
        $final_calcualation_arr = array();
        $rank = array();
        $each_score_and_rank = array();
        $all_questions = Questions::all()->toarray();
        
        foreach ($this->categories as $key => $category) {
            $key_index = array_search($key+1,array_column($this->categories, 'order'));
            if($key_index){
                $categories_count[$this->categories[$key_index]['name']] = 0;
                $categories[$this->categories[$key_index]['name']] = 0;
            }
        }

        foreach ($rows as $key11 => $each_row) {
            if(count($each_row->results) > 0){
                foreach ($each_row->results as $key12 => $result) {
                    $result_d = json_decode($result,true);
                    $result_dd = json_decode($result_d["result"],true);
                    if($result_dd){
                        if(array_key_exists("questions_score",$result_dd)){
                            // foreach ($result_dd["questions_score"] as $key13 => $each_question) {
                                // var_dump($result_dd['categories_score']);
                                if(is_array($result_dd ["questions_score"])){
                                    foreach ($result_dd ["questions_score"] as $key => $value) {
                                        if(is_array($value)){
                                            // var_dump($value);
                                            // $key_index = array_search($value["factore_label"],$categories);
                                            if(array_key_exists($value["factore_label"], $categories)){
                                                
            // var_dump($result_d['id']);
            // exit;                           
                                                if(array_key_exists($value["factore_label"], $each_score_and_rank) && array_key_exists($result_d['id'], $each_score_and_rank[$value["factore_label"]])){
                                                    // $each_score_and_rank[$value["factore_label"]][$result_d['id']]['id'] = $result_d['id'];
                                                    $each_score_and_rank[$value["factore_label"]][$result_d['id']]["score"] = $each_score_and_rank[$value["factore_label"]][$result_d['id']]["score"] + $value["score"];
                                                }else{
                                                    $each_score_and_rank[$value["factore_label"]][$result_d['id']]['id'] = $result_d['id'];
                                                    $each_score_and_rank[$value["factore_label"]][$result_d['id']]["score"] = $value["score"];
                                                }
                                                $categories_count[$value["factore_label"]] = $categories_count[$value["factore_label"]] + 1;
                                                $categories[$value["factore_label"]] += $value["score"];
                                                $categories_score_arr[$value["factore_label"]][] = $value["score"];
                                                $index++;
                                            }
                                        }
                                    }
                                }
                            // }
                        }
                    }
                }
            }
        }
        foreach ($each_score_and_rank as $key => $value) {
            usort($each_score_and_rank[$key], function($a, $b) {
                if ($a['score'] > $b['score']) {
                    return 1;
                } elseif ($a['score'] < $b['score']) {
                    return -1;
                }
                return 0;
            });
            foreach ($each_score_and_rank[$key] as $keyyy => $valueee) {
                $each_score_and_rank[$key][$keyyy]['rank'] = $keyyy+1;
            }
        }
        foreach ($categories as $key => $category_score) {
            // var_dump($key);
            // var_dump($category_score);
            
            // $fMean = array_sum($array) / count($array);
            $fMean = $category_score / $categories_count[$key];

            $fVariance = 0.0;

            // foreach ($array as $i)
            // {
            //     $fVariance += pow($i - $fMean, 2);
            // } 

            foreach ($categories_score_arr[$key] as $i)
            {
                // var_dump($i);
                // exit;
                $fVariance += pow( $i - $fMean, 2);
            }

            // $size = count($array) - 1;
            $size = $categories_count[$key] - 1;

            // $standard_deviation =  (float) sqrt($fVariance)/sqrt($size);
            $standard_deviation =  (float) sqrt($fVariance)/sqrt($size);
            $final_calcualation_arr[$key]['standard_deviation'] = $standard_deviation;

            // Mean = sum_of_all_marks / total_number_of_test;
            $final_calcualation_arr[$key]['mean'] = $category_score / $categories_count[$key];

            $final_calcualation_arr[$key]['total_number_of_test '] = $categories_count[$key];
        }
        // var_dump($categories_count);
        // var_dump($final_calcualation_arr);
        // exit;
        foreach ($rows as $key => $each_row) {
            if($each_row->id != 3){
                $country = Country::where('id', $each_row["address"]->country)->first();
                $state = State::where('id',$each_row["address"]->state)->first();
                $city = City::where('id',$each_row["address"]->city)->first();
            }else{
                $country["name"] = '';
                $state["name"] = '';
                $city["name"] = '';
            }

            $modified = array();

            $dob = $each_row->date_of_birth;
            $diff = (date('Y') - date('Y',strtotime($dob)));

            if(count($each_row->results) > 0 && $each_row["id"] != 2){
                foreach ($each_row->results as $key => $result) {
                    $result_d = json_decode($result,true);
                    $result_dd = json_decode($result_d["result"],true);
                    if($result_dd){
                        if(array_key_exists("questions_score",$result_dd)){
                            $question_index = 1;
                            $flag = false;
                            
                            $modified['UserName'] = $each_row["username"];
                            $modified['sex'] = $each_row["gender"];
                            $modified['Last'] = $each_row["lastname"];
                            $modified['First'] = $each_row["firstname"];
                            $modified['Email'] = $each_row["email"];
                            $modified['Phone'] = $each_row["mobile"];
                            $modified['country'] = $country["name"];
                            $modified['state'] =  $state["name"];
                            $modified['city'] =  $city["name"];
                            $modified['age'] = $diff;
                            $modified['race'] = $each_row["race"];
                            $modified['Password'] = $each_row["password"];
                            $modified['test_id'] = $result_d['test_id'];
                            // var_dump($result_d['test_id']);
                            $factor_label = array();
                            $all_question_arr = array();
                            $sorting = false;
                            foreach ($result_dd["questions_score"] as $key => $each_question) {
                                if(is_array($each_question)){
                                    if(!in_array($each_question["question"], $all_question_arr)){
                                        if(is_array($each_question) && $question_index < 120){
                                            $abc = array_search($each_question['test_unique_id'], array_column($all_questions, 'unique_id'));
                                            // var_dump($all_questions[$abc]);
                                            // exit;
                                            $result_dd["questions_score"][$key]['order'] =  $all_questions[$abc]["order"];
                                            $sorting = true;
                                        }
                                    }
                                }
                            }
                            if($sorting){
                                usort($result_dd["questions_score"], function($a, $b) {
                                    if ($a['order'] > $b['order']) {
                                        return 1;
                                    } elseif ($a['order'] < $b['order']) {
                                        return -1;
                                    }
                                    return 0;
                                });
                                // var_dump($result_dd["questions_score"]);
                                // exit;
                            }
                            foreach ($result_dd["questions_score"] as $key => $each_question) {
                                if(is_array($each_question)){
                                    if(!in_array($each_question["question"], $all_question_arr)){
                                        if(is_array($each_question) && $question_index < 120){
                                            $flag = true;
                                            $modified['Q'.$question_index] = number_format((float)$each_question["score"], 2);
                                            $factor_label[$each_question["factore_label"]] = number_format((float)$each_question["score"], 2);
                                            // var_dump($each_question["factore_label"]);
                                            // exit; number_format((float)$each_question["score"], 2, '.', '');
                                            $all_question_arr[] = $each_question["question"];
                                        }else{
                                            $factor_label[$each_question["factore_label"]] = 0;
                                        }
                                        $question_index++;
                                        // var_dump(!in_array($each_question["question"],$all_question_arr));
                                        // var_dump($each_question["question"]);
                                    }else{
                                        $factor_label[$each_question["factore_label"]] = 0;
                                    }
                                }
                            }
                            foreach ($categories as $key => $value) {
                                if(array_key_exists($key, $factor_label)){
                                    $arr_index = array_search($result_d['id'], array_column($each_score_and_rank[$key], 'id'));

                                    // $modified[$key] = $each_score_and_rank[$key][$arr_index]['score'];
                                    if($each_score_and_rank[$key][$arr_index]['score'] == ""){
                                        $modified[$key] = number_format((float)0.05, 2, '.', '');
                                    }else{
                                        $modified[$key] = $each_score_and_rank[$key][$arr_index]['score'];
                                    }
                                    // z_score = value - Mean / standard_deviation;
                                    $z_score = $factor_label[$key] - ($final_calcualation_arr[$key]['mean']/$final_calcualation_arr[$key]['standard_deviation']);
                                    $z_score = number_format((float)$z_score, 2, '.', '');
                                    // t_score = (10 * $z_score) + 50;
                                    $t_score = (10* $z_score) + 50;
                                    $t_score = number_format((float)$t_score, 2, '.', '');
                                    $modified[$key.'_T'] = $t_score;

                                    // percentile =  number of values count below "Cereal " / total_number_of_test (which has Cereal) * 100;
                                    $percentile = 100*($each_score_and_rank[$key][$arr_index]['rank'] - 0.5)/count($each_score_and_rank[$key]);
                                    $percentile = number_format((float)$percentile, 2, '.', '');
                                    $modified[$key.'%'] = $percentile;
                                    // var_dump($key.'--'.$categories_count[$key]);
                                    // exit;
                                }else{
                                    $modified[$key] = number_format((float)0, 2, '.', '');
                                    $modified[$key.'_T'] = '';
                                    $modified[$key.'%'] = '';
                                }
                            }
                            if($flag){
                                for ($i=1; $question_index < 120; $i++) { 
                                    $modified['Q'.$question_index] = '#N/A';
                                    $question_index++;
                                }
                                array_push($modified_users, $modified);
                            }
                        }
                    }
                }
            }       
        }
                            // exit;

        $modified_users = collect($modified_users);

        return $modified_users->transform(function ($user) {
            $modified = array();
            $categoriesss = array();
            foreach ($this->categories as $key => $category) {
                $key_index = array_search($key+1,array_column($this->categories, 'order'));
                if($key_index){
                    $categoriesss[$this->categories[$key_index]['name']] = 0;
                }
            }
            $modified['UserName'] = $user["UserName"];
            $modified['sex'] = $user["sex"];
            $modified['Last'] = $user["Last"];
            $modified['First'] = $user["First"];
            $modified['Email'] = $user["Email"];
            $modified['Phone'] = $user["Phone"];
            $modified['country'] = $user["country"];
            $modified['state'] =  $user["state"];
            $modified['city'] =  $user["city"];
            $modified['age'] = $user["age"];
            $modified['race'] = $user["race"];
            $modified['Password'] = $user["Password"];
            $modified['Test ID'] = $user["test_id"];

            for ($i=1; $i < 120; $i++) { 
                $modified['Q'.$i] = $user['Q'.$i];
            }
            foreach ($categoriesss as $key => $value) {
                $modified[$key] = $user[$key];
                $modified[$key.'_T'] = $user[$key.'_T'];
                $modified[$key.'%'] = $user[$key.'%'];
            }

            $modified = (object) $modified;
            return $modified;
        });
    }    

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 10,
            'C' => 15,
            'D' => 15,
            'E' => 30,
            'F' => 15,
            'G' => 13,
            'H' => 25,
            'I' => 15,
            'J' => 6,
            'K' => 15,
            'L' => 70,
            'M' => 10,
            'N' => 4,
            'O' => 4,
            'P' => 4,
            'Q' => 4,
            'R' => 4,
            'S' => 4,
            'T' => 4,
            'U' => 4,
            'V' => 4,
            'W' => 4,
            'X' => 4,
            'Y' => 4,
            'Z' => 4,
            'AA' => 4,
            'AB' => 4,
            'AC' => 4,
            'AD' => 4,
            'AE' => 4,
            'AF' => 4,
            'AG' => 4,
            'AH' => 4,
            'AI' => 4,
            'AJ' => 4,
            'AK' => 4,
            'AL' => 4,
            'AM' => 4,
            'AN' => 4,
            'AO' => 4,
            'AP' => 4,
            'AQ' => 4,
            'AR' => 4,
            'AS' => 4,
            'AT' => 4,
            'AU' => 4,
            'AV' => 4,
            'AW' => 4,
            'AX' => 4,
            'AY' => 4,
            'AZ' => 4,
            'BA' => 4,
            'BB' => 4,
            'BC' => 4,
            'BD' => 4,
            'BE' => 4,
            'BF' => 4,
            'BG' => 4,
            'BH' => 4,
            'BI' => 4,
            'BJ' => 4,
            'BK' => 4,
            'BL' => 4,
            'BM' => 4,
            'BN' => 4,
            'BO' => 4,
            'BP' => 4,
            'BQ' => 4,
            'BR' => 4,
            'BS' => 4,
            'BT' => 4,
            'BU' => 4,
            'BV' => 4,
            'BW' => 4,
            'BX' => 4,
            'BY' => 4,
            'BZ' => 4,
            'CA' => 4,
            'CB' => 4,
            'CC' => 4,
            'CD' => 4,
            'CE' => 4,
            'CF' => 4,
            'CG' => 4,
            'CH' => 4,
            'CI' => 4,
            'CJ' => 4,
            'CK' => 4,
            'CL' => 4,
            'CM' => 4,
            'CN' => 4,
            'CO' => 4,
            'CP' => 4,
            'CQ' => 4,
            'CR' => 4,
            'CS' => 4,
            'CT' => 4,
            'CU' => 4,
            'CV' => 4,
            'CW' => 4,
            'CX' => 4,
            'CY' => 4,
            'CZ' => 4,
            'DA' => 4,
            'DB' => 4,
            'DC' => 4,
            'DD' => 4,
            'DE' => 4,
            'DF' => 4,
            'DG' => 4,
            'DH' => 4,
            'DI' => 4,
            'DJ' => 4,
            'DK' => 4,
            'DL' => 4,
            'DM' => 4,
            'DN' => 4,
            'DO' => 4,
            'DP' => 4,
            'DQ' => 4,
            'DR' => 4,
            'DS' => 4,
            'DT' => 4,
            'DU' => 4,
            'DV' => 4,
            'DW' => 4,
            'DX' => 4,
            'DY' => 4,
            'DZ' => 4,
            'EA' => 4,
            'EB' => 4,
            'EC' => 11,
            'ED' => 11,
            'EE' => 11,
            'EF' => 9,
            'EG' => 9,
            'EH' => 9,
            'EI' => 14,
            'EJ' => 14,
            'EK' => 14,
            'EL' => 16,
            'EM' => 16,
            'EN' => 16,
            'EO' => 9,
            'EP' => 9,
            'EQ' => 9,
            'ER' => 15,
            'ES' => 15,
            'ET' => 15,
            'EU' => 12,
            'EV' => 12,
            'EW' => 12,
            'EX' => 12,
            'EY' => 12,
            'EZ' => 12,
            'FA' => 14,
            'FB' => 14,
            'FC' => 14,
            'FD' => 11,
            'FE' => 11,
            'FF' => 11,
            'FG' => 10,
            'FH' => 10,
            'FI' => 10,
            'FJ' => 10,
            'FK' => 10,
            'FL' => 10,
            'FM' => 9,
            'FN' => 9,
            'FO' => 9,
            'FP' => 10,
            'FQ' => 10,
            'FR' => 10,
            'FS' => 10,
            'FT' => 10,
            'FU' => 10,
            'FV' => 10,
            'FW' => 10,
            'FX' => 10,
            'FY' => 12,
            'FZ' => 12,
            'GA' => 12,
            'GB' => 12,
            'GC' => 12,
            'GD' => 12,
            'GE' => 10,
            'GF' => 10,
            'GG' => 10,
            'GH' => 9,
            'GI' => 9,
            'GJ' => 9,
            'GK' => 9,
            'GL' => 9,
            'GM' => 9,
            'GN' => 10,
            'GO' => 10,
            'GP' => 10,
            'GQ' => 10,
            'GR' => 10,
            'GS' => 10,
            'GT' => 10,
            'GU' => 10,
            'GV' => 10,
            'GW' => 12,
            'GX' => 12,
            'GY' => 12,
            'GZ' => 16,
            'HA' => 16,
            'HB' => 16,
            'HC' => 8,
            'HD' => 8,
            'HE' => 8,
            'HF' => 6,
            'HG' => 6,
            'HH' => 6,
            'HI' => 7,
            'HJ' => 7,
            'HK' => 7,
            'HL' => 10,
            'HM' => 10,
            'HN' => 10,
            'HO' => 10,
            'HP' => 10,
            'HQ' => 10,
            'HR' => 12,
            'HS' => 12,
            'HT' => 12,
            'HU' => 11,
            'HV' => 11,
            'HW' => 11,  
        ];
    }
}