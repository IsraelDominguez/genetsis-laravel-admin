<?php namespace Genetsis\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;


/**
 * App\Models\Entrypoint
 *
 */
class Entrypoint extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entrypoints';

    protected $fillable = ['key', 'client_id', 'name', 'ids', 'fields', 'selflink'];

    protected $primaryKey = 'key';
    public $keyType = 'string';

    public $timestamps = false;
    public $incrementing = false;

    /**
     * Get the Druid App associated with the Action
     */
    public function druid_app()
    {
        return $this->hasOne(DruidApp::class, 'client_id', 'client_id');
    }

    public function getFieldsAttribute($value) {
        return json_decode($value);
    }

    public function getIdsAttribute($value) {
        return json_decode($value);
    }

}
