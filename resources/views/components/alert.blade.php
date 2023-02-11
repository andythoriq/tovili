@if (session()->has('success'))
    <div class="alert alert-success rounded-0 alert-dismissible" role="alert">
        {{ $slot ?? '' }} : <?=  session()->get('success')  ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session()->has('warning'))
    <div class="alert alert-warning rounded-0 alert-dismissible" role="alert">
        {{ $slot ?? '' }} : <?=  session()->get('warning')  ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session()->has('info'))
    <div class="alert-info rounded-0 alert-dismissible" role="alert">
        {{ $slot ?? '' }} : <?=  session()->get('info')  ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
