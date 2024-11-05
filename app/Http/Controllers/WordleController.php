<?php

namespace App\Http\Controllers;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class WordleController extends Controller
{
    public function index()
    {
        // Chọn ngẫu nhiên từ bí mật nếu chưa có
        if (!Session::has('secret_word')) {
            $word = Word::inRandomOrder()->first()->word;
            Session::put('secret_word', $word);
            Session::put('attempts', []);
        }

        return view('wordle.wordle', [
            'attempts' => Session::get('attempts', []),
            'success' => Session::get('success', false)
        ]);
    }

    public function guess(Request $request)
    {
        $request->validate([
            'guess' => 'required|string|size:5'
        ]);

        $guess = strtolower($request->input('guess'));
        $secretWord = Session::get('secret_word');
        $attempts = Session::get('attempts', []);
        $feedback = [];

        // So sánh từng ký tự trong guess và secretWord
        for ($i = 0; $i < 5; $i++) {
            if ($guess[$i] === $secretWord[$i]) {
                $feedback[] = ['letter' => $guess[$i], 'status' => 'correct'];
            } elseif (str_contains($secretWord, $guess[$i])) {
                $feedback[] = ['letter' => $guess[$i], 'status' => 'present'];
            } else {
                $feedback[] = ['letter' => $guess[$i], 'status' => 'absent'];
            }
        }

        $attempts[] = $feedback;
        Session::put('attempts', $attempts);

        // Kiểm tra xem người chơi đã đoán đúng chưa
        if ($guess === $secretWord) {
            Session::put('success', true);
        }

        return redirect('/');
    }
}
