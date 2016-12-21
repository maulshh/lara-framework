<?php

function flash($message, $title = 'Perhatian', $level = 'success', $important = false)
{
    $options = [
        'message' => $message,
        'level' => $level,
        'title' => $title,
        'duration' => $important ? 0 : 3000
    ];

    foreach ($options as $key => $value)
        session()->flash('flash_'.$key, $value);
}