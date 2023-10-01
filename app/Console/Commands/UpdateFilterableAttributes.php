<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Meilisearch\Client;

class UpdateFilterableAttributes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meilisearch:update-filterable
        {index : The name of the index}
        {attributes* : The list of filterable attributes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update filterable attributes in meilisearch';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $indexName = $this->argument('index');
        $filters = $this->argument('attributes');
        $client = new Client(env('MEILISEARCH_HOST'));
        $index = $client->getIndex($indexName);
        $index->updateFilterableAttributes($filters);

        $this->info('Meilisearch filterable attributes [' . implode(',', $filters) . '] updated for index [' . $indexName . '].');
    }
}
