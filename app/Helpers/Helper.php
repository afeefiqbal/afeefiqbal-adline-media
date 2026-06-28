<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use App\Models\SiteInformation;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Service;

if (!function_exists('loggedUserName')) {
    function loggedUserName() {
        $logged = Auth::guard('admin')->user();
        if($logged){
            $user = Admin::find($logged->user_id);
            if($user){
                return $user->name;
            }
        }
    }
}

if (!function_exists('loggedUserProfileImage')) {
    function loggedUserProfileImage() {
        $logged = Auth::guard('admin')->user();
        $image = asset('app/dist/img/user-default.png');
        if($logged && $logged->profile_image!=NULL){
            $image = asset($logged->profile_image);
        }
        return $image;
    }
}

if (!function_exists('sitePrefix')) {
    function sitePrefix() {
        return strtolower('admin/');
    }
}


if (!function_exists('loggedUserType')) {
    function loggedUserType() {
        return strtolower(Auth::guard('admin')->user()->user_type);
    }
}

if (!function_exists('SendContactMail')) {

    function SendContactMail($contact)
    {
        $siteInfo = Contact::first();
        $data = array(
            'name' => $contact->name,
            'email_id' => $contact->email,
            'phone' => $contact->phone,
            'content' => $contact->comments,
            'site_name' => config('app.name')
        );
        Mail::send('mail_template.contact_enquiry', $data, function ($message) use($siteInfo,$contact) {
            $message->to(array(
                $siteInfo->email_id => $siteInfo->email_recepient
            ));
            $message->subject('Contact Enquiry');
        });
        return true;
    }
}

if (!function_exists('sendContactReply')) {

    function sendContactReply($enquiry)
    {
        $data = array(
            'name' => $enquiry->name,
            'content' => $enquiry->comments,
            'reply' => $enquiry->reply,
            'site_name' => config('app.name')
        );
        Mail::send('mail_template.contact_enquiry_reply', $data, function ($message) use($enquiry) {
            $message->to(array(
                $enquiry->email => $enquiry->name
            ));
            $message->subject(config('app.name') . ' - Contact Enquiry Reply');
        });
        return true;
    }
}

if (!function_exists('SendQuoteMail')) {

    function SendQuoteMail($contact)
    {
        $siteInfo = Contact::first();
        $data = array(
            'name' => $contact->name,
            'email_id' => $contact->email,
            'phone' => $contact->phone,
            'company' => $contact->company,
            'subject' => $contact->subject,
            'city' => $contact->city,
            'content' => $contact->comments,
            'site_name' => config('app.name')
        );
        Mail::send('mail_template.quote_enquiry', $data, function ($message) use($siteInfo,$contact) {
            $message->to(array(
                $siteInfo->email_id => $siteInfo->email_recepient
            ));
            $message->subject($contact->subject);
        });
        return true;
    }
}

if (!function_exists('sendQuoteReply')) {

    function sendQuoteReply($enquiry)
    {
        $data = array(
            'name' => $enquiry->name,
            'content' => $enquiry->comments,
            'reply' => $enquiry->reply,
            'site_name' => config('app.name')
        );
        Mail::send('mail_template.quote_enquiry_reply', $data, function ($message) use($enquiry) {
            $message->to(array(
                $enquiry->email => $enquiry->name
            ));
            $message->subject(config('app.name') . ' - '. $enquiry->subject);
        });
        return true;
    }
}

if (!function_exists('ForgotMail')) {
    function ForgotMail($contact)
    {
        $data = array(
            'name' => $contact->name,
            'link' => $link,
            'site_name' => config('app.name'),
        );
        Mail::send('mail_template.forgot_password', $data, function ($message) use($user){
            $message->to(array(
                $contact->email => $contact->name
            ));
            $message->subject(config('app.name') . ' - Reset Password Notification');
        });
        return true;
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($file, $fileName = null, $location)
    {
        if (!File::exists(public_path($location))) {
            mkdir(public_path($location), 0777, true);
        }
        if ($fileName == null) {
            list($name, $ext) = explode('.', $file->getClientOriginalName());
            $fileName = $name;
        }
        $fileName = str_replace(' ', '-', strtolower($fileName));
        $fileName = preg_replace('/[^A-Za-z0-9\-]/', '-', $fileName) . '.' . $file->getClientOriginalExtension();
        $fileName = str_replace('--', '-', $fileName);
        $target = $location . $fileName;
        if (File::exists(public_path($target))) {
            $increment = 0;
            list($name, $ext) = explode('.', $fileName);
            while (File::exists(public_path($target))) {
                $increment++;
                $fileName = str_replace(' ', '', strtolower($name));
                $fileName = preg_replace('/[^A-Za-z0-9\-]/', '-', $fileName) . '-' . $increment . '.' . $ext;
                $fileName = str_replace('--', '-', $fileName);
                $target = $location . $fileName;
            }
        }
        $file->move(public_path($location), $fileName);
        return $target;
    }
}

if (!function_exists('limit_text')) {
    function limit_text($text, $limit) {
        $text = strip_tags($text);
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
}

if( !function_exists('explodePlus')) {
    function explodePlus($string){
        $value = '';
        $plus = '';
        if (str_contains($string, '+')) {
            $explodedInfo = explode('+', $string);
            $value = $explodedInfo['0'];
            $plus = '+';
        }else{
            $value = $string;
            $plus = '';
        }
        return [
            'value'=>$value,
            'plus'=>$plus
        ];
    }
}

if( !function_exists('categories')) {
    function categories($type, $id=NULL, $i=NULL, $flag=NULL){
        if($id==NULL){
            $i=0;
            $parentServices = Service::where([['status','active'],['parent_id',0]])->orderBy('sort_order')->get();
        }else{
            $parentServices = Service::where([['status','active'],['parent_id',$id]])->orderBy('sort_order')->get();
        }
        $specialClass=$toggleMenu=$mobileDownArrow='';
        if($type=="mobile"){
            $specialClass='Mobile';
            $toggleMenu = '';
            $mobileDownArrow = '<svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.6813 5.21379L7.86788 2.0272C8.21071 1.68438 8.21071 1.13071 7.86788 0.787882C7.52505 0.445055 6.97138 0.445055 6.62856 0.787882L4.06249 3.35566L1.49643 0.787882C1.1536 0.445054 0.599933 0.445054 0.257105 0.787882C-0.0857229 1.13071 -0.085723 1.68438 0.257105 2.0272L3.44369 5.21379C3.7848 5.5549 4.34018 5.5549 4.6813 5.21379Z" fill="#6D737A"/>
            </svg>';
        }
        if($parentServices->isNotEmpty()){
            foreach($parentServices as $parentService){
                if($type=="mobile"){
                    $toggleMenu = ($parentService->sub->isNotEmpty())?'data-bs-toggle="dropdown"':'';
                }
                ?>
                <li>
                    <?php if($parentService->parent_id!=0){
                        $url = url('service/'.$parentService->parent->short_url.'/'.$parentService->short_url);
                    }else{
                        $url = url('service/'.$parentService->short_url);
                    }?>
                    <a id="testSeriesUpsc<?=$specialClass;?>Menu<?=$i?>" class="dropdown-item <?=($flag==NULL)?'dropdown-itemSubmenu':'';?> <?=($parentService->sub->isNotEmpty())?'':'noDropdown-item'?>" <?=$toggleMenu;?> href="<?=$url;?>">
                        <?=$parentService->title;?>
                        <?=$mobileDownArrow;?>
                    </a>
                    <?php if($parentService->sub->isNotEmpty()){?>
                        <ul class="submenu dropdown-menu">
                            <?php categories($type, $parentService->id, $i, 1);?>
                        </ul>  
                    <?php }?>
                </li>
            <?php $i++;}
        }
    }
}

if( !function_exists('categoriesForInner')) {
    function categoriesForInner($serviceId, $id=NULL, $i=NULL){
        if($id==NULL){
            $i=0;
            $parentServices = Service::where([['status','active'],['parent_id',0]])->with('parent')->orderBy('sort_order')->get();
        }else{
            $parentServices = Service::where([['status','active'],['parent_id',$id]])->with('parent')->orderBy('sort_order')->get();
            $firstService = Service::find($id);
        }
        if($parentServices->isNotEmpty()){
            $ulClass = '';
            foreach($parentServices as $parentService){
                if($id==NULL){
                    $firstService = Service::find($parentService->id);
                }
                if(Request::segment(2)){
                    if(Request::segment(2)==$firstService->short_url){
                        $ulClass = '';
                    }else{
                        $ulClass = 'class="d-none"';
                    }
                }else{
                    $ulClass = ($parentService->id==$serviceId)?'':'class="d-none"';
                }
                $aClass = ($parentService->id==$serviceId)?'class="active"':'';
                ?>
                <li>
                    <?php if($parentService->parent_id!=0){
                        $url = url('service/'.$parentService->parent->short_url.'/'.$parentService->short_url);
                    }else{
                        $url = url('service/'.$parentService->short_url);
                    }?>
                    <a <?=$aClass;?> href="<?=$url?>">
                        <?=$parentService->title;?>
                    </a>
                    <?php if($parentService->sub->isNotEmpty()){?>
                        <ul <?=$ulClass;?>>
                            <?php categoriesForInner($serviceId, $parentService->id, $i);?>
                        </ul>  
                    <?php }?>
                </li>
            <?php $i++;}
        }
    }
}

if (!function_exists('googleMapEmbed')) {
    function googleMapEmbed($mapValue)
    {
        if (empty($mapValue)) {
            return '';
        }

        $mapValue = trim($mapValue);

        if (stripos($mapValue, '<iframe') !== false) {
            return $mapValue;
        }

        if (preg_match('/src=["\']([^"\']+)["\']/i', $mapValue, $matches)) {
            $src = $matches[1];
        } elseif (preg_match('/^https?:\/\//i', $mapValue)) {
            $src = $mapValue;
        } else {
            return '';
        }

        $src = htmlspecialchars($src, ENT_QUOTES, 'UTF-8');

        return '<iframe src="'.$src.'" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
    }
}

if (!function_exists('imageAltAttr')) {
    function imageAltAttr($value, $fallback = '')
    {
        $value = trim((string) $value);

        if (preg_match('/^alt\s*=\s*["\']([^"\']*)["\']/i', $value, $matches)) {
            $text = $matches[1];
        } elseif ($value !== '') {
            $text = strip_tags($value);
        } else {
            $text = trim(strip_tags((string) $fallback));
        }

        if ($text === '') {
            return '';
        }

        return 'alt="'.e($text).'"';
    }
}

if (!function_exists('isFormCaptchaEnabled')) {
    function isFormCaptchaEnabled()
    {
        $contact = Contact::first();

        return ($contact->form_captcha_enabled ?? 'Yes') === 'Yes';
    }
}

if (!function_exists('mathCaptchaType')) {
    function mathCaptchaType()
    {
        $contact = Contact::first();
        $type = $contact->form_captcha_type ?? 'random';

        return in_array($type, ['addition', 'subtraction', 'random'], true) ? $type : 'random';
    }
}

if (!function_exists('buildMathCaptcha')) {
    function buildMathCaptcha()
    {
        $type = mathCaptchaType();
        if ($type === 'random') {
            $type = rand(0, 1) ? 'addition' : 'subtraction';
        }

        $a = rand(1, 20);
        $b = rand(1, 20);

        if ($type === 'subtraction' && $b > $a) {
            [$a, $b] = [$b, $a];
        }

        if ($type === 'addition') {
            $answer = $a + $b;
            $question = $a.' + '.$b.' = ?';
        } else {
            $answer = $a - $b;
            $question = $a.' - '.$b.' = ?';
        }

        session([
            'math_captcha_answer' => $answer,
            'math_captcha_question' => $question,
        ]);

        return $question;
    }
}

if (!function_exists('currentMathCaptchaQuestion')) {
    function currentMathCaptchaQuestion()
    {
        if (!session()->has('math_captcha_answer')) {
            return buildMathCaptcha();
        }

        return session('math_captcha_question');
    }
}

if (!function_exists('validateMathCaptcha')) {
    function validateMathCaptcha($answer)
    {
        if (!isFormCaptchaEnabled()) {
            return true;
        }

        $expected = session('math_captcha_answer');
        session()->forget(['math_captcha_answer', 'math_captcha_question']);

        if ($expected === null || trim((string) $answer) === '') {
            return false;
        }

        return (int) $answer === (int) $expected;
    }
}

if (!function_exists('mathCaptchaValidationResponse')) {
    function mathCaptchaValidationResponse()
    {
        return [
            'status' => false,
            'message' => 'Incorrect captcha answer. Please try again.',
            'captcha_question' => buildMathCaptcha(),
        ];
    }
}

