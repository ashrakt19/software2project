<div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
         admin
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="{{ route('admin.home') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
                <a  class="nav-link"  href="{{ route('users.index') }}">
                    <i class="material-icons">person</i>
                   <p>Users</p>
                </a>
            </li>
            <li class="nav-item ">
            <a  class="nav-link"  href="{{ route('categories.index') }}">
                    <i class="material-icons">bubble_chart</i>
                   <p>categories</p>
                </a>
            </li>
            <li class="nav-item ">
            <a  class="nav-link"  href="{{ route('skills.index') }}">
                    <i class="material-icons">offline_bolt</i>
                   <p>skills</p>
                </a>
            </li>
            <li class="nav-item ">
            <a  class="nav-link"  href="{{ route('tags.index') }}">
                    <i class="material-icons">turned_in_not</i>
                   <p>tags</p>
                </a>
            </li>
            <li class="nav-item ">
            <a  class="nav-link"  href="{{ route('pages.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Pages</p>
                </a>
            </li>
            <li class="nav-item ">
            <a  class="nav-link"  href="{{ route('videos.index') }}">
                    <i class="material-icons">video_call</i>
                    <p>Posts</p>
                </a>
            </li>
            
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>