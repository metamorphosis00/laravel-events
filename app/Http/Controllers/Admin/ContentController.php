<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    private $storage;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage::disk('public');
    }
    /**
     * Show main page content editor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $content = ($this->storage->exists('content.html')) ? $this->storage->get('content.html') : '';
        return view('admin.content', compact('content'));
    }

    /**
     * Update main page content.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->has('ckeditor')) {
            $this->storage->put('content.html', $request->input('ckeditor'));
            return redirect()->back()->with('message', 'Content updated successfully');
        }
        return redirect()->back()->withErrors(['Content not updated, missing editor value']);
    }
}
