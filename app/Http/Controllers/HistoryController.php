<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CollaborationMessage;

class HistoryController extends Controller
{
    public function index()
    {
        $loggedInUserID = auth()->id();

        $messages = CollaborationMessage::where('Receiver_ID', $loggedInUserID)
            ->orWhere('Receiver_ID', $loggedInUserID)
            ->groupBy('Receiver_ID')
            ->latest()
            ->get();

        return view('content.admin.history', ['messages' => $messages]);
    }
}
