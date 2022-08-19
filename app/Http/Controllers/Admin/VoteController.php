<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoteRequest;
use App\Models\VoteSite;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $sites = VoteSite::paginate();
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
        VoteSite::create($request->all());
        return redirect(route('vote.index'))->with('success', __('vote.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param VoteSite $site
     * @return void
     */
    public function show(VoteSite $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param VoteSite $site
     * @return Application|Factory|View
     */
    public function edit(VoteSite $site)
    {
        return view('admin.vote.edit', [
            'site' => $site
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param VoteSite $site
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, VoteSite $site)
    {
        $site->update($request->all());
        return redirect(route('vote.index'))->with('success', __('vote.edit.modify_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param VoteSite $site
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(VoteSite $site)
    {
        $site->delete();
        return redirect(route('vote.index'))->with('success', __('vote.destroy_success'));
    }
}
