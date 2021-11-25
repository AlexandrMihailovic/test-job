<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ElasticScoutDriverPlus\Searchable;


/**
 * @property integer $id
 * @property string $title
 * @property string $company
 * @property string $location
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Job extends Model
{
    use HasFactory;
    use Searchable;
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'company',
        'location',
        'description'
    ];
    /**
     * @return [type]
     */
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description
        ];
    }
}
