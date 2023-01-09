<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    protected $fillable = [
        'category_name',
    ];

    public function item()
    {
        return $this->hasMany(item::class);
    }

    public function allCategory()
    {
        $category = DB::select('SELECT * fROM ' . $this->table . ' ORDER BY created_at DESC');

        return $category;
    }

    public function addCategory($data)
    {
        DB::insert('INSERT INTO ' . $this->table . ' (category_name, created_at) values (?, ?)', $data);
    }

    public function findID($id)
    {
        return DB::select('SELECT id FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function updateCategory($data, $id)
    {
        $data[] = $id;

        return DB::update('UPDATE ' . $this->table . ' SET category_name = ?, updated_at = ?', $data);
    }

    public function deleteCategory($id)
    {
        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }
}
