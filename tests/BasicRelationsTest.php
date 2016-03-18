<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class BasicRelationsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic relations test.
     *
     * @return void
     */
    public function testBasicRelations()
    {
        $client  = factory(App\Models\Client::class)->create();
        $feature = factory(App\Models\Feature::class)->make();

        // Insert feature as related model
        $client->features()->save($feature);
    }
}
