<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;

class PostObserver
{
    /**
     * Обработка ПЕРЕД созданием записи
     *
     * @param BlogPost $post
     */
    public function creating(BlogPost $post)
    {
        $this->setPublishedAt($post);

        $this->setUser($post);
    }

    /**
     * Обработка ПЕРЕД обновлением записи
     *
     * @param BlogPost $post
     */
    public function updating(BlogPost $post)
    {
        $this->setPublishedAt($post);
    }

    /**
     * Если дата публикации не установлена и происходит установка флага - Опубликовано,
     * то устанавливаем дату публикации на текущую
     *
     * @param BlogPost $post
     */
    protected function setPublishedAt(BlogPost $post)
    {
        if (empty($post->published_at) && $post->is_published) {
            $post->published_at = Carbon::now();
        }
    }

    /**
     * Если не указан user_id, то устанавливаем пользователя по-умолчанию
     *
     * @param BlogPost $post
     */
    protected function setUser(BlogPost $post)
    {
        $post->user_id = auth()->id();
    }
}
