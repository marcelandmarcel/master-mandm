
@push('styles')
  <link href="/css/footer.css" rel="stylesheet">
@endpush

<footer class="text-muted marcel-footer">
  
  <div class="container">
    
    
        
      
    <div class="text-center">

      @include('layouts.social', ['url' => 'http://www.marcelandmarcel.com/'])
    
    </div>

  </div>

</footer>



@push('scripts')
<!--<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>-->
<script>

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>
@endpush

