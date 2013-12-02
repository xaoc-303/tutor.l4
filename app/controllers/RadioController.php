<?php

class RadioController extends BaseController {

	public function getIndex()
	{
		return View::make('main.index')
            ->with('title',__CLASS__)
            ->nest('content', 'main.radio');
	}

	public function getRadioList() {

		$list = array();

		$config = Config::get('radio');

		$tags = array();
		$country = array();

		foreach ($config as $radio_key => $radio_value) {

			$radio_value['radio_id'] = $radio_key;

			// формирование массива стран
			if (!empty($radio_value['country'])) {
				if (!isset($country[$radio_value['country']])) {
					$country[$radio_value['country']] = array();
				}
				array_push($country[$radio_value['country']], $radio_value);
			}

			// формирование массива жанров
			foreach ($radio_value['tags'] as $tags_key => $tags_value) {

				if (!empty($tags_value)) {
					if (!isset($tags[$tags_value])) {
						$tags[$tags_value] = array();
					}
					array_push($tags[$tags_value], $radio_value);
				}
			}
		}

		// страны

		$country_list = array();

		foreach ($country as $country_key => $country_value) {
			$children = array();
			foreach ($country_value as $radio_key => $radio_value) {
				$children_item = array('title' => $radio_value['name'], 'url' => $radio_value['broadcasting'], 'radio_id' => $radio_value['radio_id']);
				array_push($children, $children_item);
			}

			$folder = array(
				'title' => $country_key,
				'isFolder' => true,
				'children' => $children
			);
			array_push($country_list, $folder);
		}

		array_push($list,
			array(
				'title' => 'Country',
				'isFolder' => true,
				'children' => $country_list
			)
		);

		// жанры

		foreach ($tags as $tags_key => $tags_value) {
			$children = array();
			foreach ($tags_value as $radio_key => $radio_value) {
				$children_item = array('title' => $radio_value['name'], 'url' => $radio_value['broadcasting'], 'radio_id' => $radio_value['radio_id']);
				array_push($children, $children_item);
			}

			$folder = array(
				'title' => $tags_key,
				'isFolder' => true,
				'children' => $children
			);
			array_push($list, $folder);
		}


		return Response::json($list);
	}

	public function getPlayerForm($id = ''){
		//$id = urldecode($id);
		return View::make('main.player2')
			->with('file',Config::get('radio')[(int)$id]['broadcasting'])
			->render();
	}

}