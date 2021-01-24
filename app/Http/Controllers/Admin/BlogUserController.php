<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBlogUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class BlogUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBlogUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Пользователь обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        // TODO
//        if ($user->posts->count()) {
//            return redirect()->route('users.index')->with('error', 'У данного пользователя есть статьи. Удаление невозможно!');
//        }
//        if ($user->comments->count()) {
//            return redirect()->route('users.index')->with('error', 'У данного пользователя есть комментарии. Удаление невозможно!');
//        }
        $user->destroy($id);

        return redirect()->route('users.index')->with('success', 'Пользователь заблокирован');
    }

    public function trash()
    {
        $blocked_users = User::onlyTrashed()->get();

        return view('admin.users.trash', compact('blocked_users'));
    }

    public function restore($id)
    {
        $restored_user = User::withTrashed()->find($id)->restore();

        return redirect()->route('users.index')->with('success', 'Пользователь восстановлен');
    }
}
