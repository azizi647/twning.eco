<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use File;
use LaravelLocalization;
class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::lang()->get();
        return view('adminpanel.partners.list', ['partners'=>$partners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.partners.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'status'     	 => 'required',
            'order'          => 'required',
            'title_az'    	 => 'required',
            'title_en'    	 => 'required',
            'file'           => 'required|max:10240|mimes:jpeg,png,jpg'
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('twadm/partners/create')
                ->withErrors($validator)
                ->withInput();
        }



        $partnerid = Partner::max('partner_id');


        if ($partnerid == null || $partnerid == 0 ) {
            $partnerid = 1;
        } else {

            $partnerid++;
        }

        $file            = $request->file('file');
        $destinationPath = 'public/images/partnergallery';
//		$extension       = $file->getClientOriginalExtension();
        $fileName        = trim($file->getClientOriginalName());
//		dd($fileName);
        $file->move($destinationPath, $fileName);

        $partner_az = new Partner([
            'partner_id' => $partnerid,
            'title'      => $request->get('title_az'),
            'status'     => $request->get('status'),
            'order'      => $request->get('order'),
            'image'      => $fileName,
            'lang'       => 'az',
        ]);

        $partner_en = new Partner([
            'partner_id' => $partnerid,
            'title'      => $request->get('title_en'),
            'status'     => $request->get('status'),
            'order'      => $request->get('order'),
            'image'      => $fileName,
            'lang'       => 'en',
        ]);


        $partner_az->save();
        $partner_en->save();

        $request->session()->flash('alert-success', 'Partner was successful added!');
        return Redirect::to('/twadm/partners/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partners = Partner::where('partner_id','=',$id)->get();
        return view('adminpanel.partners.edit', ['partners'=>$partners]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'status'   => 'required',
            'order'    => 'required',
            'title_az' => 'required',
            'title_en' => 'required',
            'file'     => 'required|max:2048|mimes:jpeg,png,jpg',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return redirect('twadm/partners/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        if($request->file('file')) {
            $destinationPath = 'public/images/partnergallery/';
            File::delete($destinationPath.$request->get('filename'));
            $file = $request->file('file');
            $fileName        = trim($file->getClientOriginalName());
            $file->move($destinationPath,$fileName);
        }else {
            $fileName = $request->get('fileName');
        }
        Partner::where(['partner_id'=>$id, 'lang'=>'az'])->update([
            'title'      => $request->get('title_az'),
            'status'     => $request->get('status'),
            'order'      => $request->get('order'),
            'image'      => $fileName,
            'lang'       => 'az',
        ]);

        Partner::where(['partner_id'=>$id, 'lang'=>'en'])->update([
            'title'      => $request->get('title_en'),
            'status'     => $request->get('status'),
            'order'      => $request->get('order'),
            'image'      => $fileName,
            'lang'       => 'en',
        ]);
        $request->session()->flash('alert-success', 'Partner was successful updated!');
        return Redirect::to('/twadm/partners/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partner::where('partner_id', $id)->get();
        File::delete('public/images/partnergallery/'.$partner[0]->image);
        Partner::where('partner_id', $id)->delete();
        return Redirect::to('/twadm/partners');
    }
}
