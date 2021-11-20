<div>
    <div class="col s12">
        @php
            $row_count = 0
        @endphp
        @foreach ($productos as $product)
        @if($row_count == 0)
            <div class="row">
        @endif
            <div class="col s4">
                    <div class="card horizontal small light-green lighten-5">
                        <div class="card-image">
                            <img src="{{asset('images/' . $product->IMG_PATH)}}" alt="">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <span class="card-title">
                                    @foreach($types as $type)
                                        @if ($type->id == $product->TIPO_ID)
                                            {{$type->TIPO_NAME}}
                                        @endif
                                    @endforeach
                                </span>
                                <p>precio:{{$product->PROD_PRICE}}</p>
                                <p>cantidad disponible: {{$product->PROD_AMMOUNT}}</p>
                            </div>
                            <div class="card-action light-green">
                                <a href="" class="btn btn-flat white deep-orange-text">buy</a>
                            </div>
                        </div>
                    </div>
                </div>
        @if($row_count == 3)
        </div>
        @endif
        @php
            $row_count += 1;
            if($row_count == 3){
                $row_count = 0;
            }
        @endphp
        @endforeach
    </div>
</div>
