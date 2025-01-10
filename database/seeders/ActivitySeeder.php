<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;
use Carbon\Carbon; // Assicurati di usare Carbon per gestire le date

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $activities = [
            ['title' => 'Workshop di Laravel', 'attendes' => 30, 'description' => 'Workshop base su Laravel', 'closed' => false, 'start' => Carbon::now()->addDays(1)],
            ['title' => 'Corso di Node.js', 'attendes' => 25, 'description' => 'Introduzione a Node.js per principianti', 'closed' => false, 'start' => Carbon::now()->addDays(2)],
            ['title' => 'Lezione di React', 'attendes' => 20, 'description' => 'Lezione base su React e hooks', 'closed' => true, 'start' => Carbon::now()->addDays(3)],
            ['title' => 'Conferenza PHP', 'attendes' => 50, 'description' => 'Conferenza annuale sul mondo PHP', 'closed' => false, 'start' => Carbon::now()->addDays(4)],
            ['title' => 'Bootcamp di Python', 'attendes' => 40, 'description' => 'Programmazione Python per sviluppatori esperti', 'closed' => true, 'start' => Carbon::now()->addDays(5)],
            ['title' => 'Seminario su AI', 'attendes' => 15, 'description' => 'Intelligenza artificiale e machine learning', 'closed' => false, 'start' => Carbon::now()->addDays(6)],
            ['title' => 'Incontro di Networking', 'attendes' => 100, 'description' => 'Eventi di networking per sviluppatori', 'closed' => false, 'start' => Carbon::now()->addDays(7)],
            ['title' => 'Hackathon', 'attendes' => 200, 'description' => 'Maratona di coding per sviluppatori', 'closed' => true, 'start' => Carbon::now()->addDays(8)],
            ['title' => 'Meetup Javascript', 'attendes' => 30, 'description' => 'Discutere novità e best practices di Javascript', 'closed' => true, 'start' => Carbon::now()->addDays(9)],
            ['title' => 'Conferenza sul Web Design', 'attendes' => 50, 'description' => 'Conferenza dedicata al design per il web', 'closed' => false, 'start' => Carbon::now()->addDays(10)],
            ['title' => 'Evento WordPress', 'attendes' => 60, 'description' => 'Conferenza per sviluppatori e designer WordPress', 'closed' => false, 'start' => Carbon::now()->addDays(11)],
            ['title' => 'Corso di UX/UI', 'attendes' => 35, 'description' => 'Formazione completa su User Experience e User Interface', 'closed' => true, 'start' => Carbon::now()->addDays(12)],
            ['title' => 'Workshop di Docker', 'attendes' => 25, 'description' => 'Impara a usare Docker in ambiente di produzione', 'closed' => false, 'start' => Carbon::now()->addDays(13)],
            ['title' => 'Seminario su Kubernetes', 'attendes' => 30, 'description' => 'Gestione dei container con Kubernetes', 'closed' => true, 'start' => Carbon::now()->addDays(14)],
            ['title' => 'Workshop di Git', 'attendes' => 20, 'description' => 'Imparare ad usare Git per il versioning del codice', 'closed' => false, 'start' => Carbon::now()->addDays(15)],
            ['title' => 'Conferenza AI e Big Data', 'attendes' => 100, 'description' => 'Discutere delle ultime innovazioni nell\'AI e Big Data', 'closed' => false, 'start' => Carbon::now()->addDays(16)],
            ['title' => 'Evento di Cybersecurity', 'attendes' => 40, 'description' => 'Formazione su tematiche di sicurezza informatica', 'closed' => true, 'start' => Carbon::now()->addDays(17)],
            ['title' => 'Corso di Blockchain', 'attendes' => 25, 'description' => 'Introduzione alla tecnologia Blockchain', 'closed' => false, 'start' => Carbon::now()->addDays(18)],
            ['title' => 'Workshop di Machine Learning', 'attendes' => 15, 'description' => 'Introduzione al Machine Learning con Python', 'closed' => true, 'start' => Carbon::now()->addDays(19)],
            ['title' => 'Seminario di Marketing Digitale', 'attendes' => 50, 'description' => 'Strategie avanzate di marketing digitale', 'closed' => false, 'start' => Carbon::now()->addDays(20)],
            ['title' => 'Evento sul 5G', 'attendes' => 75, 'description' => 'Discussione sulle potenzialità del 5G', 'closed' => false, 'start' => Carbon::now()->addDays(21)],
        ];
    
        foreach ($activities as $activity) {
            Activity::create([
                'title' => $activity['title'],
                'attendes' => $activity['attendes'],
                'description' => $activity['description'],
                'closed' => $activity['closed'],
                'start' => $activity['start'],
            ]);
        }
    }
}
