<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Page;
use App\Menu;

use Validator;
use Redirect;

class PagesController extends Controller {

	public function index()
	{
		$pages = Page::lang()->get();
		return view('adminpanel.pages.list')->with('pages',$pages);
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
				'file'           => 'required|max:10240|mimes:jpeg,png,jpg'
        ];       
        

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


		$file            = $request->file('file');
		$destinationPath = 'public/images/pagegallery';
//		$extension       = $file->getClientOriginalExtension();
		$fileName        = trim($file->getClientOriginalName());
//		dd($fileName);
		$file->move($destinationPath, $fileName);

        $page_az = new Page(array(
			'page_id'    => $pageid,
			'menupage_id'=> $request->get('menu_id'),
			'lang'       => 'az',
			'title'      => $request->get('title_az'),
            'link'    	 => str_slug($request->get('title_az')),
            'keywords'   => str_slug($request->get('title_az')),
        	'status'     => $request->get('status'),
        	'show_index' => $request->get('show_index'),
			'file'       => $fileName,
			'subtitle'   => $request->get('subtitle_az'),
			'text'       => $request->get('description_az'),
        ));

        $page_en = new Page(array(
            'page_id'    => $pageid,
            'menupage_id'=> $request->get('menu_id'),
			'lang'       => 'en',
			'title'      => $request->get('title_en'),
            'link'    	 => str_slug($request->get('title_en')),
            'keywords'   => str_slug($request->get('title_en')),
        	'status'     => $request->get('status'),
        	'show_index' => $request->get('show_index'),
			'file'       => $fileName,
			'subtitle'   => $request->get('subtitle_en'),
			'text'       => $request->get('description_en'),
        ));


        $page_az->save();
        $page_en->save();

        $request->session()->flash('alert-success', 'Page was successful added!');
        return Redirect::to('/twadm/pages/create');
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
            return redirect('twadm/pages/'.$id.'/edit')
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
        return Redirect::to('/twadm/pages/'.$id.'/edit');
	}

	public function destroy($id)
	{

		Pages::where('page_id', $id)->delete();

        return Redirect::to('/twadm/pages');
	}

}
