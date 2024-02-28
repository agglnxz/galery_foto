<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $id,Request $request)
    {
        Comment::create([
            'user_id' => Auth::user()->id,
            'foto_id' => $id,
            'isi_komentar' => $request->isi_komentar

        ]);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comments=Comment::find($id);
        $comments->isi_komentar =$request->isi_komentar;
        $comments->save();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     $comments = Comment::find($id);
     $comments->delete();

     return back();
    }
}
