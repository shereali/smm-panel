<?php

namespace App\Console\Commands;

use App\User;
use App\Service;
use App\Category;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class dummyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:servicedata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dummy data creation command!';

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
     * @return mixed
     */
    public function handle()
    {

        User::create([
            'name' => 'Mr. SMM',
            'email' => 'admin@smm.com',
            'user_type' => 1,
            'password' => Hash::make('admin123'),
        ]);

        $category = [
        [
                'category_name' =>'Facebook'
        ],

        [
                'category_name' =>'Twitter'
        ],

        [
                'category_name' =>'Youtube'
        ],

        [
                'category_name' =>'Instagram'
        ]
   ];

   foreach ($category as $c) {
       $cat = new Category;
       $cat->category_name = $c['category_name'];
       $cat->save();
   };

       $service = [
                [
                'service_title' =>'Facebook Like',
                'category_id'   =>1,
                'price'         =>'10',
                'like'          =>'1000',
                'description'   =>'1000 likes $10'
                ], [
                'service_title' =>'Facebook Like',
                'category_id'   =>1,
                'price'         =>'15',
                'like'          =>'1500',
                'description'   =>'1000 likes $15'
                ], [
                'service_title' =>'Facebook Like',
                'category_id'   =>1,
                'price'         =>'20',
                'like'          =>'2000',
                'description'   =>'2000 likes $20'
                ], [
                'service_title' =>'Twitter tweet',
                'category_id'   =>2,
                'price'         =>'10',
                'like'          =>'1000',
                'description'   =>'1000 Twitter tweet $10'
                ], [
                'service_title' =>'Twitter tweet',
                'category_id'   =>2,
                'price'         =>'15',
                'like'          =>'1500',
                'description'   =>'1500 Twitter tweets $15'
                ], [
                'service_title' =>'Twitter tweet',
                'category_id'   =>2,
                'price'         =>'20',
                'like'          =>'2000',
                'description'   =>'2000 Twitter tweets $20'
                ], [
                'service_title' =>'Youtube views',
                'category_id'   =>3,
                'price'         =>'10',
                'like'          =>'1000',
                'description'   =>'1000 Youtube views $10'
                ], [
                'service_title' =>'Youtube views',
                'category_id'   =>3,
                'price'         =>'15',
                'like'          =>'1500',
                'description'   =>'1500 Youtube views $15'
                ], [
                'service_title' =>'Youtube views',
                'category_id'   =>3,
                'price'         =>'20',
                'like'          =>'2000',
                'description'   =>'2000 Youtube views $20'
                ], [
                'service_title' =>'Instagram Likes',
                'category_id'   =>4,
                'price'         =>'10',
                'like'          =>'1000',
                'description'   =>'1000 Instagram likes $10'
                ], [
                'service_title' =>'Instagram Like',
                'category_id'   =>4,
                'price'         =>'15',
                'like'          =>'1500',
                'description'   =>'1500 Instagram likes $15'
                ], [
                'service_title' =>'Instagram Like',
                'category_id'   =>4,
                'price'         =>'20',
                'like'          =>'2000',
                'description'   =>'2000 likes $20'
                ],
       ];



       foreach($service as $s){
        $data                = new Service;
        $data->service_title = $s['service_title'];
        $data->category_id   = $s['category_id'];
        $data->price         = $s['price'];
        $data->like          = $s['like'];
        $data->description   = $s['description'];
        $data->save();
        }
    $this->info('Service generate successful!');
    }

}
