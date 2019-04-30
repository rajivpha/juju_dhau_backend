<ul class="breadcrumb">
    <li>
        <i class="icon-home home-icon"></i>
        <a href="{{route('admin.dashboard')}}">Dashboard</a>
    </li>

    <li>
        <a href="{{$data['panel_url']}}">{{$data['panel']}}</a>
    </li>
    <li class="active">{{$data['current_panel']}}</li>
</ul><!-- .breadcrumb -->