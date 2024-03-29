@extends('site.layouts.app')

@section('content')
<div class="text-center">
    <a href="{{route('admin.index')}} " class="btn btn-dark"> <i class="fas fa-backward"></i> HOME </a>
    <h1 class="title-plan">Escolha o plano!</h1>
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