<?php

namespace App\Models\WebInterface;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'units'; // Параметр указывающий какая таблица связана с этой моделью.
    // Параметр необязательный, но лучще принудительно указывать.

    protected $guarded = [];        // Строка разрешающая запись данных в таблицу (Защита от записи в фреймворке Laravel)
    // Должна быть в каждой моделе в которую осуществляется запись данных.
    // Этот способ разрешает записывать все атрибуты

//    protected $fillable = ['NameComple','Description']; // Этот способ разрешает запись только перечисленных атрибутов таблицы

    public $timestamps = false;     // Отключаем в моделе автоматическую обработку полей created_at и updated_at.
    // Обязательно если в таблице данных полей нет.

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id', 'id');
    }

    public function point()
    {
        return $this->hasMany(Piont::class, 'point_id', 'id');
    }

}
