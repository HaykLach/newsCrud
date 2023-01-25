<?php

namespace App\Interfaces;

use App\Models\News;

interface NewsRepositoryInterface
{
    public function getNewsById(int $id);
    public function createNews(array $details);
    public function editNews(array $details, News $news);
    public function deleteNews(int $id);
}
