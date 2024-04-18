<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ChatController extends Controller
{
    public function index(Request $request, $receiverId)
    {
        $loggedInUserId = auth()->id();
        $contact = User::findOrFail($receiverId); 
        $contactName = $contact->name;
        $contactStatus = $contact->status;
     	$activeUsers = User::where('status', 'Active')
          ->whereIn('role', ['Carrier', 'Administrator', 'Staff'])
          ->get();

        $messages = DB::table('lms_g50_collaborationmessages')
                    ->where(function($query) use ($loggedInUserId, $receiverId) {
                        $query->where('SenderID', $loggedInUserId)
                              ->where('ReceiverID', $receiverId);
                    })
                    ->orWhere(function($query) use ($loggedInUserId, $receiverId) {
                        $query->where('SenderID', $receiverId)
                              ->where('ReceiverID', $loggedInUserId);
                    })
                    ->orderBy('Timestamp', 'asc')
                    ->get();
    
        return view('content.admin.history', compact('contactName', 'contactStatus', 'messages', 'loggedInUserId', 'receiverId', 'activeUsers'));
    }

public function sendMessage(Request $request)
    {
        $senderId = auth()->id();
        $receiverId = $request->input('receiver_id');
        $messageContent = $request->input('message_content');
        $timestamp = now(); 

        $response = Http::post('https://mesph.online/chat/send_chat.php', [
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'message_content' => $messageContent
        ]);

        return $response->json();
    }

    public function showMessage(Request $request)
    {
        $senderId = auth()->id();
        $receiverId = $request->input('receiver_id');

        $response = Http::get('https://mesph.online/chat/get_chat.php', [
            'sender_id' => $senderId,
            'receiver_id' => $receiverId
        ]);

        return $response->json();
    }


}
