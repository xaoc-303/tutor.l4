<header role="navigation" class="navbar navbar-inverse navbar-fixed-top">
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
        <li>
          <a href="#">Авторизация</a>
        </li>
        <li>
          <a href="#">Регистрация</a>
        </li>
      </ul>
    </nav>
  </div>
</header>