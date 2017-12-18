
<div id="container" class= "wrapper" ><!--  repeat-x #000 -->
    <header id="kasou_header">
        <div class="h-logo" style="">
            <a href="{{ url('/') }}" ><img src="{{ $logo_url }}" style="height: 78px; " ></a>
        </div>
        <div class="cart-icon"  style=" ">
             <a href="{{ url('/my-cart') }}">
                @if($total['tquantity'] >0 )
                    <span>{{ $total['tquantity'] }}</span>
                @endif
                <img src="{{URL::asset('/ecm/img/cart_icon.png')}}"> </a>
             <p><a href="{{ url('/my-cart') }}">カートを見る</a></p>
        </div>

        <div class="h-fax">
            <p>FAXでのご注文・お問い合わせ   <br>  0120-55-3103  <br> <a href="{{ url('/downloadFax') }}"> FAX注文用紙ダウンロード </a></p>
        </div>

<!--        <div class="sumary">
            <p>Total Item : {{ $total['tquantity'] }} </p>
            <p>Total Price: {{ $total['tprice'] }} </p>
        </div> -->

        <nav id="kasou_nav" class="desktop-menu">
             <ul class="mainnav">
                        <li><a href="{{ url('/') }}">
                                @foreach($menu as $m)
                                    @if($m->id == 1)
                                    {{ $m->menu_title}}
                                    @endif      
                                @endforeach
                            </a>
                        </li>
                        <li ><a @if(Request::path() == 'about-us') style="color: #E0B338;" @endif href="{{ url('/about-us') }}">
                                 @foreach($menu as $m)
                                    @if($m->id == 2)
                                    {{ $m->menu_title}}
                                    @endif      
                                @endforeach
                            </a>
                        </li>

                        <li class="hassubs">
                            <a @if(Request::path() == 'catagory/0') style="color: #E0B338;" @endif href="{{ url('/catagory/0') }}">
                                @foreach($menu as $m)
                                    @if($m->id == 3)
                                    {{ $m->menu_title}}
                                    @endif      
                                @endforeach
                            </a>
                            <ul class="dropdown">
                                @foreach($catagory as $cat)
                                    @if($cat->id != 0 )
                                    <li class="subs hassubs">
                                        <a href="{{ url('/catagory/'.$cat->id )}}">{{ $cat->catagory_title}} </a> 
                                        <ul class="dropdown">
                                            @foreach($product as $pro)
                                                @if($cat->id == $pro->catagory_id)
                                                <li class="subs"><a href="{{ url('/pro-details/'.$pro->id) }}">{{ $pro->product_title }}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>

                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>           

                        <li><a  @if(Request::path() == 'contact') style="color: #E0B338;" @endif href="{{ url('/contact') }}">
                                @foreach($menu as $m)
                                    @if($m->id == 4)
                                    {{ $m->menu_title}}
                                    @endif      
                                @endforeach                            
                            </a>
                        </li>
                        <li><a href="{{ url('/user/panel') }}">
                                @foreach($menu as $m)
                                    @if($m->id == 5)
                                    {{ $m->menu_title}}
                                    @endif      
                                @endforeach                            
                            </a>
                        </li>

                        <li><a href="{{ url('/my-cart') }}">
                                @foreach($menu as $m)
                                    @if($m->id == 6)
                                    {{ $m->menu_title}}
                                    @endif      
                                @endforeach  
                                <span style="color: red; padding: 5px; background:#fff;border-radius: 10px;  ">{{ $total['tquantity'] }}</span>                          
                            </a>
                        </li>
                    </ul>
                    <br style="clear: both;">
        </nav>
    </header>
    <nav id="menu" class="mobile-menu">
        <label for="tm" id="toggle-menu">
            <span class="drop-icon" style="transform: rotate(90deg); margin-top: -9px; right: -14px;">|||</span>
        </label>
        <input type="checkbox" id="tm">
        <ul class="main-menu cf">
            <li>
                <a href="{{ url('/') }}">
                      @foreach($menu as $m)
                          @if($m->id == 1)
                          {{ $m->menu_title}}
                          @endif      
                      @endforeach
                </a>
            </li>
            <li >
                <a @if(Request::path() == 'about-us') style="color: #E0B338;" @endif href="{{ url('/about-us') }}">
                       @foreach($menu as $m)
                          @if($m->id == 2)
                          {{ $m->menu_title}}
                          @endif      
                      @endforeach
                </a>
            </li>
            <li>
                <a @if(Request::path() == 'catagory/0') style="color: #E0B338;" @endif href="{{ url('/catagory/0') }}">
                    @foreach($menu as $m)
                        @if($m->id == 3)
                        {{ $m->menu_title}}
                        @endif      
                    @endforeach
                  <span class="drop-icon">▾</span>
                  <label title="Toggle Drop-down" class="drop-icon drop-icon-on-bar" for="sm1">▾</label>
                </a>
                <input type="checkbox" id="sm1">
                <ul class="sub-menu">
                    @foreach($catagory as $k=>$cat)
                        @if($cat->id != 0 )                    
                        <li>
                            <a href="{{ url('/catagory/'.$cat->id )}}">{{ $cat->catagory_title}}
                              <span class="drop-icon">▸</span>
                              <label title="Toggle Drop-down" class="drop-icon drop-icon-on-bar" for="sm{{$k+1}}">▾</label>
                            </a>
                            <input type="checkbox" id="sm{{$k+1}}">
                            <ul class="sub-menu">
                              @foreach($product as $pro)
                                  @if($cat->id == $pro->catagory_id)
                                  <li><a href="{{ url('/pro-details/'.$pro->id) }}">{{ $pro->product_title }}</a></li>
                                  @endif
                              @endforeach                                  
                            </ul>
                        </li>
                        @endif
                    @endforeach                      
                </ul>                  
            </li>             
            <li >
                <a  @if(Request::path() == 'contact') style="color: #E0B338;" @endif href="{{ url('/contact') }}">
                    @foreach($menu as $m)
                        @if($m->id == 4)
                        {{ $m->menu_title}}
                        @endif      
                    @endforeach                            
                </a>
            </li> 
            <li >
                <a href="{{ url('/user/panel') }}">
                    @foreach($menu as $m)
                        @if($m->id == 5)
                        {{ $m->menu_title}}
                        @endif      
                    @endforeach                            
                </a>
            </li> 
<!--                 <li >
                <a href="{{ url('/my-cart') }}">
                    @foreach($menu as $m)
                        @if($m->id == 6)
                        {{ $m->menu_title}}
                        @endif      
                    @endforeach  
                    <span style="color: red; padding: 5px; background:#fff;border-radius: 10px;  ">{{ $total['tquantity'] }}</span>                          
                </a>
            </li>  -->               
        </ul>
    </nav>  
</div>  
<script type="text/javascript">
    $(".drop-icon-on-bar").click(function() {
        $(this).toggleClass('drop-down-icon-rotate');
    });
</script>