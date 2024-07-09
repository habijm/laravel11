<h1>Belajar Laravel 11</h1>

<h3>10 .Model Factory</h3>

```bash
php artisan make:factory PostFactory
```
<p>  Berfungsi untuk membuat data dummy dala project laravel
</p>

<h3>11. Eloquent Relationship</h3>
<p>  Berfungsi untuk membuat relasi one to many
</p>

```bash
public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
```

<p>  Berfungsi untuk membuat relasi one to many
</p>

```bash
 public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
```

<h3>14. N+1 Problem</h3>
<p> Masalah N+1 pada Laravel terjadi ketika Anda mengakses relasi dalam loop tanpa melakukan eager loading. Hal ini menyebabkan banyak sekali query SQL yang tidak efisien. Misalnya, jika Anda memiliki daftar posts dan setiap post memiliki author, tanpa eager loading, Laravel akan 
</p>

<p>Tambahkan ini pada model </p>

```bash
protected $with = ['author', 'category'];
```

<h3>16. Fitur Search</h3>
<p> Kode ini mendefinisikan sebuah method scopeFilter dalam model Post yang digunakan untuk menambahkan filter ke query berdasarkan pencarian, kategori, dan penulis. Method ini menggunakan teknik "query scope" di Laravel, yang memungkinkan Anda untuk merangkai kondisi query secara kondisional dalam cara yang bersih dan mudah dibaca.
</p>

<p>Model </p>

```bash
 public function scopeFilter(Builder $query, array $filters): void  
    {

        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }
```

<p>Route</p>

```bash
  return view('posts',  ['title' => 'Blog', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->get()]);
```

<p>Halaman Search</p>

```bash
    @if(request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">             
    @endif
```

<p>Contoh Link</p>

```bash
   <a href="/posts?category={{ $post->category->slug }}">
```

<h3>17. Pagination</h3>
<p>Referensi: https://laravel.com/docs/11.x/pagination#main-content</p>

<p>Edit file tailwind.config.js</p>

```bash
 content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
],
```

<p>Tambahkan Nama Tabel + links pada halaman</p>

```bash
{{ $users->links() }}

```

<p>Tambahkan pada Route + jumlah data yang ingin ditampilkan</p>

```bash
->paginate(9)

```


 


