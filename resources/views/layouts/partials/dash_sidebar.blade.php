<nav class="side-navbar">
	<div class="sidebar-header d-flex align-items-center">
		<div class="avatar"><img src="{{ asset('img/logo-oasis.png') }}" alt="..." class="img-fluid rounded-circle"></div>
		<div class="title">
			<h1 class="h4">Oasis Park</h1>
			<p>Consumibles</p>
		</div>
	</div>
	<ul class="list-unstyled">
		<li class="active"><a href="{{ url('/admin') }}"> <i class="icon-home"></i>Home </a></li>
		<li><a href="{{ url('/impresoras') }}"> <i class="icon-grid"></i>Impresoras </a></li>
		<li><a href="{{ url('/consumibles') }}"> <i class="icon-grid"></i>Consumibles </a></li>
		<li><a href="{{ url('/cambios') }}"> <i class="icon-grid"></i>Cambios </a></li>
	</ul>
</nav>