   <!-- end of grid 3 -->
                     <!-- start of grid 2 -->
                     <div class="dashboard-content-header">
                      <h3><span class="uk-icon uk-margin-small-right" uk-icon="icon: list;"></span>Users</h3>
                      <ul class="uk-breadcrumb">
                <li><a class="uk-text-primary" href="admin-dashboard.html">Dashboard</a></li>
                <li><span>Parents</span></li>
            </ul>
                     </div>
                     <div class="dashboard-width-100">
                      <div class="dashboard-float-left">
                        <button class="uk-button uk-button-default"><span class="uk-margin-small-right fa fa-filter dashboard-fontawsome-icon"></span> Filter</button>
                      </div>
                        <div class="dashboard-float-right">
                        <button class="uk-button uk-button-primary uk-margin-small-right dashboard-icon-button"><span class="uk-icon dashboard-custom-icon" uk-icon="icon: plus;"></span></button>
                        <button id="delete" class="uk-button dashboard-danger dashboard-light dashboard-icon-button"><span class="uk-icon dashboard-custom-icon" uk-icon="icon: trash;"></span></button>
                        </div>
                      </div>
                     <div class="uk-overflow-auto dashboard-width-100">
    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
        <thead>
            <tr>
                <th class="uk-table-shrink"><input class="uk-checkbox" id="checkall" type="checkbox"></th>
                <th class="uk-table-shrink">Profile</th>
                <th class="uk-table-expand">Users</th>
                <th class="uk-table-expand">Password</th>
                <th class="uk-table-expand">Status</th>
                <th class="uk-width-small">Date Added</th>
                <th class="uk-table-shrink uk-text-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($user as $users)
            <tr>
                <td><input class="uk-checkbox" type="checkbox" value="{{ $users->id }}" name="user-id"></td>
                <td><img class="uk-preserve-width uk-border-circle" src="{{ $users->profile }}" width="40" alt=""></td>
                <td class="uk-table-link">
                    <a class="uk-link-reset" href="">{{ $users->firstname }}</a>
                </td>
                <td class="uk-table-link">
                    <a class="uk-link-reset" href="">Hidden</a>
                </td>
                @if($users->active == 0)
                <td><span>Offline</span></td>
                @else
                <td><span>Online</span></td>
                @endif
                <td class="uk-text-truncate">{{ $users->created_at }}</td>
                <td class="uk-text-nowrap"><button class="uk-button uk-button-primary dashboard-icon-button"><span class="uk-icon dashboard-custom-icon" uk-icon="icon: pencil;"></span></button></td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
<div class="dashboard-pagination">
  <ul class="uk-pagination" uk-margin>
    <li><a href="#"><span uk-pagination-previous></span></a></li>
    <li><a href="#">1</a></li>
    <li class="uk-disabled"><span>...</span></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">6</a></li>
    <li class="uk-active"><span>7</span></li>
    <li><a href="#">8</a></li>
    <li><a href="#">9</a></li>
    <li><a href="#">10</a></li>
    <li class="uk-disabled"><span>...</span></li>
    <li><a href="#">20</a></li>
    <li><a href="#"><span uk-pagination-next></span></a></li>
</ul>
</div>