<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file_path',
        'file_name',
        'mime_type',
        'file_size',
    ];

    protected $casts = [
        'file_size' => 'integer',
    ];

    /**
     * Получить полный URL к иконке
     */
    public function getUrlAttribute()
    {
        if (!$this->file_path) {
            return null;
        }
        return asset('storage/' . $this->file_path);
    }

    /**
     * Получить путь к файлу относительно storage/app/public
     */
    public function getStoragePathAttribute()
    {
        return $this->file_path;
    }
}
