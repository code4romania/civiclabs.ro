@php
    $orderedList = $block->browserIds('byproducts');
    $byproducts = App\Models\Byproduct::find($orderedList)->sortBy(function ($i) use ($orderedList) {
        return array_search($i->getKey(), $orderedList);
    });;
    $profilePage = $profilePage ?? false;
@endphp

@foreach ($byproducts as $item)
    @include('site.byproducts.loop')
@endforeach
