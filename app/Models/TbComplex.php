<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbComplex extends Model
{
    // use Concerns\UsesUuid; // Трейд Используется в случае необходимости автогенерации UIID
    use HasFactory;

    //   use SoftDeletes;    // Подключаем реализацию мягкого удаления данных из таблицы
                            // Этот параметр подключается индивидуально в каждой моделе
                            // Так же в миграции таблици необходимо добавить столбец " $table->softDeletes(); "

    protected $table = 'TbComplex'; // Параметр указывающий какая таблица связана с этой моделью.
    // Параметр необязательный, но лучще принудительно указывать.

    /**
     * The attributes that are mass assignable.
     * Атрибуты, которые можно назначать массово
     * @var array<int, string>
     */
    protected $fillable = [
        'Name',
        'Description',
    ];

    // Следующие три строки необходимы для использовани GUID в качестве строки
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];        // Строка разрешающая запись данных в таблицу (Защита от записи в фреймворке Laravel)
                                    // Должна быть в каждой моделе в которую осуществляется запись данных.
                                    // Этот способ разрешает записывать все атрибуты

    //    protected $fillable = ['NameComple','Description']; // Этот способ разрешает запись только перечисленных атрибутов таблицы

    public $timestamps = false;     // Отключаем в моделе автоматическую обработку полей created_at и updated_at.
                                    // Обязательно если в таблице данных полей нет.

    // public function plants()
    // {
    //     return $this->hasMany(Plant::class, 'complex_id', 'id');
    // }
}
