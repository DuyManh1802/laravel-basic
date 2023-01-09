<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $fillable = [
        'item_name',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function allItem()
    {
        $item = DB::select('SELECT * fROM item ORDER BY created_at DESC');
        return $item;
    }

    public function addItem($data)
    {
        DB::insert('INSERT INTO item (name, email, password, created_at) values (?, ?, ?, ?)', $data);
    }

    public function findID($id)
    {
        return DB::select('SELECT * FROM item WHERE id = ?', [$id]);
    }

    public function updateItem($data, $id)
    {
        $data[] = $id;
        return DB::update('UPDATE item SET name = ?, updated_at = ?', $data);
    }

    public function deleteItem($id)
    {
        return DB::delete('DELETE item WHERE id = ?', $id);
    }
}
