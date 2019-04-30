<?php

namespace App\Http\Controllers\User;


    use Mail;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Http\Requests;
   use Auth;
   use Session;


class feedbackController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }

    public function feedbackview(){
        return view('user.feedback.userfeedback');
    }

    public function userfeedback(Request $request){
        $this->validate($request,[
                'subject'=>'required|max:50',
                'message'=>'required|min:5']
        );

        $data=array(
            'email'=>Auth::user()->email,
            'name'=>Auth::user()->name,
            'sub'=>$request->subject,
            'bodyMessage'=> $request->message
        );
        Mail::send('user.email.feedbackMail',$data,function($message) use($data){
            $message->from($data['email']);
            $message->to('jujukhwopa@gmail.com','Khwopa JuJu Dhau');
            $message->subject('User FeedBacks');
        });

        session::flash('success_message','Your feedback is sent');
        return redirect()->route('user.user.feedback');

    }

}
