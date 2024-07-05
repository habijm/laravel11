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


