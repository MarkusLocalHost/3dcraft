<?php

namespace App\Observers;

use App\Models\BlogComment;
use Carbon\Carbon;

class CommentObserver
{
    /**
     * Обработка ПЕРЕД созданием записи
     *
     * @param BlogComment $comment
     */
    public function creating(BlogComment $comment)
    {
        $this->setPublishedAt($comment);
    }

    /**
     * Обработка ПЕРЕД обновлением записи
     *
     * @param BlogComment $comment
     */
    public function updating(BlogComment $comment)
    {
        $this->setPublishedAt($comment);
    }

    /**
     * Если дата публикации не установлена и происходит установка флага - Опубликовано,
     * то устанавливаем дату публикации на текущую
     *
     * @param BlogComment $comment
     */
    protected function setPublishedAt(BlogComment $comment)
    {
        if (empty($comment->published_at) && $comment->is_published) {
            $comment->published_at = Carbon::now();
        }
    }
}
