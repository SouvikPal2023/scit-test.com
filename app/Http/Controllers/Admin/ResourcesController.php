<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsLetter;
use App\Announcement;
use App\AboutTheApp;
use App\UpcomingEvent;
use App\ThankYouSponser;
use App\HealthRecommendation;
use App\GuidelineOfWHO;

class ResourcesController extends Controller
{
    //News Letter Starts Here
        public function news_letter(){
            $page_title = 'News Letter';

            $data['main'] = 'resources/news_letter';
            $data['active_page'] = 'resources/news_letter';

            $data['all_news_letter'] = NewsLetter::orderBy('id', 'DESC')->get();
            foreach ($data['all_news_letter'] as $key => $value) {
                $timestamp = strtotime($value['created_at']);
                if(date('d-m-Y') == date('d-m-Y',$timestamp)){
                    $data['all_news_letter'][$key]['time'] = 'Today'; 
                }
                elseif(date('m-Y') == date('m-Y',$timestamp)){
                    $data['all_news_letter'][$key]['time'] = 'Earlier This Month';
                }
                elseif(date('Y') == date('Y',$timestamp)){
                    $data['all_news_letter'][$key]['time'] = 'Earlier This Year';
                }else{
                    $data['all_news_letter'][$key]['time'] = date('d M Y',$timestamp);
                }
                $data['all_news_letter'][$key]['date'] = date('d M Y',$timestamp);
            }

            return view('admin.resources.news_letter', compact('page_title','data'));

        }

        public function save_news_letter(Request $request){
            $validated = $request->validate([
                'news_letter_content' => 'required',
                'news_letter_author' => 'required',
            ]);

            // if($_FILES['news_letter_image']['name']){
            //     $filename = $_FILES['news_letter_image']['name'];
            //     $ext = pathinfo($filename, PATHINFO_EXTENSION);
            //     $hash_file_name = rand().'-'.time().'.'.$ext;
            //     $target_dir = "uploads/resources/news_letter/images/";
            //     $target_file = $target_dir . $hash_file_name;

            //     $image_name = $filename;
            //     $image_hashname = $hash_file_name;

            //     move_uploaded_file($_FILES["news_letter_image"]["tmp_name"], $target_file);
            // }else{
            //     $image_name = null;
            //     $image_hashname = null;
            // }
            NewsLetter::create([
                'content' => $request->news_letter_content,
                'author' => $request->news_letter_author,
                // 'image' => $image_name,
                // 'image_hashname' => $image_hashname
            ]);
            
            return redirect(url('admin/resources/news_letter'));
        }

        public function delete_news_letter(Request $request){
            NewsLetter::where('id', $request->id)->delete();
        }
    //News Letter Ends Here

    //Announcement Starts Here
        public function announcement(){
            $page_title = 'Announcement';

            $data['main'] = 'resources/announcement';
            $data['active_page'] = 'resources/announcement';

            $data['all_announcement'] = Announcement::orderBy('id', 'DESC')->get();
            foreach ($data['all_announcement'] as $key => $value) {
                $timestamp = strtotime($value['created_at']);
                if(date('d-m-Y') == date('d-m-Y',$timestamp)){
                    $data['all_announcement'][$key]['time'] = 'Today'; 
                }
                elseif(date('m-Y') == date('m-Y',$timestamp)){
                    $data['all_announcement'][$key]['time'] = 'Earlier This Month';
                }
                elseif(date('Y') == date('Y',$timestamp)){
                    $data['all_announcement'][$key]['time'] = 'Earlier This Year';
                }else{
                    $data['all_announcement'][$key]['time'] = date('d M Y',$timestamp);
                }
                $data['all_announcement'][$key]['date'] = date('d M Y',$timestamp);
            }

            return view('admin.resources.announcement', compact('page_title','data'));

        }

        public function save_announcement(Request $request){
            $validated = $request->validate([
                'announcement_content' => 'required',
                'announcement_author' => 'required',
            ]);

            // if($_FILES['announcement_image']['name']){
            //     $filename = $_FILES['announcement_image']['name'];
            //     $ext = pathinfo($filename, PATHINFO_EXTENSION);
            //     $hash_file_name = rand().'-'.time().'.'.$ext;
            //     $target_dir = "uploads/resources/announcement/images/";
            //     $target_file = $target_dir . $hash_file_name;

            //     $image_name = $filename;
            //     $image_hashname = $hash_file_name;

            //     move_uploaded_file($_FILES["announcement_image"]["tmp_name"], $target_file);
            // }else{
            //     $image_name = null;
            //     $image_hashname = null;
            // }
            Announcement::create([
                'content' => $request->announcement_content,
                'author' => $request->announcement_author,
                // 'image' => $image_name,
                // 'image_hashname' => $image_hashname
            ]);
            
            return redirect(url('admin/resources/announcement'));
        }

        public function delete_announcement(Request $request){
            Announcement::where('id', $request->id)->delete();
        }
    // Announcement Ends Here

    //About The App Starts Here
        public function about_the_app(){
            $page_title = 'About The App';

            $data['main'] = 'resources/about_the_app';
            $data['active_page'] = 'resources/about_the_app';

            $about_the_app = AboutTheApp::orderBy('id', 'DESC')->get()->first();

            return view('admin.resources.about_the_app', compact('page_title','about_the_app'));

        }

        public function save_about_the_app(Request $request){
            // if($request->about_the_app_remove_image){
            //     $image_name = null;
            //     $image_hashname = null;
            // }else{
            //     $image_name = $request->about_the_app_existing_image_name;
            //     $image_hashname = $request->about_the_app_existing_image_hashname;
            // }
            // if($_FILES['about_the_app_image']['name'] != ''){
            
            //     $filename = $_FILES['about_the_app_image']['name'];
            //     $ext = pathinfo($filename, PATHINFO_EXTENSION);
            //     $hash_file_name = rand().'-'.time().'.'.$ext;
            //     $target_dir = "uploads/resources/about_the_app/images/";
            //     $target_file = $target_dir . $hash_file_name;

            //     $image_name = $filename;
            //     $image_hashname = $hash_file_name;

            //     $rrr = move_uploaded_file($_FILES["about_the_app_image"]["tmp_name"], $target_file);

            // }

            AboutTheApp::create([
                'content' => $request->about_the_app_content,
            ]);

            
            return redirect(url('admin/resources/about_the_app'));
        }
    //About The App Ends Here

    //Upcoming Events Starts Here
        public function upcoming_event(){
            $page_title = 'Upcoming Event';

            $data['main'] = 'resources/upcoming_event';
            $data['active_page'] = 'resources/upcoming_event';

            $upcoming_event = UpcomingEvent::orderBy('id', 'DESC')->get()->first();

            return view('admin.resources.upcoming_event', compact('page_title','upcoming_event'));

        }

        public function save_upcoming_event(Request $request){
            // if($request->upcoming_event_remove_image){
            //     $image_name = null;
            //     $image_hashname = null;
            // }else{
            //     $image_name = $request->upcoming_event_existing_image_name;
            //     $image_hashname = $request->upcoming_event_existing_image_hashname;
            // }
            // if($_FILES['upcoming_event_image']['name'] != ''){
            
            //     $filename = $_FILES['upcoming_event_image']['name'];
            //     $ext = pathinfo($filename, PATHINFO_EXTENSION);
            //     $hash_file_name = rand().'-'.time().'.'.$ext;
            //     $target_dir = "uploads/resources/upcoming_event/images/";
            //     $target_file = $target_dir . $hash_file_name;

            //     $image_name = $filename;
            //     $image_hashname = $hash_file_name;

            //     $rrr = move_uploaded_file($_FILES["upcoming_event_image"]["tmp_name"], $target_file);

            // }

            UpcomingEvent::create([
                'content' => $request->upcoming_event_content,
                // 'image' => $image_name,
                // 'image_hashname' => $image_hashname
            ]);

            
            return redirect(url('admin/resources/upcoming_event'));
        }
    //Upcoming Events Ends Here

    //Thank You Sponser Starts Here
        public function thank_you_sponser(){
            $page_title = 'Thank you Sponser';

            $data['main'] = 'resources/thank_you_sponser';
            $data['active_page'] = 'resources/thank_you_sponser';

            $thank_you_sponser = ThankYouSponser::orderBy('id', 'DESC')->get()->first();

            return view('admin.resources.thank_you_sponser', compact('page_title','thank_you_sponser'));

        }

        public function save_thank_you_sponser(Request $request){
            // if($request->thank_you_sponser_remove_image){
            //     $image_name = null;
            //     $image_hashname = null;
            // }else{
            //     $image_name = $request->thank_you_sponser_existing_image_name;
            //     $image_hashname = $request->thank_you_sponser_existing_image_hashname;
            // }
            // if($_FILES['thank_you_sponser_image']['name'] != ''){
            
            //     $filename = $_FILES['thank_you_sponser_image']['name'];
            //     $ext = pathinfo($filename, PATHINFO_EXTENSION);
            //     $hash_file_name = rand().'-'.time().'.'.$ext;
            //     $target_dir = "uploads/resources/thank_you_sponser/images/";
            //     $target_file = $target_dir . $hash_file_name;

            //     $image_name = $filename;
            //     $image_hashname = $hash_file_name;

            //     $rrr = move_uploaded_file($_FILES["thank_you_sponser_image"]["tmp_name"], $target_file);

            // }

            ThankYouSponser::create([
                'content' => $request->thank_you_sponser_content,
                // 'image' => $image_name,
                // 'image_hashname' => $image_hashname
            ]);

            
            return redirect(url('admin/resources/thank_you_sponser'));
        }
    //Thank You Sponser Ends Here

    //Health recommendation Starts Here
        public function health_recommendation(){
            $page_title = 'Health recommendation';

            $data['main'] = 'resources/health_recommendation';
            $data['active_page'] = 'resources/health_recommendation';

            $health_recommendation = HealthRecommendation::orderBy('id', 'DESC')->get()->first();

            return view('admin.resources.health_recommendation', compact('page_title','health_recommendation'));

        }

        public function save_health_recommendation(Request $request){
            // if($request->health_recommendation_remove_image){
            //     $image_name = null;
            //     $image_hashname = null;
            // }else{
            //     $image_name = $request->health_recommendation_existing_image_name;
            //     $image_hashname = $request->health_recommendation_existing_image_hashname;
            // }
            // if($_FILES['health_recommendation_image']['name'] != ''){
            
            //     $filename = $_FILES['health_recommendation_image']['name'];
            //     $ext = pathinfo($filename, PATHINFO_EXTENSION);
            //     $hash_file_name = rand().'-'.time().'.'.$ext;
            //     $target_dir = "uploads/resources/health_recommendation/images/";
            //     $target_file = $target_dir . $hash_file_name;

            //     $image_name = $filename;
            //     $image_hashname = $hash_file_name;

            //     $rrr = move_uploaded_file($_FILES["health_recommendation_image"]["tmp_name"], $target_file);

            // }

            HealthRecommendation::create([
                'content' => $request->health_recommendation_content,
                // 'image' => $image_name,
                // 'image_hashname' => $image_hashname
            ]);

            
            return redirect(url('admin/resources/health_recommendation'));
        }
    //Health Recommendation Ends Here

    //Guideline of WHO Starts Here
        public function guideline_of_who(){
            $page_title = 'Guideline of WHO';

            $data['main'] = 'resources/guideline_of_who';
            $data['active_page'] = 'resources/guideline_of_who';

            $guideline_of_who = GuidelineOfWHO::orderBy('id', 'DESC')->get()->first();

            return view('admin.resources.guideline_of_who', compact('page_title','guideline_of_who'));

        }

        public function save_guideline_of_who(Request $request){
            // if($request->guideline_of_who_remove_image){
            //     $image_name = null;
            //     $image_hashname = null;
            // }else{
            //     $image_name = $request->guideline_of_who_existing_image_name;
            //     $image_hashname = $request->guideline_of_who_existing_image_hashname;
            // }
            // if($_FILES['guideline_of_who_image']['name'] != ''){
            
            //     $filename = $_FILES['guideline_of_who_image']['name'];
            //     $ext = pathinfo($filename, PATHINFO_EXTENSION);
            //     $hash_file_name = rand().'-'.time().'.'.$ext;
            //     $target_dir = "uploads/resources/guideline_of_who/images/";
            //     $target_file = $target_dir . $hash_file_name;

            //     $image_name = $filename;
            //     $image_hashname = $hash_file_name;

            //     $rrr = move_uploaded_file($_FILES["guideline_of_who_image"]["tmp_name"], $target_file);

            // }

            GuidelineOfWHO::create([
                'content' => $request->guideline_of_who_content,
                // 'image' => $image_name,
                // 'image_hashname' => $image_hashname
            ]);

            
            return redirect(url('admin/resources/guideline_of_who'));
        }
    //Guideline of WHO Ends Here
}
