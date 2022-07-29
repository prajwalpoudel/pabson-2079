<?php

namespace App\Observers;

use App\Entities\School;
use App\Jobs\SendEmail;
use App\Notifications\EmailTemplateNotification;

class SchoolObserver
{
    /**
     * Handle the School "created" event.
     *
     * @param  \App\School  $school
     * @return void
     */
    public function created(School $school)
    {
        $school->load('user');
        $slug = 'school_added';
        $data = [
            'variables' => [
                'principal_name'    => $school->principal_name,
                'school_name'       => $school->name,
            ]
        ];
        SendEmail::dispatch($school->user, $slug, $data);
    }

    /**
     * Handle the School "updated" event.
     *
     * @param  \App\School  $school
     * @return void
     */
    public function updated(School $school)
    {
    }

    /**
     * Handle the School "deleted" event.
     *
     * @param  \App\School  $school
     * @return void
     */
    public function deleted(School $school)
    {
        //
    }

    /**
     * Handle the School "restored" event.
     *
     * @param  \App\School  $school
     * @return void
     */
    public function restored(School $school)
    {
        //
    }

    /**
     * Handle the School "force deleted" event.
     *
     * @param  \App\School  $school
     * @return void
     */
    public function forceDeleted(School $school)
    {
        //
    }
}
