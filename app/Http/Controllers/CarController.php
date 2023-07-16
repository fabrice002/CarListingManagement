<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars=Car::select('id', 'title', 'image_url', 'price')->OrderBy('title')->get();

        // dd('ie');
        $brands=Brand::all();
        $categories=Category::all();
        $colors=Color::all();
        return view("car.index",[
            'brands'=>$brands,
            'categories'=>$categories,
            'colors'=>$colors,
            'cars'=>$cars
        ]);
    }
    public function detail($id){
        $car=Car::findOrFail($id);
        return view('car.detail',[
            'car'=>$car
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $brands=Brand::all();
        $categories=Category::all();
        $colors=Color::all();
        return view('car.create',[
            'categories'=>$categories,
            'brands'=>$brands,
            'colors'=>$colors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function fichier(Request $request){
    //     $filename=time().'.'.$request->file->extension();
    //     $valeur=$request->file->storeAs('dossier', $filename, 'public');
    //     Document::create([
    //         'dossier_id'=>$request->id,
    //         'nature_id'=>2,
    //         'documents'=>$valeur,
    //     ]);
    //     dd($valeur);
    //     return view('test',[
    //         'docs'=>$val,
    //     ]);
    //    dd($request->all());
    // }
    /* $filename=time().'.'.$request->file->extension();
    $valeur=$request->file->storeAs('dossier', $filename, 'public');
    Car::create([
        'title'=>"Hello",
        'user_id'=>1,
        'type'=>"2SZ",
        'description'=>"petite description",
        'image_url'=>$valeur,
        'location'=>'yaounde',
        'price'=>405000,
        'color_id'=>6,
        'brand_id'=>4,
        'category_id'=>3,
        'transmission'=>"A",
        'sit_number'=>5,
        'cylinder'=>23,
    ]);
    dd($valeur); */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required', 'min:3'],
            'sit_number'=>['required', 'integer'],
            'brand_id'=>['required', 'integer'],
            'color_id'=>['required', 'integer'],
            'category_id'=>['required', 'integer'],
            'cylinder'=>['required', 'integer'],
            'transmission'=>['required', 'string'],
            'description'=>['required', 'string'],
            'location'=>['required', 'string'],
            'image_url'=>['required'],
            'price'=>['required']
        ]);
        $filename=time().'.'.$request->image_url->extension();
        $image_url=$request->image_url->storeAs('dossier', $filename, 'public');
        $data=$request->only('title', 'sit_number', 'description', 'price','transmission', 'color_id', 'brand_id', 'cylinder', 'location', 'category_id');
        $data['image_url']=$image_url;
        $data['user_id']=Auth::user()->id;
        Car::create($data);
        return redirect()->route('Car.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        if($request->brand_id !=0 && $request->category_id !=0 && $request->color_id !=0){
            $response=Car::where('color_id', $request->color_id)
                          ->where('brand_id', $request->brand_id)
                          ->where('category_id', $request->category_id)
                          ->OrderBy('title')
                          ->get();
        }elseif ($request->brand_id !=0 && $request->category_id !=0 && $request->color_id ==0) {
            $response=Car::where('brand_id', $request->brand_id)
                          ->where('category_id', $request->category_id)
                          ->OrderBy('title')
                          ->get();
        }elseif ($request->brand_id !=0 && $request->category_id ==0 && $request->color_id !=0) {
            $response=Car::where('color_id', $request->color_id)
                          ->where('brand_id', $request->brand_id)
                          ->OrderBy('title')
                          ->get();
        }elseif ($request->brand_id ==0 && $request->category_id !=0 && $request->color_id !=0) {
            $response=Car::where('color_id', $request->color_id)
                          ->where('category_id', $request->category_id)
                          ->OrderBy('title')
                          ->get();
        }elseif ($request->brand_id ==0 && $request->category_id ==0 && $request->color_id !=0) {
            $response=Car::where('color_id', $request->color_id)
                          ->OrderBy('title')
                          ->get();
        }elseif ($request->brand_id ==0 && $request->category_id !=0 && $request->color_id ==0) {
            $response=Car::where('category_id', $request->category_id)
                          ->OrderBy('title')
                          ->get();
        }elseif ($request->brand_id !=0 && $request->category_id ==0 && $request->color_id ==0) {
            $response=Car::where('brand_id', $request->brand_id)
                          ->OrderBy('title')
                          ->get();
        }else{
            $response="hello";
        }
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car=Car::findOrFail($id);
        /* if(Auth::user()->id!=$car->user_id){
            return back()->with('status', 'car-refuse');
        } */
        $brands=Brand::all();
        $categories=Category::all();
        $colors=Color::all();
        return view('car.edit',[
            'car'=>$car,
            'brands'=>$brands,
            'colors'=>$colors,
            'categories'=>$categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car=Car::findOrFail($id);
        $image_url=$car->image_url;
        // dd(isset($request->image_url));
        if(isset($request->image_url)){
            $filename=time().'.'.$request->image_url->extension();
            $image_url=$request->image_url->storeAs('dossier', $filename, 'public');
            // $image_url=$request->image_url;

            Storage::disk('public')->delete($car->image_url);
        }
        $data=$request->only('title', 'sit_number', 'description', 'price','transmission', 'color_id', 'brand_id', 'cylinder', 'location', 'category_id');
        $data['image_url']=$image_url;
        Car::where('id', $id)
            ->update($data);

        return redirect()->route('Car.detail', $id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::where('id', $id)
            ->delete();
        return redirect()->route('Car.index');
    }
}
