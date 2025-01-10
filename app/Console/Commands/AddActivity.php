<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Activity;
class AddActivity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-activity {title} {attendes} {description} {closed} {start}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add New Activity';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $title = $this->argument('title');
        $attendes = $this->argument('attendes');
        $description = $this->argument('description');
        $closed = $this->argument('closed');
        $start = $this->argument('start');

        //creazione nuova attività
        $activity = new Activity();
        $activity->title = $title;
        $activity->attendes = $attendes;
        $activity->description = $description;
        $activity->closed = $closed;
        $activity->start = $start;

         // Salvataggio nel database
         $activity->save();

         // Conferma dell'inserimento
         $this->info("Activity '$title' added!");
    }
}
