<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class JobService
{
    private $baseUrl;
    private $httpClient;

    public function __construct()
    {
        $this->baseUrl = config('dansmultipro.url');
        $this->httpClient = Http::acceptJson()->contentType('application/json');
    }

    public function getJobLists(array $filters = [])
    {
        try {
            $url = $this->baseUrl . '.json' . '?' . http_build_query($filters);
            Log::debug("URL: " . $url);
            $response = $this->httpClient->get($url);
            return $response->json();
        } catch (\Exception $e) {
            Log::error('Error while fetching data. ' . $e->getMessage());
            return null;
        }
    }

    public function getJobDetail(string $jobId)
    {
        try {
            $response = $this->httpClient->get($this->baseUrl . '/' . $jobId);
            return $response->json();
        } catch (\Exception $e) {
            Log::error('Error while fetching data. ' . $e->getMessage());
            return null;
        }
    }
}
