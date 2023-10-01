<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PivotMake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:pivot {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new pivot class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        if (!File::exists(app_path('Http/Pivots'))) {
            File::makeDirectory(app_path('Http/Pivots'));
        }

        $path = app_path('Http/Pivots/' . $name . '.php');

        if (File::exists($path)) {
            $this->error('The file already exists!');
        } else {
            $content = "<?php\n\nnamespace App\Http\Pivots;\n\nuse Illuminate\Database\Eloquent\Relations\Pivot;\n\nclass {$name} extends Pivot\n{\n    //\n}\n";

            File::put($path, $content);

            $this->info('The pivot class has been created successfully.');
        }
    }
}
