<?php

namespace App\Http\Controllers\Api;

use App\Models\Clients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientsResource;
use App\Http\Resources\ClientsCollection;
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
            ->paginate();

        return new ClientsCollection($allClients);
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

        return new ClientsResource($clients);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Clients $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Clients $clients)
    {
        $this->authorize('view', $clients);

        return new ClientsResource($clients);
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

        return new ClientsResource($clients);
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

        return response()->noContent();
    }
}
