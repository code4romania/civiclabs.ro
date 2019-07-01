<article class="column is-6-tablet is-4-desktop is-3-widescreen team-member">
    <a href="{{ route('team.show', ['member' => $item->slug ]) }}">
        @include('site.people.image', [
            'person'  => $item,
            'rounded' => false,
        ])
        <div class="content">
            <h5 class="title">{{ $item->name }}</h5>
            <p class="subtitle is-size-6">{{ $item->title }}</p>
        </div>
    </a>
</article>
