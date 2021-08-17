<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use App\Http\Requests\ClientsStoreRequest;
use App\Http\Requests\ClientsUpdateRequest;

class ClientsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Clients::class);

        $search = $request->get('search', '');

        $allClients = Clients::search($search)
            ->latest()
            ->paginate(5);

        return view('app.all_clients.index', compact('allClients', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Clients::class);

        return view('app.all_clients.create');
    }

    /**
     * @param \App\Http\Requests\ClientsStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsStoreRequest $request)
    {
        $this->authorize('create', Clients::class);

        $validated = $request->validated();

        $clients = Clients::create($validated);

        return redirect()
            ->route('all-clients.edit', $clients)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Clients $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Clients $clients)
    {
        $this->authorize('view', $clients);

        return view('app.all_clients.show', compact('clients'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Clients $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Clients $clients)
    {
        $this->authorize('update', $clients);

        return view('app.all_clients.edit', compact('clients'));
    }

    /**
     * @param \App\Http\Requests\ClientsUpdateRequest $request
     * @param \App\Models\Clients $clients
     * @return \Illuminate\Http\Response
     */
    public function update(ClientsUpdateRequest $request, Clients $clients)
    {
        $this->authorize('update', $clients);

        $validated = $request->validated();

        $clients->update($validated);

        return redirect()
            ->route('all-clients.edit', $clients)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Clients $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Clients $clients)
    {
        $this->authorize('delete', $clients);

        $clients->delete();

        return redirect()
            ->route('all-clients.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
