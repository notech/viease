<?php namespace App\Models;

/**
 * Created by Cc <admin@notech.net>.
 * User: Notech <http://notech.net>
 * Date: 16/2/1
 * Time: 15:15
 * File: Relation.php
 */
use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
	protected $primaryKey = 'sc_id';
	protected $table = 'vshop_scene';
	protected $guarded = ['sc_id'];
	public $timestamps = false;



	public static function maxSceneId()
	{
		$max_id = self::where('scene_id' , '<>', 999)->max('scene_id');
		$max_scene_id = isset($max_id) ? intval($max_id) + 1 : 100;
		if ($max_scene_id == 999){
			$max_scene_id = $max_scene_id + 1;
		}

		return $max_scene_id;
	}
}