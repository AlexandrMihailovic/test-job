<?php

namespace App\Console\Commands;

use App\Models\Job;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class JobCrawl extends Command
{
    const BASE_URL = 'https://www.bestjobs.eu/ro/locuri-de-munca';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:jobs {--location=bucuresti : Location name } {--keyword=symfony : Keyword }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command crawl jobs from https://www.bestjobs.eu/ro/locuri-de-munca';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    /**
     * @var array
     */
    protected array $params = [];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->params = [
            'location' => $this->option('location'),
            'keyword' => $this->option('keyword')
        ];
        $url = self::BASE_URL . '?' . http_build_query($this->params);
        $html = $this->getHtml($url);
        $this->getJobs($html);
        return Command::SUCCESS;
    }

    /**
     * @param string $html
     *
     * @return void
     */
    private function getJobs(string $html): void
    {
        $crawler = new Crawler($html);
        foreach ($crawler->filter('.card-list a.js-card-link')->extract(['href']) as $link) {
            $html = $this->getHtml($link);
            $this->preparyJob($html);
        }
    }

    /**
     * @param mixed $url
     *
     * @return string|null
     */
    protected function getHtml($url): ?string
    {
        $request = app(Client::class)->request('GET', $url);
        if ($request->getStatusCode() != 200) {
            return Command::FAILURE;
        }
        return $request->getBody()->__toString();
    }

    /**
     * @param string $html
     *
     * @return void
     */
    protected function preparyJob(string $html): void
    {
        $crawler = new Crawler($html);
        $data = [];
        $data['company'] = trim($crawler->filter('h3 a.text-muted')->first()->extract(['_text'])[0] ?? Null);
        $data['title'] = trim($crawler->filter('h2 strong')->first()->extract(['_text'])[0] ?? Null);
        $data['location'] = trim($crawler->filter('.card-body .row.mb-3 a')->first()->extract(['_text'])[0] ?? Null);
        $data['description'] = trim($crawler->filter('.card-body .job-description')->first()->extract(['_text'])[0] ?? Null);
        if ($data['company']) {
            Job::updateOrCreate(
                [
                    'company' => $data['company'],
                    'title' => $data['title']
                ],
                $data
            );
        }
    }
}
