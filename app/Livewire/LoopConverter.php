<?php

namespace App\Livewire;

use App\Actions\ConvertAllLoopsAction;
use App\Actions\ConvertLoopAction;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class LoopConverter extends Component
{
    public int $total = 0;
    public int $converted = 0;
    public bool $converting = false;
    public bool $success = false;

    public function render()
    {
        return view('livewire.loop-converter');
    }

    public function convert()
    {

        $loops = Storage::disk(config('conversion.source-disk'))->directories(config('conversion.source-path'));
        $this->total = count($loops);
        $this->stream(
                to: 'total',
                content: $this->total,
                replace: true,
            );
        $this->converting = true;
        $this->converted = 0;
        foreach ($loops as $loop) {
            $loopName = basename($loop);
            ConvertLoopAction::run($loopName);
            $this->stream(
                to: 'progress',
                content: $this->converted++,
                replace: true,
            );
        }
        $this->converting = false;
        $this->success = true;
    }
}
