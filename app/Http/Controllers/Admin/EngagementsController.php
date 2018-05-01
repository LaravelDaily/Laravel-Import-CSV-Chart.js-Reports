<?php

namespace App\Http\Controllers\Admin;

use App\Engagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEngagementsRequest;
use App\Http\Requests\Admin\UpdateEngagementsRequest;

class EngagementsController extends Controller
{
    /**
     * Display a listing of Engagement.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('engagement_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('engagement_delete')) {
                return abort(401);
            }
            $engagements = Engagement::onlyTrashed()->get();
        } else {
            $engagements = Engagement::all();
        }

        return view('admin.engagements.index', compact('engagements'));
    }

    /**
     * Show the form for creating new Engagement.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('engagement_create')) {
            return abort(401);
        }
        return view('admin.engagements.create');
    }

    /**
     * Store a newly created Engagement in storage.
     *
     * @param  \App\Http\Requests\StoreEngagementsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEngagementsRequest $request)
    {
        if (! Gate::allows('engagement_create')) {
            return abort(401);
        }
        $engagement = Engagement::create($request->all());



        return redirect()->route('admin.engagements.index');
    }


    /**
     * Show the form for editing Engagement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('engagement_edit')) {
            return abort(401);
        }
        $engagement = Engagement::findOrFail($id);

        return view('admin.engagements.edit', compact('engagement'));
    }

    /**
     * Update Engagement in storage.
     *
     * @param  \App\Http\Requests\UpdateEngagementsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEngagementsRequest $request, $id)
    {
        if (! Gate::allows('engagement_edit')) {
            return abort(401);
        }
        $engagement = Engagement::findOrFail($id);
        $engagement->update($request->all());



        return redirect()->route('admin.engagements.index');
    }


    /**
     * Display Engagement.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('engagement_view')) {
            return abort(401);
        }
        $engagement = Engagement::findOrFail($id);

        return view('admin.engagements.show', compact('engagement'));
    }


    /**
     * Remove Engagement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('engagement_delete')) {
            return abort(401);
        }
        $engagement = Engagement::findOrFail($id);
        $engagement->delete();

        return redirect()->route('admin.engagements.index');
    }

    /**
     * Delete all selected Engagement at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('engagement_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Engagement::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Engagement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('engagement_delete')) {
            return abort(401);
        }
        $engagement = Engagement::onlyTrashed()->findOrFail($id);
        $engagement->restore();

        return redirect()->route('admin.engagements.index');
    }

    /**
     * Permanently delete Engagement from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('engagement_delete')) {
            return abort(401);
        }
        $engagement = Engagement::onlyTrashed()->findOrFail($id);
        $engagement->forceDelete();

        return redirect()->route('admin.engagements.index');
    }
}
