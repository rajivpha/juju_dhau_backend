<?php

namespace App\Http\Controllers\User;


use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Session;
use Auth;


class mailController extends Controller
{
    public function feedbackEmail( Request $request){

        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email',
         'message'=>'required|min:5']
         );

        $data=array(
        'email'=> $request->email,
        'name'=> $request->name,
        'bodyMessage'=> $request->message
        );

         Mail::send('user.email.contactmail',$data,function($message) use($data){
        $message->from($data['email']);
        $message->to('jujukhwopa@gmail.com','Khwopa JuJu Dhau');
        $message->subject('FeedBacks');
        });

    session::flash('success_message','Your mail is sent');
    return redirect()->route('contactus');
}

}
