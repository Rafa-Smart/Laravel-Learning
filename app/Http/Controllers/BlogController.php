<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

        $request->validate([
            'title' => 'required|unique:blogs|max:255',
            'description' => 'required',
        ]);
        DB::table('blogs')->insert([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // biar muncul pesan sukses
        // Session flash adalah session sementara yang hanya berlaku untuk 1 request berikutnya saja.
        // Biasanya dipakai untuk menampilkan pesan sukses/error setelah redirect, misalnya:
        Session::flash('message', 'New blog has been added!');

        // redirect ke halaman utama

        return redirect()->route('halaman-utama');
        // return redirect('blog');
    }

    public function detail(Request $request, $id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();

        if (! $blog) {
            // kalo ga ada datanya
            return redirect()->route('halaman-utama');

            // atau bisa juga pake not fount
            // abort(404);
        }

        return view('blog-detail', ['blog' => $blog]);
    }

    public function edit(Request $request, $id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();
        if (! $blog) {
            // kalo ga ada datanya
            return redirect()->route('halaman-utama');

            // atau bisa juga pake not fount
            // abort(404);
        }

        return view('blog-edit', ['blog' => $blog]);
    }

    public function update(Request $request, $id){
        $blog = DB::table('blogs')->where('id', $id)->first();
        if (! $blog) {
            // kalo ga ada datanya
            return redirect()->route('halaman-utama');

            // atau bisa juga pake not fount
            // abort(404);
        }

        $request->validate([
            'title' => 'required|max:255|unique:blogs',
            'description' => 'required',
        ]);

        DB::table('blogs')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        Session::flash('message', 'Blog has been updated!');

        return redirect()->route('halaman-utama');
    }

    public function delete(Request $request, $id){
        $blog = DB::table('blogs')->where('id', $id)->first();
        if (! $blog) {
            // kalo ga ada datanya
            return redirect()->route('halaman-utama');

            // atau bisa juga pake not fount
            // abort(404);
        }

        DB::table('blogs')->where('id', $id)->delete();

        Session::flash('message', 'Blog has been deleted!');

        return redirect()->route('halaman-utama');
    }
}
