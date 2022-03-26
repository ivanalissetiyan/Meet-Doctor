<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Appointment extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'appointment';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function doctor()
    {
        // 3 Parameter (Path Model, Field foreign key, field primary key from tabel hasMany/HasOne)
        return $this->belongsTo('App\Models\Operational\Doctor', 'doctor_id', 'id');
    }

    public function consultation()
    {
        // 3 Parameter (Path Model, Field foreign key, field primary key from tabel hasMany/HasOne)
        return $this->belongsTo('App\Models\MasterData\Consultation', 'consultation_id', 'id');
    }

    public function user()
    {
        // 3 Parameter (Path Model, Field foreign key, field primary key from tabel hasMany/HasOne)
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function transaction()
    {
        // 2 Parameter (Path Model, Field Foreign Key)
        return $this->hasOne('App\Models\Operational\Transaction', 'appointment_id');
    }
}
