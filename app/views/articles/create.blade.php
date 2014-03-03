@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
<?=Form::open(['url' => URL::route('articles.store'), 'method' => 'post', 'class' => 'form-horizontal'])?>
    <div class="form-group {{$errors->has('title')?'has-error':''}}">
        <label class="col-sm-2 control-label" for="inputTitle">Заголовок</label>
        <div class="col-sm-3">
            <?=Form::text('title', Input::old('title'), ['class' => 'form-control', 'id' => 'inputTitle', 'placeholder' => 'Заголовок'])?>
        </div>
    </div>

    <div class="form-group {{$errors->get('body')?'has-error':''}}">
        <label class="col-sm-2 control-label">Статья</label>
        <div class="col-sm-3">
            <?=Form::textarea('body', Input::old('body'), ['class' => 'form-control', 'id' => 'textareaTemplate', 'placeholder' => 'Статья'])?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-3">
            <p class="text-right"><?=Form::submit('Применить', ['class' => 'btn btn-primary btn'])?></p>
        </div>
    </div>
<?=Form::close()?>