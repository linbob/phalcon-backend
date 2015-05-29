<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                {{ link_to("", "<i class='fa fa-dashboard fa-fw'></i>佈告欄") }}
            </li>
            {% for acl in acls %}
            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i>{{ acl.mainMenu.name }}<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    {% for subMenu in mainMenu.mainMenu.subMenu %}
                        <li>
                            {{ link_to(subMenu.link, subMenu.name) }}
                        </li>
                    {% endfor %}
                </ul>
            </li>
            {% endfor %}
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>