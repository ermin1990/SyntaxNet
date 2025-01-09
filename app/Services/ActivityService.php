<?php

namespace App\Services;

use Illuminate\Support\Collection;

class ActivityService
{
    public function getRecentActivities(Collection $users, Collection $posts, Collection $comments, Collection $pages): Collection
    {
        $userActivities = $users->map(function ($user) {
            return [
                'type' => 'User',
                'description' => "&nbsp;User &nbsp;<strong>&nbsp;{$user->name}&nbsp;</strong>&nbsp; registered.",
                'created_at' => $user->created_at,
            ];
        });

        $postActivities = $posts->map(function ($post) {
            return [
                'type' => 'Post',
                'description' => "&nbsp;Post &nbsp;<strong>{$post->title}</strong>&nbsp; created by &nbsp;<strong>{$post->user->name}</strong>.",
                'created_at' => $post->created_at,
            ];
        });

        $commentActivities = $comments->map(function ($comment) {
            return [
                'type' => 'Comment',
                'description' => "&nbsp; Comment by &nbsp;<strong>{$comment->user->name}</strong>&nbsp; on post <strong>&nbsp;{$comment->post->title}</strong>.",
                'created_at' => $comment->created_at,
            ];
        });

        $pageActivities = $pages->map(function ($page) {
            return [
                'type' => 'Page',
                'description' => "&nbsp;Page &nbsp;<strong>{$page->title}</strong>&nbsp; created by &nbsp;<strong>{$page->user->name}</strong>.",
                'created_at' => $page->created_at,
            ];
        });

        // Combine all activities, sort by created_at, and take the most recent 5
        return $userActivities
            ->merge($postActivities)
            ->merge($commentActivities)
            ->merge($pageActivities)
            ->sortByDesc('created_at')
            ->take(5)
            ->values();
    }
}
