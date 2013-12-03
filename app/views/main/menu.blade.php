<header role="navigation" class="navbar navbar-inverse navbar-fixed-top" style="box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-tower"></span></a>
    </div>
    <nav role="navigation" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="{{URL::action('RadioController@getIndex')}}">Радио</a>
        </li>
        <li>
          <a href="#">Item 2</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(!Session::has('user_auth'))
        <li>
          <a href="{{URL::action('Admin_Controller@getAuth')}}">Авторизация</a>
        </li>
        @else
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> {{Session::get('user_name','')}} <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Сменить имя</a></li>
          <li class="divider"></li>
          <li><a href="#">Выйти</a></li>
        </ul>
        </li>
        @endif
      </ul>
    </nav>
  </div>
</header>