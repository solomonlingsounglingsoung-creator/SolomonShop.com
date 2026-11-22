
@extends('layouts.front')

@section('title', 'My Shopping Cart')

@section('content')

<div class="container my-5 py-4">

    <h3 class="text-center mb-4 fw-bold">My Shopping Cart</h3>

    <!-- CART TABLE -->
    <div class="table-responsive">

        <table class="table align-middle">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Item Image</th>
                    <th>Item Price</th>
                    <th>Discount</th>
                    <th>Qty</th>
                    <th>Amount</th>
                </tr>
            </thead>

            <tbody id="cart-body">
                <tr>
                    <td colspan="7" class="text-center">
                        Loading cart...
                    </td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="6" class="text-end fw-bold">
                        Total
                    </td>
                    <td class="fw-bold" id="cart-total">
                        0 MMK
                    </td>
                </tr>
            </tfoot>

        </table>

    </div>

    <!-- PAYMENT FORM -->
    <div class="mt-4">

        @guest

            <a href="{{ route('login') }}" class="btn btn-primary w-100">
                Login to Order
            </a>

        @else

            <form action="{{ route('orderNow') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="paymentForm">

                @csrf

                <input type="hidden" name="data" id="cart-data">

                <div class="row">

                    <!-- PAYMENT SLIP -->
                    <div class="col-md-6 mb-2">

                        <label for="payment_slip" class="form-label">
                            Payment Slip
                        </label>

                        <input type="file"
                               class="form-control"
                               name="payment_slip"
                               id="payment_slip"
                               accept="image/*"
                               required>

                    </div>

                    <!-- PAYMENT METHOD -->
                    <div class="col-md-6 mb-2">

                        <label for="payment_method" class="form-label">
                            Payment Method
                        </label>

                        <select class="form-select"
                                name="payment_method"
                                id="payment_method"
                                required>

                            <option value="">Choose Payment Method</option>

                            @foreach($payments as $payment)

                                <option value="{{ $payment->id }}">
                                    {{ $payment->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- CUSTOMER ADDRESS -->
                    <div class="col-12 mb-3">

                        <label for="address" class="form-label">
                            Customer Address
                        </label>

                        <input type="text"
                               class="form-control"
                               name="note"
                               id="address"
                               placeholder="Enter your address"
                               required>

                    </div>

                </div>

                <button type="submit"
                        class="btn btn-success w-100"
                        id="order-now">

                    Order Now

                </button>

            </form>

        @endguest

    </div>

</div>

@endsection


@section('styles')

<style>

    .table {
        background: white;
        border-radius: 5px;
    }

    .table thead th {
        font-size: 14px;
        white-space: nowrap;
    }

    .table tbody td {
        font-size: 13px;
        vertical-align: middle;
    }

    .cart-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
    }

    .quantity-btn {
        width: 28px;
        height: 28px;
        padding: 0;
        border: 1px solid #ccc;
        background: white;
        border-radius: 4px;
    }

    .quantity-btn:hover {
        background: #087cff;
        color: white;
    }

    .quantity-number {
        display: inline-block;
        min-width: 22px;
        text-align: center;
    }

    .empty-cart {
        padding: 30px;
        text-align: center;
        color: #777;
    }

</style>

@endsection


@section('scripts')

<script>

$(document).ready(function () {

    // GET CART DATA
    function getCartItems() {

        try {

            let items = JSON.parse(localStorage.getItem('shops') || '[]');

            return Array.isArray(items) ? items : [];

        } catch (error) {

            console.error('Cart data error:', error);

            return [];

        }

    }


    // SAVE CART DATA
    function saveCartItems(items) {

        localStorage.setItem('shops', JSON.stringify(items));

    }


    // FORMAT PRICE
    function formatPrice(price) {

        return Number(price).toLocaleString('en-US');

    }


    // UPDATE NAVBAR COUNT
    function updateCount() {

        let items = getCartItems();

        let totalQty = 0;

        $.each(items, function (i, item) {

            totalQty += Number(item.qty) || 0;

        });

        $('#item-count').text(totalQty);

    }


    // DISPLAY CART ITEMS
    function getData() {

        let items = getCartItems();

        let data = '';

        let total = 0;

        if (items.length === 0) {

            data = `
                <tr>
                    <td colspan="7" class="empty-cart">
                        <h5>Your Shopping Cart is Empty</h5>
                        <a href="{{ route('shop') }}"
                           class="btn btn-primary mt-2">
                            Continue Shopping
                        </a>
                    </td>
                </tr>
            `;

            $('#cart-body').html(data);

            $('#cart-total').text('0 MMK');

            updateCount();

            return;

        }


        $.each(items, function (i, item) {

            let price = Number(item.price) || 0;

            let discount = Number(item.discount) || 0;

            let qty = Number(item.qty) || 1;

            let finalPrice = price - (price * discount / 100);

            let amount = Math.round(finalPrice * qty);

            total += amount;


            data += `
                <tr>

                    <td>${i + 1}</td>

                    <td>${$('<div>').text(item.name || '').html()}</td>

                    <td>
                        <img src="${item.image || ''}"
                             class="cart-image"
                             alt="Product">
                    </td>

                    <td>
                        ${formatPrice(price)} MMK
                    </td>

                    <td>
                        ${discount}%
                    </td>

                    <td class="text-nowrap">

                        <button type="button"
                                class="quantity-btn minus"
                                data-key="${i}">
                            -
                        </button>

                        <span class="quantity-number">
                            ${qty}
                        </span>

                        <button type="button"
                                class="quantity-btn plus"
                                data-key="${i}">
                            +
                        </button>

                    </td>

                    <td>
                        ${formatPrice(amount)} MMK
                    </td>

                </tr>
            `;

        });


        $('#cart-body').html(data);

        $('#cart-total').text(formatPrice(total) + ' MMK');

        updateCount();

    }


    // DECREASE QUANTITY
    $('#cart-body').on('click', '.minus', function () {

        let key = Number($(this).data('key'));

        let items = getCartItems();

        if (!items[key]) return;

        items[key].qty = Number(items[key].qty) - 1;

        if (items[key].qty <= 0) {

            let answer = confirm('Are you sure you want to remove this item?');

            if (answer) {

                items.splice(key, 1);

            } else {

                items[key].qty = 1;

            }

        }

        saveCartItems(items);

        getData();

    });


    // INCREASE QUANTITY
    $('#cart-body').on('click', '.plus', function () {

        let key = Number($(this).data('key'));

        let items = getCartItems();

        if (!items[key]) return;

        items[key].qty = Number(items[key].qty) + 1;

        saveCartItems(items);

        getData();

    });


    // ORDER SUBMIT
    $('#paymentForm').on('submit', function (e) {

        let items = getCartItems();

        if (items.length === 0) {

            e.preventDefault();

            alert('Your shopping cart is empty!');

            return;

        }

        $('#cart-data').val(JSON.stringify(items));

    });


    // INITIAL DISPLAY
    getData();

});

</script>

@endsection
