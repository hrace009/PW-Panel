<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoteRequest;
use App\Http\Requests\UpdateVoteRequest;
use App\Http\Requests\VoteRequest;
use App\Models\Vote;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $sites = Vote::paginate();
        return view('admin.vote.index', [
            'sites' => $sites
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.vote.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VoteRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(VoteRequest $request)
    {
        Vote::create($request->all());
        return redirect(route('vote.index'))->with('success', __('vote.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param Vote $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vote $vote
     * @return Application|Factory|View
     */
    public function edit(Vote $vote)
    {
        return view('admin.vote.edit', [
            'vote' => $vote
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VoteRequest $request
     * @param Vote $vote
     * @return Application|Redirector|RedirectResponse
     */
    public function update(VoteRequest $request, Vote $vote)
    {
        $vote->update($request->all());
        return redirect(route('vote.index'))->with('success', __('vote.edit.modify_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vote $vote
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Vote $vote)
    {
        $vote->delete();
        return redirect(route('vote.index'))->with('success', __('vote.destroy_success'));
    }
}
