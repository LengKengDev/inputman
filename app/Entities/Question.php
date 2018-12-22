<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Question.
 *
 * @package namespace App\Entities;
 */
class Question extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'answers', 'question_type_id', 'level_id'];

    protected static $recordEvents = ['created', 'updated'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'answers' => 'array',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class)->withTrashed();
    }

    public function questionType()
    {
        return $this->belongsTo(QuestionType::class)->withTrashed();
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This question has been {$eventName} by :causer.name (:causer.email)";
    }
}
