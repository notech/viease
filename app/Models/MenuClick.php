<?php namespace App\Models;

/**
 * Created by Cc <admin@notech.net>.
 * User: Notech <http://notech.net>
 * Date: 16/2/1
 * Time: 15:15
 * File: Relation.php
 */
use Illuminate\Database\Eloquent\Model;

class MenuClick extends Model
{

	protected $primaryKey = 'mc_id';

	protected $table = 'vshop_menu_click';

	protected $guarded = ['mc_id'];

	public $timestamps = false;


	static public function log($mc_openid, $mc_vuid, $mc_menu)
	{
		$data = ['mc_openid'=>$mc_openid, 'mc_vuid'=>$mc_vuid, 'mc_menu'=>$mc_menu, 'mc_ctime'=>time()];
		return self::create($data);
	}
}