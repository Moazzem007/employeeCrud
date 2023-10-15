<?php

namespace App\Http\Controllers;


use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuestionController extends Controller
{

    public function __construct()
    {
        $response = Http::get('https://quizapi.io/api/v1/questions', [
            'apiKey' => 'BGsIazbIAoUewVnAMHyCbisFjZUOVo0gsPIiLYzC',
            'limit' => 10,
        ]);
        $questions = json_decode($response->body());
        foreach($questions as $q){
            $question = new Question();
            $question->question = $q->question;
            $question->answer_a = $q->answers->answer_a;
            $question->answer_b = $q->answers->answer_b;
            $question->answer_c = $q->answers->answer_c;
            $question->save();
        }
    }
    public function show()
    {

        $questions = Question::all();
        return view('quiz.questions', compact('questions'));
    }


}
