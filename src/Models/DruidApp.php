<?php namespace Genetsis\Admin\Models;

use Genetsis\Admin\Utils\Encryptable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\DruidApp
 */
class DruidApp extends Model
{
    use LogsActivity;

    use Encryptable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'druid_apps';

    protected $fillable = ['client_id', 'secret', 'name'];

    protected $hidden = ['secret'];

    protected $encryptable = ['secret'];

    protected $primaryKey = 'client_id';
    public $keyType = 'string';

    public $incrementing = false;
    public $timestamps = false;

    protected static $logAttributes = ['client_id', 'name'];
    protected static $logOnlyDirty = true;


    public function getLogoAttribute($value) {
        return (empty($value)) ? $this->brand->logo : $value;
    }


    /**
     * Get the Entrypoints associated to this Druid App
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entrypoints(){
        return $this->hasMany(Entrypoint::class, 'client_id', 'client_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($model) {
            $model->entrypoints()->forceDelete();
        });
    }
}
