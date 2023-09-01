<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
            return  view("authentification") ;

    }
    
    public function authentification(Request  $request )
    {
       
            $request->validate([
                "email"=>'required',
                "password"=>'required',
            ]);
            $email=$request->input("email") ; 
            $table=DB::table('users')->where('email',$email)->first();
    
            if (isset($table)){
        
                    if(!($table->password=== $request->password)){
                        $password="ERREUR password invalid ";
                        return view('authentification',compact("password"));
                    }else{
                                return redirect()->route('products.index');
                            
                            
                        };
            }else{
                $email="ERREUR email invalid ";
                return view("authentification",compact("email"));  
            };  
        

    }



    public function create_user(){
        return  view("createuser") ;
    }
    public function register(Request $request)
    {
        // dd($request) ;
        // Validate and store the user data
        
        $validatedData = $request->validate([
            'Username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'adresse' => 'required',
            'tel' => 'required',
        ]);

        User::create($validatedData);

        // Redirect to the user list or show success message
        return redirect()->route('login')->with('success', 'User created successfully.');
    }
    public function index()
    {
        // Retrieve a list of all products
        $products = Product::all();

        // Display a view with the list of products
        return view('index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // Show the form to create a new product
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'size' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,png,webp,jpg,gif|max:2048', // Validation pour le champ image
        ]);
    
        // Gestion du téléchargement de l'image
        if ($request->hasFile('picture')) {
            $imagePath = $request->file('picture')->storeAs('', $request->file('picture')->getClientOriginalName()); // Stockage du fichier dans le répertoire 'public/images'
            $validatedData['picture'] = $imagePath;
        }

        $product = Product::create($validatedData);
    
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::findOrFail($id);

        return view('show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'size' => 'required|string',
            'picture' => 'required|string',
        ]);
    
        $product = Product::findOrFail($id);
        $product->update($validatedData);
    
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
