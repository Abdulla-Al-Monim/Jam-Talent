<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Backend\ChatRoom;
use App\Models\Backend\Message;
use Image;
use File;
use Auth;
class ChatContoller extends Controller
{

    //
     //freelancer message
    public function freelancerMessages(){

        $chatRooms = ChatRoom::orderBy('total_message','desc')->where('user_one',Auth::user()->id)->orWhere('user_two',Auth::user()->id)->get();
        if ($chatRooms !== null) {
            $datas = array();
        $i = 0;
        foreach( $chatRooms as $chatRoom){
            $chatRoomsMessage = Message::orderBy('id','desc')->where('chat_room_id',$chatRoom->id)->first();
            $datas[$i]['id'] = $chatRoomsMessage->chat_room_id;
            $i++;
        }

        $chatRoom = ChatRoom::orderBy('total_message','desc')->where('user_one',Auth::user()->id)->orWhere('user_two',Auth::user()->id)->first();
        if ($chatRoom) {
           $messages = Message::orderBy('id','asc')->where('chat_room_id',$chatRoom->id)->get();
           $check = 1;
           return view('backend.pages.freelancer.message',compact('chatRooms','messages','datas','chatRoom','check'));
        }
        else{
            $check = 0;
            return view('backend.pages.freelancer.message',compact('chatRooms','datas','chatRoom','check'));
        }

        
        }
        
    }

   

    //send message from freelancer 
     public function sendMessageFreelancerChatRoom($id, Request $request){
            $c = ChatRoom::orderBy('total_message','desc')->first();
            $cout = $c->total_message;
            $room = ChatRoom::find($id);
            $room->total_message = $cout + 1;
            $room->save();
            $message = new Message;
            $message->chat_room_id = $id;
            $message->user_id = Auth::user()->id;
            $message->message = $request->message;
            if ( $request->file ) {
            $file                       = $request->file('file');
            $fileName                   = time().'.'.$request->file->extension();  
   
            $request->file->move(public_path('uploads'), $fileName);
                $message->file        = $fileName;
            }
            $message->save();
            if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'إرسال الرسالة',
            'alert-type'=>'success'
        );
 } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Mesaj Gönder',
            'alert-type'=>'success'
        );
}  
        else{
            $notification=array(
                'message'=>'Message Send',
                'alert-type'=>'success'
                    );
        }
                
                return redirect()->back()->with($notification);
    }
    public function sendMessageEmp($id, Request $request){
        $count = ChatRoom::where('user_one',$id)->where('user_two',Auth::user()->id)->count();
        $countTwo = ChatRoom::where('user_two',$id)->where('user_one',Auth::user()->id)->count();
        if ($count == null && $countTwo == null) {
            $c = ChatRoom::orderBy('total_message','desc')->first();
            if ($c == null) {
                $cout = 0;
            }
            else{
                $cout = $c->total_message;
            }
            $chatRoom = new ChatRoom;
            $chatRoom->user_one = Auth::user()->id;
            $chatRoom->user_two = $id;
            $chatRoom->room_creator = 1;
            $chatRoom->total_message = $cout + 1;
            $chatRoom->save();
            $message = new Message;
            $message->chat_room_id = $chatRoom->id;
            $message->user_id = Auth::user()->id;
            $message->message = $request->message;
            $message->save();
            if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'إرسال الرسالة',
            'alert-type'=>'success'
        );
 } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Mesaj Gönder',
            'alert-type'=>'success'
        );
}  
        else{
            $notification=array(
                'message'=>'Message Send',
                'alert-type'=>'success'
                    );
        }
                
                return redirect()->back()->with($notification);
        }
        else{
            if($count == null && $countTwo !== null){
                $c = ChatRoom::orderBy('total_message','desc')->first();
                $cout = $c->total_message;
                $chatRoom = ChatRoom::where('user_two',$id)->where('user_one',Auth::user()->id)->first();  
                $room = ChatRoom::find($chatRoom->id);
                $room->total_message = $cout + 1;
                $room->save();  
                $message = new Message;
                $message->chat_room_id = $chatRoom->id;
                $message->user_id = Auth::user()->id;
                $message->message = $request->message;
                $message->save();
                $notification=array(
                'message'=>'Message Send',
                'alert-type'=>'success'
                    );
                return redirect()->back()->with($notification);
            }
            else{
                $c = ChatRoom::orderBy('total_message','desc')->first();
                $cout = $c->total_message;
                $chatRoom = ChatRoom::where('user_one',$id)->where('user_two',Auth::user()->id)->first();
                $room = ChatRoom::find($chatRoom->id);
                $room->total_message =$cout + 1;
                $room->save();
                $message = new Message;
                $message->chat_room_id = $chatRoom->id;
                $message->user_id = Auth::user()->id;
                $message->message = $request->message;
                $message->save();
                if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'إرسال الرسالة',
            'alert-type'=>'success'
        );
 } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Mesaj Gönder',
            'alert-type'=>'success'
        );
}  
        else{
            $notification=array(
                'message'=>'Message Send',
                'alert-type'=>'success'
                    );
        }
                
                return redirect()->back()->with($notification);
            }
            
        }
    }
    //
    public function sendMessageEmployer($id, Request $request){
            $chatRoom = ChatRoom::where('freelancer_id',$id)->where('employer_id',Auth::user()->id)->first();
            $message = new Message;
            $message->chat_room_id = $chatRoom->id;
            $message->freelancer_id = $chatRoom->freelancer_id;
            $message->employer_id = $chatRoom->employer_id;
            $message->message = $request->message;
            $message->user_type = "employer";
            $message->save();
            if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'إرسال الرسالة',
            'alert-type'=>'success'
        );
 } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Mesaj Gönder',
            'alert-type'=>'success'
        );
}  
        else{
            $notification=array(
                'message'=>'Message Send',
                'alert-type'=>'success'
                    );
        }
            return redirect()->back()->with($notification);
    }

    //employer message
    public function employerMessages(){
        $chatRooms = ChatRoom::orderBy('total_message','desc')->where('user_one',Auth::user()->id)->orWhere('user_two',Auth::user()->id)->get();
       if ($chatRooms) {
            $datas = array();
        $i = 0;
        foreach( $chatRooms as $chatRoom){
            $chatRoomsMessage = Message::orderBy('id','desc')->where('chat_room_id',$chatRoom->id)->first();
            $datas[$i]['id'] = $chatRoomsMessage->chat_room_id;
            $i++;
        }

        $chatRoom = ChatRoom::orderBy('total_message','desc')->where('user_one',Auth::user()->id)->orWhere('user_two',Auth::user()->id)->first();
        if ($chatRoom) {
           $messages = Message::orderBy('id','asc')->where('chat_room_id',$chatRoom->id)->get();
           $check = 1;
           return view('backend.pages.employer.message',compact('chatRooms','messages','datas','chatRoom','check'));
        }
        else{
            $check = 0;
            return view('backend.pages.employer.message',compact('chatRooms','datas','chatRoom','check'));
        }

        
        } 
        
        
        
        
    }
    //send message from freelancer 
     public function sendMessageEmployerChatRoom($id, Request $request){
            $c = ChatRoom::orderBy('total_message','desc')->first();
            $cout = $c->total_message;
            $room = ChatRoom::find($id);
            $room->total_message = $cout + 1;
            $room->save();
            $message = new Message;
            $message->chat_room_id = $id;
            $message->user_id = Auth::user()->id;
            $message->message = $request->message;
            if ( $request->file ) {
            $file                       = $request->file('file');
            $fileName                   = time().'.'.$request->file->extension();  
   
            $request->file->move(public_path('uploads'), $fileName);
                $message->file        = $fileName;
            }
            $message->save();
            if(session()->get('locale') == 'ar') {
                    $notification=array(
            'message'=>'إرسال الرسالة',
            'alert-type'=>'success'
        );
 } 
        elseif(session()->get('locale') == 'tk'){
            $notification=array(
            'message'=>'Mesaj Gönder',
            'alert-type'=>'success'
        );
}  
        else{
            $notification=array(
                'message'=>'Message Send',
                'alert-type'=>'success'
                    );
        }
            return redirect()->back()->with($notification);
    }

     //freelancer messages
    public function freelancerMessagesChat($id){
        $chatRooms = ChatRoom::orderBy('total_message','desc')->where('user_one',Auth::user()->id)->orWhere('user_two',Auth::user()->id)->get();
        $datas = array();
        $i = 0;
        foreach( $chatRooms as $chatRoom){
            $chatRoomsMessage = Message::orderBy('id','asc')->where('chat_room_id',$chatRoom->id)->first();
            $datas[$i]['id'] = $chatRoomsMessage->chat_room_id;
            $i++;
        }
        $messages = Message::orderBy('id','asc')->where('chat_room_id',$id)->get();
        $chatRoom = ChatRoom::where('id',$id)->first();
        $check = 1;

        return view('backend.pages.freelancer.message',compact('chatRooms','messages','datas','chatRoom','check'));
    }


     //employer messages chat
    public function employerMessagesChat($id){
        $chatRooms = ChatRoom::orderBy('total_message','desc')->where('user_one',Auth::user()->id)->orWhere('user_two',Auth::user()->id)->get();
        $datas = array();
        $i = 0;
        foreach( $chatRooms as $chatRoom){
            $chatRoomsMessage = Message::orderBy('id','asc')->where('chat_room_id',$chatRoom->id)->first();
            $datas[$i]['id'] = $chatRoomsMessage->chat_room_id;
            $i++;
        }
        $chatRoom = ChatRoom::where('id',$id)->first();
        $messages = Message::orderBy('id','asc')->where('chat_room_id',$id)->get();
        $check = 1;

        return view('backend.pages.employer.message',compact('chatRooms','messages','chatRoomsMessage','datas','check','chatRoom'));
    }

    public function getAllMessages(){
        $chatRooms = ChatRoom::where('employer_id',Auth::user()->id)->get();
        $count = ChatRoom::where('employer_id',Auth::user()->id)->first();
        $messages = Message::orderBy('id','desc')->where('chat_room_id',$count->id)->get();
        return response()->json($messages);
    }

    public function messageFilerDownload($id)
    {
        //$myFile = storage_path("folder/dummy_pdf.pdf");

        $message = Message::Find($id);
        return response()->download(public_path('uploads/'.$message->file));
    }

    //message not send
    public  function messageNotSend(){
        $notification=array(
        'message'=>'Login First',
        'alert-type'=>'success'
            );
        return redirect()->back()->with($notification);
    }
}
