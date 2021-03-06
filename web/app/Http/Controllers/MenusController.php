<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

use App\Menu;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use File;
use LaravelLocalization;

class MenusController extends Controller {


	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function index()
	{
		$menus = Menu::lang()->get();
//		return $menus;
		return view('adminpanel.menus.list',['menus'=>$menus]);
	}

	public function create()
	{
		$menutypes = Menu::lang()->get();
		return view('adminpanel.menus.add', ['menutypes'=>$menutypes]);
	}

	public function store(Request $request)
	{

		$rules = [
            'parent'         => 'required',
            'type'           => 'required',
            'status'         => 'required',
            'order'          => 'required',
            'title_az'       => 'required',
			'title_en'       => 'required',
			'description_az' => 'required',
			'description_en' => 'required'
        ];       
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('twadm/menus/create')
                        ->withErrors($validator)
                        ->withInput();
        }



        $menuid = Menu::max('menu_id');

        if ($menuid == null || $menuid == 0 ) {
            $menuid = 1;
        } else {        	
            $menuid++;
        }
//		dd($request);
        // return Input::all();
        $menu_az = new Menu([
			'menu_id'     => $menuid,
			'title'       => $request->get('title_az'),
            'description' => $request->get('description_az'),
        	'parent'      => $request->get('parent'),
			'type'        => $request->get('type'),
        	'order'       => $request->get('order'),
        	'status'      => $request->get('status'),
			'lang'        => 'az',
        ]);

        $menu_en = new Menu(array(
			'menu_id'     => $menuid,
			'title'       => $request->get('title_en'),
            'description' => $request->get('description_en'),
			'parent'      => $request->get('parent'),
			'type'        => $request->get('type'),
			'order'       => $request->get('order'),
			'status'      => $request->get('status'),
			'lang'        => 'en',
        )); 
        
        $menu_az->save();
        $menu_en->save();

        $request->session()->flash('alert-success', 'Menu was successful added!');
        return Redirect::to('/twadm/menus/create');
	}

	public function edit($id)
	{
		$menu = Menu::where('menu_id',$id)->get();
		$menutypes = Menu::where('status', 1)->lang()->get();
        return view('adminpanel.menus.edit', ['menus' => $menu, 'menutypes' => $menutypes]);
	}

	public function update(Request $request, $id)
	{
		$rules = [
            'type'           => 'required',
            'status'         => 'required',
            'order'      	 => 'required',
            'title_az'       => 'required',
			'title_en'       => 'required',
			'description_az' => 'required',
			'description_en' => 'required',
        ];       
        

       $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
           return redirect('twadm/menus/'.$id.'/edit')
                       ->withErrors($validator)
                       ->withInput();
       }

        Menu::where(['menu_id' => $id, 'lang' => 'az'])->update([
			'title'       => $request->get('title_az'),
            'description' => $request->get('description_az'),
			'type'        => $request->get('type'),
			'order'       => $request->get('order'),
        	'status'      => $request->get('status'),
        ]); 

        Menu::where(['menu_id' => $id, 'lang' => 'en'])->update([
			'title'       => $request->get('title_en'),
            'description' => $request->get('description_en'),
			'type'        => $request->get('type'),
			'order'       => $request->get('order'),
        	'status'      => $request->get('status'),
        ]);

        $request->session()->flash('alert-success', 'Menu was successful updated!');
        return Redirect::to('/twadm/menus/'.$id.'/edit');
	}

	public function destroy($id)
	{
		Menu::where('menu_id', $id)->delete();

        return Redirect::to('/twadm/menus');
	}

}
