<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="payment.css">

</head>
<body>
    <div class="rutecontent">
        <div class="chart1">
          
           <strong>Cart</strong>
          
       </div>

       <div class="chart2">
          
           <strong>Delivery Info</strong>
          
       </div>

       <div class="chart3">
          
           <strong>Payment</strong>
           
          
       </div>
          
       </div>

    <div class="cart-content columns">
           



        <div id="item-section" class="two-column border-right">
            <table class="table">
                <tbody><tr class="header">
                    <th colspan="3">Order Summary</th>
                </tr>
                
                <tr>
                  <td class="description">
                   
                    
        
                  </td>
                  <td class="quantity">
                    
                  </td>
                  <td class="text-align-right">
                  
                  </td>
                  
                </tr>
                
        
                
        
              
            </tbody></table>
            <table class="table summary">
                <tbody><tr>
                    <td>Subtotal</td>
                    <td class="text-align-right"></td>
                </tr>
                <tr>
                    <td>Delivery fee</td>
                    <td class="text-align-right"></td>
                </tr>
                <tr>
                    <td>PB1 10%</td>
                    <td class="text-align-right"></td>
                </tr>
                
                <tr>
                    <td>Delivery Surcharge</td>
                    <td class="text-align-right"></td>
                </tr>
                
                
                
                <tr class="grandtotal">
                    <td>TOTAL</td>
                    <td class="text-align-right">Rp. <span class="number"></span></td>
                </tr>
            </tbody></table>
        
            
        </div>
        
                   <div class="two-column">
                        <h2>Deliver To</h2>
                        <p>Jl. Jend. Sudirman No.117, Tengkerang Sel., Kec. Bukit Raya, Kota Pekanbaru, Riau 28156, Indonesia
        
        "di sebelah salon"</p>
                        
                        <form id="submit-form" action="/cart/submit" method="post" class="method">
                        <input type="hidden" name="csrfmiddlewaretoken" value="e7at9mSE6PTOt2MiWx34MRgNK4srjPKhmEDM0qvuHPNitNFhhydKScomvkMjXUct">
        
                        
        
                        <div class="amount payment_block">
                            <div class="promotion_code">
                                <div class="promo-code-applied hide">
                                    <img src="/static/website/img/PromoCode-icon.4c4aa1a0dd8e.svg">
                                    <span id="promo-code-applied"></span>
                                    <a href="#" id="remove-promotion-code" class="trash-icon">
                                        <img src="/static/website/img/cart-remove1x.2d89a8db571c.png" srcset="/static/website/img/cart-remove1x.2d89a8db571c.png,
                                                     /static/website/img/cart-remove2x.13ccd74dddd8.png 2x">
                                    </a>
                                </div>
                                <div class="no-promo-code">
                                    <div class="loading-promo hide">
                                        <img src="/static/website/img/BKLoading.9b5a6929e3c1.gif">
                                    </div>
                                    <a href="#" class="modal-open" id="apply-promotion" data-modal="modal-coupons">Apply Kupon / Promo Code</a>
                                </div>
                            </div>
                            <div class="grandtotal_wrapper">
                                 <div id="final-price" class="grandtotal final">Rp. <span class="number"></span></div>
                            </div>
                        </div>
                        <div class="promo-info"></div>
        
                        
                            <div class="amount" id="payment-method-layout">
                                <h2>Pay With</h2>
                                <div class="choices">
                                    
        
                                    
                                        <div class="list">
                                            <input type="radio" id="dana" value="5" name="method">
                                            <label class="choice" for="dana">
                                                <img src="/static/website/img/tick-orange1x.ca55a4d92e3f.png" class="tick-orange" srcset="/static/website/img/tick-orange1x.ca55a4d92e3f.png,
                                                            /static/website/img/tick-orange2x.cba8b404d905.png 2x">
                                                <img src="/static/website/img/DANA-logo1x.6fb8c465dc9f.png" class="payment-logo" srcset="/static/website/img/DANA-logo1x.6fb8c465dc9f.png,
                                                            /static/website/img/DANA-logo2x.75d886367436.png 2x">
                                            </label>
                                        </div>
                                    
        
                                    
                                        <div class="list">
                                            <input type="radio" id="ovo" value="6" name="method">
                                            <label class="choice" for="ovo">
                                                <img src="/static/website/img/tick-orange1x.ca55a4d92e3f.png" class="tick-orange" srcset="/static/website/img/tick-orange1x.ca55a4d92e3f.png,
                                                                                        /static/website/img/tick-orange2x.cba8b404d905.png 2x">
                                                <img src="/static/website/img/OVO.e12152c36de0.png" class="ovo-payment-logo" srcset="/static/website/img/OVO.e12152c36de0.png,
                                                            /static/website/img/OVO.e12152c36de0.png 2x">
                                            </label>
                                        </div>
                                    
        
                                    
                                        <div class="list">
                                            <input type="radio" id="gopay" value="2" name="method">
                                            <label class="choice" for="gopay">
                                                <img src="/static/website/img/tick-orange1x.ca55a4d92e3f.png" class="tick-orange" srcset="/static/website/img/tick-orange1x.ca55a4d92e3f.png,
                                                                                        /static/website/img/tick-orange2x.cba8b404d905.png 2x">
                                                <img src="/static/website/img/gopay.f42e2033836e.png" class="ovo-payment-logo" srcset="/static/website/img/gopay.f42e2033836e.png,
                                                            /static/website/img/gopay.f42e2033836e.png 2x">
                                            </label>
                                        </div>
                                    
        
                                    
                                        <div class="list">
                                            <input type="radio" id="bca_va" value="9" name="method">
                                            <label class="choice" for="bca_va">
                                                <img src="/static/website/img/tick-orange1x.ca55a4d92e3f.png" class="tick-orange" srcset="/static/website/img/tick-orange1x.ca55a4d92e3f.png,
                                                                                        /static/website/img/tick-orange2x.cba8b404d905.png 2x">
                                                <img src="/static/website/img/BCA-payment-1x.e62c2bd787eb.png" class="ovo-payment-logo" srcset="/static/website/img/BCA-payment-1x.e62c2bd787eb.png,
                                                            /static/website/img/BCA-payment-2x.0021d0e186dc.png 2x">
                                            </label>
                                        </div>
                                    
        
                                    
        
                                    
                                </div>
                            </div>
                        
        
                        
                            <div class="phone-number hide">
                                <h2>Your OVO Mobile Number</h2>
                                <div class="input-phone-code">
                                    <span class="code">+62</span>
                                    <input type="tel" name="mobile_number" placeholder="Mobile Number" value="" id="id_mobile_number">
                                </div>
                            </div>
                        
                        
                            <div class="spacer-top">
                                <div class="tender_amount_wrapper hide">
                                    <input type="text" name="expected_tender_amount" id="tender_amount_display" placeholder="I will pay ...">
                                    <span>Rp. 15000</span> 
                                </div>
                                <button type="submit" class="button button-submit order">
                                    Place My Order
                                </button>
                            </div>
                        
                        </form>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="modal modal-coupon modal-coupon-index" id="modal-coupons">
                    <div class="modal-content">
                        <button class="modal-close">
                            <img src="/static/website/img/x-close-2x.a83e0b2ad3aa.png">
                        </button>
                        <h1 class="header">Use Coupon or Promo Code</h1>
                        <input id="promotion-code" type="text" placeholder="Masukkan Kode Promo" class="code-input">
                        
                        <div class="coupons">
                            
                        </div>
                    </div>
                </div>
               