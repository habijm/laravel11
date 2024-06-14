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


