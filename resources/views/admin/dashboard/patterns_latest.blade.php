<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Latest Patterns</h3>

        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Pattern</th>
                    <th>Status</th>
                    {{--<th>Fecha</th>--}}
                    <th>Popularity</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($patterns as $pattern)
                    <tr data-id="{{ $pattern->id }}">
                        <td>{{ $pattern->id }}</td>
                        <td>
                            <a href="{{route('admin.patterns.show', ['patterns' => $pattern->id])}}">{{ $pattern->title }}</a>
                        </td>
                        @if ($pattern->status === 'Open')
                            <td><span class="label label-success">Open</span></td>
                        @else ($pattern->status === 'Closed')
                            <td><span class="label label-danger">Closed</span></td>
                        @endif
                        <td>
                            <a class="btn btn-success btn-xs"
                               href="{{route('admin.patterns.show', ['patterns' => $pattern->id])}}"><i
                                        class="fa fa-info-circle"></i></a>
                            <a class="btn btn-primary btn-xs"
                               href="{{route('admin.patterns.edit', ['patterns' => $pattern->id])}}"><i
                                        class="fa fa-pencil-square-o"></i></a>
                            <a class="btn btn-danger btn-xs"
                               href="{{route('admin.patterns.destroy',['patterns' => $pattern->id])}}"
                               class="btn-delete"><i
                                        class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="box-footer clearfix">
        <a href="{{route('admin.patterns.create')}}" class="btn btn-sm btn-info btn-flat pull-left"> New Pattern</a>
        <a href="{{route('admin.patterns.index')}}" class="btn btn-sm btn-default btn-flat pull-right">View All
            Patterns</a>
    </div>
</div>