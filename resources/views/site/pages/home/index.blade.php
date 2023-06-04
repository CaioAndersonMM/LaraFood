@extends('site.layouts.app')

@section('content')
<style>
    body{
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 3%, rgba(255,0,0,1) 35%, rgb(255, 98, 98) 100%);
    }
    h1{
        font-family: 'Lato', sans-serif;
        text-align: center;
        font-size: 4em;
        color: #B63132;
        margin: 26px 0;
        color: white;
    }
    .btn-dark {
        margin-top: 10px;
    color: #fff;
    background-color: #c408089f;
    border-color: #343a407a;
    box-shadow: 5px 5px #131212;
}
</style>
<div class="text-center">
    <a href="{{route('admin.index')}} " class="btn btn-dark"> Ir para a Home! </a>
    <h1>Escolha o plano!</h1>
    <br>
</div>
<div class="row">
    @foreach ($plans as $plan)
        
    <div class="col-md-4 col-sm-6">
        <div class="pricingTable">
            <div class="pricing-content">
                <div class="pricingTable-header">
                    <h3 class="title">{{ $plan->name }}</h3>
                </div>
                <div class="inner-content">
                    <div class="price-value">
                        <span class="currency">R$</span>
                        <span class="amount">{{ number_format($plan->price, 2, ',', '.') }}</span>
                        <span class="duration">Por Mês</span>
                    </div>
                    <ul>
                    @foreach ($plan->details as $detail )
                        <li>{{ $detail->name }}</li>
                    @endforeach
                </ul>
                </div>
            </div>
            <div class="pricingTable-signup">
                <a href="{{ route('plan.subscription', $plan->id) }}">Assinar</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection