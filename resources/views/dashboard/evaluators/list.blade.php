<section class="section">
    <div class="container">
        <header class="section is-slim">
            <h1 class="title">{{ __('dashboard.jury.title') }}</h1>
        </header>

        <div class="columns is-multiline">
            @foreach ($evaluators as $evaluator)
                <div class="column is-6-tablet is-4-desktop">
                    <div class="card">
                        <div class="card-content">
                            <div class="block">
                                <p class="title is-size-5">{{ $evaluator->name }}</p>
                                <p class="subtitle is-size-7 has-text-grey">{{ $evaluator->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
