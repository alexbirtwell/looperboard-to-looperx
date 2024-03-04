<?php

namespace App\Actions;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Action;
use Lorisleiva\Actions\Concerns\AsCommand;

class ConvertAllLoopsAction extends Action
{
    use AsCommand;

    /**
     * @var array
     */

    public $commandSignature = 'convert:loops';
    public $commandDescription = 'Convert all loops in the source directory from looperboard to looper-x';
    private Command $command;

    public function handle(): void
    {
        $loops = Storage::disk(config('conversion.source-disk'))->directories(config('conversion.source-path'));
        $bar = $this->command->getOutput()->createProgressBar(count($loops));

        foreach ($loops as $loop) {
            $loopName = basename($loop);
            ConvertLoopAction::run($loopName);
            $bar->advance();
        }
    }

    public function asCommand(Command $command): void
    {
        $this->command = $command;
        $command->info('Converting all loops');
        $this->handle();
        $command->info("\nDone!");
    }

}
