<x-app-layout>

<!-- component -->
<style>
    .input {
        transition: border 0.2s ease-in-out;
        min-width: 280px
    }

    .input:focus+.label,
    .input:active+.label,
    .input.filled+.label {
        font-size: .75rem;
        transition: all 0.2s ease-out;
        top: -0.1rem;
        color: #667eea;
    }

    .label {
        transition: all 0.2s ease-out;
        top: 0.4rem;
      	left: 0;
    }
</style>

<form method="post" action="{{url('update-product')}}">
    @csrf
    <input type="hidden" name="id" value="{{$product->id}}">
<div class="shadow-xl p-10 bg-white max-w-xl rounded">
    <h1 class="text-4xl font-black mb-4">Edit Product</h1>
    <div class="mb-4 relative">
    <h2>
      Product Name
    </h2>
        <input type="text" value="{{$product->product_names}}" name="product_names" id="product_names" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Product Names" required>
    </div>
    <div class="mb-4 relative">
    <h2>
      Product Price
    </h2>
        <input type="text" value="{{$product->product_price}}" name="product_price" id="product_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Price" required>
    </div>
    <div class="mb-4 relative">
    <h2>
      Discount
    </h2>
        <input type="text" value="{{$product->discount_price}}" name="discount_price" id="discount_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Discount" required>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Apply Changes</button>
  <a href="{{url('/redirect')}}"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Proceed</button></a>
</div>

<form>


<script>
    var toggleInputContainer = function (input) {
        if (input.value != "") {
            input.classList.add('filled');
        } else {
            input.classList.remove('filled');
        }
    }

    var labels = document.querySelectorAll('.label');
    for (var i = 0; i < labels.length; i++) {
        labels[i].addEventListener('click', function () {
            this.previousElementSibling.focus();
        });
    }

    window.addEventListener("load", function () {
        var inputs = document.getElementsByClassName("input");
        for (var i = 0; i < inputs.length; i++) {
            console.log('looped');
            inputs[i].addEventListener('keyup', function () {
                toggleInputContainer(this);
            });
            toggleInputContainer(inputs[i]);
        }
    });
</script>

</x-app-layout>