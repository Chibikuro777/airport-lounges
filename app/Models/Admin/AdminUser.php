<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminUser extends Model
{
    use HasFactory;

    protected $table = 'admin_users';

    protected $guarded = array('id');

    public $timestamps = false;

    public function getData()
    {
        $data = DB::table($this->table)->get();
        return $data;
    }
}
