<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DatabaseHelper;

class NotificationReadController extends Controller
{
    public function read($notificationId)
    {
    	$notification = DatabaseHelper::getNotificationById($notificationId);
    	echo $notification[0]->data; exit;
    	$objMessage = json_decode($notification[0]->data, TRUE);
    	auth()->user()->unreadNotifications->where('id', $notificationId)->markAsRead();
    	//return redirect(route($objMessage['url'], ['id' => $objMessage['application'], 'type' => 'req']));
    	//exit;
    }

    public function index()
    {
    	$rows = auth()->user()->notifications()->paginate(20);
    	return view('notification.index', compact('rows'))->with('i', (request()->input('page', 1) - 1) * 20);
    }
}
