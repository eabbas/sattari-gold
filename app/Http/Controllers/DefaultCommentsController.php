<?php

namespace App\Http\Controllers;

use App\Models\defaultComments;
use App\Models\logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DefaultCommentsController extends Controller
{
    public function create()
    {
        $logo = logo::first();
        $comments = defaultComments::all();
        return view('admin.settings.defaultComments.create', ['logo' => $logo, 'defaultComments' => $comments]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        foreach (defaultComments::all() as $comment) {
            if ($comment->img) {
                Storage::disk('public')->delete($comment->img);
            }
            $comment->delete();
        }
        if (isset($request['comments'])) {
            foreach ($request['comments'] as $comment) {
                $img = null;
                if (isset($comment['img'])) {
                    $img = $comment['img']->store('defaultCommentsImgs', 'public');
                }
                defaultComments::create([
                    'userName' => $comment['userName'],
                    'date' => $comment['date'],
                    'time' => $comment['time'],
                    'comment' => $comment['comment'],
                    'img' => $img,
                ]);
            }
            return redirect()->back()->with('message', 'کامنت ها به روز رسانی شدند');
        } else {
            return redirect()->back();
        }
    }
}
