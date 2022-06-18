<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Request;


class PostCountController
{

    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function __invoke(Request $request): int
    {
        $onlineRequest = $request->get('online') ;
        $conditions =[];
        if ($onlineRequest !== null) {
            $conditions = ['online' => $onlineRequest ==='1'?true:false];
        }
        return $this->postRepository->count($conditions);

    }

}