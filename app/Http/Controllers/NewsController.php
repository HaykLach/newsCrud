<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Repositories\NewsRepository;
use Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
    private NewsRepository $newsRepository;

    /**
     * @param NewsRepository $newsRepository
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }


    public function create(NewsRequest $request): JsonResponse
    {
        return response()->json([
            'status' => true,
            'data' => $this->newsRepository->createNews($request->all())
        ]);
    }

    public function read(int $id): JsonResponse
    {
        return response()->json([
            'status' => true,
            'data' => $this->newsRepository->getNewsById($id)
        ], 200);
    }

    public function edit(NewsRequest $request, int $id): JsonResponse
    {
        $news = $this->newsRepository->getNewsById($id);
        $this->newsRepository->editNews($request->all(), $news);

        return response()->json([
            'status' => true,
            'data' => $this->newsRepository->getNewsById($id)
        ], 201);
    }

    public function delete(int $id): JsonResponse
    {
        $this->newsRepository->deleteNews($id);

        return response()->json([
            'status' => true,
            'data' => 'News deleted!'
        ], 204);
    }
}
