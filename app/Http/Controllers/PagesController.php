<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Pages;

use Validator;
use Redirect;

class CmsPagesController extends Controller {

	public function index()
	{
		$pages = Pages::lang()->get();
		return view('adminpanel.pages.list')->with('pages',$pages);
	}

	public function create()
	{

		return view('adminpanel.pages.add');
	}

	public function store(Request $request)
	{

		$rules = [            
            'link'       => 'required',
            'status'     => 'required',
            'ordering'   => 'required',
            // 'title_az'    => 'required',
			// 'title_ru'    => 'required',
			// 'title_en'    => 'required',
			// 'subtitle_az' => 'required',
			// 'subtitle_ru' => 'required',
			// 'subtitle_en' => 'required',
			// 'editor1'     => 'required',
			// 'editor2'     => 'required',
			// 'editor3'     => 'required',
        ];       
        

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('cms/pages/create')
                        ->withErrors($validator)
                        ->withInput();
        }


       
        $pageid = Pages::max('page_id');


        if ($pageid == null || $pageid == 0 ) {
            $pageid = 1;
        } else {
        	
            $pageid++;
        }

        $page_az = new Pages(array(
			'page_id'    => $pageid,
			'lang'       => 'az',
			'title'      => $request->get('title_az'),
            'link'    	 => $request->get('link'),
        	'status'     => $request->get('status'),
        	'ordering'   => $request->get('ordering'),
			'subtitle'   => $request->get('subtitle_az'),
			'text'       => $request->get('editor1'),
        )); 

        $page_ru = new Pages(array(
			'page_id'    => $pageid,
			'lang'       => 'ru',
			'title'      => $request->get('title_ru'),
            'link'    	 => $request->get('link'),
        	'status'     => $request->get('status'),
        	'ordering'   => $request->get('ordering'),
			'subtitle'   => $request->get('subtitle_ru'),
			'text'       => $request->get('editor2'),
        ));

        $page_en = new Pages(array(
            'page_id'    => $pageid,
			'lang'       => 'en',
			'title'      => $request->get('title_en'),
            'link'    	 => $request->get('link'),
        	'status'     => $request->get('status'),
        	'ordering'   => $request->get('ordering'),
			'subtitle'   => $request->get('subtitle_en'),
			'text'       => $request->get('editor3'),
        ));

        
        $page_az->save();
        $page_ru->save();
        $page_en->save();

		$file            = $request->file('file');
		$destinationPath = 'images/menugallery';
//		$extension       = $file->getClientOriginalExtension();
		$fileName        = trim($file->getClientOriginalName());
//		dd($fileName);
		$file->move($destinationPath, $fileName);

        $request->session()->flash('alert-success', 'Cv was successful added!');
        return Redirect::to('/cms/pages/create');
	}

	public function edit($id)
	{
		$pages = Pages::where('page_id',$id)->get();
		return view('adminpanel.pages.edit')->with('pages',$pages);
	}

	public function update(Request $request, $id)
	{

		$rules = [            
            'link'       => 'required',
            'status'     => 'required',
            'ordering'   => 'required',
        ];       
        

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('cms/pages/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $page_az =  Pages::where(['page_id' => $id, 'lang' => 'az'])->update([
			'title'      => $request->get('title_az'),
            'link'    	 => $request->get('link'),
        	'status'     => $request->get('status'),
        	'ordering'   => $request->get('ordering'),
			'subtitle'   => $request->get('subtitle_az'),
			'text'       => $request->get('editor_az'),
        ]); 
		
		$page_ru =  Pages::where(['page_id' => $id, 'lang' => 'ru'])->update([
			'title'      => $request->get('title_ru'),
            'link'    	 => $request->get('link'),
        	'status'     => $request->get('status'),
        	'ordering'   => $request->get('ordering'),
			'subtitle'   => $request->get('subtitle_ru'),
			'text'       => $request->get('editor_ru'),
        ]);

        $page_en =  Pages::where(['page_id' => $id, 'lang' => 'en'])->update([
			'title'      => $request->get('title_en'),
            'link'    	 => $request->get('link'),
        	'status'     => $request->get('status'),
        	'ordering'   => $request->get('ordering'),
			'subtitle'   => $request->get('subtitle_en'),
			'text'       => $request->get('editor_en'),
        ]);  

        $request->session()->flash('alert-success', 'Cv was successful updated!');
        return Redirect::to('/cms/pages/'.$id.'/edit');
	}

	public function destroy($id)
	{

		Pages::where('page_id', $id)->delete();

        return Redirect::to('/cms/pages');
	}

}
