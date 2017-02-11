<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('settings')->insert([
            'post_id' => 1,
            'logo' => 'test.jpg',
            'site_name' => 'Twining',
            'meta_key' => 'twining',
            'meta_descr' => 'twining,',
            'address' => 'GTS',
            'site_email' => 'testmail@mail.com',
            'site_phone' => '070 317 13 17',
            'site_mobile' => '070 317 13 17',
            'contact_map' => 'test',
            'facebook_url' => 'test',
            'instagram_url' => 'test',
            'twetter_url' => 'test',
            'copyright' => '© 2016 Twining. All rights reserved.Upgrading the National Environmental Monitoring System (NEMS) of Azerbaijan on the Base of EU Practices This project is funded by the European Union ',
            'lang' => 'az',
            'status' => 1,
        ]);
          DB::table('settings')->insert([
             'post_id' => 1,
            'logo' => 'test.jpg',
            'site_name' => 'GTS',
            'meta_key' => 'GTS',
            'meta_descr' => 'GTS',
            'address' => 'GTS',
            'site_email' => 'testmail@mail.com',
            'site_phone' => '070 317 13 17',
            'site_mobile' => '070 317 13 17',
            'contact_map' => 'test',
            'facebook_url' => 'test',
            'instagram_url' => 'test',
            'twetter_url' => 'test',
            'copyright' => '© 2016 Twining. All rights reserved.Upgrading the National Environmental Monitoring System (NEMS) of Azerbaijan on the Base of EU Practices This project is funded by the European Union',
            'lang' => 'en',
            'status' => 1,
        ]);
         
    }
}
