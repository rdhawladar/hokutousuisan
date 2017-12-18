<html>
<head>
  <title>My Payment Form</title>
  <!-- link to the SqPaymentForm library -->
  <script type="text/javascript" src="https://js.squareup.com/v2/paymentform"></script>

  <!-- link to the local SqPaymentForm initialization -->
  <script type="text/javascript" src="{{ URL::asset('square/sqpaymentform.js') }}"></script>

  <!-- link to the custom styles for SqPaymentForm -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('square/sqpaymentform.css') }}">
</head>
<body>

  <div id="sq-ccbox">
    <!--
      You should replace the action attribute of the form with the path of
      the URL you want to POST the nonce to (for example, "/process-card")
    -->
    <form id="nonce-form" novalidate action="{{ url('/payment-process-card') }}" method="post">
		{{ csrf_field() }}
	  
	  <h4> Square Payment API with a Credit Card</h4>
      <table>
      <tbody>
        <tr>
          <td>Card Number:</td>
          <td><div id="sq-card-number"></div></td>
        </tr>
        <tr>
          <td>CVV:</td>
          <td><div id="sq-cvv"></div></td>
        </tr>
        <tr>
          <td>Expiration Date: </td>
          <td><div id="sq-expiration-date"></div></td>
        </tr>
        <tr>
          <td>Postal Code:</td>
          <td><div id="sq-postal-code"></div></td>
        </tr>
        <tr>
          <td colspan="1"></td>
          <td >

          </td>
        </tr>
      </tbody>
      </table>
            <button id="sq-creditcard" class="button-credit-card" onclick="requestCardNonce(event)" style="margin-left: 20px;">
              Pay with card
            </button>
      <!--
        After a nonce is generated it will be assigned to this hidden input field.
      -->
      <input type="hidden" id="card-nonce" name="nonce">
    </form>
  </div>

<!--   <div id="sq-walletbox">
    Pay with a Digital Wallet
    <div id="sq-apple-pay-label" class="wallet-not-enabled">Apple Pay for Web not enabled</div>
    <button id="sq-apple-pay" class="button-apple-pay"></button>

    <div id="sq-masterpass-label" class="wallet-not-enabled">Masterpass not enabled</div>
    <button id="sq-masterpass" class="button-masterpass"></button>
  </div> -->

</body>
</html>