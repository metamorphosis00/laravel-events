@extends('layouts.app')
@push('scripts')
<script>
    $('div#app img').each(function () {
        $(this).wrap($('<a/>', {
            href: $(this).attr('src'),
            class: "fancybox",
            rel: "app"
        }));
    });
</script>
@endpush
@section('content')
@if (isset($content))
{!! $content !!}
@else
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores at laudantium libero nihil porro provident qui tempore voluptates? Aut dolores facilis iste sunt voluptatum? Accusantium animi culpa delectus, exercitationem iste odit quae quaerat saepe voluptate voluptates. Adipisci alias animi, aspernatur assumenda excepturi ipsum non quibusdam sit veritatis voluptatibus. Accusantium, deleniti dolor dolores ea esse fugit optio provident quae quam quibusdam, quo repudiandae vero voluptates. Animi eligendi enim, officia pariatur quibusdam reiciendis rerum? Ab adipisci alias animi aspernatur beatae culpa dignissimos dolorem et explicabo, fugiat fugit harum in non officia pariatur quas qui quidem repellat sint suscipit tenetur totam velit, vitae. Adipisci amet distinctio dolor doloribus, earum eos ipsam sunt? Ipsa officiis soluta ullam vitae voluptas! Aut dicta ipsam molestias necessitatibus nulla odio quaerat vel. Facere iusto minus perferendis quam sequi. Architecto aspernatur commodi corporis delectus dignissimos eaque et impedit ipsam itaque minus molestias nemo non omnis, perspiciatis quibusdam quos suscipit tempora unde voluptates voluptatum? Accusamus animi, deleniti dicta dolore eius et eveniet exercitationem fugiat fugit illum ipsam itaque laudantium minus nam omnis perferendis provident quidem quisquam reiciendis sapiente similique soluta temporibus ut vitae voluptatibus! Ab adipisci amet assumenda autem beatae consectetur consequatur delectus ducimus eligendi facere facilis harum incidunt ipsam ipsum iste, iure libero maiores maxime minima modi molestias neque nobis nulla obcaecati odio odit optio perferendis possimus quaerat quasi quibusdam repellat sapiente sed tempore ullam ut velit. Accusantium consectetur dolor eveniet hic ipsam officia recusandae sit, sunt tempora temporibus. Beatae corporis ea ipsa magnam nemo quo rem soluta sunt.</p>
    <div class="row">
        <div class="col-md-3">
            <a data-fancybox="gallery" href="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"><img src="https://images.pexels.com/photos/853168/pexels-photo-853168.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="img-fluid"></a>
        </div>
        <div class="col-md-3">
            <a data-fancybox="gallery" href="https://www.denverpost.com/wp-content/uploads/2018/01/day_in_pictures_010818_001.jpg?w=910"><img src="https://www.denverpost.com/wp-content/uploads/2018/01/day_in_pictures_010818_001.jpg?w=910" class="img-fluid"></a>
        </div>
        <div class="col-md-3">
            <a data-fancybox="gallery" href="https://www.abc.net.au/news/image/11166726-3x2-940x627.jpg"><img src="https://www.abc.net.au/news/image/11166726-3x2-940x627.jpg" class="img-fluid"></a>
        </div>
        <div class="col-md-3">
            <a data-fancybox="gallery" href="https://www.abc.net.au/news/image/11096170-3x2-940x627.jpg"><img src="https://www.abc.net.au/news/image/11096170-3x2-940x627.jpg" class="img-fluid"></a>
        </div>
    </div>
@endif
@endsection
