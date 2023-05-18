<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inform extends Model
{
    use HasFactory;

    protected $fillable = [
        'account',
        'ot',
        'id_adviser',
        'name_adviser',
        'package',
        'cant_service',
        'type_network',
        'divide',
        'area',
        'zone',
        'population',
        'distrite',
        'tercero',
        'point',
        'rent',
        'group',
        'category',
        'date',
        'venta',
        'type_register',
        'channel',
        'number_contract',
        'social_class',
        'package_pg',
        'package_pvd',
        'cod_campaign',
        'multiplay',
        'type_product',
        'area_gv',
        'cod_rate',
        'comision',
    ];
}
