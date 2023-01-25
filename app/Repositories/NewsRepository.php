<?php

namespace App\Repositories;

use App\Interfaces\NewsRepositoryInterface;
use App\Models\News;

class NewsRepository implements NewsRepositoryInterface
{

    public function getNewsById(int $id)
    {
        return News::findOrFail($id);
    }

    public function createNews(array $details)
    {
        return News::create($details);
    }

    public function editNews(array $details, News $news): bool
    {
        foreach ($details as $key => $detail) {
            $news->$key = $detail;
        }

        $news->save();

        return true;
    }

    public function deleteNews(int $id): void
    {
        News::destroy($id);
    }
}
