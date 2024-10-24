<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Location;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class LocationTest extends TestCase
{
    use DatabaseTransactions;

    protected $locationsEndPoint, $apiKey;

    public function setUp(): void
    {
        parent::setUp();
        $this->locationsEndPoint = config('services.app_url') . '/api/locations';
        $this->apiKey = config('services.api_key');
    }

    public function test_apikey_missing()
    {
        $response = $this->getJson($this->locationsEndPoint);
        $response->assertStatus(400);
    }

    public function test_apikey_missing_message()
    {
        $response = $this->getJson($this->locationsEndPoint);
        $response->assertJson([
            'success' => false,
            'message' => 'check your request, maybe API_KEY is missing',
        ]);
    }

    public function test_apikey_wrong()
    {
        $response = $this->getJson($this->locationsEndPoint, [
            'API_KEY' => $this->apiKey . 'j00n1k'
        ]);
        $response->assertStatus(401);
    }

    public function test_apikey_unauthorize_message()
    {
        $response = $this->getJson($this->locationsEndPoint, [
            'API_KEY' => $this->apiKey . 'j00n1k'
        ]);
        $response->assertStatus(401);
        $response->assertJson([
            "success" => false,
            "message" => "unAuthorized: contact joonik's customer support to refresh your API_KEY"
        ]);
    }


    public function test_apikey_ok()
    {
        $response = $this->getJson($this->locationsEndPoint, [
            'API_KEY' => $this->apiKey
        ]);
        $response->assertStatus(200);
    }


    public function test_locations_structure_ok()
    {
        $response = $this->getJson($this->locationsEndPoint, [
            'API_KEY' => $this->apiKey
        ]);
        $response->assertStatus(200);

        $response->assertJsonStructure([
            'success',
            'message',
            'count',
            'data' => [
                '*' => [
                    'code',
                    'name',
                    'image',
                    'created_at',
                ]
            ]
        ]);
    }
    public function test_locations_content_expected()
    {
        $response = $this->getJson($this->locationsEndPoint, [
            'API_KEY' => $this->apiKey
        ]);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => "listing locations",
            "count" => Location::count(),
            "data" => Location::all()->toArray()
        ]);
    }


}