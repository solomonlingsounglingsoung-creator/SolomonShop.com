@extends('layouts.front')
@section('content')
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Bike Shop</h1>
                <p class="lead fw-normal text-white-50 mb-0">
                    Welcome to our bike shop! Explore our wide range of bikes and accessories.
                </p>
            </div>
        </div>
    </header>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                @foreach($items as $item)

                <div class="col mb-5">
                    <div class="card h-100">

                        <!-- Discount Badge -->
                        @if($item->discount > 0)
                            <div class="badge bg-danger text-white position-absolute"
                                 style="top: 0.5rem; right: 0.5rem;">
                                {{ $item->discount }}% OFF
                            </div>
                        @endif
                        <!-- Product image-->
                        <img class="card-img-top"
                             src="{{ asset($item->image) }}"
                             alt="{{ $item->name }}" />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">
                                    {{ $item->name }}
                                </h5>
                                <!-- Product price-->
                                @if($item->discount > 0)
                                    <span class="text-muted text-decoration-line-through">
                                        {{ number_format($item->price) }} MMK
                                    </span>
                                    <span class="text-danger fw-bold">
                                        {{ number_format($item->price - ($item->price * $item->discount / 100)) }} MMK
                                    </span>
                                @else
                                    {{ number_format($item->price) }} MMK
                                @endif
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="d-flex justify-content-between align-items-center">

                                <a class="btn btn-sm btn-outline-dark"
                                   href="{{ route('shop-item', $item->id) }}">
                                    Details
                                </a>

                                <input type="hidden" class="qty" value="1">

                                <button type="button"
                                        class="btn btn-sm btn-dark addToCart"
                                        data-id="{{ $item->id }}"
                                        data-name="{{ $item->name }}"
                                        data-price="{{ $item->price }}"
                                        data-discount="{{ $item->discount ?? 0 }}"
                                        data-image="{{ asset($item->image) }}">

                                    Add To Cart

                                </button>

                            </div>
                        </div>

                    </div>
                </div>
                

                @endforeach

            </div>

            {{ $items->links() }}

        </div>
    </section>
@endsection