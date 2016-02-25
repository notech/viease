<?php namespace App\Http\Controllers\Admin;

/**
 * Created by Cc <admin@notech.net>.
 * User: Notech <http://notech.net>
 * Date: 16/2/1
 * Time: 15:57
 * File: SceneController.php
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Relation;
use App\Models\Scene;

use App\Utils\TripleDES;

use Overtrue\Wechat\QRCode;

class SceneController extends Controller
{

	public function getIndex(Request $request)
	{
		$scenes = Scene::paginate(15);
		return admin_view('scene.index', compact('scenes'));
	}
	public function create(Request $request, QRCode $qr)
	{
		$max_scene_id = Scene::maxSceneId();

		if ($request->has('vname')) {

			$condition = Scene::where('vshop_type', 1)
				->where('vuid', $request->input('scene'))
				->where('idea_vname', trim(urldecode($request->input('vname'))));

			$ch_data = $condition->first();
		} else {
			exit;
		}

		if (empty($ch_data) || empty($ch_data['scene_code'])) {
			$condition->delete();

			$show_code = $qr->forever($max_scene_id);

			if($show_code){

				$values = array(
					'vuid' => intval($request->input('scene')),
					'scene_id' => $max_scene_id,
					'scene_code' => !empty($show_code['ticket'])
						? 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' . urlencode($show_code['ticket']) : '',
					'scene_url' => $show_code['url'],
				);

				// 生成sid串
				if (is_numeric($request->input('scene')) && intval($request->input('scene'))) {
					$key = pack('H*', "10214F588810403828257951CBDD556677297498304036E2");
					$vname = empty($request->input('vname')) ? 'shop' : urldecode($request->input('vname'));

					$values['scene_sid'] = TripleDES::enc3DES("{$vname}&{$request->input('scene')}", $key, TripleDES::genIvParameter());
				}

				if ($request->has('name')){
					$values['scene_name'] = urldecode($request->input('name'));
				}

				if ($request->has('vname')) {
					$values['idea_vname'] = urldecode($request->input('vname'));
					$values['vshop_type'] = 1;
				}

				Scene::create($values);

				$showcode = $values['scene_code'];

			}
		}elseif (!empty($ch_data['scene_code'])) {
			$showcode = $ch_data['scene_code'];
		}

		if (!empty($showcode)){
			header("Location:{$showcode}");
		}
	}
}