<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQues;
use App\Questionnaire;

class QuestionnairesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $questionnaires = Questionnaire::all();
        return view('questionnaires.index', compact('questionnaires'));
    }

    public function create()
    {
        return view('questionnaires.create');
    }

    public function store(StoreQues $request)
    {
        // Validate the form
        $request->validated();

        // Save the form
        Questionnaire::create([
            'name' => $request->questionnaier_name,
            'duration' => $request->duration . $request->minutes,
            'can_resume' => $request->resume,
            'is_published' => 1,
            'user_id' => auth()->id()
        ]);

        // Session Message
        session()->flash('Questionnaier has been created');

        // Redirect back to questionnaires
        return redirect()->route('questionnaires');

    }

}
