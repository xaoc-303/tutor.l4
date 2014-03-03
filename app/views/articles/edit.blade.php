@if(Session::has('msg_success'))
<div class="alert alert-success">{{Session::get('msg_success')}}</div>
@endif
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
<?=Form::open(['url' => URL::route('articles.update',$article->id), 'method' => 'put', 'class' => 'form-horizontal'])?>
    <div class="form-group">
        <label class="col-sm-2 control-label">Создано</label>
        <div class="col-sm-3 link-edit">{{$article->created_at}}</div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Обновлено</label>
        <div class="col-sm-3 link-edit">{{$article->updated_at}}</div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label" for="inputTitle">Заголовок</label>
        <div class="col-sm-3">
            <?=Form::text('title', Input::old('title', $article->title), ['class' => 'form-control', 'id' => 'inputTitle', 'placeholder' => 'Заголовок'])?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Статья</label>
        <div class="col-sm-3">
            <?=Form::textarea('body', Input::old('body', $article->body), ['class' => 'form-control', 'id' => 'textareaTemplate', 'placeholder' => 'Статья'])?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-3">
            <p class="text-right"><?=Form::submit('Применить', ['class' => 'btn btn-primary btn'])?></p>
        </div>
    </div>
<?=Form::close()?>