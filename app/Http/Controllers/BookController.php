<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->paginate(5);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['id', 'title']);
        $book = new Book();
        return view('books.create', compact(['book', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        // $book = new Book();
        // dd($request->files);
        // $fileName = $request->up_file;
        if($request->file('up_file')){
            $file = $request->file('up_file');
            // $fileName = time().'.'.$file->getClientOriginalExtension();
            // $request->get('file')->move(public_path('files').$fileName);
            $extension = $request->up_file->extension();   
            $fileName = time().'.'.$extension;
            $x = $file->move('storage/', $fileName);
            if($x){
                $book = new Book();
                $book->up_file = $fileName;
                
            }
            
            $request -> up_file = $book->up_file;
            // dd($request -> up_file);
            
            // $c = $request->user()->books()->create($request ->only('title', 'body', 'author', 'edition', 'part', 'price', 'sales_price', 'keywords', 'category_id'));
            // dd($c);
            $book->title = $request->title;
            $book->body = $request->body;
            $book->author = $request->author;
            $book->edition = $request->edition;
            $book->part = $request->part;
            $book->price = $request->price;
            // $book->sales_price = $request->sales_price;
            $book->keywords = $request->keywords;
            $book->category_id = $request->category_id;
            $book->up_file = $request->up_file;
            $book->user_id = auth()->id();
            $book->save();
        }


        // dd($file->getClientOriginalName());

        

        // if(isset($request->dateRestrict)){
        //     $dateRestrict=$request->dateRestrict;
        // }
        // return view('books.create', compact('datRestrict'));
        
        return redirect()->route('books.index')->with('success', "A new book has been added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return \view('books.show', \compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::get(['id', 'title']);
        // $book = new Book();
        return view('books.edit', compact(['book', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);
        $request->validate([
            'title'=> 'required|max:220',
            'body' => 'required',
            'author'=> 'required', 
            'edition'=> 'required', 
            'price'=> 'required', 
            'category_id' => 'required',
        ]);

        if($request->hasFile('up_file')){
            $request->up_file = $book->up_file = time().'.'.$request->file('up_file')->extension();
            $file = $request->file('up_file');
            $x = $file->move('storage/', $request->up_file);
            
            //save in DB if file uploaded in edit
            $book->up_file= $request->up_file;
            $book->save();
        }
        
        // dd($book->up_file);
        $book->update($request ->only('title', 'body', 'author', 'edition', 'part', 'price', 'sales_price', 'keywords', 'category_id'   ) );
        return redirect()->route('books.index')->with('success', "Book information haas been updated!");
    }

    /**
     * Remove
     *  the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->authorize('delete', $book);
        $book->delete();
        return \redirect()->route('books.index')->with('success', "Book has been deleted");
    }


    public function fileview(Book $book)
    {
        // dd($book->up_file);
        $x=$this->authorize('download', $book);
        // dd($x);
        return response()->download('storage/'.$book->up_file) || \redirect('books.index')->with('success', "sorry");
    }
}
