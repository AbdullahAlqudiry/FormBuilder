<?php 

namespace Alqudiry\FormBuilder\Commands;

use Illuminate\Console\Command;

class CreateFormCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'formBuilder:create-form {form}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!\File::exists(base_path('app/Forms'))) {
            \File::makeDirectory(base_path('app/Forms'));
        }

        \File::copy(__DIR__.'/../Form.php', base_path('app/Forms/' . $this->argument('form') . '.php'));
        return true;
    }
}
