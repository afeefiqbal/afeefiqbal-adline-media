<?php

namespace app\Http\Controllers\web;
use App\Http\Controllers\Controller;
use App\Models\MetaData;
use App\Models\HomeSetting;
use App\Models\KeyFeature;
use App\Models\WhatWeDo;
use App\Models\WhyChooseHeading;
use App\Models\WhyChooseUs;
use App\Models\WhoWeAre;
use App\Models\Testimonial;
use App\Models\OurClientHeading;
use App\Models\Client;
use App\Models\FaqHeading;
use App\Models\Faq;
use App\Models\ServiceFaq;
use App\Models\AboutUs;
use App\Models\OurTeamHeading;
use App\Models\OurTeam;
use App\Models\Banner;
use App\Models\BlogHeading;
use App\Models\Contact;
use App\Models\MetaTag;
use App\Models\ExtraTag;
use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioGallery;
use App\Models\Service;
use App\Models\OfficeAddress;
use App\Models\GetQuote;
use App\Models\ContactFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct(){
        $siteInformation = Contact::first();
        $extra_meta_data = ExtraTag::first();
        $homeSettings = HomeSetting::first();
        $homeServices = Service::where([['status','Active'],['parent_id',0],['display_to_home','Yes']])->with('sub')->orderBy('sort_order')->take(10)->get();
        $menuServices = Service::where([['status','Active'],['parent_id',0]])->with('sub')->orderBy('sort_order')->get();
        $serviceExist = Service::where('status','Active')->count();
        View::share(compact('siteInformation', 'extra_meta_data', 'homeSettings', 'homeServices','menuServices','serviceExist'));
    }

    public function seo_content($type, $page_name, $key = NULL){
        if ($type == 1) {
            $meta_data = MetaTag::where('page_name',$page_name)->first();
            return $meta_data;
        } else {
            $model = 'App\\Models\\' . $page_name;
            $meta_data = $model::find($key);
            return $meta_data;
        }
    }

    public function home(){
        $homeSettings = HomeSetting::first();
        $keyFeatures = KeyFeature::where('status','Active')->orderBy('sort_order')->take(4)->get();
        $whatWeDo = WhatWeDo::first();
        $whyChooseHeading = WhyChooseHeading::first();
        $whyChooseUs = WhyChooseUs::where('status','Active')->orderBy('sort_order')->take(4)->get();
        $whoWeAre = WhoWeAre::first();
        $portfolios = Portfolio::where([['status','Active'],['display_to_home','Yes']])->with('thumbnail')->take(10)->get();
        $testimonials = Testimonial::where('status','Active')->latest()->get();
        $clientHeading = OurClientHeading::first();
        $clients = Client::where('status','Active')->latest()->get();
        $faqHeading = FaqHeading::first();
        $faqs = Faq::where('status','Active')->orderBy('sort_order')->get();
        $blogs = Blog::where('status','Active')->orderBy('posted_date')->take(10)->get();
        $meta_data = $this->seo_content(1, 'Home');
        return view('web.home', compact('homeSettings', 'keyFeatures','whatWeDo', 'whyChooseHeading', 'whyChooseUs', 'whoWeAre','portfolios', 'testimonials', 'clientHeading', 'clients', 'faqHeading', 'faqs', 'blogs', 'meta_data'));
    }

    public function about_us(){
        $banner = Banner::where('type','About')->first();
        $about = AboutUs::first();
        $teamHeading = OurTeamHeading::first();
        $teams = OurTeam::where('status','Active')->orderBy('sort_order')->get();
        $whyChooseHeading = WhyChooseHeading::first();
        $whyChooseUs = WhyChooseUs::where('status','Active')->orderBy('sort_order')->take(4)->get();
        $keyFeatures = KeyFeature::where('status','Active')->orderBy('sort_order')->take(4)->get();
        $testimonials = Testimonial::where('status','Active')->latest()->get();
        $clientHeading = OurClientHeading::first();
        $clients = Client::where('status','Active')->latest()->get();
        $meta_data = $this->seo_content(1, 'About');
        return view('web.about-us', compact('banner','about', 'teamHeading','teams', 'whyChooseHeading', 'whyChooseUs', 'keyFeatures', 'testimonials', 'clientHeading', 'clients','meta_data'));
    }

    public function services(){
        $services = Service::where([['status', 'Active'], ['parent_id', 0]])
            ->with('sub')
            ->orderBy('sort_order')
            ->get();
        $whatWeDo = WhatWeDo::first();
        $meta_data = $this->seo_content(1, 'Home');

        return view('web.services', compact('services', 'whatWeDo', 'meta_data'));
    }

    public function service($parent_short_url, $short_url = null){
        if($short_url == null){
            $service = Service::where([['short_url', $parent_short_url], ['status', 'Active']])->with('sub')->first();
        }else{
            $service = Service::where([['short_url', $short_url], ['status', 'Active']])->with('sub')->first();
        }
        if ($service) {
            $banner = $service;
            $servicesList = Service::where('status', 'Active')->with('sub')->orderBy('sort_order')->get();
            $faqs = ServiceFaq::where('service_id', $service->id)->where('status', 'Active')->orderBy('sort_order')->get();
            $meta_data = $this->seo_content(0, 'Service', $service->id);
            return view('web.service_detail', compact('banner', 'service', 'servicesList', 'faqs', 'meta_data'));
        }

        return view('web.error.404');
    }

    public function portfolio(){
        $banner = Banner::where('type','Portfolio')->first();
        $categorys = PortfolioCategory::where('status','Active')->with('portfolios','portfolios.thumbnail')->orderBy('sort_order')->get();
        $meta_data = $this->seo_content(1, 'Portfolio');
        return view('web.portfolio', compact('banner', 'categorys', 'meta_data'));
    }

    public function portfolio_detail($short_url){
        $portfolio = Portfolio::where([['short_url', $short_url],['status','Active']])->with('photos')->first();
        if ($portfolio) {
            // dd($portfolio);
            $banner = $portfolio;
            $previousItem = Portfolio::where([['status','Active'],['id', '<', $portfolio->id]])->with('thumbnail')->orderBy('id','desc')->first();
            $nextItem = Portfolio::where([['status','Active'],['id', '>', $portfolio->id]])->with('thumbnail')->orderBy('id','asc')->first();
            $clients = Client::where('status','Active')->latest()->get();
            $clientHeading = OurClientHeading::first();
            $meta_data = $this->seo_content(0, 'Portfolio', $portfolio->id);
            return view('web.portfolio_detail', compact('banner', 'previousItem', 'nextItem','portfolio', 'clientHeading', 'clients', 'meta_data'));
        } else {
            return view('web.error.404');
        }
    }

    public function policy(){
        $banner = Banner::where('type','About')->first();
        $meta_data = $this->seo_content(1, 'About');

        return view('web.privacy-policy', compact('meta_data',  'banner'));
    }
    public function blogs(){
        $banner = Banner::where('type','Blog')->first();
        $blogs = Blog::where('status','Active')->latest()->take(3)->get();
        $currentCount = 3;
        $meta_data = $this->seo_content(1, 'Blog');
        return view('web.blogs', compact('meta_data', 'blogs', 'banner', 'currentCount'));
    }

    public function blog_detail($short_url){
        $blog = Blog::where([['short_url', $short_url],['status','Active']])->first();
        if ($blog) {
            $banner = $blog;
            $recentBlogs = Blog::where('status','Active')->where('id', '!=', $blog->id)->latest('posted_date')->take(5)->get();
            $meta_data = $this->seo_content(0, 'Blog', $blog->id);
            return view('web.blog_detail', compact('blog', 'banner', 'recentBlogs', 'meta_data'));
        } else {
            return view('web.error.404');
        }
    }

    public function team_detail($short_url){
        $member = OurTeam::where([['short_url', $short_url], ['status', 'Active']])->first();
        if ($member) {
            $meta_data = $this->seo_content(1, 'About');
            return view('web.team_detail', compact('member', 'meta_data'));
        }

        return view('web.error.404');
    }

    public function contact_us(){
        $banner = Banner::where('type','Contact')->first();
        $meta_data = $this->seo_content(1, 'Contact');
        $officeAddress = OfficeAddress::where('status','Active')->orderBy('sort_order')->get();
        $homeSettings = HomeSetting::first();
        return view('web.contact_us', compact('banner', 'officeAddress', 'homeSettings', 'meta_data'));
    }

    public function contact_store(Request $request){
        if (!validateMathCaptcha($request->captcha_answer ?? '')) {
            echo json_encode(mathCaptchaValidationResponse());
            return;
        }

        if (filter_var($request['contact_email'], FILTER_VALIDATE_EMAIL)) {
            $contact = new ContactFormRequest;
            $contact->name = isset($request['contact_name'])?$request['contact_name']:'';
            $contact->email = isset($request['contact_email'])?$request['contact_email']:'';
            $contact->phone = isset($request['contact_phone'])?$request['contact_phone']:'';
            $contact->comments = isset($request['contact_comments'])?$request['contact_comments']:'';
            if($contact->save()){
                $sendContactMail = SendContactMail($contact);
                if($sendContactMail){
                    echo json_encode(array('status'=>true,'message'=>'Contact request has been submitted successfully'));
                }else{
                    echo json_encode(array('status'=>true,'message'=>"Contact request has been submitted successfully,Can't sent the mail right now"));
                }
            }else{
                echo json_encode(array('status'=>false,'message'=>'Error : Error while submitting the contact request'));
            }
        }else{
            echo json_encode(array('status'=>'error','message'=>'Error : Please enter a valid email id'));
        }
    }

    public function getAQuoteStore(Request $request){
        if (!validateMathCaptcha($request->captcha_answer ?? '')) {
            return response()->json(mathCaptchaValidationResponse());
        }

        $keyFlag = $request->prefixKey;
        $name = $keyFlag.'_name';
        $email = $keyFlag.'_email';
        $phone = $keyFlag.'_phone';
        $company = $keyFlag.'_company';
        $city = $keyFlag.'_city';
        $subject = $keyFlag.'_subject';
        $comments = $keyFlag.'_comments';
        if (filter_var($request->$email, FILTER_VALIDATE_EMAIL)) {
            $enquiry = new GetQuote();
            $enquiry->name = $request->$name;
            $enquiry->email = $request->$email;
            $enquiry->phone = $request->$phone;
            $enquiry->company = $request->$company;
            $enquiry->subject = $request->$subject;
            $enquiry->city = $request->$city;
            $enquiry->message = $request->$comments;
            if ($enquiry->save()) {
                if (SendQuoteMail($enquiry)) {
                    return response()->json(['status' => true,
                        'message' => 'Quote has been submitted successfully']);
                } else {
                    return response()->json(['status' => true,
                        'message' => "Quote has been submitted successfully,Can't sent the mail right now"]);
                }
            } else {
                return response()->json(['status' => false,
                    'message' => 'Error : Error while submitting the quote']);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Error : Please enter a valid email id']);
        }
    }

    public function refreshMathCaptcha()
    {
        return response()->json([
            'status' => true,
            'captcha_question' => buildMathCaptcha(),
        ]);
    }

    public function loadMore(Request $request){
        $offest = $request->offset;
        $type = $request->type;
        $inputs = $request->fields;
        if($type=="blog"){
            $condition = Blog::where('status','Active');
            $currentCount = $offest+3;
            $take = 3;
        }
        $count = $condition->latest()->count(); 
        $data = $condition->latest()->skip($offest)->take($take)->get();
        if($type=="blog"){
            return view('web.render._blog_list',compact('data','currentCount'));  
        }else{
            return view('web.render._projects_list',compact('data','currentCount','type','count'));  
        }
    }
}
