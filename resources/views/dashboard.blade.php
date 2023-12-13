
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="body">
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{-- {{ __("You're logged in!") }} --}}
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                        Add ToDo List
                      </button>
                </div>
                <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    What do you have to do?
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" 
                                data-modal-toggle ="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form id="todo-form" class="p-4 md:p-5">
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type to do here" required="">
                                    </div>
                                    {{-- <div class="col-span-2 sm:col-span-1">
                                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
                                    </div> --}}
                                    <div class="col-span-2 sm:col-span-1">
                                        @php $categories = ['Urgent', 'Medium', 'Chillax'] @endphp
                                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                        <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500" name="category" required>
                                            <option value="">Select category</option>
                                        @foreach($categories as $category)
                                            <option value={{ $category }}>{{  $category }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes</label>
                                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here" name="notes"></textarea>                    
                                    </div>
                                    <div class="col-span-2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                                    </div>
                                    <div class="col-span-2">
                                        <div>
                                            <input id="remind_me" type="checkbox" value="1" name="remind_me" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="remind_me" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remind me</label>
                                        </div>
                                    </div>
                                    <div class="relative max-w-sm sm:col-span-1">
                                        <input name="reminder_date" id="reminder_date" type="date" style="display: none" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                    </div>
                                    <div class="relative max-w-sm sm:col-span-1">
                                      <input name="reminder_time" id="reminder_time" type="time" style="display: none" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select time">
                                    </div>
                                </div>
                                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 submit-form" id="create_new">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                    Add list
                                </button>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <!-- LIST SECTION -->
    <div class="container px-4">
        <div id="userListsContainer" class="py-6 grid grid-cols-4 gap-4" >
            @foreach($data ?? null as $item )
            @php
                $colour = $item->status  === 'ongoing' ? 'rgb(8 47 73)' : '';
            @endphp
                <div style="background-color: {{ $colour }}" class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->title ?? '-' }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->notes ?? '-' }}</p>
                    <div class="flex gap-4">
                        <button  data-modal-target="edit-modal" data-modal-toggle="edit-modal" data-item-id={{ $item->id ?? null}} type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4  focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="outline: 2px solid black">
                            Edit list
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </button>
                        {{-- <button  type="button" data-id ='{{ $item->id }}' class="text-white bg-blue-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 delete-item">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>                          
                            <span class="sr-only">Icon description</span>
                        </button> --}}
                        @include('delete')
                    </div>
                </div>
            @endforeach
            @include('edit_list')
        </div>
    </div>
    <!-- LIST SECTION -->
   
</div>
</x-app-layout>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>


<script>
    const remind_me = document.getElementById('remind_me');
    const input_reminder_date = document.getElementById('reminder_date');
    const input_reminder_time = document.getElementById('reminder_time');

    remind_me.addEventListener('change', function() {
        if (this.checked) {
            input_reminder_date.style.display = 'block';
            input_reminder_time.style.display = 'block';
        } else {
            input_reminder_date.style.display = 'none';
            input_reminder_time.style.display = 'none';
        }
    });



    $('[data-modal-target="edit-modal"]').click(function() {
            var itemId = $(this).data('item-id'); 
            console.log(itemId);
            $.ajax({
                url: '/get_list',
                type: 'GET',
                dataType: 'json',
                data: { id:itemId },
                success: function(response) {

                    var userLists = response.user_lists;
                    var name = userLists['title'];
                    var id = userLists['id'];
                    var notes = userLists['notes'];
                    var type = userLists['type'];

                    $('#edit-modal input[name="list_id"]').val(id); // Set the ID value to a hidden input field in the edit modal
                    $('#edit-modal input[name="name"]').val(name); // Set the Name value to the name input field in the edit modal
                    $('#edit-modal textarea[name="notes"]').val(notes);
                    $('#edit-modal select[name="category"]').val(type);
                    
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        });

        $('#edit-form').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get CSRF token value
            var csrfToken = "{{ csrf_token() }}";
            var closeEdit = document.getElementById('close-edit');

            // Collect form data
            var formData = $(this).serialize();
            formData += '&type=edit';
            // Make AJAX request with CSRF token included in headers
            $.ajax({
                type: 'POST',
                url: '/dashboard/upsert',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                dataType: 'json',
                success: function(response) {
                    // Handle success response
                    // Close the modal
                    // $('[data-modal-toggle="edit-modal"]').click();
                    // $('[data-modal-target="edit-modal"]').click();
                    closeEdit.click();
                },
                error: function(error) {
                    // Handle error
                    console.error('Error:', error);
                    $('#create_new').html('Add list'); // Reset button text
                },
            });
        });
        
    $(document).ready(function(){ 

        $('.deleteButton').click(function() {

            var deleteItemId = $(this).data('delete-id');
            var csrfToken = "{{ csrf_token() }}";

            $.ajax({
                type: 'DELETE',
                url: '/dashboard/delete/'+deleteItemId,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },

                success: function(response) {
                    $('[data-modal-toggle="deleteModal'+deleteItemId+'"]').click();
                    $('[data-item-id="' + deleteItemId + '"]').closest('.max-w-sm').remove();
                    console.log('success');
                },
                error: function(error) {
                    console.error('Error: ', error);
                }
            });
         
        });

        // $.ajax({ url: "/get_list",
        // type: "GET",
        // dataType: "json",
        // context: document.body,
        // success: function(response){
           
        //     var userLists = response.user_lists;

        //     $('#userListsContainer').empty();

        //     userLists.forEach(function(list) {
              
        //         var listItem = '<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">' +
        //                 '<a href="#">'+
        //                     '<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">'+list.title+'</h5>'+
        //                 '</a>'+
        //                 '<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">'+list.notes+'.</p>'+
        //                 ' <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">'+
        //                     'Edit'+
        //                 ' <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">'+
        //                     '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>'+
        //                 '</svg>'+
        //                     ' </a>'+
        //                 '</div>';

        //     $('#userListsContainer').append(listItem);

        //     });
        //     }
        // });       

        $('#todo-form').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get CSRF token value
            var csrfToken = "{{ csrf_token() }}";

            // Collect form data
            var formData = $(this).serialize();
            formData += '&type=new';

            // Make AJAX request with CSRF token included in headers
            $.ajax({
                type: 'POST',
                url: '/dashboard/upsert',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                dataType: 'json',
                success: function(response) {
                    
                    var userList = response.list;

                    
                    // Handle success response
                    // Close the modal
                    $('[data-modal-target="crud-modal"]').click()

                    // Clear form inputs
                    $('#todo-form')[0].reset();

                        var listItem = '<div style="background-color: rgb(8 47 73)" class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">' +
                                '<a href="#">'+
                                    '<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">'+userList.title+'</h5>'+
                                '</a>'+
                                '<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">'+userList.notes+'.</p>'+
                                ' <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">'+
                                    'Edit'+
                                ' <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">'+
                                    '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>'+
                                '</svg>'+
                                    ' </a>'+
                                '</div>';

                    $('#userListsContainer').prepend(listItem);

                    
                },
                error: function(error) {
                    // Handle error
                    console.error('Error:', error);
                    $('#create_new').html('Add list'); // Reset button text
                },
            });
        });
        
        // $('.deleteButton').click(function() {
           
        //     var id = $(this).data('id');
        //     console.log(id);
           
        // });
    });

   
    
</script>
