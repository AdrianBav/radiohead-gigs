<div class="x_panel" id="tracklist">

    <div class="x_title">
        <h2>{{ $release->title }} <small>@if ($release->isAlbum) ({{ $release->year }}) @endif</small></h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>

    <div class="x_content">
        <table class="table table-hover jambo_table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Track</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($release->songs as $song)
                <tr>
                    <th scope="row">{{ $song->track }}</th>
                    <td>{{ $song->title }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
