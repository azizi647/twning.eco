<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Setting;

use Validator;

class SettingsController extends Controller {

	protected $request;
	
	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function index()
	{
		$settings = Setting::all();
        return view('adminpanel.settings.list')->with('settings',$settings);
	}

	public function create()
	{
		return view('adminpanel.settings.add');	
	}

	
	public function store()
	{
	
		$rules = [
			'name'  => 'required',
			'value' => 'required',
		];

		$validator = Validator::make($this->request->all(), $rules);

        if ($validator->fails()) {
            return redirect('twadm/settings/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $setting = new Setting(array(
        	'name'  => $this->request->get('name'),
        	'value' => $this->request->get('value'),
    	));
    	
    	$setting->save();

        $this->request->session()->flash('alert-success', 'Setting was successful added!');

        return redirect('twadm/settings/create');
	}

	public function update($id)
	{

		Setting::find($id)->update([
			'value' => $this->request->get('value'),
        ]);
//		return $this->request;
		$settings = Setting::all();
		return view('adminpanel.settings.list')->with('settings',$settings);
	}

	
	public function destroy($id)
	{
		Setting::destroy($id);

        $this->request->session()->flash('alert-success', 'Setting was successful deleted!');

		return redirect('twadm/settings');
	}

}
