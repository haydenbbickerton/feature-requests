<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Contracts\Repositories\FeatureRepository;
use App\Http\Requests\FeatureStoreRequest;
use App\Transformers\FeatureTransformer;
use Dingo\Api\Routing\Helpers;
use Carbon\Carbon;

/**
 * Feature resource representation.
 *
 * @Resource("Features", uri="/features")
 */
class FeatureController extends Controller
{

    use Helpers;

    public function __construct(FeatureRepository $features)
    {
        $this->features = $features;
    }

    /**
     * Show all features
     *
     * Get a JSON representation of all features.
     *
     * @Get("/")
     */
    public function index()
    {
        return $this->response->collection($this->features->all(), new FeatureTransformer);
    }

    /**
     * Store a feature
     *
     * Create a new feature and return it
     *
     * @Post("/")
     */
    public function store(FeatureStoreRequest $request)
    {
        $data = collect($request->all());

        try {
            $featureInfo = [
                'title' => $data['title'],
                'description' => $data['description'],
                'client_id' => $data['client'],
                'user_id' => app('Dingo\Api\Auth\Auth')->user()->id,
                'url' => $data['url'],
                'target_date' => Carbon::parse($data['target_date'])->toDateTimeString(),
                'areas' => $data['areas']
            ];
            $feature = $this->features->create($featureInfo);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['error' => 'Something went wrong. Sorry about that, try again later.'], 500);
        }

        return $this->response->item($feature, new FeatureTransformer);
    }

    /**
     * Show a feature
     *
     * Returns the specified feature.
     *
     * @Get("/{id}")
     */
    public function show($id)
    {
        //
    }

    /**
     * Update a feature
     *
     * Updates the specified feature and returns it.
     *
     * @Put("/{id}")
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Destroy a feature
     *
     * Deletes the specified feature.
     *
     * @Delete("/{id}")
     */
    public function destroy($id)
    {
        //
    }
}
