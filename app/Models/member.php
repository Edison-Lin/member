<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $fillable=[
        'mid','mname','passwd','lastlogindatetime','ctid'
    ];
    protected $casts=[
        'mid'=>'string',
    ];
    protected $table='member';//指定資料表為member  並非預設：members
    protected $primaryKey='mid';//指定主鍵為
    public $timestamps=false;//MODEL不設定時間戳記，因為資料庫未使用
    protected static function booted()
{
    static::creating(function ($member) {
        // 設置 lastlogindatetime 為當前時間
        if (!$member->lastlogindatetime) {
            $member->lastlogindatetime = now();
        }

        // 如果 ctid 沒有提供，隨機生成 ctid
        if (!$member->ctid) {
            $member->ctid = 'ct' . str_pad(rand(1, 22), 2, '0', STR_PAD_LEFT);
        }
    });
}
}
