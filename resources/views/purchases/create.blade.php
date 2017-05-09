<form action="/purchases" method="POST">

{{ csrf_filed() }}

  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="{{ config ('services.stripe.key') }}"
    data-amount="999"
    data-name="Marcel&marcel"
    data-description="Widget"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-zip-code="true"
    data-currency="eur">
  </script>


</form>