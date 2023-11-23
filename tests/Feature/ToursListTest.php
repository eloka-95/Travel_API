<?php

namespace Tests\Feature;


use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Travel;
use App\Models\Tour;
class ToursListTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_tours_list_by_travel_slug_returns_correct_tours(): void
    {
        $travel = Travel::factory()->Create();
        $tour = Tour::factory()->create(['travel_id' => $travel->id]);

        $response = $this->get('/api/v1/travels/' . $travel->slug . '/tours');

        $response->assertStatus(200)
        ->assertJsonCount(5, 'data') // Adjust the count based on your expectations
        ->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'starting_date',
                    'ending_date',
                    'price',
                ],
            ],
            'links',
            'meta',
        ]);
    }
}
