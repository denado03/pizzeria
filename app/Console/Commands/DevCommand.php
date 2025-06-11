<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function prepareData()
    {

    }

    public function handle()
    {
        OrderStatus::insert([
            ['name' => 'В обработке'],
            ['name' => 'Доставляется'],
            ['name' => 'Завершен'],
            ['name' => 'Отменен'],
        ]);


        return 0;
    }


}
