<?php

namespace App\Http\Controllers\Web;

use App\Entities\QuestionType;
use App\Repositories\QuestionTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionTypesController extends Controller
{
    /**
     * @var QuestionTypeRepository
     */
    protected $repository;

    /**
     * QuestionTypesController constructor.
     * @param QuestionTypeRepository $repository
     */
    public function __construct(QuestionTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionTypes = $this->repository->orderBy('id', 'desc')->get();
        return view('question_types.index', compact('questionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question_types = $this->repository->create($request->only(['name', 'description']));
        return redirect()->route('web.question_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionType  $questionType
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionType $questionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionType  $questionType
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionType $questionType)
    {
        return view('question_types.edit', compact('questionType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionType  $questionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionType $questionType)
    {
        $this->repository->update($request->only(['name', 'description']), $questionType->id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionType  $questionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionType $questionType)
    {
        $this->repository->delete($questionType->id);
        return back()->with('message', 'Question type deleted.');
    }
}
