<?php

namespace App\Actions;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Action;
use Lorisleiva\Actions\Concerns\AsCommand;

class ConvertLoopAction extends Action
{
    use AsCommand;

    /**
     * @var array
     */

    public $commandSignature = 'convert:loop {loopName}';
    public $commandDescription = 'Convert loop from looperboard to looper-x';

    public function handle(string $loopName): void
    {
        $this->createDestinationFolder($loopName);

        $this->copySourceFilesToDestination($loopName);

        $this->convertLoopJson($loopName);
    }

    private function createDestinationFolder(string $loopName)
    {
        Storage::disk(config('conversion.destination-disk'))
            ->makeDirectory(config('conversion.destination-path').'/'.$loopName);
    }

    private function copySourceFilesToDestination(string $loopName)
    {
        //get wavs
        $files = Storage::disk(config('conversion.source-disk'))
            ->files(config('conversion.source-path').'/'.$loopName);

        foreach ($files as $file) {
            $name = Str::beforeLast(basename($file), '.');
            if (Str::endsWith($file, '.WAV')) {
                Storage::disk(config('conversion.destination-disk'))
                    ->copy($file, config('conversion.destination-path').'/'.$loopName.'/'.$name.'.wav');
            }
        }
    }

    private function convertLoopJson(string $loopName): void
    {
        $sourceJson = $this->getLoopJson($loopName);
        $loop = $this->getTemplateJson();

        $loop['name'] = $loopName;
        $loop['uuid'] = Str::uuid()->toString();

        foreach (config('conversion.fields-to-convert') as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $subKey => $subValue) {
                    $loop[$key][$subValue] = $sourceJson[$key][$subValue];

                    if ($subValue === 'trackMode') {
                        $loop[$key][$subValue] = config('conversion.track-mode-map')[$sourceJson[$key][$subValue]];
                    }
                }
            } else {
                $loop[$value] = $sourceJson[$value];
            }
        }

        Storage::disk(config('conversion.destination-disk'))
            ->put(config('conversion.destination-path').'/'.$loopName.'/' . $loopName . '.loop', json_encode($loop));
    }

    private function getLoopJson(string $loopName): array
    {
        $sourceJson = Storage::disk(config('conversion.source-disk'))
            ->get(config('conversion.source-path').'/'.$loopName.'/'.$loopName.'.LOOP');

        return json_decode($sourceJson, true);
    }

    private function getTemplateJson(): array
    {
        $sourceJson = Storage::disk('local')
            ->get(config('conversion.looper-x-loop-template'));

        return json_decode($sourceJson, true);
    }

    public function asCommand(Command $command): void
    {
        $command->info('Converting loop');
        $this->handle($command->argument('loopName'));
        $command->info('Loop '. $command->argument('loopName') .'converted!');
    }

}
