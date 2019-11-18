@can('manage_druidapps')
    <li class="{{ ($section=='apps') ? 'navigation__active' : '' }}">
        <a href="{{route('apps.home')}}"><i class="zmdi zmdi-apps"></i> Druid Apps</a>
    </li>
@endcan
