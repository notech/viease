<?php namespace App\Models;

/**
 * Created by Cc <admin@notech.net>.
 * User: Notech <http://notech.net>
 * Date: 16/2/1
 * Time: 15:15
 * File: Relation.php
 */
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	protected $primaryKey = 'rel_id';
	protected $table = 'vshop_location';
	protected $guarded = ['rel_id'];
	public $timestamps = false;

}