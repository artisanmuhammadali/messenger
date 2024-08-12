<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    */

    'models' => [
        'message' => ArtisanAli\Messenger\Models\Message::class,
        'thread' => ArtisanAli\Messenger\Models\MessageThread::class,
        'participant' => ArtisanAli\Messenger\Models\MessageThreadParticipant::class,
    ],

];
