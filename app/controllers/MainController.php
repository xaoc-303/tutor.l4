<?php

class MainController extends BaseController {

	public function getIndex()
	{
		return View::make('main.index')
            ->with('title',__CLASS__)
            ->nest('content', 'main.welcome');
	}

	public function postRenameLogin()
	{
		// принимаемые значения
		$input  = [
			'old'  =>  trim(Input::get('login_old')),
            'new'  =>  trim(Input::get('login_new'))
        ];

        // правила валидации
        $rules = array(
            'old' => array('required', 'min:3', 'regex:/^[а-яА-ЯёЁa-zA-Z0-9]+$/'),
            'new' => array('required', 'min:3', 'regex:/^[а-яА-ЯёЁa-zA-Z0-9]+$/')
        );

        // сообщения ошибок для правил валидации
        $messages = array(
			'old.required'	=> 'Введите ваш старый логин',
			'old.min'		=> 'Старый логин слишком короткий',
			'old.regex'		=> 'Старый логин не соответствует формату',

			'new.required'	=> 'Введите ваш новый логин',
			'new.min'		=> 'Новый логин слишком короткий',
			'new.regex'		=> 'Новый логин не соответствует формату',
		);

        $validation = Validator::make($input, $rules, $messages);

        if ($validation->fails()) {
			// проверка не пройдена
			return ['code' => 1, 'message' => $validation->errors()->first()];
		}

		if ($input['old'] != Session::get('user_name')) {
			// не старое имя
			return ['code' => 1, 'message' => 'Старый логин не совпадает с введённым'];
		}

		// новое имя
		Session::put('user_name', $input['new']);

		return ['code' => 0, 'message' => 'Логин изменён'];
	}

}