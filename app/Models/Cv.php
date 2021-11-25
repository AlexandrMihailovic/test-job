<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ElasticScoutDriverPlus\Searchable;

/**
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $education
 * @property string $work
 * @property string $experience
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Cv extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'education',
        'work',
        'experience'
    ];

    /**
     * @return [type]
     */
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'education' => $this->education,
            'work' => $this->work
        ];
    }
}
