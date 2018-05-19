<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestions;
use App\Question;
use App\Questionnaire;

class QuestionController extends Controller
{
    public function index()
    {
        return view('questions.create');
    }

    public function store(StoreQuestions $request)
    {

        /** @var Questionnaire $subject */
        $subject = Questionnaire::find($request->questionnaier_id);
        $answer = is_string($request->answer) ? $request->answer : "";

        /** @var Question $question */
        $question = $subject->questions()->create([
            'question' => $request->question,
            'answer' => $answer,
        ]);

        if (is_array($request->answer)) {

            $choices = collect($request->get('answer'))->map(function ($choice) {
                $choice['is_correct'] = strtolower(@$choice['is_correct']) === "on";

                return $choice;
            });

            $question->choices()->createMany($choices->values()->all());
        }

        // Session Message
        session()->flash('msg','Question has been added');

//        return $question->choices;
        return redirect('questionnaires');
    }
}