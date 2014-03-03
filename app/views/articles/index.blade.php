@if(Session::has('msg_success'))
<div class="alert alert-success">{{Session::get('msg_success')}}</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th><a class="btn btn-info" title="Добавить" href="{{URL::action('ArticlesController@create')}}"><span class="glyphicon glyphicon-plus"></span></a></th>
            <th>Заголовок</th>
            <th></th>
            <th>Создано</th>
            <th>Обновлено</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
        <tr>
            <td>{{$article->id}}</td>
            <td><a href="{{URL::route('articles.show',$article->id)}}">{{$article->title}}</a></td>
            <td>
                <a href="{{URL::route('articles.show', $article->id)}}" class="btn btn-default btn" title="Открыть"><span class="glyphicon glyphicon-eye-open"></span></a>
                <a href="{{URL::route('articles.edit', $article->id)}}" class="btn btn-default btn" title="Редактировать"><span class="glyphicon glyphicon-edit"></span></a>
                <a href="{{URL::route('articles.delete', $article->id)}}" class="btn btn-default btn" title="Удалить"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
            <td>{{$article->created_at}}</td>
            <td>{{$article->updated_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$articles->links()}}