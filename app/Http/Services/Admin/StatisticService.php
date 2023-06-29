<?php

namespace App\Http\Services\Admin;

use App\Binkap\Chart\DataSet;
use App\Binkap\Model\StatisticModel;
use App\Charts\Admin\PostViews;
use App\Charts\Admin\Users;
use App\Http\Services;
use App\Models\Admin;
use App\Models\Blog\Category;
use App\Models\Blog\Comment;
use App\Models\Blog\CommentReply;
use App\Models\Blog\Draft;
use App\Models\Blog\Post;
use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class StatisticService extends Services
{
    private Users $users;

    private PostViews $views;

    private Carbon $start;

    public function fetch(): array
    {
        $this->init();
        return [
            'stats' => $this->statistics(),
            'users' => $this->users,
            'views' => $this->views
        ];
    }

    private function init()
    {
        $this->start = \today()->subDays(8);
        $this->initUsers();
        $this->initPostViews();
    }

    private function initUsers()
    {
        $this->users = new Users;
        $labels = \collect();
        $data = \collect();
        $userInfo = User::withTrashed()->where('created_at', '>', $this->start->toDateTimeString())->get(['created_at']);
        for ($back = 6; $back >= 0; $back--) {
            $date = \today()->subDays($back);
            $labels->push($date->englishDayOfWeek);
            $data->push($this->getUserCount($date, $userInfo));
        }
        $this->users->init(labels: $labels, dataset: new DataSet('Users', 'line', $data), h: 350);
    }

    private function initPostViews()
    {
        $this->views = new PostViews;
        $labels = \collect();
        $data = \collect();
        $viewsInfo = Post::withTrashed()->where('updated_at', '>', $this->start->toDateTimeString())->get(['updated_at']);
        for ($back = 6; $back >= 0; $back--) {
            $date = \today()->subDays($back);
            $labels->push($date->toFormattedDayDateString());
            $data->push($this->getViewCount($date, $viewsInfo));
        }
        $this->views->init(labels: $labels, dataset: new DataSet('Views', 'pie', $data), h: 350);
    }

    private function getUserCount(Carbon $date, Collection $collection)
    {
        $tempCount = 0;
        foreach ($collection as $key => $user) {
            if ($date->dayOfWeek == $user->created_at->dayOfWeek) {
                $tempCount++;
                $collection->forget($key);
            }
        }
        return $tempCount;
    }

    private function getViewCount(Carbon $date, Collection $collection)
    {
        $tempCount = 0;
        foreach ($collection as $key => $user) {
            if ($date->dayOfWeek == $user->updated_at->dayOfWeek) {
                $tempCount++;
                $collection->forget($key);
            }
        }
        return $tempCount;
    }

    private function statistics(): array
    {
        $array = [
            ['name' => 'users', 'count' => User::count(), 'icon' => 'ri-team-line'],
            ['name' => 'subscribers', 'count' => Newsletter::count(), 'icon' => 'ri-mail-send-line'],
            ['name' => 'posts', 'count' => Post::count(), 'icon' => 'ri-article-line'],
            ['name' => 'categories', 'count' => Category::count(), 'icon' => 'ri-file-copy-2-line'],
            ['name' => 'admins', 'count' => Admin::count(), 'icon' => 'ri-admin-line'],
            ['name' => 'comments', 'count' => Comment::count(), 'icon' => 'ri-message-3-line'],
            ['name' => 'replies', 'count' => CommentReply::count(), 'icon' => 'ri-reply-all-line'],
            ['name' => 'drafts', 'count' => Draft::count(), 'icon' => 'ri-draft-line']
        ];
        $new = [];
        foreach ($array as $value) {
            $new[] = new StatisticModel($value['name'], $value['count'], $value['icon']);
        }
        unset($array);
        return $new;
    }
}
