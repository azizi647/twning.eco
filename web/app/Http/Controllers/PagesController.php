<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

use App\Page;
use App\Menu;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use File;
use LaravelLocalization;
class PagesController extends Controller {

	public function index()
	{
		$pages = Page::lang()->get();
		return view('adminpanel.pages.list',['pages'=>$pages]);
	}

	public function create()
	{
		$menutypes = Menu::lang()->get();
		return view('adminpanel.pages.add', ['menutypes'=>$menutypes]);
	}

	public function store(Request $request)
	{

		$rules = [
				'status'     	 => 'required',
				'menu_id'     	 => 'required',
				'title_az'    	 => 'required',
				'title_en'    	 => 'required',
				'subtitle_az' 	 => 'required',
				'subtitle_en' 	 => 'required',
				'description_az' => 'required',
				'description_en' => 'required',
        ];
		if($request->file('file')) {
			$rules['file'] = 'required|max:10240|mimes:jpeg,png,jpg';
		}
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('twadm/pages/create')
                        ->withErrors($validator)
                        ->withInput();
        }


       
        $pageid = Page::max('page_id');


        if ($pageid == null || $pageid == 0 ) {
            $pageid = 1;
        } else {
        	
            $pageid++;
        }


//		dd($request);
		if($request->file('file')){
			$file            = $request->file('file');

			$destinationPath = 'public/images/pagegallery';
	//		$extension       = $file->getClientOriginalExtension();
			$fileName        = trim($file->getClientOriginalName());
	//		dd($fileName);
			$file->move($destinationPath, $fileName);
		}else{
			$fileName = '000';
		}

        $page_az = new Page([
			'page_id'    => $pageid,
			'menu_id'    => $request->get('menu_id'),
			'title'      => $request->get('title_az'),
            'link'    	 => str_slug($request->get('title_az')),
            'keywords'   => str_replace("-",",",str_slug($request->get('title_az'))),
        	'status'     => $request->get('status'),
        	'show_index' => $request->get('show_index'),
			'file'       => $fileName,
			'subtitle'   => $request->get('subtitle_az'),
			'text'       => $request->get('description_az'),
			'lang'       => 'az',
		]);

        $page_en = new Page(array(
            'page_id'    => $pageid,
            'menu_id'    => $request->get('menu_id'),
			'title'      => $request->get('title_en'),
            'link'    	 => str_slug($request->get('title_en')),
			'keywords'   => str_replace("-",",",str_slug($request->get('title_en'))),
        	'status'     => $request->get('status'),
        	'show_index' => $request->get('show_index'),
			'file'       => $fileName,
			'subtitle'   => $request->get('subtitle_en'),
			'text'       => $request->get('description_en'),
			'lang'       => 'en',
        ));


        $page_az->save();
        $page_en->save();

        $request->session()->flash('alert-success', 'Page was successful added!');
        return Redirect::to('/twadm/pages/create');
	}

	public function edit($id)
	{
		$menutypes = Menu::lang()->get();
		$pages = Page::where('page_id',$id)->get();
		return view('adminpanel.pages.edit', ['pages'=>$pages,'menutypes'=>$menutypes]);
	}

	public function update(Request $request, $id)
	{

		$rules = [
				'status'     	 => 'required',
				'menu_id'     	 => 'required',
				'title_az'    	 => 'required',
				'title_en'    	 => 'required',
				'subtitle_az' 	 => 'required',
				'subtitle_en' 	 => 'required',
				'description_az' => 'required',
				'description_en' => 'required',
		];

		if($request->file('file')) {
			$rules['file'] = 'required|max:10240|mimes:jpeg,png,jpg';
		}

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('twadm/pages/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
		if($request->file('file')) {
			$destinationPath = 'public/images/pagegallery/';
			if($request->get('filename') != "000"){
				File::delete($destinationPath.$request->get('filename'));
			}
			$file = $request->file('file');
			$fileName        = trim($file->getClientOriginalName());
			$file->move($destinationPath,$fileName);
		}else{
			$fileName = $request->get('filename');
		}

        Page::where(['page_id' => $id, 'lang' => 'az'])->update([
				'menu_id'    => $request->get('menu_id'),
				'title'      => $request->get('title_az'),
				'link'    	 => str_slug($request->get('title_az')),
				'keywords'   => str_replace("-",",",str_slug($request->get('title_az'))),
				'status'     => $request->get('status'),
				'show_index' => $request->get('show_index'),
				'file'       => $fileName,
				'subtitle'   => $request->get('subtitle_az'),
				'text'       => $request->get('description_az'),
				'lang'       => 'az',
        ]);
        Page::where(['page_id' => $id, 'lang' => 'en'])->update([
				'menu_id'    => $request->get('menu_id'),
				'title'      => $request->get('title_en'),
				'link'    	 => str_slug($request->get('title_en')),
				'keywords'   => str_replace("-",",",str_slug($request->get('title_en'))),
				'status'     => $request->get('status'),
				'show_index' => $request->get('show_index'),
				'file'       => $fileName,
				'subtitle'   => $request->get('subtitle_en'),
				'text'       => $request->get('description_en'),
				'lang'       => 'en',
        ]);  

        $request->session()->flash('alert-success', 'Page was successful updated!');
        return Redirect::to('/twadm/pages/'.$id.'/edit');
	}

	public function destroy($id)
	{

		$page = Page::where('page_id', $id)->get();
		File::delete('public/images/pagegallery/'.$page[0]->file);
		Page::where('page_id', $id)->delete();
        return Redirect::to('/twadm/pages');
	}

}
