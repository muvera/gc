@extends('layouts.master')
@section('content')


<form id="paypal_checkout" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart" />
<input type="hidden" name="upload" value="1" />			
<input type="hidden" name="no_note" value="0" />						
<input type="hidden" name="bn" value="PP-BuyNowBF" />					
<input type="hidden" name="tax" value="0" />			
<input type="hidden" name="rm" value="2" />



		<input type="hidden" name="business" value="muvera-facilator@gmail.com" />
		<!-- Handing amount is set here -->
       <input type="hidden"  value="1.99" />
       <input type="hidden" name="currency_code" value="USD" />
       <input type="hidden" name="lc" value="US" />
        <input type="hidden" name="invoice" value="{{rand(10,100)}}" />
       <input type="hidden" name="return" value="return url" />			
       <input type="hidden" name="cbt" value="Message" />
       <input type="hidden" name="cancel_return" value="cancell url" />
        <hr>
<h3>Your Items</h3>
       <!-- foreach loop starts -->
       <div id="item_1" class="itemwrap">
               <?php 
                   $sum = 0; 
                   $option_loop = 1; 
                   ?>
<div class="row">

        @foreach($items as $key => $product)
            <strong>Item Name:</strong> {{$product['name']}}
            <!-- product name -->
            <input type="hidden" name="item_name_{{$option_loop}}" value="{{$product['name']}}"/>

            <!-- Product Quantity -->
        <input type="hidden" name="quantity_{{$option_loop}}" value="1" />
            <strong>Qty: </strong>{{$option_loop}}
            <input type="hidden" name="tax_$option_loop" value="0.10" />
            <!-- Total Cost -->
            <input type="hidden" name="amount_{{$option_loop}}" value="{{$sum + 7.99}}" />
            <strong>Price: </strong>{{$sum + 7.99}}
<br>
<?php $option_loop++; ?>
@endforeach
</div>
            
            
            
         </div>
      <!--  foreach loop ends -->



<h4>Choose Shipping</h4>
<select name="handling_cart" class="form-control">
    <option value="9.99">$9.99 Priority 2 days</option>
  <option value="24.99">$24.99 Overnight</option>
   <option value="6.50">$6.50 Regular 5 day</option>
</select>


<br>




<button class="btn btn-success btn-block btn-lg" type="submit">Safe payments with Paypal</button>
</form>


@stop