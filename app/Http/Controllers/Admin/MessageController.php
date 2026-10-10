<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
    public function index()
    {
        $type = request('type');
        $query = Message::latest();

        if ($type === 'test_request') {
            $query->whereNotNull('device_name')->where('device_name', '!=', '');
        } elseif ($type === 'contact') {
            $query->where(function ($q) {
                $q->whereNull('device_name')->orWhere('device_name', '');
            });
        }

        $messages = $query->paginate(20)->withQueryString();
        $totalTestRequests = Message::whereNotNull('device_name')->where('device_name', '!=', '')->count();
        $totalContactMessages = Message::where(function ($q) {
            $q->whereNull('device_name')->orWhere('device_name', '');
        })->count();

        return view('admin.messages.index', compact('messages', 'totalTestRequests', 'totalContactMessages', 'type'));
    }

    public function show(Message $message)
    {
        $message->update(['is_read' => true]);

        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Message $message): RedirectResponse
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Message deleted.');
    }
}
