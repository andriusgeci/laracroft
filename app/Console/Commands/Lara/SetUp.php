<?php
namespace App\Console\Commands\Lara;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class SetUp extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lara:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Do all the initial steps to set up your lara app.';

    private Filesystem $files;

    private bool $generateEnv = true;

    private bool $generatedEnv = true;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->generateEnv();
        $this->generateAppKey();
        $this->handleAssets();

        $this->info('Finished.');
    }

    /**
     * Make sure a .env file exists.
     */
    private function generateEnv(): void
    {
        if (! $this->files->exists(base_path('.env'))) {
            $this->comment('Generating .env...');

            $this->files->copy('.env.example', '.env');

            return;
        }

        $this->generatedEnv = false;
    }

    /**
     * Generate an app key if we made a fresh ,env.
     */
    private function generateAppKey()
    {
        if ($this->generatedEnv) {
            $this->comment('Generating app key...');
            $this->call('key:generate');
        }
    }

    /**
     * Run the js and asset compile commands.
     */
    private function handleAssets()
    {
        $this->comment('Running yarn...');

        $process = Process::fromShellCommandline('yarn');
        $process->setTimeout(150);
        $process->run(function ($type, $buffer) {
            echo $buffer;
        });
        $process->wait();

        $this->comment('Running laravel mix...');

        $process = Process::fromShellCommandline('npm run dev');
        $process->run(function ($type, $buffer) {
            echo $buffer;
        });
    }
}
