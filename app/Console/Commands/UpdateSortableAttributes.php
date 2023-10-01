<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Meilisearch\Client;

class UpdateSortableAttributes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meilisearch:update-sortable
    {index : The name of the index}
    {attributes* : The list of sortable attributes}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update sortable attributes in meilisearch';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $indexName = $this->argument('index');
        $attributes = $this->argument('attributes');
        $client = new Client(env('MEILISEARCH_HOST'));
        $index = $client->getIndex($indexName);
        $index->updateSortableAttributes($attributes);

        $this->info('Meilisearch sortable attributes [' . implode(',', $attributes) . '] updated for index [' . $indexName . '].');
    }
}
