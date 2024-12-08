<?php

namespace App\Http\Controllers;

use App\Models\Reply;use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class ReplyController extends Controller

{

    public function store(Request $request, $comment_id)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment_id = (int) $comment_id;

        if (!Comment::find($comment_id)) {
            return response()->json(['error' => 'Comment not found.'], 404);
        }

        $reply = Reply::create([
            'comment_id' => $comment_id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->route('news.detail', ['id' => $reply->comment->news_id])
                         ->with('success', 'Balasan berhasil ditambahkan!');
    }

    public function detail($id)
    {
        $news = News::with(['comments.replies', 'category'])->findOrFail($id);
        $news->comments = $news->comments ?? [];
        return view('detail', compact('news'));
    }
}