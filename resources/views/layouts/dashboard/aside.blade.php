<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div>
          <p class="app-sidebar__user-name">{{ auth()->user()->name}}</p>
          <p class="app-sidebar__user-designation">Wakeb Blog</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{ route('dashboard.welcome') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
            <li><a class="app-menu__item" href="{{ route('dashboard.categories.index') }}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Categories</span></a></li>
            <li><a class="app-menu__item" href="{{ route('dashboard.tags.index') }}"><i class="app-menu__icon fa fa-tag"></i><span class="app-menu__label">Tags</span></a></li>

          <li><a class="app-menu__item" href="{{ route('dashboard.posts.index') }}"><i class="app-menu__icon fa fa-sticky-note-o "></i><span class="app-menu__label">Posts</span></a></li>

           <li><a class="app-menu__item" href="{{ url('dashboard/settings') }}"><i class="app-menu__icon fa fa-cogs  "></i><span class="app-menu__label">Settings</span></a></li>

       
      </ul>
    </aside>