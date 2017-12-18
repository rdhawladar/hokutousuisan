
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
                            <li ><a @if(Request::path() == 'about-us') style="color: #E0B338;" @endif href="#">
                                     @foreach($menu as $m)
                                        @if($m->id == 2)
                                        {{ $m->menu_title}}
                                        @endif      
                                    @endforeach
                                </a>
                            </li>

                            <!-- dynamic catagory menu start -->
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

                            <!-- //dynamic catagory menu ends  -->        

                            <li>
                                <a  @if(Request::path() == 'contact') style="color: #E0B338;" @endif href="{{ url('/contact') }}">
                                    @foreach($menu as $m)
                                        @if($m->id == 4)
                                        {{ $m->menu_title}}
                                        @endif      
                                    @endforeach                            
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/user/panel') }}">
                                    @foreach($menu as $m)
                                        @if($m->id == 5)
                                        {{ $m->menu_title}}
                                        @endif      
                                    @endforeach                            
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/my-cart') }}">
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
            </nav><!-- Gナビ部分ここまで -->