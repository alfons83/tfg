<div data-id="25" class="well well-sm request">
    <h4 class="list-title">
        {{ $pattern->title }}
        @include('home/partials/status', compact('patterns'))
    </h4>
    <p>

        <a href="#" class="btn btn-primary btn-vote" title="Votar por este tutorial">
            <span class="fa fa-thumbs-o-up"></span> Votar
        </a>
        <a href="#" class="btn btn-hight btn-unvote hide">
            <span class="fa fa-thumbs-o-down"></span> No votar
        </a>

        <a href="{{ route('patterns.details', $pattern) }}">
            <span class="votes-count">{{ $pattern->voters()->count() }} votos</span>
            - <span class="comments-count">{{ $pattern->comments()->count() }} comentarios</span>.
        </a>
    </p>
    <p class="date-t">
        <span class="fa fa-clock-o"></span> {{ $pattern->created_at->format('d/m/y h:ia') }}
    </p>
</div>