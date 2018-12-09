<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\QuestionTypeRepository;
use App\Entities\QuestionType;
use App\Validators\QuestionTypeValidator;

/**
 * Class QuestionTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class QuestionTypeRepositoryEloquent extends BaseRepository implements QuestionTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return QuestionType::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
