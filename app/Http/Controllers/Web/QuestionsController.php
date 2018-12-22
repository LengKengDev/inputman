<?php

namespace App\Http\Controllers\Web;

use App\Entities\Question;
use Illuminate\Http\Request;

use App\Http\Requests;
use Kamaln7\Toastr\Toastr;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use App\Repositories\QuestionRepository;
use App\Validators\QuestionValidator;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

/**
 * Class QuestionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class QuestionsController extends Controller
{
    /**
     * @var QuestionRepository
     */
    protected $repository;

    /**
     * @var QuestionValidator
     */
    protected $validator;

    /**
     * QuestionsController constructor.
     *
     * @param QuestionRepository $repository
     * @param QuestionValidator $validator
     */
    public function __construct(QuestionRepository $repository, QuestionValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $questions = $this->repository->with(['questionType', 'level'])
            ->orderBy('id', 'desc')->paginate(15);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $questions,
            ]);
        }

        return view('questions.index', compact('questions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  QuestionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(QuestionCreateRequest $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $question = $this->repository->create($request->all());

            $response = [
                'message' => 'Question created.',
                'data'    => $question->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        if (request()->wantsJson()) {
            return response()->json([
                'data' => $question,
            ]);
        }

        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $activities = Activity::where('subject_type', "App\Entities\Question")
            ->where('subject_id', $question->id)->orderBy('created_at', 'desc')->take(10)->get();
        return view('questions.edit', compact('question', 'activities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  QuestionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(QuestionUpdateRequest $request, Question $question)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $question = $this->repository->update($request->all(), $question->id);

            $response = [
                'message' => 'Question updated.',
                'data'    => $question->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }
            
            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $deleted = $question->delete();

        if (request()->wantsJson()) {
            return response()->json([
                'message' => 'Question deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Question deleted.');
    }
}
