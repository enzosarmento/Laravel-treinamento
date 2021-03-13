<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;

class PostsAdminController extends Controller
{
    /**
     * @var Post
     */
    private $post;


    public function __construct(Post $post)
        {
            $this->post = $post;
        }

    public function index()
    {

        $posts = $this->post->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request)
    {

       $post = $this->post->create($request->all());
       $post->tags()->sync($this->getTagsIds($request->tags));

       return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $this->post->find($id)->update($request->all());
        $post = $this->post->find($id);
        $post->tags()->sync($this->getTagsIds($request->tags));

        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->post->find($id)->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return redirect()->route('admin.posts.index');
    }

    private function getTagsIds($tags)
    {
        $tagList = array_filter(array_map('trim', explode(',', $tags)));
        $tagIDs = [];
        foreach($tagList as $tagName)
        {
            $tagIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }

        return $tagIDs;
    }
}
