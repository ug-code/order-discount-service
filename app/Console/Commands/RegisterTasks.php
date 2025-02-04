<?php

namespace App\Console\Commands;

use App\Services\Providers\ProviderOneService;
use App\Services\Providers\ProviderTwoService;
use Illuminate\Console\Command;

class RegisterTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:register-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    private ProviderOneService $providerOneService;
    private ProviderTwoService $providerTwoService;


    public function __construct(ProviderOneService $providerOneService, ProviderTwoService $providerTwoService)
    {
        $this->providerOneService = $providerOneService;
        $this->providerTwoService = $providerTwoService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->providerOneService->checkTodoList();
        $this->providerTwoService->checkTodoList();
        //maybe three,four

        $this->info('The command was successful!');
    }
}
