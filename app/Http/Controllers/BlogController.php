<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // return view('blog', ['data' => 'This is blog page']);

        // disini kita return seluruh data blog dari database

        // $blogs = DB::table("blogs")->get();

        $title = $request->input('title');
        // DB::table('blogs') → memanggil Query Builder Laravel, diarahkan ke tabel blogs.

        // Hasilnya bukan langsung data, tapi objek query (builder) yang bisa kamu tambahin kondisi sebelum dieksekusi.
        $query = DB::table('blogs');

        if ($title) {
            $query->where('title', 'like', '%'.$title.'%');

            // jadi kalo ada seacrh maka akan di filter dulu, baru nanti dibawah kita
            // get lagi pake paginate

            // dan kalo ga ada search maka langsung aja get paginasi
        }
        $blogs = $query->orderby('id', 'desc')->paginate(10);

        // ini kalo pake pagination

        // buat debugging
        // dd($blogs);
        return view('blog', ['blogs' => $blogs]);
    }

    public function add()
    {
        return view('blog-add');
    }

    public function create(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
        DB::table('blogs')->insert([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('halaman-utama');
        // return redirect('blog');
    }
}
