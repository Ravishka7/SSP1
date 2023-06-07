<x-app-layout>
<a href="{{url('create-product')}}"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Products</button>
</a>    

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Discount Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

        @php
         $i=1;
         @endphp

         @foreach($product as $p)




            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                     {{$p->product_names}}
                </th>
                <td class="px-6 py-4">
                     {{$p->product_price}}
                </td>
                <td class="px-6 py-4">
                     {{$p->discount_price}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{url('edit-product/'.$p->id)}}">edit</a>/<a href="{{url('delete-product/'.$p->id)}}">delete</a>
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>


</x-app-layout>