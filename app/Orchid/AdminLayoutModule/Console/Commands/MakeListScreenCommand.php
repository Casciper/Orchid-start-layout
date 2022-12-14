<?php

namespace App\Orchid\AdminLayoutModule\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use function app_path;

class MakeListScreenCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:make_list {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create pattern of SomethingEditScreen for Orchid';

    protected function getStub()
    {
        return app_path() . '/Orchid/AdminLayoutModule/Console/Stubs/list-screen.stub';
    }

    public function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Orchid\Screens';
    }

    public function replaceClass($stub, $name)
    {
        $name = str_contains($this->argument('name'), '/')
            ? substr($this->argument('name'), strrpos($this->argument('name'), '/') + 1)
            : $this->argument('name');

        $stub = parent::replaceClass($stub, $name);

        return str_replace("StubListScreen", $name, $stub);
    }
}
