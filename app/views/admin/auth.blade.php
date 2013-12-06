@extends('layouts.default')

@section('content')
<div id="myModal" class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="{{URL::action('Admin_Controller@postAuth')}}" method="POST">
			<div class="modal-header">
				<h3 class="modal-title">Авторизация</h3>
			</div>
			<div class="modal-body">
				@if(Session::get('shield','Grey') == 'Red')
				<div class="alert alert-danger">Пароль такой же, как логин</div>
				@endif
				<div style="float: left;">
				<h5>
					<label>Логин:</label>
					<input type="text" class="form-control" name="username" value="{{Session::get('username','')}}" style="width: 300px;">
				</h5>
				<h5>
					<label>Пароль:</label>
					<input type="password" class="form-control" name="password" value="" style="width: 300px;">
				</h5>
				</div>
				<div style="float: left;">
					<img src="/img/Shield_{{Session::get('shield','Grey')}}.png" style="margin-left: 20px;">
				</div>
			</div>
			<div class="modal-footer" style="clear: both;">
				<input type="submit" class="btn btn-primary" style="margin-right: 37px;" value="Подтвердить">
			</div>
		</form>
		</div>
	</div>
</div>
<script type="text/javascript">
$('#myModal').modal({
	backdrop: 'static',
	keyboard: false,
	show: true,
});
$("input:eq({{Session::get('shield','Grey') == 'Red' ? 1 : 0}})").focus();
</script>
@stop