<?php

namespace App\Console\Commands;

use DB;
use Storage;
use Illuminate\Http\File;
use Illuminate\Console\Command;

class DownloadImage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download Property Images';

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
        $images = DB::table('payment_services')->pluck('picture');

        foreach ($images as $image) {
            if ($image !== null) {
                try {
                    $name = basename($image);
                    $content = file_get_contents($image);

                    Storage::disk('public')->put('payments/'.$name, $content);
                } catch (\Exception $e) {
                    //
                }
            }
        }
    }
}
