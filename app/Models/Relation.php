<?php namespace App\Models;

/**
 * Created by Cc <admin@notech.net>.
 * User: Notech <http://notech.net>
 * Date: 16/2/1
 * Time: 15:15
 * File: Relation.php
 */
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{

	protected $primaryKey = 'vs_id';

	protected $table = 'vshop_relation';

	protected $guarded = ['vs_id'];



	static public function bindScene($scene_id, $rel)
	{
		if (empty($scene_id) || empty($rel) || intval($scene_id) == 0 || intval($scene_id) == 999)
			return;

		// 判断是否已绑定
		$data = self::where('rel_openid', $rel)->first();

		if (empty($data)) {
			// 插入对应记录
			$values = array(
				'scene_id' => $scene_id,
				'rel_openid' => $rel,
			);
			self::create($values);
			return $scene_id;
		}
		return $data->scene_id;
	}

	static public function unbindScene($rel)
	{
		$result = self::where('rel_openid', $rel)->delete();

		return $result;
	}

	public function findSceneName($rel)
	{
	}

	public function hasOneScene()
	{
		return $this->hasOne('App\Models\Scene', 'scene_id', 'scene_id');
	}
}