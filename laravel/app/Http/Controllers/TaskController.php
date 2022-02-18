<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Services\UserService;


class TaskController extends Controller
{
    public function read(Request $request)
    {
        $loginInfo = (new UserService())->getLoginInfoByToken($request->header('token'));

        $return['tasks'] = Task::where('task_user_id', $loginInfo['id'])
            ->select(
                'task_id as id',
                'task_name as name',
                'task_default_minute as default_minute',
                'task_point_per_minute as point_per_minute',
                'task_status as status',
            )
            ->get();
        return $return;
    }
    public function create(Request $request)
    {
        $loginInfo = (new UserService())->getLoginInfoByToken($request->header('token'));
        if ($request['task_id']) {
            Task::where('task_id', $request['task_id'])->update([
                'task_name' => $request['task_name'],
                'task_status' => $request['task_status'],
                'task_default_minute' => $request['task_default_minute'],
                'task_point_per_minute' => $request['task_point_per_minute'],
                'task_user_id' => $loginInfo['id'],
            ]);
        } else {
            Task::create([
                'task_name' => $request['task_name'],
                'task_status' => $request['task_status'],
                'task_default_minute' => $request['task_default_minute'],
                'task_point_per_minute' => $request['task_point_per_minute'],
                'task_user_id' => $loginInfo['id'],
            ]);
        }
    }
    public function delete(Request $request)
    {
        Task::where('task_id', $request['task_id'])
            ->delete();

        return $request;
    }
}
