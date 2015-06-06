@extends('layouts.master')
@section('content')
<h1>Checkout</h1>

<?php
$invoice = rand(10,10000);
?>

<form id="paypal_checkout" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart" />
<input type="hidden" name="upload" value="0" />
<input type="hidden" name="no_note" value="0" />
<input type="hidden" name="bn" value="PP-BuyNowBF" />
<input type="hidden" name="tax" value="0" />
<input type="hidden" name="rm" value="2" />



<input type="hidden" name="business" value="muvera-facilitator@gmail.com" />
<!-- Handing amount is set here -->
       <input type="hidden"  value="1.99" />
       <input type="hidden" name="currency_code" value="USD" />
       <input type="hidden" name="lc" value="US" />
        <input type="hidden" name="invoice" value="GC_{{$invoice}}" />
       <input type="hidden" name="return" value="http://gogocake.com/return_url/GC{{$invoice}}" />
       <input type="hidden" name="cbt" value="Click here to COMPLETE ORDER" />
       <input type="hidden" name="cancel_return" value="http://gogocake.com" />
        <hr>
<h3>{{count(Session::get('items'))}}Items</h3>
       <!-- foreach loop starts -->
       <div id="item_1" class="itemwrap">
               <?php 
                   $sum = 0; 
                   $option_loop = 1; 
                   ?>
<div class="row">

        @foreach($items as $key => $product)

    <img src="{{$product['preview']}}" alt="{{$product['name']}}" class="img-responsive thumbnail" width="500">

<strong>Item Name:</strong> {{$product['name']}}
            <!-- product name -->
<input type="hidden" name="item_name_{{$option_loop}}" value="{{$product['name']}}"/>

<br>
<strong>Custom Text </strong> <input name="on1_{{$option_loop}}" type="text" value="{{$product['greetings']}}">
<input name="os1_{{$option_loop}}" type="hidden" value="{{$product['preview']}}">

            <!-- Product Quantity -->
        <input type="hidden" name="quantity_{{$option_loop}}" value="1" />
            <strong>Qty: </strong>{{$option_loop}}
            <input type="hidden" name="tax_{{$option_loop}}" value="0.79" />
            <!-- Total Cost -->
            <input type="hidden" name="amount_{{$option_loop}}" value="{{$sum + 7.99}}" />
            <strong>Price: </strong>{{$sum + 7.99}}
<br>
<?php $option_loop++; ?>
@endforeach
</div>
               
         </div>
      <!--  foreach loop ends -->

<h4> <span class="glyphicon glyphicon-plane"></span> Select Shipping</h4>
<select name="handling_cart" class="form-control">
    <option value="9.99">$9.99 Priority 2 days</option>
  <option value="24.99">$24.99 Overnight</option>
   <option value="6.50">$6.50 Regular 5 day</option>
</select>
<br>
<button class="btn btn-success btn-block btn-lg" type="submit"> <span class="glyphicon glyphicon-credit-card"></span> Safe payments with Paypal</button>
<a href="/delete_items" class="btn btn-default"> <span class="glyphicon glyphicon-trash"></span> Delete Items</a>
</form>


@stop