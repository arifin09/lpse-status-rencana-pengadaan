<?php

namespace Bantenprov\StatusRencanaPengadaan\Models\Bantenprov\StatusRencanaPengadaan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusRencanaPengadaan extends Model
{

    protected $table = 'lpse_status_rencana_pengadaans';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\StatusRencanaPengadaan\Models\Bantenprov\StatusRencanaPengadaan\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\StatusRencanaPengadaan\Models\Bantenprov\StatusRencanaPengadaan\Regency','id','regency_id');
    }

}

