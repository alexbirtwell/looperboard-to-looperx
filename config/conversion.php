<?php

return [
    'source-disk' => 'documents',
    'source-path' => 'LoopData/Source/Loops',
    'destination-disk' => 'documents',
    'destination-path' => 'LoopData/Converted/Loops',
    'looper-x-loop-template' => 'looper-x-template.loop',
    'fields-to-convert' =>
        [
            "name",
            "uuid",
            "engine" => [
                "masterTrackIndex",
                "oneShot1",
                "oneShot2",
                "oneShot3",
                "oneShot4",
                "quant_endPoint",
                "quant_endPointEnabled",
                "quant_trackLength0",
                "quant_trackLength0Enabled",
                "quant_trackLength1",
                "quant_trackLength1Enabled",
                "quant_trackLength2",
                "quant_trackLength2Enabled",
                "quant_trackLength3",
                "quant_trackLength3Enabled",
                "quant_trackLengthAuto",
                "routing",
//                "serialStartStop",
                "syncAudioToTempo",
                "tempo",
                "trackMode",
                "trackNames",
            ]
        ],
    'track-mode-map' => [ // looperboard => looper-x
        0 => 0, //Fixed => Multi
        1 => 2, //Serial => Song
        2 => 1, //Sync => Sync
        3 => 3, //Serial Sync => Band
        4 => 4, //Free => Free
    ],
];
