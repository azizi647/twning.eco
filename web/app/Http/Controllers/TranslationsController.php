<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;

use App\Translation;
use Redirect;
use App;
use DB;

class TranslationsController extends Controller
{


    public function index($group = null)
    {

        $locales = $this->loadLocales();
        $groups = Translation::groupBy('group');

        $groups = $groups->pluck('group', 'group');
        if ($groups instanceof Collection) {
            $groups = $groups->all();
        }

        $numChanged = Translation::where('group', $group)->where('status', Translation::STATUS_CHANGED)->count();


        $allTranslations = Translation::where('group', $group)->orderBy('key', 'asc')->get();
        $numTranslations = count($allTranslations);
        $translations = [];
        foreach($allTranslations as $translation){
            $translations[$translation->key][$translation->locale] = $translation;
        }

         return view('adminpanel.translations.list')
            ->with('translations', $translations)
            ->with('locales', $locales)
            ->with('groups', $groups)
            ->with('group', $group)
            ->with('numTranslations', $numTranslations)
            ->with('numChanged', $numChanged)
            ->with('editUrl', '/az/cms/translations/postEdit?group='.$group)
            ->with('deleteEnabled', true);

    }

    public function getView(Request $request)
    {
        $group = $request->input('group');
        return $this->index($group);
    }


    protected function loadLocales()
    {
        $locales = Translation::groupBy('locale')->pluck('locale');
        if ($locales instanceof Collection) {
            $locales = $locales->all();
        }
        return $locales;
    }


    public function importTranslations()
    {

        $replace = true;
        
        $files = new Filesystem;


        $counter = 0;
        foreach($files->directories(App::langPath()) as $langPath){
            $locale = basename($langPath);
            foreach($files->files($langPath) as $file){


                $info = pathinfo($file);
                $group = $info['filename'];


                $translations = \Lang::getLoader()->load($locale, $group);
                
                
                if ($translations && is_array($translations)) {
                    foreach(array_dot($translations) as $key => $value){
                        $value = (string) $value;
                         $translation = Translation::firstOrNew(array(
                            'locale' => $locale,
                            'group' => $group,
                            'key' => $key,
                        ));
    
                        // Check if the database is different then the files
                        $newStatus = $translation->value === $value ? Translation::STATUS_SAVED : Translation::STATUS_CHANGED;
                        if($newStatus !== (int) $translation->status){
                            $translation->status = $newStatus;
                        }
    
                        // Only replace when empty, or explicitly told so
                        // if($replace || !$translation->value){
                        if($replace || !$translation->value){
                            $translation->value = $value;
                        }
    
                        $translation->save();
    
                        $counter++;
                    }
                }
            }
        }

        return Redirect::to('/cms/translations');
    }



    public function exportTranslations(Request $request)
    {
            $group = $request->input('group');

            if($group == '*') {

                $groups = Translation::whereNotNull('value')->select(DB::raw('DISTINCT `group`'))->get('group');

                foreach($groups as $group){
                    $this->export($group->group);
                }
                    
            } else {
                $this->export($group);
            }            

            return Redirect::to('/cms/translations');
    }
    
    public function export($group = null)
    {

        $files = new Filesystem;
        $langPath = App::langPath();
        
        $tree = $this->makeTree(Translation::where('group', $group)->whereNotNull('value')->get());

            foreach($tree as $locale => $groups){
                if(isset($groups[$group])){
                    $translations = $groups[$group];
                    $path = $langPath.'/'.$locale.'/'.$group.'.php';
                    $output = "<?php\n\nreturn ".var_export($translations, true).";\n";
                    $files->put($path, $output);
                }
            }
        Translation::where('group', $group)->whereNotNull('value')->update(array('status' => Translation::STATUS_SAVED));


    }


    protected function makeTree($translations)
    {
        $array = array();
        foreach($translations as $translation){
            array_set($array[$translation->locale][$translation->group], $translation->key, $translation->value);
        }
        return $array;
    }


  

  
    public function postAdd(Request $request)
    {
        // dd($request->all());
        
        $files = new Filesystem;
        $group = $request->get('group');
        $keys = explode("\n", $request->get('keys'));

        foreach($keys as $key){
            $key = trim($key);
            
            if($group && $key){
                foreach($files->directories(App::langPath()) as $langPath){

                    $locale = basename($langPath);
                    $translation = new Translation(array(
                                    'status' => 1,
                                    'locale' => $locale,
                                    'group'  => $group,
                                    'key'    => $key,
                        ));
                    // echo  $locale. ' => ' .$group. '=>'.$key .'<br>';
                    $translation->save();
                }
            }
        }
        // exit();
    
        return redirect()->back();
    }

    public function postEdit(Request $request)
    {
            $name = $request->get('name');
            $value = $request->get('value');
            $group = $request->get('group');

            list($locale, $key) = explode('|', $name, 2);
            $translation = Translation::firstOrNew([
                'locale' => $locale,
                'group' => $group,
                'key' => $key,
            ]);
            $translation->value = (string) $value ?: null;
            $translation->status = Translation::STATUS_CHANGED;
            $translation->save();
            return array('status' => 'ok');
    }

    public function postDelete(Request $request)
    {
                $group = $request->input('group');
                $key   = $request->input('key');
        
        $rules = [            
            'key'    => 'required|exists:translations,key',
            'group'  => 'required|exists:translations,group',
        ];       
        

        $validator = \Validator::make($request->all(), $rules);

        if (!$validator->fails()) {
            Translation::where('group', $group)->where('key', $key)->delete();
            return ['status' => '1'];
        }

        return ['status' => '0'];
    }

    public function postImport(Request $request)
    {
        $replace = $request->get('replace', false);
        $counter = $this->manager->importTranslations($replace);

        return ['status' => 'ok', 'counter' => $counter];
    }
    
    public function postFind()
    {
        $numFound = $this->manager->findTranslations();

        return ['status' => 'ok', 'counter' => (int) $numFound];
    }

    public function postPublish($group)
    {
        $this->manager->exportTranslations($group);

        return ['status' => 'ok'];
    }








}
