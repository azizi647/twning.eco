<?php

use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('about')->insert([
            'title' => 'AURO ARCHITECT MMC Design  Architecture',
            'post_id' => 1,
            'about_hompage' => '“AURO ARCHITECT” MMC şirkəti 2012-ci ildə yaradılmış və istedadlı memarların, konstruktorların, zövqlü dizaynerlərin, təcrübəli inşaat mühəndislərinin səyi nəticəsində uğurla fəaliyyət göstərir. Hal-hazırda biz “AURO ARCHITECT” MMC şirkəti olaraq Bakı şəhərində fəaliyyət göstəririk və məqsədimiz layihələndirmə, dizayn, təmir və tikinti işlərinizdə sizlərə köməklik göstərmək və bu sahədəki yeniliklərlə sizləri yaxından tanış etməkdir. Daim inkişafda olan şirkətimiz, zövqləri oxşayan memarlıq və dizayn işləri ilə əhaliyə milli və müasir dünya memarlığı təklif edir.',
            'about' => 'INTRODUCTION Project Purpose: To strengthen environmental monitoring system ensuring provision of the high quality information that does support strategic environmental policy planning and compliance control.
Implementation Period: November 2016 – January 2019 TWINNING: CO-OPERATION BETWEEN THE EU AND ITS NEIGHBORHOOD Twinning in a nutshell Twinning is an instrument created in order to develop and strengthen the administrative and judicial capacity of the candidate countries and the pre-candidate countries and the countries that are covered by the European Neighbourhood Policy (ENP). 
Twinning can be seen as a means to export valuable know-how. It assists and prepares the candidate countries prior to their accession and supports the stability of the economical and societal circumstances and development of the countries at a larger scale. Twinning activities are financed through the Instrument for Preaccession Assistance II (IPA II) and the European Neighbourhood Instrument (ENI',
            'home_picture' => 'test.jpg',
            'lang' => 'az',
            'status' => 1,
        ]);
          
        
          
          DB::table('about')->insert([
            'title' => 'AURO ARCHITECT MMC Design  Architecture',
            'post_id' => 1,
            'about_hompage' => '“AURO ARCHITECT” MMC şirkəti 2012-ci ildə yaradılmış və istedadlı memarların, konstruktorların, zövqlü dizaynerlərin, təcrübəli inşaat mühəndislərinin səyi nəticəsində uğurla fəaliyyət göstərir. Hal-hazırda biz “AURO ARCHITECT” MMC şirkəti olaraq Bakı şəhərində fəaliyyət göstəririk və məqsədimiz layihələndirmə, dizayn, təmir və tikinti işlərinizdə sizlərə köməklik göstərmək və bu sahədəki yeniliklərlə sizləri yaxından tanış etməkdir. Daim inkişafda olan şirkətimiz, zövqləri oxşayan memarlıq və dizayn işləri ilə əhaliyə milli və müasir dünya memarlığı təklif edir.',
            'about' => 'INTRODUCTION Project Purpose: To strengthen environmental monitoring system ensuring provision of the high quality information that does support strategic environmental policy planning and compliance control.
            Implementation Period: November 2016 – January 2019 TWINNING: CO-OPERATION BETWEEN THE EU AND ITS NEIGHBORHOOD Twinning in a nutshell Twinning is an instrument created in order to develop and strengthen the administrative and judicial capacity of the candidate countries and the pre-candidate countries and the countries that are covered by the European Neighbourhood Policy (ENP). 
            Twinning can be seen as a means to export valuable know-how. It assists and prepares the candidate countries prior to their accession and supports the stability of the economical and societal circumstances and development of the countries at a larger scale. Twinning activities are financed through the Instrument for Preaccession Assistance II (IPA II) and the European Neighbourhood Instrument (ENI',
            'home_picture' => 'test.jpg',
            'lang' => 'en',
            'status' => 1,
        ]);
    }
}
