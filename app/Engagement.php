<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Engagement
 *
 * @package App
 * @property string $stats_date
 * @property integer $fans
 * @property integer $engagements
 * @property integer $reactions
 * @property integer $comments
 * @property integer $shares
*/
class Engagement extends Model
{
    use SoftDeletes;

    protected $fillable = ['stats_date', 'fans', 'engagements', 'reactions', 'comments', 'shares'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStatsDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['stats_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['stats_date'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStatsDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setFansAttribute($input)
    {
        $this->attributes['fans'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setEngagementsAttribute($input)
    {
        $this->attributes['engagements'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setReactionsAttribute($input)
    {
        $this->attributes['reactions'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setCommentsAttribute($input)
    {
        $this->attributes['comments'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setSharesAttribute($input)
    {
        $this->attributes['shares'] = $input ? $input : null;
    }
    
}
