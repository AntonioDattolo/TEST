<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Activity;
class DeleteActivity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-activity {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete an Activity by ID';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('id');

        //trova l'elemento nel db

        $activity = Activity::find($id);

        if ($activity) {
            // Elimina l'attività
            $activity->delete();
            $this->info("Activity with ID $id deleted.");
        } else {
            $this->error("Activity with ID $id not found.");
        }

    }
}
