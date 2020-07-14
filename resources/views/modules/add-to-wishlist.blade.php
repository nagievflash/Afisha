@php
    if(Auth::check()) {
        $check = Auth::user()->wishlist()->where('event_id', '=', $event_id)->get()->count();
    }
    else $check = 0;
@endphp
<a @guest href="/login" @endguest class="add-to-wishlist @if($check > 0) added @endif" data-id="{{$event_id}}" title="Добавить в избранное" onclick="addToWishlist({{$event_id}});">@include('assets.wishlist-outline')</a>
<script>

function addToWishlist(e){
    var id = e;

    $.ajax({
        url: '/wishlist',
        type: 'post',
        data: {
            event_id : id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data == 200) {
                $('.add-to-wishlist[data-id="' + id + '"]').addClass('added');
                var wishlistCount =  parseInt($('.header-top-icons .wishlist-icon span').text())
                $('.header-top-icons .wishlist-icon span').text(wishlistCount + 1)

            }
            if (data == 23000) {
                $('.add-to-wishlist[data-id="' + id + '"]').removeClass('added');
                var wishlistCount =  parseInt($('.header-top-icons .wishlist-icon span').text())
                $('.header-top-icons .wishlist-icon span').text(wishlistCount - 1)
            }
        },

    }).done(function(data){

    })
}
</script>
