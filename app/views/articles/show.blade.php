<div class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2 control-label">Создано</label>
        <div class="col-sm-3 link-edit">{{$article->created_at}}</div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Обновлено</label>
        <div class="col-sm-3 link-edit">{{$article->updated_at}}</div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Заголовок</label>
        <div class="col-sm-3 link-edit">{{$article->title}}</div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Статья</label>
        <div class="col-sm-3 link-edit">{{$article->body}}</div>
    </div>
</div>