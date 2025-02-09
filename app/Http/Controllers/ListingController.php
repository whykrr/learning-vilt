<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Auth;
use Gate;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // use AuthorizesRequests;
    public function __construct() {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Listing::class);

        $filters = $request->only([
            'priceFrom',
            'priceTo',
            'beds',
            'baths',
            'areaFrom',
            'areaTo'
        ]);

        return inertia('Listing/Index', [
            'filters' => $filters,
            'listings' => Listing::mostRecent()
                ->filter($filters)
                ->withoutSold()
                ->paginate(10)
                ->appends($filters)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        Gate::authorize('view', $listing);

        $listing->load(['images']);
        $offer = !Auth::user() ?
            null :
            $listing->offers()->byMe()->first();

        return inertia('Listing/Show', [
            'listing' => $listing,
            'offerMade' => $offer,
        ]);
    }
}
